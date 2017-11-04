<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Producao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('producao_model');
    }

    public function index() {
        $dados = array(
            'title' => "Produção",
            'h1' => "Produção",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            'data' => $this->producao_model->datalist(),
            'categoria'=>$this->producao_model->categoriaList()
        );
        $this->load->view('includes/header_relatorios', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('producao/producao_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
