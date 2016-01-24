<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/Logical/Endereco.php';
require_once BASE_PATH . '/php/simple_html_dom.php';

final class EnderecoDAO {

    protected $pdoConnection = NULL;

    // Construtor da classe
    public function EnderecoDAO() {

        require_once BASE_PATH . '/data_base/DBConnection.php';

        $this->pdoConnection = new DBConnection();
    }

    // Destrutor da classe
    public function __destruct() {

        $this->pdoConnection = NULL;
    }

    // Insere os dados vindos da classe lógica no banco de dados 
    public function InsertData(Endereco $Endereco) {
        try {
            $stmt = $this->pdoConnection->prepare("INSERT INTO `ref_endereco` "
                    . "(id_endereco, id_user, local, cep,estado, cidade, bairro, rua, num, latitude, longitude) "
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->bindValue(1, $Endereco->getIdEndereco());
            $stmt->bindValue(2, $Endereco->getIdUser());
            $stmt->bindValue(3, $Endereco->getLocal());
            $stmt->bindValue(4, $Endereco->getCep());
            $stmt->bindValue(5, $Endereco->getEstado());
            $stmt->bindValue(6, $Endereco->getCidade());
            $stmt->bindValue(7, $Endereco->getBairro());
            $stmt->bindValue(8, $Endereco->getRua());
            $stmt->bindValue(9, $Endereco->getNum());
            $stmt->bindValue(10, $Endereco->getLatitude());
            $stmt->bindValue(11, $Endereco->getLongitude());

            $stmt->execute();

            return true;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Edita os dados vindos da classe lógica no banco de dados
    public function UpdateData(Endereco $Endereco) {

        try {
            $stmt = $this->pdoConnection->prepare("UPDATE `ref_endereco` SET "
                    . " id_user=?,local=?,cep = ?,estado = ?, cidade = ?, bairro = ?, rua = ?, num = ?, latitude=?, longitude=? WHERE id_endereco = ?");

            $stmt->bindValue(1, $Endereco->getIdUser());
            $stmt->bindValue(2, $Endereco->getLocal());
            $stmt->bindValue(3, $Endereco->getCep());
            $stmt->bindValue(4, $Endereco->getEstado());
            $stmt->bindValue(5, $Endereco->getCidade());
            $stmt->bindValue(6, $Endereco->getBairro());
            $stmt->bindValue(7, $Endereco->getRua());
            $stmt->bindValue(8, $Endereco->getNum());
            $stmt->bindValue(9, $Endereco->getLatitude());
            $stmt->bindValue(10, $Endereco->getLongitude());
            $stmt->bindValue(11, $Endereco->getIdEndereco());

            $stmt->execute();

            return TRUE;
        } catch (PDOException $ex) {

            echo "Erro: " . $ex->getMessage();
        }
    }

    // Seta os dados vindos do formulário na classe lógica
    public function DataSetter(Endereco $Endereco, $idEndereco, $idUser, $local, $cep, $estado, $cidade, $bairro, $rua, $num, $latitude, $longitude) {

        $Endereco->setIdEndereco($idEndereco);
        $Endereco->setIdUser($idUser);
        $Endereco->setLocal($local);
        $Endereco->setCep($cep);
        $Endereco->setEstado($estado);
        $Endereco->setCidade($cidade);
        $Endereco->setBairro($bairro);
        $Endereco->setRua($rua);
        $Endereco->setNum($num);
        $Endereco->setLatitude($latitude);
        $Endereco->setLongitude($longitude);

        return $Endereco;
    }

    public function MiningEndereco($id, $content) {
        $code = new simple_html_dom($content);
        $string = $code->find('div[class=layout-cell-pad-5]');
        $values = explode('<br class="clear">', $string[1]);
        $local = newstring($values[0]);
        $rua = newstring(explode(',', $values[1])[0]);
        $num = (int) newstring(explode(',', $values[1])[1]);
        $bairro = newstring($values[2]);
        $aux = explode('-', $values[3]);
        if (substr_count($values[3], '-') == 3) {
            $cep = newstring(implode('-', array($aux[0], $aux[1])));
            $cidade = newstring(explode(',', $aux[2])[0]);
            $estado = newstring(explode(',', $aux[2])[1]);
        } else {
            $cep = newstring(substr($aux[0], 0, 5) . '-' . substr($aux[0], 5, 3));
            $cidade = newstring(explode(',', $aux[1])[0]);
            $estado = newstring(explode(',', $aux[1])[1]);
        }
        $string = str_replace(" ", "+", $cidade . ',' . $estado);
        $address = utf8_encode($string);
        $geo = $this->GetGeoCode($address);
        $Endereco = new Endereco();
        $this->DataSetter($Endereco, $idEndereco, $id, $local, $cep, $estado, $cidade, $bairro, $rua, $num, $geo['lat'], $geo['long']);
        $this->InsertData($Endereco);
    }

    function GetGeoCode($address) {
        $geo = array();

        $geocode = file_get_html('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
        $output = json_decode($geocode);
        echo 'http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false';
        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;

        $geo['lat'] = $lat;
        $geo['long'] = $long;

        return $geo;
    }

}
