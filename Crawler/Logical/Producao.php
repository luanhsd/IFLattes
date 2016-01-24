<?php

final class Producao {

    public $idUser;
    public $idTempo;
    public $idProducao;
    public $titulo;
    public $volume;
    public $pagina;
    public $keywords;
    public $url;
    public $tipo;
    public $serie;
    public $issn_isbn;
    public $divisao;
    public $area;

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

    /**
     * Gets the value of idProducao.
     *
     * @return mixed
     */
    public function getIdProducao() {
        return $this->idProducao;
    }

    /**
     * Sets the value of idProducao.
     *
     * @param mixed $idProducao the id producao
     *
     * @return self
     */
    public function setIdProducao($idProducao) {
        $this->idProducao = $idProducao;

        return $this;
    }

    /**
     * Gets the value of titulo.
     *
     * @return mixed
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Sets the value of titulo.
     *
     * @param mixed $titulo the titulo
     *
     * @return self
     */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Gets the value of volume.
     *
     * @return mixed
     */
    public function getVolume() {
        return $this->volume;
    }

    /**
     * Sets the value of volume.
     *
     * @param mixed $volume the volume
     *
     * @return self
     */
    public function setVolume($volume) {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Gets the value of pagina.
     *
     * @return mixed
     */
    public function getPagina() {
        return $this->pagina;
    }

    /**
     * Sets the value of pagina.
     *
     * @param mixed $pagina the pagina
     *
     * @return self
     */
    public function setPagina($pagina) {
        $this->pagina = $pagina;

        return $this;
    }

    /**
     * Gets the value of keywords.
     *
     * @return mixed
     */
    public function getKeywords() {
        return $this->keywords;
    }

    /**
     * Sets the value of keywords.
     *
     * @param mixed $keywords the keywords
     *
     * @return self
     */
    public function setKeywords($keywords) {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Gets the value of url.
     *
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Sets the value of url.
     *
     * @param mixed $url the url
     *
     * @return self
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets the value of tipo.
     *
     * @return mixed
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * Sets the value of tipo.
     *
     * @param mixed $tipo the tipo
     *
     * @return self
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Gets the value of serie.
     *
     * @return mixed
     */
    public function getSerie() {
        return $this->serie;
    }

    /**
     * Sets the value of serie.
     *
     * @param mixed $serie the serie
     *
     * @return self
     */
    public function setSerie($serie) {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Gets the value of issn_isbn.
     *
     * @return mixed
     */
    public function getIssnIsbn() {
        return $this->issn_isbn;
    }

    /**
     * Sets the value of issn_isbn.
     *
     * @param mixed $issn_isbn the issn isbn
     *
     * @return self
     */
    public function setIssnIsbn($issn_isbn) {
        $this->issn_isbn = $issn_isbn;

        return $this;
    }

    /**
     * Gets the value of divisao.
     *
     * @return mixed
     */
    public function getDivisao() {
        return $this->divisao;
    }

    /**
     * Sets the value of divisao.
     *
     * @param mixed $divisao the divisao
     *
     * @return self
     */
    public function setDivisao($divisao) {
        $this->divisao = $divisao;

        return $this;
    }

    public function getArea() {
        return $this->area;
    }

    public function setArea($area) {
        $this->area = $area;
    }

}

?>