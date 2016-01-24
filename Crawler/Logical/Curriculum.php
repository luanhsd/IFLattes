<?php

final class Curriculum {
	public $dataCadastro;
	public $idCurriculo;
	public $nome;
	public $url;
	public $content;


    /**
     * Gets the value of dataCadastro.
     *
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Sets the value of dataCadastro.
     *
     * @param mixed $dataCadastro the data cadastro
     *
     * @return self
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Gets the value of idCurriculo.
     *
     * @return mixed
     */
    public function getIdCurriculo()
    {
        return $this->idCurriculo;
    }

    /**
     * Sets the value of idCurriculo.
     *
     * @param mixed $idCurriculo the id curriculo
     *
     * @return self
     */
    public function setIdCurriculo($idCurriculo)
    {
        $this->idCurriculo = $idCurriculo;

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
     * Gets the value of url.
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the value of url.
     *
     * @param mixed $url the url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets the value of content.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the value of content.
     *
     * @param mixed $content the content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
?>
