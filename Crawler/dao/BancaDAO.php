<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Banca.php';

final class BancaDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function BancaDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Banca $Banca) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_banca` "
                    . "(id_user, id_tempo, tipo, banca, titulo,  ano, sobre) "
                    . "VALUES (?,?,?,?,?,?,?)");

            $stmt->bindValue(1, $Banca->getIdUser());
            $stmt->bindValue(2, $Banca->getIdTempo());
            $stmt->bindValue(3, $Banca->getTipo());
            $stmt->bindValue(4, $Banca->getBanca());
            $stmt->bindValue(5, $Banca->getTitulo());
            $stmt->bindValue(6, $Banca->getAno());
            $stmt->bindValue(7, $Banca->getSobre());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Banca $Banca, $idUser, $idTempo, $tipo, $banca, $titulo, $ano, $sobre) {

        $Banca->setIdUser($idUser);
        $Banca->setIdTempo($idTempo);
        $Banca->setTipo($tipo);
        $Banca->setBanca($banca);
        $Banca->setTitulo($titulo);
        $Banca->setAno($ano);
        $Banca->setSobre($sobre);

        return $Banca;
    }

    public function MiningBanca($id, $content) {
        $code = new simple_html_dom($content);
        $values = $code->find('div[class=layout-cell layout-cell-11]');
        //var_dump($values);
        foreach ($values as $v) {
            var_dump($v);            break;
            $teste=explode(';', newstring($v));
            $result= explode('. ', $teste[sizeof($teste)-1]);
            echo sizeof($result);
            //var_dump($teste);
            //var_dump($result);
            $dados = explode('.', newstring($v));
            //var_dump($dados);
            $size = sizeof($dados);
            //var_dump((int) $dados[$size - 2]);
            if ((int) $dados[$size - 2] == 0) {
                //var_dump($dados);
            }
            //echo '<br>' . ($size - 2) . ': ' . $dados[$size - 2];
        }



        /* $linha = explode("\n", trim($content));

          foreach ($linha as $l) {
          if (sizeof(trim($l)) != 0) {
          $cont = substr_count($l, "    1.");
          if ($cont != 0) {
          $tipo = trim(explode("    1.", $l, 2)[0]);
          }

          $part = trim(explode(".", $l, 2)[1]);
          $aux = substr_count($part, ".") - 1;
          $sobre = trim(explode(".", $part)[$aux]);
          $ano = trim(explode(".", $part)[$aux - 1]);
          $titulo = trim(explode(".", $part)[$aux - 2]);
          $banca = trim(explode(".", $part)[$aux - 3]);
          $particip = substr_count($banca, "Participação em banca de");
          if ($particip == 0) {
          $titulo = $banca;
          $banca = null;
          } else {
          $banca = trim(explode("Participação em banca de", $banca)[1]);
          }
          if ($titulo != null) {
          $tempoDAO = new TempoDAO();
          $tempo = new Tempo();
          $tempoDAO->DataSetter($tempo, $ano, null, null, null);
          $id_tempo = $tempoDAO->InsertData($tempo)[0];
          $Banca = new Banca();
          $this->DataSetter($Banca, $id, $id_tempo, $tipo, $banca, $titulo, $ano, $sobre);
          $this->InsertData($Banca);
          }
          }
          } */
    }

}
