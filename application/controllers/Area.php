<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        //$this->load->model('Curriculo_model');
    }

    public function index() {
        $dados = array(
            'title' => "Area",
            'h1' => "Area",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('area/area_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
