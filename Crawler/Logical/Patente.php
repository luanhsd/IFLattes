<?php
final class Patente{
    private $idUser;
    private $idTempo;
    private $titulo;
    private $patente;
    private $numReg;
    private $dataDeposito;
    private $instituicao;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdTempo() {
        return $this->idTempo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getPatente() {
        return $this->patente;
    }

    public function getNumReg() {
        return $this->numReg;
    }

    public function getDataDeposito() {
        return $this->dataDeposito;
    }

    public function getInstituicao() {
        return $this->instituicao;
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

    public function setPatente($patente) {
        $this->patente = $patente;
    }

    public function setNumReg($numReg) {
        $this->numReg = $numReg;
    }

    public function setDataDeposito($dataDeposito) {
        $this->dataDeposito = $dataDeposito;
    }

    public function setInstituicao($instituicao) {
        $this->instituicao = $instituicao;
    }



}
