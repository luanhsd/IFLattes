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
        $id = $xml['NUMERO-IDENTIFICADOR'];
        $data_cur = $xml['DATA-ATUALIZACAO'];
        foreach ($xml->children() as $child) {
            $name = $child->getName();
            switch ($name) {
                case 'DADOS-GERAIS':
                    $this->Gerais($id, $child);
                    break;
                case 'PRODUCAO-BIBLIOGRAFICA':
                case 'PRODUCAO-TECNICA':
                case 'OUTRA-PRODUCAO':
                    $this->Producao($id, $child);
                    break;
                case 'DADOS-COMPLEMENTARES':
                    $this->Complementos($id, $child);
                    break;
                default :
                    var_dump($name);
                    break;
            }
        }
    }

    private function Gerais($id, $node) {
        $pessoa['id_user'] = $id;
        $pessoa['nm_user'] = $node['NOME-COMPLETO'];
        $pessoa['citacao'] = $node['NOME-EM-CITACOES-BIBLIOGRAFICAS'];
        //$this->Curriculo_model->insert('dim_pessoa',$pessoa);
        foreach ($node->children() as $child) {
            $name = $child->getName();
            //var_dump($name);
            switch ($name) {
                case 'ENDERECO':
                    $this->Endereco($id, $child);
                    break;
                case 'FORMACAO-ACADEMICA-TITULACAO':
                    $this->Formacao($id, $child);
                    break;
                case 'ATUACOES-PROFISSIONAIS':
                    $this->Atuacao($id, $child);
                    break;
                case 'AREAS-DE-ATUACAO':
                    $this->Area($id, $child);
                    break;
                case 'IDIOMAS':
                    $this->Idioma($id, $child);
                    break;
                case 'PREMIOS-TITULOS':
                    $this->Premio($id, $child);
                    break;
            }
        }
    }

    private function Endereco($id, $node) {
        $endereco['id_user'] = $id;
        $endereco['local'] = $node->{'ENDERECO-PROFISSIONAL'}['NOME-INSTITUICAO-EMPRESA'];
        $endereco['cep'] = $node->{'ENDERECO-PROFISSIONAL'}['CEP'];
        $endereco['estado'] = $node->{'ENDERECO-PROFISSIONAL'}['UF'];
        $endereco['cidade'] = $node->{'ENDERECO-PROFISSIONAL'}['CIDADE'];
        $endereco['bairro'] = $node->{'ENDERECO-PROFISSIONAL'}['BAIRRO'];
        $endereco['logradouro'] = $node->{'ENDERECO-PROFISSIONAL'}['LOGRADOURO-COMPLEMENTO'];
        //$this->Curriculo_model->insert('ref_endereco',$endereco);
    }

    private function Formacao($id, $node) {
        foreach ($node->children() as $child) {
            //var_dump($child);
            $formacao['id_user'] = $id;
            $formacao['nivel'] = $child->getName();
            $formacao['curso'] = $child['NOME-CURSO'];
            $formacao['local'] = $child['NOME-INSTITUICAO'];
        }
    }

    private function Atuacao($id, $node) {
        
    }

    private function Area($id, $node) {
        
    }

    private function Idioma($id, $node) {
        $idioma['id_user'] = $id;
        $idioma['idioma'] = $node->IDIOMA['IDIOMA'];
        $idioma['leitura'] = $node->IDIOMA['PROFICIENCIA-DE-LEITURA'];
        $idioma['fala'] = $node->IDIOMA['PROFICIENCIA-DE-FALA'];
        $idioma['escrita'] = $node->IDIOMA['PROFICIENCIA-DE-ESCRITA'];
        $idioma['compreensao'] = $node->IDIOMA['PROFICIENCIA-DE-COMPREENSAO'];
    }

    private function Premio($id, $node) {
        
    }

    private function Producao($id, $node) {
        
    }

    private function Complementos($id, $node) {
        
    }

}
