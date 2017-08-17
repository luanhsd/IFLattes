<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function area() {
        $this->load->model('area_model');
        $json = null;
        $json = json_encode($this->area_model->datalist());
        echo $json;
    }

    public function countareas() {
        $this->load->model('area_model');
        $json = null;
        $json = json_encode($this->area_model->count());
        echo $json;
    }

    public function countFormacao() {
        $this->load->model('formacao_model');
        $json = null;
        $json = json_encode($this->formacao_model->qtd_nivel());
        echo $json;
    }

    public function IdiomaLeitura($idioma) {
        $this->load->model('idioma_model');
        $json = null;
        $json = $this->idioma_model->IdiomaLeitura($idioma);
        echo json_encode($json);
    }
    
    public function IdiomaFala($idioma) {
        $this->load->model('idioma_model');
        $json = null;
        $json = $this->idioma_model->IdiomaFala($idioma);
        echo json_encode($json);
    }
    
    public function IdiomaEscrita($idioma) {
        $this->load->model('idioma_model');
        $json = null;
        $json = $this->idioma_model->IdiomaEscrita($idioma);
        echo json_encode($json);
    }
    
    public function IdiomaCompreensao($idioma) {
        $this->load->model('idioma_model');
        $json = null;
        $json = $this->idioma_model->IdiomaCompreensao($idioma);
        echo json_encode($json);
    }

}
