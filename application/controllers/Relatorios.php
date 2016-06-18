<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->library('unzip');
        $this->load->model('Relatorio_model');
    }

    public function index() {
        $dados = array(
            'title' => "Maps",
            'h1' => "Maps",
            'name' => "IFLattes",
            'autor' => "Luan Dantas",
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('pages/relatorios', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function getCampus() {
        $data = $this->Relatorio_model->campus();
        for ($i = 0; $i < sizeof($data); $i++) {
            $makers[$i]['lat'] = $data[$i]->latitude;
            $makers[$i]['long'] = $data[$i]->longitude;
            $makers[$i]['local'] = $data[$i]->cidade;
            $makers[$i]['content'] = "<b>" . $data[$i]->cidade . "<b>";
        }
        echo json_encode($makers);
    }

    public function getQTDTitulacao() {
        $data = $this->Relatorio_model->qtd_titulacao();
        echo json_encode($data);
    }

    public function getAreas() {
        $data = $this->Relatorio_model->areas_tree();
        $result;
        for ($i=0;$i<sizeof($data);$i++) {
            $result[$i]=['name' => $data[$i]->grande_area, 'children' => [$data[$i]->area, $data[$i]->sub_area, $data[$i]->espec]];
        }
        echo json_encode($result);        
    }

}
