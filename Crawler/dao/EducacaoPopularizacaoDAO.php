<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/EducacaoPopularizacao.php';

final class EducacaoPopularizacaoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function EducacaoPopularizacaoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(EducacaoPopularizacao $EducacaoPopularizacao) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_educacaoPopularizacao` "
                    . "(id_user, id_tempo, participantes, descricao, tipo) "
                    . "VALUES (?, ?, ?, ?, ?)");

            $stmt->bindValue(1, $EducacaoPopularizacao->getIdUser());
            $stmt->bindValue(2, $EducacaoPopularizacao->getIdTempo());
            $stmt->bindValue(3, $EducacaoPopularizacao->getParticipantes());
            $stmt->bindValue(4, $EducacaoPopularizacao->getDescricao());
            $stmt->bindValue(5, $EducacaoPopularizacao->getTipo());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(EducacaoPopularizacao $EducacaoPopularizacao, $idUser, $idTempo, $participantes, $descricao, $tipo) {

        $EducacaoPopularizacao->setIdUser($idUser);
        $EducacaoPopularizacao->setIdTempo($idTempo);
        $EducacaoPopularizacao->setParticipantes($participantes);
        $EducacaoPopularizacao->setDescricao($descricao);
        $EducacaoPopularizacao->setTipo($tipo);

        return $EducacaoPopularizacao;
    }

    public function MiningEducacao($id, $content) {
        $code = new simple_html_dom($content); // transforma a div em um objeto.
        $values = $code->find('div[class=layout-cell layout-cell-11]'); // procura a div contendo os dados
        foreach ($values as $v) {
            $dados = explode('.', newstring($v));
            $size = sizeof($dados);
            var_dump($dados);
            $tipo = newstring($dados[$size - 1]);
            $ano = newstring($dados[$size - 2]);
            $desc = newstring($dados[$size - 3]);
            $participantes = implode('.', explode('.', newstring($v), -4));
            $tempoDAO = new TempoDAO();
            $tempo = new Tempo();
            $tempoDAO->DataSetter($tempo, $ano, null, null, null);
            $idTempo = $tempoDAO->InsertData($tempo)[0];
            $educacao = new EducacaoPopularizacao();
            $this->DataSetter($educacao, $id, $idTempo, $participantes, $desc, $tipo);
            $this->InsertData($educacao);
        }
    }

}
