<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/CorpoEditorial.php';

final class CorpoEditorialDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function CorpoEditorialDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(CorpoEditorial $CorpoEdit) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_corpoeditorial` "
                    . "(id_user,id_tempo,editorial) "
                    . "VALUES (?,?,?)");

            $stmt->bindValue(1, $CorpoEdit->getIdUser());
            $stmt->bindValue(2, $CorpoEdit->getIdTempo());
            $stmt->bindValue(3, $CorpoEdit->getEditorial());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(CorpoEditorial $CorpoEdit, $IdUser, $IdTempo, $Editorial) {

        $CorpoEdit->setIdUser($IdUser);
        $CorpoEdit->setIdTempo($IdTempo);
        $CorpoEdit->setEditorial($Editorial);

        return $CorpoEdit;
    }

    public function MiningCorpoEditorial($id, $content) {
        $code = new simple_html_dom($content);
        $values = $code->find('div[class=layout-cell-pad-5]');
        for ($i = 0; $i < sizeof($values); $i++) {
            if ($i % 2 == 0) {
                $aux = explode('-', $values[$i]->plaintext);
                $inicio = newstring($aux[0]);
                $fim = newstring($aux[1]);
                $fim = ($fim == 'Atual') ? 2014 : $fim;
            } else {
                $editorial = newstring(explode(':', $values[$i])[1]);
                $tempoDAO = new TempoDAO();
                $tempo = new Tempo();
                $tempoDAO->DataSetter($tempo, $inicio, null, $fim, null);
                $id_tempo = $tempoDAO->InsertData($tempo)[0];
                $corpoEditorial = new CorpoEditorial();
                $this->DataSetter($corpoEditorial, $id, $id_tempo, $editorial);
                $this->InsertData($corpoEditorial);
            }
        }
    }

}
