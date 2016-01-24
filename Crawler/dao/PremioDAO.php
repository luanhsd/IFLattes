<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Premio.php';

final class PremioDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function PremioDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Premio $Premio) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_premio` "
                    . "(id_user, id_tempo, nome, entidade) "
                    . "VALUES (?, ?, ?, ?)");

            $stmt->bindValue(1, $Premio->getIdUser());
            $stmt->bindValue(2, $Premio->getIdTempo());
            $stmt->bindValue(3, $Premio->getNome());
            $stmt->bindValue(4, $Premio->getEntidade());


            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Premio $Premio, $idUser, $idTempo, $nome, $entidade) {

        $Premio->setIdUser($idUser);
        $Premio->setIdTempo($idTempo);
        $Premio->setNome($nome);
        $Premio->setEntidade($entidade);

        return $Premio;
    }

    public function MiningPremio($id, $content) {
        $code = new simple_html_dom($content); // transforma a div em um objeto.
        $values = $code->find('div[class=layout-cell-pad-5]'); // procura a div contendo os dados
        for ($i = 0; $i < sizeof($values); $i++) {
            if ($i % 2 == 0) {
                $ano = newstring($values[$i]);
            } else {
                $aux=  explode(',', newstring($values[$i]));
                $size=  sizeof($aux);
                $local=  newstring($aux[0]);
                $desc= newstring($aux[$size-1]);
            }
            $tempoDAO = new TempoDAO();
            $tempo = new Tempo();
            $tempoDAO->DataSetter($tempo, $ano, null, null, null);
            $id_tempo=$tempoDAO->InsertData($tempo)[0];
            $premio = new Premio();
            $this->DataSetter($premio, $id, $id_tempo, $desc, $local);
            $this->InsertData($premio);
        }
    }

}
