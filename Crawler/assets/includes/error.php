<?php

require_once realpath(dirname(__FILE__) . '/config.php');
require_once BASE_PATH.'/dao/FilaDAO.php';

function manipuladorErros($errno, $errstr = '', $errfile = '', $errline = '') {
    if (error_reporting() == 0)
        return;

    global $_CONFIG;

    // Verifica se não foi chamada por uma 'exception'
    if (func_num_args() == 5) {
        $exception = null;
        list($errno, $errstr, $errfile, $errline) = func_get_args();
        //$backtrace = array_reverse(debug_backtrace());
    } else {
        $exc = func_get_arg(0);
        $errno = $exc->getCode(); // Nome do erro
        $errstr = $exc->getMessage(); // Descrição do erro
        $errfile = $exc->getFile(); // Arquivo
        $errline = $exc->getLine(); // Linha
        //$backtrace = $exc->getTrace();
    }
    // A variável $backtrace pode ser usada para fazer um Back Trace do erro
    // "Nome" de cada tipo de erro
    $errorType = array(
        E_ERROR => 'ERROR',
        E_WARNING => 'WARNING',
        E_PARSE => 'PARSING ERROR',
        E_NOTICE => 'NOTICE',
        E_CORE_ERROR => 'CORE ERROR',
        E_CORE_WARNING => 'CORE WARNING',
        E_COMPILE_ERROR => 'COMPILE ERROR',
        E_COMPILE_WARNING => 'COMPILE WARNING',
        E_USER_ERROR => 'USER ERROR',
        E_USER_WARNING => 'USER WARNING',
        E_USER_NOTICE => 'USER NOTICE',
        E_STRICT => 'STRICT NOTICE',
        E_RECOVERABLE_ERROR => 'RECOVERABLE ERROR'
    );

    // Define o "nome" do erro atual
    if (array_key_exists($errno, $errorType)) {
        $err = $errorType[$errno];
    } else {
        $err = 'CAUGHT EXCEPTION';
    }

    // Se está ativo o LOG de erros, salva uma mensagem no log, usando o formato padrão
    if (ini_get('log_errors'))
        error_log(sprintf("PHP %s:  %s in %s on line %d", $err, $errstr, $errfile, $errline));

    // Mensagem
    $mensagem = '';
    $mensagem .= "<br>[ ERRO NO PHP ]" . "\r\n";
    $mensagem .= "<br>Tipo de erro: " . $err . "\r\n";
    $mensagem .= "<br>Arquivo: " . $errfile . "\r\n";
    $mensagem .= "<br>Linha: " . $errline . "\r\n";
    $mensagem .= "<br>Descrição: " . $errstr . "\r\n";

    $mensagem .= "\r\n";
    $mensagem .= 'Data: ' . date('d/m/Y H:i:s') . "\r\n";

    $filaDAO = new FilaDAO();
    $fila = new Fila();
    $url=$filaDAO->ReturnFirstURL()[0];
    $log=$filaDAO->listLogByURL($url)[0]."<br>".$mensagem;
    $filaDAO->DataSetter($fila, $url, $log);
    $filaDAO->UpdateData($fila);
}

// Define o seu novo manipulador de erros
set_error_handler('manipuladorErros');
?>