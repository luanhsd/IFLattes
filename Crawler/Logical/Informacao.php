<?php

final class Informacao {

    public $idUser;
    public $idInformacao;
    public $informacao;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdInformacao() {
        return $this->idInformacao;
    }

    public function getInformacao() {
        return $this->informacao;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setIdInformacao($idInformacao) {
        $this->idInformacao = $idInformacao;
    }

    public function setInformacao($informacao) {
        $this->informacao = $informacao;
    }


}
