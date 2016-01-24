<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Area.php';

final class AreaDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function AreaDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Area $Area) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_area` "
                    . "(id_user,id_tempo,grande_area,area,sub_area,espec) "
                    . "VALUES (?,?,?,?,?,?)");


            $stmt->bindValue(1, $Area->getIdUser());
            $stmt->bindValue(2, $Area->getidTempo());
            $stmt->bindValue(3, $Area->getGrandeArea());
            $stmt->bindValue(4, $Area->getArea());
            $stmt->bindValue(5, $Area->getSubArea());
            $stmt->bindValue(6, $Area->getEspec());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Area $Area, $idUser, $idTempo, $grande_area,$area, $sub_area, $espec) {

        $Area->setIdUser($idUser);
        $Area->setIdTempo($idTempo);
        $Area->setGrandeArea($grande_area);
        $Area->setArea($area);
        $Area->setSubArea($sub_area);
        $Area->setEspec($espec);

        return $Area;
    }

    public function MiningArea($id, $content, $inicio, $fim) {
            $var = explode('/', newstring($content));
            $grande = newstring($var[0]);
            $area = newstring(explode(':', $var[1])[1]);
            $sub = newstring(explode(':', $var[2])[1]);
            $esp = newstring(explode(':', $var[3])[1]);
            $tempoDAO = new TempoDAO();
            $tempo = new Tempo();
            $tempoDAO->DataSetter($tempo, $inicio, null, $fim, null);
            $id_tempo = $tempoDAO->InsertData($tempo)[0];
            $areaAtuacao = new Area();
            $this->DataSetter($areaAtuacao, $id, $id_tempo, $grande, $area,$sub,$esp);
            $this->InsertData($areaAtuacao);
    }

}
