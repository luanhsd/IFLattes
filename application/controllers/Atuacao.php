<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atuacao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('atuacao_model');
    }

    public function index() {
        $dados = array(
            'title' => "Atuação",
            'h1' => "Atuação",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            'data' => $this->atuacao_model->datalist()
        );
        $this->load->view('includes/header_relatorios', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('includes/rightbar', $dados);
        //var_dump($this->atuacao_model->datalist());
        $this->load->view('atuacao/atuacao_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
