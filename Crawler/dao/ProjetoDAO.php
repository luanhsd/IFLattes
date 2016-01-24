<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Projeto.php';

final class ProjetoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function ProjetoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Projeto $Projeto) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_projeto` "
                    . "(id_user, id_tempo, tipo, titulo, descricao, situacao, natureza, alunos, integrantes, financiador, producoes) "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bindValue(1, $Projeto->getIdUser());
            $stmt->bindValue(2, $Projeto->getIdTempo());
            $stmt->bindValue(3, $Projeto->getTipo());
            $stmt->bindValue(4, $Projeto->getTitulo());
            $stmt->bindValue(5, $Projeto->getDescricao());
            $stmt->bindValue(6, $Projeto->getSituacao());
            $stmt->bindValue(7, $Projeto->getNatureza());
            $stmt->bindValue(8, $Projeto->getAlunos());
            $stmt->bindValue(9, $Projeto->getIntegrantes());
            $stmt->bindValue(10, $Projeto->getFinanciador());
            $stmt->bindValue(11, $Projeto->getProducoes());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Projeto $Projeto, $idUser, $idTempo, $tipo, $titulo, $descricao, $situacao, $natureza, $alunos, $integrantes, $financiador, $producoes) {

        $Projeto->setIdUser($idUser);
        $Projeto->setIdTempo($idTempo);
        $Projeto->setTipo($tipo);
        $Projeto->setTitulo($titulo);
        $Projeto->setDescricao($descricao);
        $Projeto->setSituacao($situacao);
        $Projeto->setNatureza($natureza);
        $Projeto->setAlunos($alunos);
        $Projeto->setIntegrantes($integrantes);
        $Projeto->setFinanciador($financiador);
        $Projeto->setProducoes($producoes);

        return $Projeto;
    }

    public function MiningProjeto($id, $content, $tipo) {
        $code = new simple_html_dom($content); // transforma a div em um objeto.
        $values = $code->find('div[class=layout-cell-pad-5]'); // procura a div contendo os dados           
        $array = array();
        foreach ($values as $v) {
            array_push($array, newstring($v->plaintext));
        }
        $projetos = array_chunk($array, 4);
        for ($i = 0; $i < sizeof($projetos); $i++) {
            $periodo = explode('-', $projetos[$i][0]);
            $inicio = newstring($periodo[0]);
            $fim = newstring($periodo[1]);
            $titulo = newstring($projetos[$i][1]);
            $desc = explode("\n", $projetos[$i][3]);
            foreach ($desc as $d) {
                if (trim($d) != null) {
                    $tag = explode(':', $d, 2);
                    $label = trim($tag[0]);
                    $value = newstring($tag[1]);
                    switch ($label) {
                        case 'Descrição':
                            $descricao = $value;
                            break;
                        case 'Situação':
                            $explode = explode("; Natureza:", $value);
                            $situacao = newstring($explode[0]);
                            $natureza = newstring($explode[1]);
                            break;
                        case 'Alunos envolvidos':
                            $alunos = $value;
                            break;
                        case 'Integrantes':
                            $integrantes = $value;
                            break;
                        case 'Financiador(es)':
                            $financiador = $value;
                            break;
                        case 'Número de produções C, T &amp; A':
                            $producoes = $value;
                            break;
                    }
                }
            }
            $TempoDAO = new TempoDAO();
            $Tempo = new Tempo();
            $TempoDAO->DataSetter($Tempo, $inicio, null, $fim, null);
            $id_tempo = $TempoDAO->InsertData($Tempo)[0];
            $projeto = new Projeto();
            $this->DataSetter($projeto, $id, $id_tempo, $tipo, $titulo, $descricao, $situacao, $natureza, $alunos, $integrantes, $financiador, $producoes);
            $this->InsertData($projeto);
        }
    }

}
