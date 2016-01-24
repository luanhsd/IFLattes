<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Patente.php';

final class PatenteDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function PatenteDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Patente $Patente) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_patente` "
                    . "(id_user, id_tempo, titulo, patente, numero, data_deposito, instituicao) "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?)");

            $stmt->bindValue(1, $Patente->getIdUser());
            $stmt->bindValue(2, $Patente->getIdTempo());
            $stmt->bindValue(3, $Patente->getTitulo());
            $stmt->bindValue(4, $Patente->getPatente());
            $stmt->bindValue(5, $Patente->getNumReg());
            $stmt->bindValue(6, $Patente->getDataDeposito());
            $stmt->bindValue(7, $Patente->getInstituicao());


            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Patente $Patente, $idUser, $idTempo, $titulo, $desc, $numReg, $dataDeposito, $instituicao) {

        $Patente->setIdUser($idUser);
        $Patente->setIdTempo($idTempo);
        $Patente->setTitulo($titulo);
        $Patente->setPatente($desc);
        $Patente->setNumReg($numReg);
        $Patente->setDataDeposito($dataDeposito);
        $Patente->setInstituicao($instituicao);

        return $Patente;
    }

    public function MiningPatente($id, $content) {
        $code = new simple_html_dom($content);
        $values = $code->find('div[class=layout-cell layout-cell-11]');
        foreach ($values as $v) {
            $dados = explode(',', $v->plaintext);
            $size = sizeof($dados);
            $instituicao = newstring(explode(':', $dados[$size - 1])[1]);
            $titulo = newstring(explode(':', $dados[$size - 2])[1]);
            $data = newstring(explode(':', $dados[$size - 3])[1]);
            $aux = explode(':', $dados[$size - 4]);
            $patente = newstring(explode('.', $aux[1])[0]);
            $numero = newstring($aux[2]);
            $TempoDAO = new TempoDAO();
            $Tempo = new Tempo();
            $ano=  newstring(explode('/', $data)[2]);
            $mes = newstring(explode('/', $data)[1]);
            $TempoDAO->DataSetter($Tempo, $ano, $mes, null, null);
            $id_tempo = $TempoDAO->InsertData($Tempo)[0];
            $Patente = new Patente();
            $this->DataSetter($Patente, $id, $id_tempo, $titulo, $patente, $numero, $data, $instituicao);
            $this->InsertData($Patente);
        }
    }

}
