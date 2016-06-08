<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->library('unzip');
        $this->load->model('Relatorio_model');
    }

    public function index() {
        $dados = array(
            'title' => "Maps",
            'h1' => "Maps",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('pages/relatorios', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function getEndereco() {
        $data = $this->Relatorio_model->campus();
        echo json_encode($data);
    }

}
