<?php
final class EducacaoPopularizacao {
    public $idUser;
    public $idTempo;
    public $participantes;
    public $descricao;
    public $tipo;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdTempo() {
        return $this->idTempo;
    }

    public function getParticipantes() {
        return $this->participantes;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setIdTempo($idTempo) {
        $this->idTempo = $idTempo;
    }

    public function setParticipantes($participantes) {
        $this->participantes = $participantes;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }


}
