<?php

final class Inovacao {
    
    public $idUser;
    public $idTempo;
    public $titulo;
    public $ano;
    public $local;
    public $patente;
    public $numero;
    public $data_deposito;
    public $instituicao_registro;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdTempo() {
        return $this->idTempo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getPatente() {
        return $this->patente;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getData_deposito() {
        return $this->data_deposito;
    }

    public function getInstituicao_registro() {
        return $this->instituicao_registro;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setIdTempo($idTempo) {
        $this->idTempo = $idTempo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function setPatente($patente) {
        $this->patente = $patente;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setData_deposito($data_deposito) {
        $this->data_deposito = $data_deposito;
    }

    public function setInstituicao_registro($instituicao_registro) {
        $this->instituicao_registro = $instituicao_registro;
    }


}
