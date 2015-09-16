<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Curriculo extends CI_Controller {

    public function index() {
        $dados = array(
            'title' => "Curriculos",
            'h1'=>"Curriculos",
            'name' => "IFLattes",
            'autor' => "Luan Dantas"
        );


        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('curriculo_view', $dados);
        $this->load->view('includes/footer', $dados);
    }

}
