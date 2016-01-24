<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Formacao.php';

final class FormacaoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function FormacaoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Formacao $Formacao) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_formacao` "
                    . "(id_user, id_tempo, nivel, curso, local, titulo, orientador, bolsa, keywords, setor) "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            /* echo "INSERT INTO `fat_formacao` "
              . "(id_user, id_tempo, nivel, curso, local, titulo, orientador, bolsa, keywords, areas, setor) "
              . "VALUES (".$Formacao->getIdUser().", ".$Formacao->getIdTempo().", ".$Formacao->getNivel().", ".$Formacao->getCurso().", ".$Formacao->getLocal().", ".$Formacao->getTitulo().", ".$Formacao->getOrientador().", ".$Formacao->getBolsa().", ".$Formacao->getKeywords().", ".$Formacao->getAreas().", ".$Formacao->getSetor().")"; */
            $stmt->bindValue(1, $Formacao->getIdUser());
            $stmt->bindValue(2, $Formacao->getIdTempo());
            $stmt->bindValue(3, $Formacao->getNivel());
            $stmt->bindValue(4, $Formacao->getCurso());
            $stmt->bindValue(5, $Formacao->getLocal());
            $stmt->bindValue(6, $Formacao->getTitulo());
            $stmt->bindValue(7, $Formacao->getOrientador());
            $stmt->bindValue(8, $Formacao->getBolsa());
            $stmt->bindValue(9, $Formacao->getKeywords());
            $stmt->bindValue(10, $Formacao->getSetor());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Formacao $Formacao, $idUser, $idTempo, $nivel, $curso, $local, $titulo, $orientador, $bolsa, $keywords, $setor) {

        $Formacao->setIdUser($idUser);
        $Formacao->setIdTempo($idTempo);
        $Formacao->setNivel($nivel);
        $Formacao->setCurso($curso);
        $Formacao->setLocal($local);
        $Formacao->setTitulo($titulo);
        $Formacao->setOrientador($orientador);
        $Formacao->setBolsa($bolsa);
        $Formacao->setKeywords($keywords);
        $Formacao->setSetor($setor);

        return $Formacao;
    }

    public function MiningFormacao($id, $content, $tipo) {
        $code = new simple_html_dom($content);
        $values = $code->find('div[class=layout-cell-pad-5]');
        $size = sizeof($values);
        for ($i = 0; $i < $size; $i++) {
            if ($i % 2 == 0) {
                $inicio = newstring(explode('-', $values[$i]->plaintext)[0]);
                $fim = newstring(explode('-', $values[$i]->plaintext)[1]);
            } else {
                $result = explode('<br class="clear">', $values[$i]);
                $form = newstring($result[0]);
                $instituicao = newstring($result[1]);
                for ($j = 2; $j < sizeof($result); $j++) {
                    $label = explode(':', $result[$j], 2)[0];
                    $desc = explode(':', $result[$j], 2)[1];
                    switch ($label) {
                        case 'Título':
                            $titulo = newstring($desc);
                            break;
                        case 'Orientador':
                            $orientador = newstring($desc);
                            break;
                        case 'Bolsista do(a)':
                            $bolsista = newstring($desc);
                            break;
                        case 'Palavras-chave':
                            $keywords = newstring($desc);
                            break;
                        case 'Grande área':
                        case 'Grande Área':
                            $AreaDAO = new AreaDAO();
                            $AreaDAO->MiningArea($id, $desc, $inicio, $fim);
                            //echo $desc . '<br>';
                            break;
                        case 'Setores de atividade':
                            $setores = newstring($desc);
                            break;
                        default :
                            echo $label;
                            break;
                    }
                }
                $tempoDAO = new TempoDAO();
                $tempo = new Tempo();
                $tempoDAO->DataSetter($tempo, $inicio, null, $fim, null);
                $id_tempo = $tempoDAO->InsertData($tempo)[0];
                $newFormacao = new Formacao();
                $this->DataSetter($newFormacao, $id, $id_tempo, $tipo, $form, $instituicao, $titulo, $orientador, $bolsista, $keywords, $setores);
                $this->InsertData($newFormacao);
            }
        }
    }

}
