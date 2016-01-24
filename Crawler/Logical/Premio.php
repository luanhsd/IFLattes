<?php
final class Premio{
	public $idUser;
	public $idTempo;
	public $nome;
	public $entidade;

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
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of entidade.
     *
     * @return mixed
     */
    public function getEntidade()
    {
        return $this->entidade;
    }

    /**
     * Sets the value of entidade.
     *
     * @param mixed $entidade the entidade
     *
     * @return self
     */
    public function setEntidade($entidade)
    {
        $this->entidade = $entidade;

        return $this;
    }
}
?>