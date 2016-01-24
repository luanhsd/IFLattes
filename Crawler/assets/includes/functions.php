<?php

function remover_acento($string) {
    /* Tirar acento com a letra A (Porra de preg_replace bugado dos inferno) */
    $string = preg_replace("/á/", "a", $string);
    $string = preg_replace("/à/", "a", $string);
    $string = preg_replace("/â/", "a", $string);
    $string = preg_replace("/ã/", "a", $string);
    $string = preg_replace("/ä/", "a", $string);
    $string = preg_replace("/Á/", "A", $string);
    $string = preg_replace("/À/", "A", $string);
    $string = preg_replace("/Â/", "A", $string);
    $string = preg_replace("/Ã/", "A", $string);
    $string = preg_replace("/Ä/", "A", $string);

    /* Tirar acento com a letra E */
    $string = preg_replace("/é/", "e", $string);
    $string = preg_replace("/è/", "e", $string);
    $string = preg_replace("/ê/", "e", $string);
    $string = preg_replace("/É/", "E", $string);
    $string = preg_replace("/È/", "E", $string);
    $string = preg_replace("/Ê/", "E", $string);

    /* Tirar acento da letra I */
    $string = preg_replace("/í/", "i", $string);
    $string = preg_replace("/ì/", "i", $string);
    $string = preg_replace("/Í/", "I", $string);
    $string = preg_replace("/Ì/", "I", $string);

    /* Tirar acento da Letra O */
    $string = preg_replace("/ó/", "o", $string);
    $string = preg_replace("/ò/", "o", $string);
    $string = preg_replace("/ô/", "o", $string);
    $string = preg_replace("/õ/", "o", $string);
    $string = preg_replace("/ö/", "o", $string);
    $string = preg_replace("/Ó/", "O", $string);
    $string = preg_replace("/Ò/", "O", $string);
    $string = preg_replace("/Ô/", "O", $string);
    $string = preg_replace("/Õ/", "O", $string);
    $string = preg_replace("/Ö/", "O", $string);

    /* Tirar acento da letra U */

    $string = preg_replace("/ú/", "u", $string);
    $string = preg_replace("/ù/", "u", $string);
    $string = preg_replace("/ü/", "u", $string);
    $string = preg_replace("/Ú/", "U", $string);
    $string = preg_replace("/Ù/", "U", $string);
    $string = preg_replace("/Ü/", "U", $string);

    /* Tirar acento da letra ç */
    $string = preg_replace("/ç/", "c", $string);
    $string = preg_replace("/Ç/", "C", $string);

    /* Tirar caractéres especiais */
    $string = preg_replace("/&/", "E", $string);
    $string = preg_replace("/[][><}{)(:,!?*%~^`#@]/", "", $string);
    $string = preg_replace("/ /", "_", $string);

    return $string;
}

function newstring($string) {
    $string = strip_tags($string);
    $string = trim($string);
    $fim = substr($string, -1);
    $inicio = substr($string, 0, sizeof($string));
    if ($fim == '.' || $fim == ',' || $fim == ')' || $fim == '"') {
        $string = substr($string, 0, -1);
    }
    if ($inicio == '(' || $inicio == '"') {
        $string = substr($string, 1);
    }
    $string = ucwords($string);
    return $string;
}
