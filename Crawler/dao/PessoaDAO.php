<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Pessoa.php';

final class PessoaDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function PessoaDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Pessoa $Pessoa) {
        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `dim_pessoa` "
                    . "(id_user, nm_user, citacao) "
                    . "VALUES (?, ?, ?)");

            /* echo "INSERT INTO `dim_pessoa` "
              . "(id_user, nm_user, citacao, id_endereco) "
              . "VALUES (".$Pessoa->getIdUser().",".$Pessoa->getNmUser().",".$Pessoa->getCitacao().",".$Pessoa->getEndereco().")<br/>"; */

            $stmt->bindValue(1, $Pessoa->getIdUser());
            $stmt->bindValue(2, $Pessoa->getNmUser());
            $stmt->bindValue(3, $Pessoa->getCitacao());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Pessoa $Pessoa, $idUser, $nmUser, $citacao) {

        $Pessoa->setIdUser($idUser);
        $Pessoa->setNmUser($nmUser);
        $Pessoa->setCitacao($citacao);
        return $Pessoa;
    }

    public function MiningPessoa($id, $content) {
        $code = new simple_html_dom($content); // transforma a div em um objeto.
        $values= $code->find('div[class=layout-cell-pad-5]'); // procura a div contendo os dados
        $nome=  newstring($values[1]->plaintext);
        $citacao=  newstring($values[3]->plaintext);
        $Pessoa=new Pessoa();
        $this->DataSetter($Pessoa, $id, $nome, $citacao);
        $this->InsertData($Pessoa);        
    }

}
