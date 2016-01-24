<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Curriculum.php';

final class CurriculumDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function CurriculumDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Curriculum $Curriculum) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `curriculum` "
                    . "(data_cadastro, id_curriculo, nome, url, content) "
                    . "VALUES (?,?,?,?,?)");

            $stmt->bindValue(1, $Curriculum->getDataCadastro());
            $stmt->bindValue(2, $Curriculum->getIdCurriculo());
            $stmt->bindValue(3, $Curriculum->getNome());
            $stmt->bindValue(4, $Curriculum->getUrl());
            $stmt->bindValue(5, $Curriculum->getContent());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Edita os dados vindos da classe lógica no banco de dados (TERMINAR)
    public function UpdateData(Curriculum $Curriculum) {

        try {
            $stmt = $this->pdoConnection->prepare("UPDATE `curriculum` SET "
                    . "nome = ? , url= ? , content = ? WHERE id_curriculo = ?");

            $stmt->bindValue(1, $Curriculum->getNome());
            $stmt->bindValue(2, $Curriculum->getUrl());
            $stmt->bindValue(3, $Curriculum->getContent());
            $stmt->bindValue(4, $Curriculum->getIdCurriculo());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Curriculum $Curriculum, $IdDataCadastro, $IdCurriculo, $nome, $url, $content) {

        $Curriculum->setDataCadastro($IdDataCadastro);
        $Curriculum->setIdCurriculo($IdCurriculo);
        $Curriculum->setNome($nome);
        $Curriculum->setUrl($url);
        $Curriculum->setContent($content);


        return $Curriculum;
    }

    public function ListCur() {

        try {

            $result = array();

            $stmt = $this->pdoConnection->query("SELECT d.data_cadastro,c.id_curriculo,c.nome,c.url,c.content FROM curriculum AS c INNER JOIN dim_cadastro AS d WHERE c.data_cadastro=d.id_dataCadastro ORDER BY c.nome");

            if ($stmt) {

                foreach ($stmt as $row) {

                    $Curriculum = new Curriculum();

                    $Curriculum->setDataCadastro($row['data_cadastro']);
                    $Curriculum->setIdCurriculo($row['id_curriculo']);
                    $Curriculum->setNome($row['nome']);
                    $Curriculum->setUrl($row['url']);
                    $Curriculum->setContent($row['content']);

                    $result[$Curriculum->getIdCurriculo()] = $Curriculum;
                }
            }

            return $result;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

}
