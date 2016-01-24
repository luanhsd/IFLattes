<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Incluir extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('array');
        $this->load->library('unzip');
    }

    public function index() {
        if ($this->input->post()) {


        }
        $dados = array(
            'title' => "Curriculos",
            'h1'=>"Incluir",
            'name' => "IFLattes",
            'autor' => "Luan Dantas"
        );


        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('incluir/incluir', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function inserir(){
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);
            $this->unzip->allow(array('xml')); 
            $this->unzip->extract($targetFile);
            unlink($targetFile);
            rename($targetPath.'curriculo.xml',explode('.',$targetFile)[0].'.xml');
        }
        $alert =  '<div class="alert alert-dismissable alert-success">
                                <strong>Well done!</strong> You successfully read this important alert message.
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </div>';
     
        redirect('Incluir');   
    }
}
