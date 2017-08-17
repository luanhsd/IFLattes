<?php

class DBConnection extends PDO {

    private $dsn = "mysql:host=localhost;dbname=lattes;charset=utf8";
    private $user = "root";
    private $password = "";
    public $handle = null;

    function __construct() {
        try {
            if ($this->handle == null) {
                
                $this->handle = parent::__construct($this->dsn, $this->user, $this->password);
                
                return $this->handle;
            }
            
        } catch (PDOException $e) {
            
            echo "Conexão falhou. Erro: " . $e->getMessage();
            
            return false;
        }
    }

    function __destruct() {
        $this->handle = NULL;
    }
}