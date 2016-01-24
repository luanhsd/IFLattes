<?php

final class Evento {

    public $idUser;
    public $idTempo;
    public $nome;
    public $descricao;
    public $tipo;
    /**
     * Gets the value of idUser.
     *
     * @return mixed
     */
    public function getIdUser() {
        return $this->idUser;
    }

    /**
     * Sets the value of idUser.
     *
     * @param mixed $idUser the id user
     *
     * @return self
     */
    public function setIdUser($idUser) {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Gets the value of idTempo.
     *
     * @return mixed
     */
    public function getIdTempo() {
        return $this->idTempo;
    }

    /**
     * Sets the value of idTempo.
     *
     * @param mixed $idTempo the id tempo
     *
     * @return self
     */
    public function setIdTempo($idTempo) {
        $this->idTempo = $idTempo;

        return $this;
    }

    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome=$nome;
        return $this;
    }
    
    /**
     * Gets the value of descricao.
     *
     * @return mixed
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Sets the value of descricao.
     *
     * @param mixed $descricao the descricao
     *
     * @return self
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Gets the value of adicionais.
     *
     * @return mixed
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * Sets the value of adicionais.
     *
     * @param mixed $adicionais the adicionais
     *
     * @return self
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Gets the value of tipo.
     *
     * @return mixed
     */
}
