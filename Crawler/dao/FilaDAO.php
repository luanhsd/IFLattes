<?php 

require_once realpath(dirname(__FILE__).'/../assets/includes/config.php');
require_once BASE_PATH.'/Logical/Fila.php';

final class FilaDAO{

    protected $pdoConnection = NULL;
    
    // Construtor da classe
    public function FilaDAO() {

        require_once BASE_PATH.'/data_base/DBConnection.php';
        
        $this->pdoConnection = new DBConnection();
    }
    
    // Destrutor da classe
    public function __destruct() {
        
        $this->pdoConnection = NULL;
    }
    
    // Retorna o último registro da tabela
    public function ReturnLastURL(){

        try {

            $stmt = $this->pdoConnection->query("SELECT url FROM `fila_process` ORDER BY url DESC LIMIT 1")->fetch();

           return $stmt;
             
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
    
        public function ReturnFirstURL(){

        try {

            $stmt = $this->pdoConnection->query("SELECT url FROM `fila_process` ORDER BY url LIMIT 1")->fetch();

           return $stmt;
             
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    
    // Lista todos os registros da tabela do banco de dados
    public function ListData(){
        try {
            
            $result = array();
            
            $stmt = $this->pdoConnection->query("SELECT * FROM `fila_process` ORDER BY url ASC LIMIT 1");

            if ($stmt) {
                
                foreach ($stmt as $row) {
                    
                    $Fila = new Fila();
                    $Fila->setUrl($row['url']);
                    $Fila->setLog($row['log']);
                    
                    $result[$Fila->getUrl()] = $Fila;

                }
            }

            return $result;
            
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }

    }
    
    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Fila $Fila) {
        
        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `fila_process` "
            . "(url) "
            . "VALUES (?)");

            $stmt->bindValue(1, $Fila->getUrl());
            
            $stmt->execute();
            
            return TRUE;
            
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    // Edita os dados vindos da classe lógica no banco de dados (TERMINAR)
    public function UpdateData(Fila $Fila) {
        
        try {
            $stmt = $this->pdoConnection->prepare("UPDATE `fila_process` SET "
            . "log= ? WHERE url = ?");

            $stmt->bindValue(1, $Fila->getLog());
            $stmt->bindValue(2, $Fila->getUrl());

            $stmt->execute();
            
            return TRUE;
            
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    // Deleta (Muda o status) o registro de acordo com a variável passada.
    public function DeleteData($url) {
        
        try {

            $stmt = $this->pdoConnection->prepare("DELETE FROM `fila_process` WHERE url = '".$url."'");

            //$stmt->bindValue(1, 0);

            $stmt->execute();
            
            return TRUE;
            
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Fila $Fila, $url, $log) {

        $Fila->setUrl($url);
        $Fila->setLog($log);
        
        return $Fila;
    }
    
    // Seta os dados vindos do banco de dados, na classe lógica
    public function StmtSetter(Fila $Fila, $stmt) {

        $Fila->setUrl($stmt['url']);
        $Fila->setLog($stmt['log']);
        
        return $Fila;
    }
    
    public function tableNull(){
     
        try {
            $stmt = $this->pdoConnection->query("SELECT * FROM `fila_process`")->fetch();
            
            $response = (!empty($stmt))? false : true;
            
            return $response;
            
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }

    }
    
    public function listLog(){
         try {

            $stmt = $this->pdoConnection->query("SELECT *FROM `fila_process` WHERE log IS NOT NULL ORDER BY url")->fetch();

           return $stmt;
             
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    public function listLogByURL($url){
         try {

            $stmt = $this->pdoConnection->query("SELECT log FROM `fila_process` WHERE url ='".$url."'")->fetch();

           return $stmt;
             
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
}
