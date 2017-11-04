<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function qtd_cur() {
    get_instance()->load->model('curriculo_model');
    echo get_instance()->curriculo_model->getQtdCur()." Currículos cadastrados";
}