<?php 

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH.'/Logical/DataCadastro.php';

final class DataCadastroDAO{

    protected $pdoConnection = NULL;
    
    // Construtor da classe
    public function DataCadastroDAO() {
        
        require_once BASE_PATH.'/data_base/DBConnection.php';
        
        $this->pdoConnection = new DBConnection();
    }
    
    // Destrutor da classe
    public function __destruct() {
        
        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(DataCadastro $DataCadastro) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `dim_cadastro` "
            . "(id_dataCadastro,data_cadastro) "
            . "VALUES (?,?)");
            
            $stmt->bindValue(1, $DataCadastro->getIdData());
            $stmt->bindValue(2, $DataCadastro->getDate());

            $stmt->execute();
            
            return $this->ReturnLastID();
            
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(DataCadastro $DataCadastro, $IdData, $data) {

        $DataCadastro->setIdData($IdData);
        $DataCadastro->setDate($data);

        return $DataCadastro;
    }
    
    public function GetDataCur($html) {
        
        $informacoes = $html->find('ul[class=informacoes-autor]');
        $data_cur=null;
        foreach ($informacoes as $inf) {

            $divInf = $inf->find('li');
            $searchDate = explode("em", $divInf[1]);
            $splitDate = explode("/", $searchDate[1]);
            $ano = explode("<", $splitDate[2])[0];
            $mes = $splitDate[1];
            $dia = $splitDate[0];
            $data_cur = trim($ano) . "-" . trim($mes) . "-" . trim($dia);
        }

        return $data_cur;
    }
    
}