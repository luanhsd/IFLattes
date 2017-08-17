<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('patente_model');
    }

    public function index() {
        $dados = array(
            'title' => "Patente",
            'h1' => "Patente",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            'data' => $this->patente_model->datalist()
        );
        $this->load->view('includes/header_relatorios', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('patente/patente_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
