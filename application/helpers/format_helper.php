<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function datetime($date, $time) {
    $aux = str_split($date, 2);
    $newdate = $aux[2] . $aux[3] . '-' . $aux[1] . '-' . $aux[0];
    $aux = str_split($time, 2);
    $newtime = $aux[0] . ':' . $aux[1] . ':' . $aux[2];
    $datetime = new DateTime($newdate . ' ' . $newtime);
    return $datetime;
}

function updateDatabase($dataXML, $dataURL, $dataDatabase) {
    if ($dataDatabase != null) {
        if ($dataDatabase == $dataURL) { //database atualizado
            return false;
        } else {
            if ($dataXML == $dataURL) {
                return 'XML';
            } else {
                return 'URL';
            }
        }
    } else {
        if ($dataXML == $dataURL) {
            return 'XML';
        } else {
            return 'URL';
        }
    }
}
