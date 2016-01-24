<?php
final class Idioma{
	public $idUser;
	public $data_cadastro;
	public $idioma;
	public $le;
	public $fala;
	public $escreve;
	public $compreende;

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
     * Gets the value of data_cadastro.
     *
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * Sets the value of data_cadastro.
     *
     * @param mixed $data_cadastro the data cadastro
     *
     * @return self
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }

    /**
     * Gets the value of idioma.
     *
     * @return mixed
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Sets the value of idioma.
     *
     * @param mixed $idioma the idioma
     *
     * @return self
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Gets the value of le.
     *
     * @return mixed
     */
    public function getLe()
    {
        return $this->le;
    }

    /**
     * Sets the value of le.
     *
     * @param mixed $le the le
     *
     * @return self
     */
    public function setLe($le)
    {
        $this->le = $le;

        return $this;
    }

    /**
     * Gets the value of fala.
     *
     * @return mixed
     */
    public function getFala()
    {
        return $this->fala;
    }

    /**
     * Sets the value of fala.
     *
     * @param mixed $fala the fala
     *
     * @return self
     */
    public function setFala($fala)
    {
        $this->fala = $fala;

        return $this;
    }

    /**
     * Gets the value of escreve.
     *
     * @return mixed
     */
    public function getEscreve()
    {
        return $this->escreve;
    }

    /**
     * Sets the value of escreve.
     *
     * @param mixed $escreve the escreve
     *
     * @return self
     */
    public function setEscreve($escreve)
    {
        $this->escreve = $escreve;

        return $this;
    }

    /**
     * Gets the value of compreende.
     *
     * @return mixed
     */
    public function getCompreende()
    {
        return $this->compreende;
    }

    /**
     * Sets the value of compreende.
     *
     * @param mixed $compreende the compreende
     *
     * @return self
     */
    public function setCompreende($compreende)
    {
        $this->compreende = $compreende;

        return $this;
    }
}
?>