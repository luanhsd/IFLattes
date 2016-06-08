<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entrada extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->library('unzip');
        $this->load->model('Curriculo_model');
    }

    public function index() {
        
    }

    public function zip() {
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
            'h1' => "Incluir/Zip",
            'name' => "IFLattes",
            'autor' => "Luan Dantas"
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('entrada/zip', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function url() {
        $dados = array(
            'title' => "Curriculos",
            'h1' => "Incluir/Url",
            'name' => "IFLattes",
            'autor' => "Luan Dantas"
        );
        $this->load->view('includes/header', $dados);
        $this->load->view('includes/sidebar', $dados);
        $this->load->view('entrada/url', $dados);
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

    public function getID($file) {
        $aux = explode('/', $file);
        $id = explode('.', $aux[2])[0];
        return $id;
    }

    Private function readXml($file) {
        $xml = simplexml_load_file($file);
        $id = $xml['NUMERO-IDENTIFICADOR'];
        if ($xml['NUMERO-IDENTIFICADOR'] == '') {
            $id = $this->getID($file);
        }
        $data_cur = $xml['DATA-ATUALIZACAO'];
        $dia = substr($data_cur, 0, 2);
        $mes = substr($data_cur, 2, 2);
        $ano = substr($data_cur, 4, 4);
        $data_cur = $ano . '-' . $mes . '-' . $dia;
        foreach ($xml->children() as $child) {
            $name = $child->getName();
            switch ($name) {
                case 'DADOS-GERAIS':
                    $this->Gerais($id, $child, $data_cur);
                    $curriculo['nome'] = $child['NOME-COMPLETO'];
                    break;
                case 'PRODUCAO-BIBLIOGRAFICA':
                case 'PRODUCAO-TECNICA':
                case 'OUTRA-PRODUCAO':
                    //$this->Producao($id, $child);
                    break;
                case 'DADOS-COMPLEMENTARES':
                    //$this->Complementos($id, $child);
                    break;
                default :
                    //echo "<br>" . 'READXML: ' . $name;
                    break;
            }
        }
        $curriculo['data_cadastro'] = $this->Curriculo_model->insert('dim_cadastro', array('data_cadastro' => $data_cur));
        $curriculo['id_curriculo'] = $id;
        $curriculo['url'] = 'http://lattes.cnpq.br/' . $id;
        $curriculo['content'] = $xml;
        $this->Curriculo_model->insert('curriculum', $curriculo);
    }

    private function Gerais($id, $node, $data_cur) {
        $pessoa['id_user'] = $id;
        $pessoa['nm_user'] = $node['NOME-COMPLETO'];
        $pessoa['citacao'] = $node['NOME-EM-CITACOES-BIBLIOGRAFICAS'];
        $this->Curriculo_model->insert('dim_pessoa', $pessoa);

        foreach ($node->children() as $child) {
            $name = $child->getName();
            switch ($name) {
                case 'ENDERECO':
                    //$this->Endereco($id, $child);
                    break;
                case 'FORMACAO-ACADEMICA-TITULACAO':
                    //$this->Formacao($id, $child);
                    break;
                case 'ATUACOES-PROFISSIONAIS':
                    $this->Atuacao($id, $child);
                    break;
                case 'AREAS-DE-ATUACAO':
                    break;
                case 'IDIOMAS':
                    //$this->Idioma($id, $child, $data_cur);
                    break;
                case 'PREMIOS-TITULOS':
                    //$this->Premio($id, $child);
                    break;
                case 'RESUMO-CV':
                    break;
                case 'OUTRAS-INFORMACOES-RELEVANTES':
                    break;
                default :
                    //echo "<br>" . 'GERAL: ' . $name;
                    break;
            }
        }
    }

    private function Endereco($id, $node) {
        if ($node->{'ENDERECO-PROFISSIONAL'}['CODIGO-INSTITUICAO-EMPRESA'] != '') {
            $endereco['id_user'] = $id;
            $endereco['local'] = $node->{'ENDERECO-PROFISSIONAL'}['NOME-INSTITUICAO-EMPRESA'];
            $endereco['cep'] = $node->{'ENDERECO-PROFISSIONAL'}['CEP'];
            $endereco['estado'] = $node->{'ENDERECO-PROFISSIONAL'}['UF'];
            $endereco['cidade'] = $node->{'ENDERECO-PROFISSIONAL'}['CIDADE'];
            $endereco['bairro'] = $node->{'ENDERECO-PROFISSIONAL'}['BAIRRO'];
            $endereco['logradouro'] = $node->{'ENDERECO-PROFISSIONAL'}['LOGRADOURO-COMPLEMENTO'];
            $coordinates = $this->getLongLat($endereco);
            $endereco['latitude'] = $coordinates['lat'];
            $endereco['longitude'] = $coordinates['long'];
            $this->Curriculo_model->insert('ref_endereco', $endereco);
        }
    }

    private function getLongLat($endereco) {
        $key = 'AIzaSyDk-WqSjJlaaxV5lWft133p2esKGW9aJ5w';
        $address = $endereco['cidade'] . ',' . $endereco['cep'] . ',' . $endereco['estado'];
        $address = urlencode($address);
        $url = "https://maps.google.com/maps/api/geocode/json?address={$address}&key={$key}";
        $resp_json = file_get_contents($url);
        $resp = json_decode($resp_json, true);
        $coordinates['lat'] = 0;
        $coordinates['long'] = 0;
        if ($resp['status'] == 'OK') {
            $coordinates['lat'] = $resp['results'][0]['geometry']['location']['lat'];
            $coordinates['long'] = $resp['results'][0]['geometry']['location']['lng'];
        } else {
            
        }
        return $coordinates;
    }

    private function Formacao($id, $node) {
        foreach ($node->children() as $child) {
            $formacao['id_user'] = $id;
            $formacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child['ANO-DE-INICIO'], 'ano_final' => $child['ANO-DE-CONCLUSAO']));
            $formacao['nivel'] = $child->getName();
            $formacao['curso'] = $child['NOME-CURSO'];
            if ($formacao['curso'] == null) {
                $formacao['curso'] = "NÃO INFORMADO";
            }
            if ($formacao['nivel'] == 'GRADUACAO')
                $formacao['titulo'] = $child['TITULO-DO-TRABALHO-DE-CONCLUSAO-DE-CURSO'];
            else
                $formacao['titulo'] = $child['TITULO-DA-DISSERTACAO-TESE'];
            $formacao['orientador'] = $child['NOME-COMPLETO-DO-ORIENTADOR'];
            $formacao['bolsa'] = $child['NOME-AGENCIA'];
            $this->Curriculo_model->insert('fat_formacao', $formacao);
            if (isset($child->{'AREAS-DO-CONHECIMENTO'}) && count($child->{'AREAS-DO-CONHECIMENTO'}) > 0) {
                $date = array("ano_inicial" => $child['ANO-DE-INICIO'], "ano_final" => $child['ANO-DE-CONCLUSAO']);
                $node = $child->{'AREAS-DO-CONHECIMENTO'}->children();
                $this->Area($id, $node, $date);
            }
        }
    }

    private function Atuacao($id, $node) {
        foreach ($node as $array) {
            var_dump($array);
            $atuacao['id_user'] = $id;
            $atuacao['instituicao'] = $array['NOME-INSTITUICAO'];
            foreach ($array->{'VINCULOS'} as $vinculo) {
                //$ano_inic=$vinculo['ANO-INICIO'];
                //$ano_final=$vinculo['ANO-FIM'];
                //$mes_inic=$vinculo['MES-INICIO'];
                //$mes_final=$vinculo['MES-FIM'];
                $atuacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => , 'mes_inicial' => $vinculo['MES-INICIO'], 'ano_final' => $vinculo['ANO-FIM'], 'mes_final' => $vinculo['MES-FIM']));
                $atuacao['tipo_vinculo'] = $vinculo['TIPO-DE-VINCULO'];
                $atuacao['enq_funcional'] = $vinculo['OUTRO-ENQUADRAMENTO-FUNCIONAL-INFORMADO'];
                $atuacao['carga_horaria'] = $vinculo['CARGA-HORARIA-SEMANAL'];
                $this->Curriculo_model->insert('fat_atuacao', $atuacao);
            }
        }
    }

    private function Area($id, $node, $data) {
        for ($i = 1; $i < 4; $i++) {
            if (isset($node->{'AREA-DO-CONHECIMENTO-' . $i}) && count($node->{'AREA-DO-CONHECIMENTO-' . $i}) > 0) {
                $aux = $node->{'AREA-DO-CONHECIMENTO-' . $i};
                $area['id_user'] = $id;
                $area['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', $data);
                $area['grande_area'] = $aux['NOME-GRANDE-AREA-DO-CONHECIMENTO'];
                $area['area'] = $aux['NOME-DA-SUB-AREA-DO-CONHECIMENTO'];
                $area['sub_area'] = $aux['NOME-DA-SUB-AREA-DO-CONHECIMENTO'];
                $area['espec'] = $aux['NOME-DA-ESPECIALIDADE'];
                $this->Curriculo_model->insert('fat_area', $area);
            }
        }
    }

    private function Idioma($id, $node, $data_cur) {
        $idioma['id_user'] = $id;
        $idioma['data_cadastro'] = $this->Curriculo_model->insert('dim_cadastro', array('data_cadastro' => $data_cur));
        $idioma['idioma'] = $node->IDIOMA['IDIOMA'];
        $idioma['le'] = $node->IDIOMA['PROFICIENCIA-DE-LEITURA'];
        $idioma['fala'] = $node->IDIOMA['PROFICIENCIA-DE-FALA'];
        $idioma['escreve'] = $node->IDIOMA['PROFICIENCIA-DE-ESCRITA'];
        $idioma['compreende'] = $node->IDIOMA['PROFICIENCIA-DE-COMPREENSAO'];
        $this->Curriculo_model->insert('fat_idioma', $idioma);
    }

    private function Premio($id, $node) {
        $premio['id_user'] = $id;
        $premio['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $node->{'PREMIO-TITULO'}['ANO-DA-PREMIACAO']));
        $premio['nome'] = $node->{'PREMIO-TITULO'}['NOME-DO-PREMIO-OU-TITULO'];
        $premio['entidade'] = $node->{'PREMIO-TITULO'}['NOME-DA-ENTIDADE-PROMOTORA'];
        $this->Curriculo_model->insert('fat_premio', $premio);
    }

    private function Producao($id, $node) {
        foreach ($node->children() as $child) {
            $producao['id_user'] = $id;
            $producao['categoria'] = $child->getName();
            switch ($child->getName()) {
                case 'TRABALHOS-EM-EVENTOS':
                    $aux = $child->{'TRABALHO-EM-EVENTOS'};
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DO-TRABALHO'}['ANO-DO-TRABALHO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DO-TRABALHO'}['TITULO-DO-TRABALHO'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DO-TRABALHO'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'ARTIGOS-PUBLICADOS':
                    $tipo = $child->children()->getName();
                    $aux = $child->{$tipo};
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DO-ARTIGO'}['ANO-DO-ARTIGO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DO-ARTIGO'}['TITULO-DO-ARTIGO'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DO-ARTIGO'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    break;

                case 'PATENTE':
                    $aux = $child;
                    $patente['id_user'] = $id;
                    $patente['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DA-PATENTE'}['ANO-DESENVOLVIMENTO']));
                    $patente['titulo'] = $aux->{'DADOS-BASICOS-DA-PATENTE'}['TITULO'];
                    $patente['categoria'] = $aux->{'DETALHAMENTO-DA-PATENTE'}['CATEGORIA'];
                    $patente['instituicao'] = $aux->{'DETALHAMENTO-DA-PATENTE'}['INSTITUICAO-FINANCIADORA'];
                    $patente['descricao'] = $aux->{'INFORMACOES-ADICIONAIS'}['DESCRICAO-INFORMACOES-ADICIONAIS'];
                    $this->Curriculo_model->insert('fat_patente', $patente);
                    break;

                case 'PRODUTO-TECNOLOGICO':
                    $aux = $child;
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DO-PRODUTO-TECNOLOGICO'}['ANO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DO-PRODUTO-TECNOLOGICO'}['TITULO-DO-PRODUTO'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DO-PRODUTO-TECNOLOGICO'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;


                case 'TRABALHO-TECNICO':
                    $aux = $child;
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DO-TRABALHO-TECNICO'}['ANO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DO-TRABALHO-TECNICO'}['TITULO-DO-TRABALHO-TECNICO'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DO-TRABALHO-TECNICO'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'DEMAIS-TIPOS-DE-PRODUCAO-TECNICA':
                    $tipo = $child->children()->getName();
                    $aux = $child->{$tipo};
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$aux->children()->getName()}['ANO']));
                    $producao['titulo'] = $aux->{$aux->children()->getName()}['TITULO'];
                    $producao['natureza'] = $aux->{$aux->children()->getName()}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'PRODUCAO-ARTISTICA-CULTURAL':
                    $aux = $child->{$child->children()->getName()};
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$aux->children()->getName()}['ANO']));
                    $producao['titulo'] = $aux->{$aux->children()->getName()}['TITULO'];
                    $producao['natureza'] = $aux->{$aux->children()->getName()}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'ORIENTACOES-CONCLUIDAS':
                    foreach ($child->children() as $aux) {
                        $tipo = $aux->getName();
                        $orientacao['id_user'] = $id;
                        $orientacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DE-' . $tipo}['ANO']));
                        $orientacao['titulo'] = $aux->{'DADOS-BASICOS-DE-' . $tipo}['TITULO'];
                        $orientacao['natureza'] = $aux->{'DADOS-BASICOS-DE-' . $tipo}['NATUREZA'];
                        $orientacao['keywords'] = null;
                        if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                            foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                                if ($values != '')
                                    $orientacao['keywords'].='[' . ($values) . ']';
                            }
                        }
                        $orientacao['setor'] = null;
                        if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                            foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                                if ($values != '')
                                    $orientacao['setor'].='[' . ($values) . ']';
                            }
                        }
                        $orientacao['status'] = "CONCLUIDA";
                        $this->Curriculo_model->insert('fat_orientacao', $orientacao);
                    }
                    break;



                case 'DEMAIS-TIPOS-DE-PRODUCAO-BIBLIOGRAFICA':
                    $tipo = $child->children()->getName();
                    $aux = $child->{$tipo};
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$aux->children()->getName()}['ANO']));
                    $producao['titulo'] = $aux->{$aux->children()->getName()}['TITULO'];
                    $producao['natureza'] = $aux->{$aux->children()->getName()}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'LIVROS-E-CAPITULOS':
                    $aux = $child->children();
                    $tipo = $aux->children()->getName();
                    switch ($tipo) {
                        case 'DADOS-BASICOS-DO-TRABALHO':
                            $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$tipo}['ANO-DO-TRABALHO']));
                            $producao['titulo'] = $aux->{$tipo}['TITULO-DO-TRABALHO'];
                            $producao['natureza'] = $aux->{$tipo}['NATUREZA'];
                            break;
                        case 'CAPITULO-DE-LIVRO-PUBLICADO':
                            $aux = $aux->{'CAPITULOS-DE-LIVROS-PUBLICADOS'}->{$tipo}->{'DADOS-BASICOS-DO-CAPITULO'};
                            $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux['ANO']));
                            $producao['titulo'] = $aux['TITULO-DO-CAPITULO-DO-LIVRO'];
                            $producao['natureza'] = $aux['NATUREZA'];
                            break;
                        case 'LIVRO-PUBLICADO-OU-ORGANIZADO':
                            $aux = $aux->{'LIVROS-PUBLICADOS-OU-ORGANIZADOS'}->{$tipo}->{'DADOS-BASICOS-DO-LIVRO'};
                            $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux['ANO']));
                            $producao['titulo'] = $aux['TITULO-DO-LIVRO'];
                            $producao['natureza'] = $aux['NATUREZA'];
                            break;
                        default :
                            //echo "<br>" . 'PRODUÇÃO: ' . $tipo;
                            break;
                    }
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'DEMAIS-TRABALHOS':
                    $aux = $child;
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DE-DEMAIS-TRABALHOS'}['ANO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DE-DEMAIS-TRABALHOS'}['TITULO'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DE-DEMAIS-TRABALHOS'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'SOFTWARE':
                    $aux = $child;
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DO-SOFTWARE'}['ANO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DO-SOFTWARE'}['TITULO-DO-SOFTWARE'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DO-SOFTWARE'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'TEXTOS-EM-JORNAIS-OU-REVISTAS':
                    $aux = $child->{'TEXTO-EM-JORNAL-OU-REVISTA'};
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DO-TEXTO'}['ANO-DO-TEXTO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DO-TEXTO'}['TITULO-DO-TEXTO'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DO-TEXTO'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'ARTIGOS-ACEITOS-PARA-PUBLICACAO':
                    $aux = $child->{'ARTIGO-ACEITO-PARA-PUBLICACAO'};
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DO-ARTIGO'}['ANO-DO-ARTIGO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DO-ARTIGO'}['TITULO-DO-ARTIGO'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DO-ARTIGO'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'PROCESSOS-OU-TECNICAS':
                    $aux = $child;
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DO-PROCESSOS-OU-TECNICAS'}['ANO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DO-PROCESSOS-OU-TECNICAS'}['TITULO-DO-PROCESSO'];
                    $producao['natureza'] = $aux->{'DADOS-BASICOS-DO-PROCESSOS-OU-TECNICAS'}['NATUREZA'];
                    $producao['keywords'] = null;
                    if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                        foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                            if ($values != '')
                                $producao['keywords'].='[' . ($values) . ']';
                        }
                    }
                    $producao['setor'] = null;
                    if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                        foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                            if ($values != '')
                                $producao['setor'].='[' . ($values) . ']';
                        }
                    }
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                case 'MARCA':
                    $aux = $child;
                    $producao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DA-MARCA'}['ANO-DESENVOLVIMENTO']));
                    $producao['titulo'] = $aux->{'DADOS-BASICOS-DA-MARCA'}['TITULO'];
                    $producao['natureza'] = $aux->{'DETALHAMENTO-DA-MARCA'}['NATUREZA'];
                    $this->Curriculo_model->insert('fat_producao', $producao);
                    break;

                default :
                    //echo "<br>" . 'PRODUÇÃO: ' . $child->getName();
                    break;
            }
        }
    }

    private function Complementos($id, $node) {
        foreach ($node->children() as $array) {
            $title = $array->getName();
            switch ($title) {
                case 'PARTICIPACAO-EM-BANCA-JULGADORA':
                    $banca['id_user'] = $id;
                    foreach ($array->children() as $child) {
                        $title = $child->getName();
                        $aux = $child;
                        switch ($title) {
                            case 'BANCA-JULGADORA-PARA-CONCURSO-PUBLICO':
                                $banca['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DA-BANCA-JULGADORA-PARA-CONCURSO-PUBLICO'}['ANO']));
                                $banca['banca'] = $title;
                                $banca['tipo'] = $aux->{'DADOS-BASICOS-DA-' . $title}['TIPO'];
                                $banca['natureza'] = $aux->{'DADOS-BASICOS-DA-' . $title}['NATUREZA'];
                                $banca['titulo'] = $aux->{'DADOS-BASICOS-DA-' . $title}['TITULO'];
                                $banca['sobre'] = $aux->{'INFORMACOES-ADICIONAIS'}['DESCRICAO-INFORMACOES-ADICIONAIS'];
                                $this->Curriculo_model->insert('fat_banca', $banca);
                                break;
                            case 'OUTRAS-BANCAS-JULGADORAS':
                                $banca['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DE-OUTRAS-BANCAS-JULGADORAS'}['ANO']));
                                $banca['banca'] = $title;
                                $banca['tipo'] = $aux->{'DADOS-BASICOS-DE-' . $title}['TIPO'];
                                $banca['natureza'] = $aux->{'DADOS-BASICOS-DE-' . $title}['NATUREZA'];
                                $banca['titulo'] = $aux->{'DADOS-BASICOS-DE-' . $title}['TITULO'];
                                $banca['sobre'] = $aux->{'INFORMACOES-ADICIONAIS'}['DESCRICAO-INFORMACOES-ADICIONAIS'];
                                $this->Curriculo_model->insert('fat_banca', $banca);
                                break;
                            case 'BANCA-JULGADORA-PARA-PROFESSOR-TITULAR':
                                $banca['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DA-' . $title}['ANO']));
                                $banca['banca'] = $title;
                                $banca['tipo'] = $aux->{'DADOS-BASICOS-DA-' . $title}['TIPO'];
                                $banca['natureza'] = $aux->{'DADOS-BASICOS-DA-' . $title}['NATUREZA'];
                                $banca['titulo'] = $aux->{'DADOS-BASICOS-DA-' . $title}['TITULO'];
                                $banca['sobre'] = $aux->{'INFORMACOES-ADICIONAIS'}['DESCRICAO-INFORMACOES-ADICIONAIS'];
                                $this->Curriculo_model->insert('fat_banca', $banca);
                                break;
                            case 'BANCA-JULGADORA-PARA-AVALIACAO-CURSOS':
                                $banca['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{'DADOS-BASICOS-DA-' . $title}['ANO']));
                                $banca['banca'] = $title;
                                $banca['tipo'] = $aux->{'DADOS-BASICOS-DA-' . $title}['TIPO'];
                                $banca['natureza'] = $aux->{'DADOS-BASICOS-DA-' . $title}['NATUREZA'];
                                $banca['titulo'] = $aux->{'DADOS-BASICOS-DA-' . $title}['TITULO'];
                                $banca['sobre'] = $aux->{'INFORMACOES-ADICIONAIS'}['DESCRICAO-INFORMACOES-ADICIONAIS'];
                                $this->Curriculo_model->insert('fat_banca', $banca);
                                break;

                            default :
                                //echo "<br>" . 'BANCAS: ' . $title;
                                break;
                        }
                    }
                    break;

                case 'PARTICIPACAO-EM-EVENTOS-CONGRESSOS':
                    foreach ($array->children() as $child) {
                        $evento['id_user'] = $id;
                        switch ($child->getName()) {
                            case 'PARTICIPACAO-EM-SIMPOSIO':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-SIMPOSIO'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-SIMPOSIO'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-SIMPOSIO'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DA-PARTICIPACAO-EM-SIMPOSIO'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;

                            case 'PARTICIPACAO-EM-ENCONTRO':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-ENCONTRO'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-ENCONTRO'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-ENCONTRO'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DA-PARTICIPACAO-EM-ENCONTRO'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;

                            case 'OUTRAS-PARTICIPACOES-EM-EVENTOS-CONGRESSOS':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DE-OUTRAS-PARTICIPACOES-EM-EVENTOS-CONGRESSOS'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DE-OUTRAS-PARTICIPACOES-EM-EVENTOS-CONGRESSOS'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DE-OUTRAS-PARTICIPACOES-EM-EVENTOS-CONGRESSOS'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DE-OUTRAS-PARTICIPACOES-EM-EVENTOS-CONGRESSOS'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;

                            case 'PARTICIPACAO-EM-CONGRESSO':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-CONGRESSO'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-CONGRESSO'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-CONGRESSO'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DA-PARTICIPACAO-EM-CONGRESSO'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;


                            case 'PARTICIPACAO-EM-SEMINARIO':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-SEMINARIO'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-SEMINARIO'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-SEMINARIO'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DA-PARTICIPACAO-EM-SEMINARIO'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;

                            case 'PARTICIPACAO-EM-OFICINA':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-OFICINA'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-OFICINA'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-OFICINA'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DA-PARTICIPACAO-EM-OFICINA'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;

                            case 'PARTICIPACAO-EM-OLIMPIADA':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-OLIMPIADA'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-OLIMPIADA'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-OLIMPIADA'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DA-PARTICIPACAO-EM-OLIMPIADA'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;
                            case 'PARTICIPACAO-EM-FEIRA':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-FEIRA'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-FEIRA'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-FEIRA'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DA-PARTICIPACAO-EM-FEIRA'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;
                            case 'PARTICIPACAO-EM-EXPOSICAO':
                                $evento['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-EXPOSICAO'}['ANO']));
                                $evento['natureza'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-EXPOSICAO'}['NATUREZA'];
                                $evento['titulo'] = $child->{'DADOS-BASICOS-DA-PARTICIPACAO-EM-EXPOSICAO'}['TITULO'];
                                $evento['nome'] = $child->{'DETALHAMENTO-DA-PARTICIPACAO-EM-EXPOSICAO'}['NOME-DO-EVENTO'];
                                $this->Curriculo_model->insert('fat_evento', $evento);
                                break;

                            default :
                                //echo "<br>" . 'PARTICIPAÇÃO: ' . $child->getName();
                                break;
                        }
                    }
                    break;


                case 'INFORMACOES-ADICIONAIS-INSTITUICOES':
                    break;

                case 'INFORMACOES-ADICIONAIS-CURSOS':
                    break;

                case 'FORMACAO-COMPLEMENTAR':
                    $aux = $array->{$array->children()->getName()};
                    $formacao['id_user'] = $id;
                    $formacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux['ANO-DE-INICIO'], 'ano_final' => 'ANO-DE-CONCLUSAO'));
                    $formacao['nivel'] = 'FORMACAO-COMPLEMENTAR';
                    $formacao['curso'] = $aux['NOME-CURSO'];
                    $formacao['local'] = $aux['NOME-INSTITUICAO'];
                    $this->Curriculo_model->insert('fat_formacao', $formacao);
                    break;


                case 'PARTICIPACAO-EM-BANCA-TRABALHOS-CONCLUSAO':
                    $aux = $array->children();
                    switch ($aux->getName()) {
                        case 'PARTICIPACAO-EM-BANCA-DE-MESTRADO';
                            //var_dump(count($aux->{'PARTICIPACAO-EM-BANCA-DE-DOUTORADO'}));
                            break;

                        case 'PARTICIPACAO-EM-BANCA-DE-APERFEICOAMENTO-ESPECIALIZACAO':
                            break;

                        case 'PARTICIPACAO-EM-BANCA-DE-GRADUACAO':
                            break;
                        case 'PARTICIPACAO-EM-BANCA-DE-DOUTORADO':
                            break;
                        case 'PARTICIPACAO-EM-BANCA-DE-EXAME-QUALIFICACAO':
                            break;
                        default :
                            //echo "<br>" . 'PARTICIPACAO_BANCA: ' . $aux->getName();
                            break;
                    }
                    break;



                case 'ORIENTACOES-EM-ANDAMENTO':
                    $aux = $array->children();
                    $tipo = $aux->getName();
                    switch ($tipo) {
                        case 'ORIENTACAO-EM-ANDAMENTO-DE-APERFEICOAMENTO-ESPECIALIZACAO':
                            $aux = $aux->{$tipo};
                            $orientacao['id_user'] = $id;
                            $orientacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$aux->children()->getName()}['ANO']));
                            $orientacao['titulo'] = $aux->{$aux->children()->getName()}['TITULO-DO-TRABALHO'];
                            $orientacao['natureza'] = $aux->{$aux->children()->getName()}['NATUREZA'];
                            $orientacao['keywords'] = null;
                            if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                                foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                                    if ($values != '')
                                        $orientacao['keywords'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['setor'] = null;
                            if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                                foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                                    if ($values != '')
                                        $orientacao['setor'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['status'] = "EM ANDAMENTO";

                            $this->Curriculo_model->insert('fat_orientacao', $orientacao);
                            break;

                        case 'ORIENTACAO-EM-ANDAMENTO-DE-GRADUACAO':
                            $aux = $aux->{$tipo};
                            $orientacao['id_user'] = $id;
                            $orientacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$aux->children()->getName()}['ANO']));
                            $orientacao['titulo'] = $aux->{$aux->children()->getName()}['TITULO-DO-TRABALHO'];
                            $orientacao['natureza'] = $aux->{$aux->children()->getName()}['NATUREZA'];
                            $orientacao['keywords'] = null;
                            if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                                foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                                    if ($values != '')
                                        $orientacao['keywords'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['setor'] = null;
                            if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                                foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                                    if ($values != '')
                                        $orientacao['setor'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['status'] = "EM ANDAMENTO";
                            $this->Curriculo_model->insert('fat_orientacao', $orientacao);
                            break;

                        case 'ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO':
                            $aux = $aux->{$tipo};
                            $orientacao['id_user'] = $id;
                            $orientacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$aux->children()->getName()}['ANO']));
                            $orientacao['titulo'] = $aux->{$aux->children()->getName()}['TITULO-DO-TRABALHO'];
                            $orientacao['natureza'] = $aux->{$aux->children()->getName()}['NATUREZA'];
                            $orientacao['keywords'] = null;
                            if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                                foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                                    if ($values != '')
                                        $orientacao['keywords'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['setor'] = null;
                            if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                                foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                                    if ($values != '')
                                        $orientacao['setor'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['status'] = "EM ANDAMENTO";
                            $this->Curriculo_model->insert('fat_orientacao', $orientacao);
                            break;

                        case 'ORIENTACAO-EM-ANDAMENTO-DE-INICIACAO-CIENTIFICA':
                            $aux = $aux->{$tipo};
                            $orientacao['id_user'] = $id;
                            $orientacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$aux->children()->getName()}['ANO']));
                            $orientacao['titulo'] = $aux->{$aux->children()->getName()}['TITULO-DO-TRABALHO'];
                            $orientacao['natureza'] = $aux->{$aux->children()->getName()}['NATUREZA'];
                            $orientacao['keywords'] = null;
                            if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                                foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                                    if ($values != '')
                                        $orientacao['keywords'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['setor'] = null;
                            if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                                foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                                    if ($values != '')
                                        $orientacao['setor'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['status'] = "EM ANDAMENTO";
                            $this->Curriculo_model->insert('fat_orientacao', $orientacao);
                            break;

                        case 'OUTRAS-ORIENTACOES-EM-ANDAMENTO':
                            $aux = $aux->{$tipo};
                            $orientacao['id_user'] = $id;
                            $orientacao['id_tempo'] = $this->Curriculo_model->insert('dim_tempo', array('ano_inicial' => $aux->{$aux->children()->getName()}['ANO']));
                            $orientacao['titulo'] = $aux->{$aux->children()->getName()}['TITULO-DO-TRABALHO'];
                            $orientacao['natureza'] = $aux->{$aux->children()->getName()}['NATUREZA'];
                            $orientacao['keywords'] = null;
                            if (isset($aux->{'PALAVRAS-CHAVE'}) && count($aux->{'PALAVRAS-CHAVE'}) > 0) {
                                foreach ($aux->{'PALAVRAS-CHAVE'}->attributes() as $attrib => $values) {
                                    if ($values != '')
                                        $orientacao['keywords'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['setor'] = null;
                            if (isset($aux->{'SETORES-DE-ATIVIDADE'}) && count($aux->{'SETORES-DE-ATIVIDADE'}) > 0) {
                                foreach ($aux->{'SETORES-DE-ATIVIDADE'}->attributes() as $attrib => $values) {

                                    if ($values != '')
                                        $orientacao['setor'].='[' . ($values) . ']';
                                }
                            }
                            $orientacao['status'] = "EM ANDAMENTO";
                            $this->Curriculo_model->insert('fat_orientacao', $orientacao);
                            break;
                        default :
                            //echo "<br>" . 'ORIENTAÇÃO: ' . $tipo;
                            break;
                    }
                    break;



                default :
                    //echo "<br>" . 'COMPLEMENTOS: ' . $title;
                    break;
            }
        }
    }

}
