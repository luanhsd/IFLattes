<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Docentes extends CI_Controller {

    public function index() {
        $dados = array(
            'title' => "Docentes",
            'h1'=>"Docentes",
            'name' => "IFLattes",
            'autor' => "Luan Dantas"
        );


        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('docentes/docentes_list', $dados);
        $this->load->view('includes/footer', $dados);
    }



}
