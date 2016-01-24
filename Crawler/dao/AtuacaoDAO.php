<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Atuacao.php';

final class AtuacaoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function AtuacaoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Atuacao $Atuacao) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_atuacao` "
                    . "(id_user,id_tempo,instituicao,tipo_vinculo,viculo_empregaticio,enq_funcional,carga_horaria) "
                    . "VALUES (?,?,?,?,?,?,?)");

            $stmt->bindValue(1, $Atuacao->getIdUser());
            $stmt->bindValue(2, $Atuacao->getIdTempo());
            $stmt->bindValue(3, $Atuacao->getInstituicao());
            $stmt->bindValue(4, $Atuacao->getTipoVinculo());
            $stmt->bindValue(5, $Atuacao->getVinculoEmpregaticio());
            $stmt->bindValue(6, $Atuacao->getEnqFuncional());
            $stmt->bindValue(7, $Atuacao->getCargaHoraria());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Atuacao $Atuacao, $IdUser, $IdTempo, $Instituicao, $TipoVinculo, $VinculoEmpreg, $EnqFuncional, $CargaHoraria) {

        $Atuacao->setIdUser($IdUser);
        $Atuacao->setIdTempo($IdTempo);
        $Atuacao->setInstituicao($Instituicao);
        $Atuacao->setTipoVinculo($TipoVinculo);
        $Atuacao->setVinculoEmpregaticio($VinculoEmpreg);
        $Atuacao->setEnqFuncional($EnqFuncional);
        $Atuacao->setCargaHoraria($CargaHoraria);

        return $Atuacao;
    }

    public function MiningAtuacao($id, $content) {
        $code = new simple_html_dom($content);
        $teste[0]= $code->find('div[class=inst_back]',0)->plaintext;
        $teste[1]= $code->find('div[class=layout-cell layout-cell-3 text-align-right]',1)->plaintext;
        $teste[2]= $code->find('div[class=layout-cell layout-cell-9]',1)->plaintext;
        print_r($teste);
        //echo sizeof($teste);
    }

}
