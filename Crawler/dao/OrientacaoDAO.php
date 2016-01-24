<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Orientacao.php';

final class OrientacaoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function OrientacaoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {
        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Orientacao $Orientacao) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fat_orientacao` "
                    . "(id_user, id_tempo, orientado, descricao, tipo, local, orientador) "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?)");

            $stmt->bindValue(1, $Orientacao->getIdUser());
            $stmt->bindValue(2, $Orientacao->getIdTempo());
            $stmt->bindValue(3, $Orientacao->getOrientado());
            $stmt->bindValue(4, $Orientacao->getDescricao());
            $stmt->bindValue(5, $Orientacao->getTipo());
            $stmt->bindValue(6, $Orientacao->getLocal());
            $stmt->bindValue(7, $Orientacao->getOrientador());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Orientacao $Orientacao, $IdUser, $idTempo, $orientado, $descricao, $tipo, $local, $orientador) {

        $Orientacao->setIdUser($IdUser);
        $Orientacao->setIdTempo($idTempo);
        $Orientacao->setOrientado($orientado);
        $Orientacao->setDescricao($descricao);
        $Orientacao->setTipo($tipo);
        $Orientacao->setLocal($local);
        $Orientacao->setOrientador($orientador);

        return $Orientacao;
    }

    public function MiningOrientacao($id, $content) {
        $code = new simple_html_dom($content); // transforma a div em um objeto.
        $values = $code->find('div[class=layout-cell layout-cell-11]');

        foreach ($values as $v) {
            $dados = explode('.', newstring($v));
            //var_dump($dados);
            $size = sizeof($dados);
            if ($size == 5) {
                $orientado = newstring($dados[0]);
                $desc = newstring($dados[1]);
                $ano = newstring(explode(':', $dados[2])[1]);
                $tipo = explode('-', $dados[3])[0];
                $local = newstring(explode('-', $dados[3])[1]);
                $orientador = newstring($dados[4]);
            } elseif ($size == 6) {
                $orientado = newstring($dados[0]);
                $desc = newstring($dados[1]);
                $ano = newstring($dados[2]);
                $aux = $dados[3] . '' . $dados[4];
                $tipo = explode('-', $aux)[0];
                $local = newstring(explode('-', $aux)[1]);
                $orientador = newstring(explode(':', $dados[5])[1]);
            } else {
                
                $orientado = newstring($dados[0]);
                $desc = newstring($dados[1]);
                $ano = newstring($dados[$size-4]);
                $aux = $dados[$size-3] . '' . $dados[$size-2];
                $tipo = explode('-', $aux)[0];
                $local = newstring(explode('-', $aux)[1]);
                $orientador = newstring(explode(':', $dados[$size-1])[1]);
                //echo '<br><br>Orientado: ' . $orientado;
                //echo '<br>Desc: ' . $desc;
                //echo '<br>Ano: ' . $ano;
                //echo '<br>Tipo: ' . $tipo;
                //echo '<br>Local: ' . $local;
                //echo '<br>Orientador: ' . $orientador;
            }
        }  
    }

}
