<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Revisor.php';

final class RevisorDAO {

    protected $pdoConnection = NULL;

// Construtor da classe
    public function RevisorDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

// Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

// Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Revisor $Revisor) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_revisor` "
                    . "(id_user, id_tempo, periodico, tipo_revisao, instituicao) "
                    . "VALUES (?, ?, ?, ?, ?)");

            $stmt->bindValue(1, $Revisor->getIdUser());
            $stmt->bindValue(2, $Revisor->getIdTempo());
            $stmt->bindValue(3, $Revisor->getPeriodico());
            $stmt->bindValue(4, $Revisor->getTipoRevisao());
            $stmt->bindValue(5, $Revisor->getInstituicao());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

// Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Revisor $Revisor, $idUser, $idTempo, $periodico, $TipoRevisao, $instituicao) {

        $Revisor->setIdUser($idUser);
        $Revisor->setIdTempo($idTempo);
        $Revisor->setPeriodico($periodico);
        $Revisor->setTipoRevisao($TipoRevisao);
        $Revisor->setInstituicao($instituicao);

        return $Revisor;
    }

    public function MiningRevisor($id, $content, $tipo) {
        $code = new simple_html_dom($content);
        $values = $code->find('div[class=layout-cell-pad-5]');
        for ($i = 0; $i < sizeof($values); $i++) {
            if ($i % 2 == 0) {
                $periodo = newstring($values[$i]);
                $inicio = newstring(explode('-', $periodo)[0]);
                $fim = newstring(explode('-', $periodo)[1]);
                $fim = ($fim=='Atual')? 2014 : $fim;
            } else {
                $aux = newstring(explode(':', $values[$i]->plaintext)[1]);
                $periodico = newstring(explode('(', $aux)[0]);
                $local = newstring(explode('(', $aux)[1]);
            }
            $tempoDAO = new TempoDAO();
            $tempo = new Tempo();
            $tempoDAO->DataSetter($tempo, $inicio, null, $fim, null);
            $id_tempo = $tempoDAO->InsertData($tempo)[0];
            $revisor = new Revisor();
            $this->DataSetter($revisor, $id, $id_tempo, $periodico, $tipo, $local);
            $this->InsertData($revisor);
        }
    }

}
