<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class IFLATTES extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('docente_model');
    }

    public function index() {
        $dados = array(
            'title' => "IFLattes",
            'h1' => "Bem Vindo ao IFLattes!",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            'data' => $this->docente_model->curriculo_list()
        );


        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('iflattes', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
