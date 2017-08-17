<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('projeto_model');
    }

    public function index() {
        $dados = array(
            'title' => "Projeto",
            'h1' => "Projeto",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            //'data' => $this->Curriculo_model->datalist('curriculum')
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('projeto/projeto_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
