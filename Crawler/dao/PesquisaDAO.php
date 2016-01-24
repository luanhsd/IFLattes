<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Pesquisa.php';

final class PesquisaDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function PesquisaDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Pesquisa $Pesquisa) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_pesquisa` "
                    . "(id_user, data_cadastro, descricao) "
                    . "VALUES (?, ?, ?)");

            $stmt->bindValue(1, $Pesquisa->getIdUser());
            $stmt->bindValue(2, $Pesquisa->getDataCadastro());
            $stmt->bindValue(3, $Pesquisa->getDescricao());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Pesquisa $Pesquisa, $idUser, $dataCadastro, $descricao) {

        $Pesquisa->setIdUser($idUser);
        $Pesquisa->setDataCadastro($dataCadastro);
        $Pesquisa->setDescricao($descricao);

        return $Pesquisa;
    }

    public function MiningPesquisa($id, $content, $dataCur) {
        $code = new simple_html_dom($content);
        $values = $code->find('div[class=layout-cell layout-cell-9]');
        foreach ($values as $v) {
            $dados = explode('<br class="clear">', $v);
            $size = sizeof($dados);
            if ($size == 1) {
                $pesquisa = strip_tags($dados[0]);
                $dataDAO = new DataCadastroDAO();
                $tempo = new DataCadastro();
                $dataDAO->DataSetter($tempo, null, $dataCur);
                $id_tempo = $dataDAO->InsertData($tempo)[0];
                $linhaPesquisa = new Pesquisa();
                $this->DataSetter($linhaPesquisa, $id, $id_tempo, $pesquisa);
                var_dump($linhaPesquisa);
                $this->InsertData($linhaPesquisa);
            }
        }
    }

}
