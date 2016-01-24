<?php
header('Content-type: text/html; charset=utf-8');
require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH.'/php/simple_html_dom.php';
require_once BASE_PATH.'/dao/FilaDAO.php';
require_once BASE_PATH.'/dao/ListaDAO.php';
require_once BASE_PATH.'/php/Bot.php';


$Fila = new Fila();
$FilaDAO = new FilaDAO();
$ListaDAO = new ListaDAO();
$links = $ListaDAO->ListGetFila();


//verifica se a table fila_process está com algum registro para o processamento.
if ($FilaDAO->tableNull()) {
    foreach ($links as $l) {
        $Fila->setUrl($l->getUrl());
        //echo $Fila->getUrl();
        $FilaDAO->InsertData($Fila);
    }
}

    // PREPARE O CRAWLER
    $ArrayURL = array();
    $Bot = new Bot();
    $urls = $FilaDAO->ListData();
    
    foreach($urls as $url){
        array_push($ArrayURL, $url->url);
    }
    
    $Bot->setUrl($ArrayURL);
    $Bot->getContent($Bot->getUrl());



     