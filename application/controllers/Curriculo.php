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

    // Realizar tratamento de como obter as palavras chaves e setores de uma forma "BONITA"
    private function Formacao($id, $node) {
        foreach ($node->children() as $child) {
            $formacao['id_user'] = $id;
            //$formacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child['ANO-DE-INICIO'], 'ano_final'=>$child['ANO-DE-CONCLUSAO']));
            $formacao['nivel'] = $child->getName();
            $formacao['curso'] = $child['NOME-CURSO'];
            if ($formacao['nivel'] == 'GRADUACAO')
                $formacao['titulo'] = $child['TITULO-DO-TRABALHO-DE-CONCLUSAO-DE-CURSO'];
            else
                $formacao['titulo'] = $child['TITULO-DA-DISSERTACAO-TESE'];
            $formacao['orientador'] = $child['NOME-COMPLETO-DO-ORIENTADOR'];
            $formacao['bolsa'] = $child['NOME-AGENCIA'];
            //$this->Curriculo_model->insert('fat_formacao', $formacao);
        }
    }

    private function Atuacao($id, $node) {
        foreach ($node as $array) {
            //var_dump($array);
            $atuacao['id_user'] = $id;
            $atuacao['instituicao'] = $array['NOME-INSTITUICAO'];

            //foreach ($array['VINCULOS'] as $vinc){
            //    var_dump($array);
            //   $atuacao['tipo_vinculo']=$vinc['TIPO-DE-VINCULO'];
            //   $atuacao['enq_funcional']=$vinc['ENQUADRAMENTO-FUNCIONAL'];
            //   $atuacao['carga_horaria']=$vinc['CARGA-HORARIA-SEMANAL'];
            //    var_dump($atuacao);
            //}
            //$atuacao['tempo']= $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $node->{'PREMIO-TITULO'}['ANO-DA-PREMIACAO']));
        }
    }

    private function Area($id, $node) {
        $premio['id_user'] = $id;
        //$premio['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $node->{'PREMIO-TITULO'}['ANO-DA-PREMIACAO']));
        $premio['grande'] = $node->{'AREA-DE-ATUACAO'}['NOME-GRANDE-AREA-DO-CONHECIMENTO'];
        $premio['area'] = $node->{'AREA-DE-ATUACAO'}['NOME-DA-SUB-AREA-DO-CONHECIMENTO'];
        $premio['sub_area'] = $node->{'AREA-DE-ATUACAO'}['NOME-DA-SUB-AREA-DO-CONHECIMENTO'];
        $premio['espec'] = $node->{'AREA-DE-ATUACAO'}['NOME-DA-ESPECIALIDADE'];
        //$this->Curriculo_model->insert('fat_area', $premio);
    }

    private function Idioma($id, $node) {
        $idioma['id_user'] = $id;
        $idioma['idioma'] = $node->IDIOMA['IDIOMA'];
        $idioma['leitura'] = $node->IDIOMA['PROFICIENCIA-DE-LEITURA'];
        $idioma['fala'] = $node->IDIOMA['PROFICIENCIA-DE-FALA'];
        $idioma['escrita'] = $node->IDIOMA['PROFICIENCIA-DE-ESCRITA'];
        $idioma['compreensao'] = $node->IDIOMA['PROFICIENCIA-DE-COMPREENSAO'];
        //$this->Curriculo_model->insert('fat_idioma', $idioma);
    }

    private function Premio($id, $node) {
        $premio['id_user'] = $id;
        //$premio['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $node->{'PREMIO-TITULO'}['ANO-DA-PREMIACAO']));
        $premio['nome'] = $node->{'PREMIO-TITULO'}['NOME-DO-PREMIO-OU-TITULO'];
        $premio['entidade'] = $node->{'PREMIO-TITULO'}['NOME-DA-ENTIDADE-PROMOTORA'];
        //$this->Curriculo_model->insert('fat_premio'),$premio);
    }

    private function Producao($id, $node) {
        foreach ($node->children() as $child) {
            //var_dump($child);
            $producao['id_user'] = $id;
            //$producao['id_tempo']=$this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PATENTE'}['ANO-DESENVOLVIMENTO']));
            $producao['tipo'] = $child->getName();
            switch ($child->getName()) {
                case 'TRABALHOS-EM-EVENTOS':
                    $producao['natureza'] = $child->{'DADOS-BASICOS-DO-TRABALHO'}['NATUREZA'];
                    $producao['titulo'] = $child->{'DADOS-BASICOS-DO-TRABALHO'}['TITULO'];
                    $producao['categoria'] = $child->{'DADOS-BASICOS-DO-TRABALHO'}['TIPO-PRODUTO'];
                    break;
                case 'ARTIGOS-PUBLICADOS':
                    $producao['natureza'] = $child->{'DADOS-BASICOS-DO-ARTIGO'}['NATUREZA'];
                    $producao['titulo'] = $child->{'DADOS-BASICOS-DO-ARTIGO'}['TITULO'];
                    $producao['categoria'] = $child->{'DADOS-BASICOS-DO-ARTIGO'}['TIPO-PRODUTO'];
                    break;
                case 'PATENTE':
                    $producao['natureza'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['NATUREZA'];
                    $producao['titulo'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['TITULO'];
                    $producao['categoria'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['TIPO-PRODUTO'];
                    break;
                case 'PRODUTO-TECNOLOGICO':
                    $producao['natureza'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['NATUREZA'];
                    $producao['titulo'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['TITULO'];
                    $producao['categoria'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['TIPO-PRODUTO'];
                    break;
                case 'TRABALHO-TECNICO':
                    $producao['natureza'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['NATUREZA'];
                    $producao['titulo'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['TITULO'];
                    $producao['categoria'] = $child->{'DADOS-BASICOS-DA-PATENTE'}['TIPO-PRODUTO'];
                    break;
                case 'DEMAIS-TIPOS-DE-PRODUCAO-TECNICA':
                    break;
                case 'PRODUCAO-ARTISTICA-CULTURAL':
                    break;
                case 'ORIENTACOES-CONCLUIDAS':
                    break;
                case 'DEMAIS-TIPOS-DE-PRODUCAO-BIBLIOGRAFICA':
                    break;
                case 'LIVROS-E-CAPITULOS':
                    break;
                case 'DEMAIS-TRABALHOS':
                    break;
                case 'SOFTWARE':
                    break;
                case 'TEXTOS-EM-JORNAIS-OU-REVISTAS':
                    break;
                case 'ARTIGOS-ACEITOS-PARA-PUBLICACAO':
                    break;
                default :
                    echo $child->getName() . '<br>';
                    break;
            }
            //$producao['keywords'];
            //$producao['areas'];
            //$producao['setor'];
            $producao['inf_adicionais'] = $child->{'INFORMACOES-ADICIONAIS'}['DESCRICAO-INFORMACOES-ADICIONAIS'];
            //var_dump($producao);
        }
    }

    private function Complementos($id, $node) {
        foreach ($node->children() as $array) {
            $title = $array->getName();
            switch ($title) {
                case 'PARTICIPACAO-EM-BANCA-JULGADORA':
                    var_dump($array);
                    break;
                case 'PARTICIPACAO-EM-EVENTOS-CONGRESSOS':
                    break;
                case 'INFORMACOES-ADICIONAIS-INSTITUICOES':
                    break;
                case 'INFORMACOES-ADICIONAIS-CURSOS':
                    break;
                case 'FORMACAO-COMPLEMENTAR':
                    break;
                case 'PARTICIPACAO-EM-BANCA-TRABALHOS-CONCLUSAO':
                    break;
                case 'ORIENTACOES-EM-ANDAMENTO':
                    break;
                default :
                    var_dump($title);
                    break;
            }
        }
    }

}
