<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Docentes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('docente_model');
    }

    public function index() {
        $dados = array(
            'title' => "Docentes",
            'h1' => "Docentes",
            'name' => "IFLattes",
            'docentes' => $this->docente_model->datalist(),
            'autor' => "Luan Dantas"
        );

        $this->load->view('includes/header_relatorios', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('includes/rightbar', $dados);
        $this->load->view('docentes/docentes_list', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function timeline($id) {
        $this->load->helper('blocks');
        $dados = array(
            'title' => "Docentes",
            'h1' => "Docentes",
            'name' => "IFLattes",
            'docente'=>$this->docente_model->search($id),
            'timeline' => $this->mergeShort($this->docente_model->timeline($id)),
            'autor' => "Luan Dantas"
        );
        //var_dump($this->docente_model->timeline($id));
        //var_dump($this->mergeShort($this->docente_model->timeline($id)));

        $this->load->view('includes/header_relatorios', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('includes/rightbar', $dados);
        $this->load->view('docentes/timeline', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function mergeShort($array) {
        if (count($array) == 1) {
            return $array;
        }
        $mid = count($array) / 2;
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);
        $left = $this->mergeShort($left);
        $right = $this->mergeShort($right);

        return $this->merge($left, $right);
    }

    public function merge($left, $right) {
        $res = array();

        while (count($left) > 0 && count($right) > 0) {
            if ($left[0]->ano_inicial < $right[0]->ano_inicial) {
                $res[] = $right[0];
                $right = array_slice($right, 1);
            } else {
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }

        while (count($left) > 0) {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }

        while (count($right) > 0) {
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }

        return $res;
    }

}
