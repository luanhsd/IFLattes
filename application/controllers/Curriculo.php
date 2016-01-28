<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Curriculo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->library('unzip');
        $this->load->model('Curriculo_model');
    }

    public function index() {
        if ($this->input->post()) {
            $cpt = count($_FILES['file']['name']);
            $files = $_FILES;
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['file']['name'] = $files['file']['name'][$i];
                $_FILES['file']['type'] = $files['file']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
                $_FILES['file']['error'] = $files['file']['error'][$i];
                $_FILES['file']['size'] = $files['file']['size'][$i];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
                $FileXML = $this->extrair($targetFile);
                $this->readXml($FileXML);
            }
        }

        $dados = array(
            'title' => "Curriculos",
            'h1' => "Incluir",
            'name' => "IFLattes",
            'autor' => "Luan Dantas"
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('curriculo/zip', $dados);
        $this->load->view('includes/footer', $dados);
    }

    private function extrair($file) {
        $targetPath = getcwd() . '/uploads/';
        $this->unzip->allow(array('xml'));
        $this->unzip->extract($file);
        $nameFile = explode('.', $file)[0] . '.xml';
        rename($targetPath . 'curriculo.xml', $nameFile);
        return $nameFile;
    }

    Private function readXml($file) {
        $xml = simplexml_load_file($file);
        //DIM_PESSOA
        $pessoa['id_user'] = $xml['NUMERO-IDENTIFICADOR'];
        $pessoa['nm_user'] = $xml->{'DADOS-GERAIS'}['NOME-COMPLETO'];
        $pessoa['citacao'] = $xml->{'DADOS-GERAIS'}['NOME-EM-CITACOES-BIBLIOGRAFICAS'];
        //$this->Curriculo_model->insert('dim_pessoa',$pessoa);
        //REF_ENDEREÇO
        $endereco['id_user'] = $pessoa['id_user'];
        $endereco['local'] = $xml->{'DADOS-GERAIS'}->ENDERECO->{'ENDERECO-PROFISSIONAL'}['NOME-INSTITUICAO-EMPRESA'];
        $endereco['cep'] = $xml->{'DADOS-GERAIS'}->ENDERECO->{'ENDERECO-PROFISSIONAL'}['CEP'];
        $endereco['estado'] = $xml->{'DADOS-GERAIS'}->ENDERECO->{'ENDERECO-PROFISSIONAL'}['UF'];
        $endereco['cidade'] = $xml->{'DADOS-GERAIS'}->ENDERECO->{'ENDERECO-PROFISSIONAL'}['CIDADE'];
        $endereco['bairro'] = $xml->{'DADOS-GERAIS'}->ENDERECO->{'ENDERECO-PROFISSIONAL'}['BAIRRO'];
        $endereco['logradouro'] = $xml->{'DADOS-GERAIS'}->ENDERECO->{'ENDERECO-PROFISSIONAL'}['LOGRADOURO-COMPLEMENTO'];
        //$this->Curriculo_model->insert('ref_endereco',$endereco);
    }

}
