<?php
final class Orientacao{
	public $idUser;
	public $idTempo;
	public $orientado;
	public $descricao;
	public $tipo;
	public $local;
	public $orientador;

    /**
     * Gets the value of idUser.
     *
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Sets the value of idUser.
     *
     * @param mixed $idUser the id user
     *
     * @return self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Gets the value of idTempo.
     *
     * @return mixed
     */
    public function getIdTempo()
    {
        return $this->idTempo;
    }

    /**
     * Sets the value of idTempo.
     *
     * @param mixed $idTempo the id tempo
     *
     * @return self
     */
    public function setIdTempo($idTempo)
    {
        $this->idTempo = $idTempo;

        return $this;
    }

    /**
     * Gets the value of orientado.
     *
     * @return mixed
     */
    public function getOrientado()
    {
        return $this->orientado;
    }

    /**
     * Sets the value of orientado.
     *
     * @param mixed $orientado the orientado
     *
     * @return self
     */
    public function setOrientado($orientado)
    {
        $this->orientado = $orientado;

        return $this;
    }

    /**
     * Gets the value of descricao.
     *
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Sets the value of descricao.
     *
     * @param mixed $descricao the descricao
     *
     * @return self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Gets the value of tipo.
     *
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Sets the value of tipo.
     *
     * @param mixed $tipo the tipo
     *
     * @return self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Gets the value of local.
     *
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Sets the value of local.
     *
     * @param mixed $local the local
     *
     * @return self
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Gets the value of keywords.
     *
     * @return mixed
     */
    public function getOrientador()
    {
        return $this->orientador;
    }

    /**
     * Sets the value of keywords.
     *
     * @param mixed $keywords the keywords
     *
     * @return self
     */
    public function setOrientador($orientador)
    {
        $this->orientador = $orientador;

        return $this;
    }

}