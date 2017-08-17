<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Idiomas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('idioma_model');
    }

    public function index() {
        $dados = array(
            'title' => "Idioma",
            'h1' => "Idioma",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            'data' => $this->idioma_model->datalist(),
            'idiomas' => $this->idioma_model->listIdiomas()
        );
        $this->load->view('includes/header_relatorios', $dados);
        //var_dump($this->idioma_model->listIdiomas());
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('idioma/idioma_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
