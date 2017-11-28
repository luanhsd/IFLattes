<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Premio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('Curriculo_model');
    }

    public function index() {
        $dados = array(
            'title' => "Premio",
            'h1' => "Premio",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
            //'data' => $this->Curriculo_model->datalist('curriculum')
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('desenvolvimento', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
