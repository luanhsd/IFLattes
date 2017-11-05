<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesquisa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        //$this->load->model('Curriculo_model');
    }

    public function index() {
        $dados = array(
            'title' => "Pesquisa",
            'h1' => "Pesquisa",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            //'data' => $this->Curriculo_model->datalist('curriculum')
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('atuacao/atuacao_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
