<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function qtd_cur() {
    get_instance()->load->model('curriculo_model');
    echo get_instance()->curriculo_model->getQtdCur() . " Currículos cadastrados";
}

function ExceptionCur($id, $code) {
    get_instance()->load->model('curriculo_model');
    $data['id_curriculo'] = $id;
    $data['datetime'] = date('Y-m-d H:i:s');
    switch ($code) {
        case 1:
            $data['error'] = 'Não pertence a instituição pré definida';
            break;
        case 2:
            $data['error'] = 'Verificar Data dos eventos registrados. Dados inconsistentes';
            break;
    }
    get_instance()->curriculo_model->insertLog($data);
}
