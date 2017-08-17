<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Formacao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('formacao_model');
    }

    public function index() {
        $dados = array(
            'title' => "Formação",
            'h1' => "Formação",
            'name' => "IFLattes",
            'autor' => "Luan Dantas"
        );
        
        $this->load->view('includes/header_relatorios', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('includes/rightbar', $dados);
        $this->load->view('formacao/formacao_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
