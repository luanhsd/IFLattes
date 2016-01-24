<?php

require_once BASE_PATH . '/assets/includes/error.php';
require_once BASE_PATH . '/assets/includes/functions.php';

function __autoload($class_name) {
    require_once BASE_PATH . '/dao/' . $class_name . '.php';
}

final class Bot {

    private $url = array();

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getHTML($url) {


        $url = trim($url);
        $html = file_get_html($url);


        return $html;
    }

    public function getContent($Bot) {

        foreach ($Bot as $b) {
            $html = $this->getHTML($b);
            $splitLattes = explode("/", $b);
            $idLattes = rand(); //trim($splitLattes[3]);
            $informacoes = $html->find('div[class=title-wrapper]');
            $dataDAO = new DataCadastroDAO();
            $dataCur = $dataDAO->GetDataCur($html);

            foreach ($informacoes as $inf) {
                $title = $inf->find('h1');
                $content = $inf->find('div[class=layout-cell layout-cell-12 data-cell]');
                $this->miningContent($idLattes, $title[0]->plaintext, $content[0]->outertext, $dataCur);
            }

            //$pessoaDAO = new PessoaDAO();
            //$pessoa = $pessoaDAO->ListDataByID($idLattes);
            //$tempo = new DataCadastro();
            //$dataDAO->DataSetter($tempo, null, $dataCur);
            //$id_tempo = $dataDAO->InsertData($tempo)[0];
            //$curriculumDAO = new CurriculumDAO();
            //$cur = new Curriculum();
            //$curriculumDAO->DataSetter($cur, $id_tempo, $idLattes, $pessoa['nm_user'], $b, $html);
            //$curriculumDAO->InsertData($cur);
            //$listaDAO = new ListaDAO();
            //$lista = new Lista();
            //$listaDAO->DataSetter($lista, $idLattes, $b, $dataCur);
            //$listaDAO->UpdateData($lista);
            //$Fila = new FilaDAO();
            //$Fila->DeleteData($b);  
        }
    }

    public function miningContent($idLattes, $title, $content, $dataCur) {
        $titleFormat = remover_acento(html_entity_decode($title));

        switch ($titleFormat) {

            case "Identificacao":
                // NOVO METODO
                echo $content;
                $PessoaDAO = new PessoaDAO();
                //$PessoaDAO->MiningPessoa($idLattes, $content);
                break;

            case "Endereco":
                // NOVO METODO
                $EnderecoDAO = new EnderecoDAO();
                //$EnderecoDAO->MiningEndereco($idLattes, $content);
                break;

            case "Formacao_academica/titulacao":
                //NOVO METODO
                $FormacaoDAO = new FormacaoDAO();
                //$FormacaoDAO->MiningFormacao($idLattes, $content, "academico");
                break;

            case "Pos-doutorado":
                //NOVO METODO
                $FormacaoDAO = new FormacaoDAO();
                //$FormacaoDAO->MiningFormacao($idLattes, $content, "Pos-doutorado");
                break;

            case "Formacao_Complementar":
                //NOVO METODO
                $FormacaoDAO = new FormacaoDAO();
                //$FormacaoDAO->MiningFormacao($idLattes, $content, "Complementar");
                break;

            case "Atuacao_Profissional":
                // FALTA REALIZAR
                $AtuacaoDAO = new AtuacaoDAO();
                $AtuacaoDAO->MiningAtuacao($idLattes,$content);
                //echo "Atuacao_Profissional<br>";
                break;

            case "Linhas_de_pesquisa":
                //NOVO METODO
                $PesquisaDAO = new PesquisaDAO();
                //$PesquisaDAO->MiningPesquisa($idLattes, $content,$dataCur);
                break;

            case "Projetos_de_pesquisa":
                //NOVO METODO
                $ProjetoDAO = new ProjetoDAO();
                //$ProjetoDAO->MiningProjeto($idLattes, $content, 'Pesquisa');
                break;

            case "Projetos_de_extensao":
                //NOVO METODO
                $ProjetoDAO = new ProjetoDAO();
                //$ProjetoDAO->MiningProjeto($idLattes, $content, 'Extensao');
                break;

            case "Projetos_de_desenvolvimento":
                //NOVO METODO
                $ProjetoDAO = new ProjetoDAO();
                //$ProjetoDAO->MiningProjeto($idLattes, $content, 'Desenvolvimento');
                break;

            case "Outros_Projetos":
                //NOVO METODO
                $ProjetoDAO = new ProjetoDAO();
                //$ProjetoDAO->MiningProjeto($idLattes, $content, 'Outros');
                break;

            case "Membro_de_corpo_editorial":
                //NOVO METODO
                $CorpoEditorialDAO = new CorpoEditorialDAO();
                //$CorpoEditorialDAO->MiningCorpoEditorial($idLattes, $content);
                break;

            case "Revisor_de_periodico":
                //NOVO METODO
                $RevisorDAO = new RevisorDAO();
                //$RevisorDAO->MiningRevisor($idLattes, $content,"Periodico");
                break;

            case "Revisor_de_projeto_de_fomento":
                //NOVO METODO
                $RevisorDAO = new RevisorDAO();
                //$RevisorDAO->MiningRevisor($idLattes, $content,"Projeto de Fomento");
                break;

            case "Areas_de_atuacao":
                break;

            case "Idiomas":
                //NOVO METODO
                $IdiomaDAO = new IdiomaDAO();
                //$IdiomaDAO->MiningIdioma($idLattes, $content,$dataCur);
                break;

            case "Premios_e_titulos":
                //NOVO METODO
                $PremioDAO = new PremioDAO();
                //$PremioDAO->MiningPremio($idLattes, $content);
                break;

            case "Producoes":
                $ProducaoDAO = new ProducaoDAO();
                //$ProducaoDAO->MiningProducao($idLattes, $content);
                break;

            case "Patentes_e_registros":
                //NOVO METODO
                $PatenteDAO = new PatenteDAO();
                //$PatenteDAO->MiningPatente($idLattes, $content);
                break;

            case "Bancas":
                $BancaDAO = new BancaDAO();
                //$BancaDAO->MiningBanca($idLattes, $content);
                break;

            case "Eventos":
                //NOVO METODO
                $EventoDAO = new EventoDAO();
                //$EventoDAO->MiningEvento($idLattes, $content);
                break;

            case "Orientacoes":
                $OrientacaoDAO = new OrientacaoDAO();
                //$OrientacaoDAO->MiningOrientacao($idLattes, $content);
                break;

            case "Inovacao":
                break;

            case "Educacao_e_Popularizacao_de_C_E_T":
                //NOVO METODO
                $EducacaoPopularizacaoDAO = new EducacaoPopularizacaoDAO();
                //$EducacaoPopularizacaoDAO->MiningEducacao($idLattes, $content);
                break;

            case "Outras_informacoes_relevantes":
                // NOVO METODO
                $informacaoDAO = new InformacaoDAO();
                //$informacaoDAO->MiningInformacao($idLattes, $content);
                break;

            default :
                echo $titleFormat . "<br>";
                echo '<pre>' . print_r($content, TRUE) . '</pre>';
                break;
        }
        //echo '<pre>' . print_r($content, TRUE) . '</pre>';*/
    }

}
