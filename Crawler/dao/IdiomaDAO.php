<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Idioma.php';

final class IdiomaDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function IdiomaDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Pega as informações de um registro de acordo com o parâmetro
    public function ListDataByID($ID) {

        try {

            $stmt = $this->pdoConnection->query("SELECT * FROM `fat_idioma` WHERE id_user = " . (int) $ID)->fetch();

            return $stmt;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Idioma $Idioma) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_idioma` "
                    . "(id_user,data_cadastro,idioma,le,fala,escreve,compreende) "
                    . "VALUES (?,?,?,?,?,?,?)");


            $stmt->bindValue(1, $Idioma->getIdUser());
            $stmt->bindValue(2, $Idioma->getDataCadastro());
            $stmt->bindValue(3, $Idioma->getIdioma());
            $stmt->bindValue(4, $Idioma->getLe());
            $stmt->bindValue(5, $Idioma->getFala());
            $stmt->bindValue(6, $Idioma->getEscreve());
            $stmt->bindValue(7, $Idioma->getCompreende());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Idioma $Idioma, $idUser, $data, $idioma, $le, $fala, $escreve, $compreende) {

        $Idioma->setIdUser($idUser);
        $Idioma->setDataCadastro($data);
        $Idioma->setIdioma($idioma);
        $Idioma->setLe($le);
        $Idioma->setFala($fala);
        $Idioma->setEscreve($escreve);
        $Idioma->setCompreende($compreende);

        return $Idioma;
    }

    public function MiningIdioma($id, $content, $dataCur) {
        $code = new simple_html_dom($content); // transforma a div em um objeto.
        $values = $code->find('div[class=layout-cell-pad-5]'); // procura a div contendo os dados
        $size = sizeof($values);
        for ($i = 0; $i < $size; $i++) {
            if ($i % 2 == 0) {
                $idioma = newstring($values[$i]);
            } else {
                $nivel = explode(' ', newstring($values[$i]));
                $compreende = newstring($nivel[1]);
                $fala = newstring($nivel[3]);
                $le = newstring($nivel[5]);
                $escreve = newstring($nivel[7]);
            }
        }
        $dataDAO = new DataCadastroDAO();
        $tempo = new DataCadastro();
        $dataDAO->DataSetter($tempo, null, $dataCur);
        $id_tempo = $dataDAO->InsertData($tempo)[0];
        $Idioma = new Idioma();
        $this->DataSetter($Idioma, $id, $id_tempo, $idioma, $le, $fala, $escreve, $compreende);
        $this->InsertData($Idioma);
    }

}
