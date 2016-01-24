<?php 

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH.'/Logical/Tempo.php';

final class TempoDAO{

    protected $pdoConnection = NULL;
    
    // Construtor da classe
    public function TempoDAO() {
        
        require_once BASE_PATH.'/data_base/DBConnection.php';
        
        $this->pdoConnection = new DBConnection();
    }
    
    // Destrutor da classe
    public function __destruct() {
        
        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Tempo $Tempo) {
        try {
           
            $stmt = $this->pdoConnection->prepare("INSERT INTO `dim_tempo` "
            . "(ano_inicial, mes_inicial, ano_final, mes_final) "
            . "VALUES (?, ?, ?, ?)");
         
            $stmt->bindValue(1, $Tempo->getAnoInicial());
            $stmt->bindValue(2, $Tempo->getMesInicial());
            $stmt->bindValue(3, $Tempo->getAnoFinal());
            $stmt->bindValue(4, $Tempo->getMesFinal());
            
            
            $stmt->execute();
            
            return $this->ReturnLastID();
            //return TRUE;
            
        } catch (PDOException $ex) {
            
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Tempo $Tempo,$anoInic,$mesInic,$anoFinal,$mesFinal) {
      
        $Tempo->setAnoInicial($anoInic);
        $Tempo->setMesInicial($mesInic);
        $Tempo->setAnoFinal($anoFinal);
        $Tempo->setMesFinal($mesFinal);

        return $Tempo;
    }
}