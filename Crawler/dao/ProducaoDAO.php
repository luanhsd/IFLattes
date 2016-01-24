<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Producao.php';

final class ProducaoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function ProducaoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Producao $Producao) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_producao` "
                    . "(id_user, id_tempo, titulo, volume, pagina, keywords, url,  tipo, serie, issn_isbn, divisao, areas) "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bindValue(1, $Producao->getIdUser());
            $stmt->bindValue(2, $Producao->getIdTempo());
            $stmt->bindValue(3, $Producao->getTitulo());
            $stmt->bindValue(4, $Producao->getVolume());
            $stmt->bindValue(5, $Producao->getPagina());
            $stmt->bindValue(6, $Producao->getKeywords());
            $stmt->bindValue(7, $Producao->getUrl());
            $stmt->bindValue(8, $Producao->getTipo());
            $stmt->bindValue(9, $Producao->getSerie());
            $stmt->bindValue(10, $Producao->getIssnIsbn());
            $stmt->bindValue(11, $Producao->getDivisao());
            $stmt->bindValue(12, $Producao->getArea());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Producao $Producao, $idUser, $idTempo, $titulo, $volume, $pagina, $keywords, $url, $tipo, $serie, $issn_isbn, $divisao, $area) {

        $Producao->setIdUser($idUser);
        $Producao->setIdTempo($idTempo);
        $Producao->setTitulo($titulo);
        $Producao->setVolume($volume);
        $Producao->setPagina($pagina);
        $Producao->setKeywords($keywords);
        $Producao->setUrl($url);
        $Producao->setTipo($tipo);
        $Producao->setSerie($serie);
        $Producao->setIssnIsbn($issn_isbn);
        $Producao->setDivisao($divisao);
        $Producao->setArea($area);

        return $Producao;
    }

    public function MiningProducao($id, $content) {
        // O TIPO DE PRODUÇÃO FICA DENTRO DA DIV CLASS= cita-artigos
        //  CONTEUDO DENTRO DA DIV CLASS = layout-cell layout-cell-11
        // CRIE UM LAÇO DENTRO DO OUTRO... ASSIM QUE DETECTAR A PROXIMA CLASS DO TIPO DE PRODUÇÃO, ALTERA O VALOR DA VARIAVEL.
        
        $code = new simple_html_dom($content);
        foreach ($code as $c){
        } 
    }

}
