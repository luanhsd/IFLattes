<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH.'/Logical/Lista.php';

final class ListaDAO {

    public $pdoConnection = NULL;

    public function ListaDAO() {

        require_once BASE_PATH.'/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    public function Verify($link) {

        $valida = FALSE;

        try {

            $stmt = $this->pdoConnection->query("SELECT * FROM `link` WHERE `id_link` = '" . $link . "' LIMIT 1");
            echo "SELECT * FROM `link` WHERE `id_link` = '" . $link . "' LIMIT 1";
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row != 0) {
                $valida = TRUE;
                return $valida;
            } else {
                return FALSE;
            }
            
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function VerifyUpdate($ID, $url) {

        $valida = FALSE;

        try {

            $stmt = $this->pdoConnection->query("SELECT * FROM `link` WHERE `id_link` <> '" . $ID . "' AND `url` = '" . $url . "' LIMIT 1");

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row != 0) {

                $valida = TRUE;
                return $valida;
            } else {

                return FALSE;
            }
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function ReturnLastID() {

        try {

            $stmt = $this->pdoConnection->query("SELECT id_link FROM `link` ORDER BY id_link DESC LIMIT 1")->fetch();
            echo "SELECT id_link FROM `link` ORDER BY id_link DESC LIMIT 1";
            return $stmt;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function ListDataPagination($Start, $Size, $Search) {

        try {

            $result = array();

            $stmt = $this->pdoConnection->query("SELECT * FROM `link` $Search ORDER BY id_link ASC LIMIT $Start,$Size");
            echo "SELECT * FROM `link` $Search ORDER BY id_link ASC LIMIT $Start,$Size";

            if ($stmt) {

                foreach ($stmt as $row) {

                    $Lista = new Lista();

                    $Lista->setId($row['id_link']);
                    $Lista->setUrl($row['url']);
                    $Lista->setUrl($row['data_cur']);

                    $result[$Lista->getID()] = $Lista;
                }
            }

            return $result;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function ListData() {

        try {

            $result = array();

            $stmt = $this->pdoConnection->query("SELECT * FROM `link` ORDER BY id_link ASC");

            if ($stmt) {

                foreach ($stmt as $row) {

                    $lista = new Lista();

                    $Lista->setId($row['id_link']);
                    $Lista->setUrl($row['url']);
                    $Lista->setUrl($row['data_cur']);

                    $result[$Lista->getId()] = $Lista;
                }
            }

            return $result;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function ListDataByID($ID) {

        try {

            $stmt = $this->pdoConnection->query("SELECT * FROM `link` WHERE id_link = " . (int) $ID)->fetch();

            return $stmt;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function CountList($Search) {

        try {

            $stmt = $this->pdoConnection->query("SELECT COUNT(*) as totalReg FROM `link` " . $Search . "")->fetch();

            return $stmt;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function InsertData(Lista $Lista) {

        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `link` "
                    . "(id_link, url, data_cur) "
                    . "VALUES (?,?,?);");

            //echo "INSERT INTO `link` "."(id_link, url, data_cur) "."VALUES (".$Lista->getId().",'".$Lista->getUrl()."',".$Lista->getData().");<br>";

            $stmt->bindValue(1, $Lista->getId());
            $stmt->bindValue(2, $Lista->getUrl());
            $stmt->bindValue(3, $Lista->getData());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function UpdateData(Lista $Lista) {

        try {
            $stmt = $this->pdoConnection->prepare("UPDATE `link` SET "
                    . " url= ?, data_cur = ?  WHERE id_link = ?");
            
            
            $stmt->bindValue(1, $Lista->getUrl());
            $stmt->bindValue(2, $Lista->getData());
            $stmt->bindValue(3, $Lista->getId());
            

            $stmt->execute();
            
            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function DeleteData($ID) {

        try {

            $stmt = $this->pdoConnection->prepare("DELETE from `link` WHERE id_link = " . $ID . "");

            $stmt->execute();
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    public function DataSetter(Lista $Lista, $id, $url, $data_cur) {

        $Lista->setId($id);
        $Lista->setUrl($url);
        $Lista->setData($data_cur);

        return $Lista;
    }

    public function StmtSetter(Lista $Lista, $stmt) {

        $Lista->setId($stmt['id_link']);
        $Lista->setUrl($stmt['url']);
        $Lista->setData($stmt['data_cur']);

        return $Lista;
    }

    public function ListGetFila() {
        

        try {
            $result = array();
            $stmt = $this->pdoConnection->query("SELECT *FROM link WHERE data_cur IS NULL ORDER BY id_link ASC");
            if ($stmt) {
                $i=0;
                foreach ($stmt as $row) {
                    $i++;
                    $Lista = new Lista();
                    $Lista->setUrl($row['url']);  
                    $result[$i] = $Lista;
                    //$result[$Lista->getId()] = $Lista;
                }
            }
            return $result;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

}
