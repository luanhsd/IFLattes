<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('curriculo_model');
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
        $aux = array(
            'POS-DOUTORADO'=>0,
            'DOUTORADO'=>0,
            'MESTRADO'=>0,
            'ESPECIALIZACAO'=>0,
            'APERFEICOAMENTO'=>0,
            'GRADUACAO'=>0,
            'MESTRADO-PROFISSIONALIZANTE'=>0
        );        
        foreach($this->curriculo_model->listID() as $id){
            $aux[$this->formacao_model->qtd_nivel($id->id_user)[0]->nivel]++;
        }
        $json=array(
            [0]['nivel']=>'POS-DOUTORADO',
            [0]['qtd']=>$aux['POS-DOUTORADO'],
            [1]['nivel']=>'DOUTORADO',
            [1]['qtd']=>$aux['DOUTORADO'],
            [2]['nivel']=>'MESTRADO',
            [2]['qtd']=>$aux['MESTRADO'],
            [3]['nivel']=>'ESPECIALIZACAO',
            [3]['qtd']=>$aux['ESPECIALIZACAO'],
            [4]['nivel']=>'APERFEICOAMENTO',
            [4]['qtd']=>$aux['APERFEICOAMENTO'],
            [5]['nivel']=>'GRADUACAO',
            [5]['qtd']=>$aux['GRADUACAO'],
            [6]['nivel']=>'MESTRADO-PROFISSIONALIZANTE',
            [6]['qtd']=>$aux['MESTRADO-PROFISSIONALIZANTE'],
        );
        echo json_encode($json);
    }

    public function listLastFormacao(){
        $this->load->model('formacao_model');
        $json = null;
        $json = json_encode($this->formacao_model->list_nivel());
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

    public function EventosPorAno($evento=null){
        switch($evento){
            case 'Exposicao':
                $evento='Exposição';
            break;
            case 'Olimpiada':
                $evento='Olimpíada';
            break;
            case 'Seminario':
                $evento='Seminário';
            break;
            case 'Simposio':
                $evento='Simpósio';
            break;
        }
        $this->load->model('evento_model');
        $json = null;
        $json = $this->evento_model->EventosPorAno($evento);
        echo json_encode($json);
    }

    public function PatentesPorAno(){
        $this->load->model('patente_model');
        $json = null;
        $json = $this->patente_model->PatentsPerYear();
        echo json_encode($json);
    }

    public function ProducoesPorAno($producao=null){
        $this->load->model('producao_model');
        $json = null;
        $json = $this->producao_model->ProducoesPorAno($producao);
        echo json_encode($json);
    }

    public function CampusCadastrados(){
        $this->load->model('endereco_model');
        $json = $this->endereco_model->datalist();
        echo json_encode($json);
    }

}
