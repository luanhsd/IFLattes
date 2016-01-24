<?php

final class Banca {

    public $idUser;
    public $idTempo;
    public $tipo;
    public $banca;
    public $titulo;
    public $ano;
    public $sobre;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdTempo() {
        return $this->idTempo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getBanca() {
        return $this->banca;
    }

    public function getTitulo() {
        return $this->titulo;
    }

  
    public function getAno() {
        return $this->ano;
    }

    public function getSobre() {
        return $this->sobre;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setIdTempo($idTempo) {
        $this->idTempo = $idTempo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setBanca($banca) {
        $this->banca = $banca;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setSobre($sobre) {
        $this->sobre = $sobre;
    }


}
