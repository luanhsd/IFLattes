<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Evento.php';

final class EventoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function EventoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Evento $Evento) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_evento` "
                    . "(id_user, id_tempo, nome, descricao, tipo) "
                    . "VALUES (?, ?, ?, ?, ?)");

            /* echo "INSERT INTO `fat_evento` "
              . "(id_user, id_tempo, descricao, adicionais, tipo, forma, url) "
              . "VALUES (".$Evento->getIdUser().",".$Evento->getIdTempo().",".$Evento->getDescricao().",".$Evento->getAdicionais().",".$Evento->getTipo().",".$Evento->getForma().",".$Evento->getUrl().")";
             */
            $stmt->bindValue(1, $Evento->getIdUser());
            $stmt->bindValue(2, $Evento->getIdTempo());
            $stmt->bindValue(3, $Evento->getNome());
            $stmt->bindValue(4, $Evento->getDescricao());
            $stmt->bindValue(5, $Evento->getTipo());


            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Evento $Evento, $idUser, $idTempo, $nome, $descricao, $tipo) {

        $Evento->setIdUser($idUser);
        $Evento->setIdTempo($idTempo);
        $Evento->setNome($nome);
        $Evento->setDescricao($descricao);
        $Evento->setTipo($tipo);

        return $Evento;
    }

    public function MiningEvento($id, $content) {
        $code = new simple_html_dom($content); // transforma a div em um objeto.
        $values = $code->find('div[class=layout-cell layout-cell-11]'); // procura a div contendo os dados
        foreach ($values as $v) {
            $dados = explode('.', newstring($v));
            $size = sizeof($dados);
            if ($size == 4) {
                $nome = newstring($dados[0]);
                $desc = newstring($dados[$size - 3]);
                $ano = newstring($dados[$size - 2]);
                $tipo = newstring($dados[$size - 1]);
            } else {
                $nome = newstring($dados[$size - 3]);
                $ano = newstring($dados[$size - 2]);
                $tipo = newstring($dados[$size - 1]);
            }
            $TempoDAO = new TempoDAO();
            $Tempo = new Tempo();
            $TempoDAO->DataSetter($Tempo, $ano, null, null, null);
            $id_tempo = $TempoDAO->InsertData($Tempo)[0];
            $event = new Evento();
            $this->DataSetter($event, $id, $id_tempo, $nome, $desc, $tipo);
            $this->InsertData($event);
        }
    }

}
