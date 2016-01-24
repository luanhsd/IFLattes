<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Informacao.php';

final class InformacaoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function InformacaoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Informacao $Informacao) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `ref_informacoesAdicionais` "
                    . "(id_user, informacao) "
                    . "VALUES (?, ?)");

            $stmt->bindValue(1, $Informacao->getIdUser());
            $stmt->bindValue(2, $Informacao->getInformacao());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Informacao $Informacao, $idUser, $idInformacao, $informacao) {

        $Informacao->setIdUser($idUser);
        $Informacao->setInformacao($idInformacao);
        $Informacao->setInformacao($informacao);

        return $Informacao;
    }

    public function MiningInformacao($id, $content) {
        $code = new simple_html_dom($content); // transforma a div em um objeto.
        $values = $code->find('pre[class=outras-informacoes]'); // procura a div contendo os dados
        $inf = newstring($values[0]);
        $informacao = new Informacao();
        $this->DataSetter($informacao, $id, null, $inf);
        $this->InsertData($informacao);
    }

}
