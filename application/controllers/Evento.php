<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('evento_model');
    }

    public function index() {
        $dados = array(
            'title' => "Evento",
            'h1' => "Evento",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            'eventos' => $this->evento_model->datalist()
        );
        $this->load->view('includes/header_relatorios', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('evento/evento_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
