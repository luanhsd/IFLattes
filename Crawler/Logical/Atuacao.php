<?php
final class Atuacao{
	public $idUser;
	public $idTempo;
	public $instituicao;
	public $tipoVinculo;
	public $vinculoEmpregaticio;
	public $enqFuncional;
	public $cargaHoraria;

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
     * Gets the value of instituicao.
     *
     * @return mixed
     */
    public function getInstituicao()
    {
        return $this->instituicao;
    }

    /**
     * Sets the value of instituicao.
     *
     * @param mixed $instituicao the instituicao
     *
     * @return self
     */
    public function setInstituicao($instituicao)
    {
        $this->instituicao = $instituicao;

        return $this;
    }

    /**
     * Gets the value of tipoVinculo.
     *
     * @return mixed
     */
    public function getTipoVinculo()
    {
        return $this->tipoVinculo;
    }

    /**
     * Sets the value of tipoVinculo.
     *
     * @param mixed $tipoVinculo the tipo vinculo
     *
     * @return self
     */
    public function setTipoVinculo($tipoVinculo)
    {
        $this->tipoVinculo = $tipoVinculo;

        return $this;
    }

    /**
     * Gets the value of vinculoEmpregaticio.
     *
     * @return mixed
     */
    public function getVinculoEmpregaticio()
    {
        return $this->vinculoEmpregaticio;
    }

    /**
     * Sets the value of vinculoEmpregaticio.
     *
     * @param mixed $vinculoEmpregaticio the vinculo empregaticio
     *
     * @return self
     */
    public function setVinculoEmpregaticio($vinculoEmpregaticio)
    {
        $this->vinculoEmpregaticio = $vinculoEmpregaticio;

        return $this;
    }

    /**
     * Gets the value of enqFuncional.
     *
     * @return mixed
     */
    public function getEnqFuncional()
    {
        return $this->enqFuncional;
    }

    /**
     * Sets the value of enqFuncional.
     *
     * @param mixed $enqFuncional the enq funcional
     *
     * @return self
     */
    public function setEnqFuncional($enqFuncional)
    {
        $this->enqFuncional = $enqFuncional;

        return $this;
    }

    /**
     * Gets the value of cargaHoraria.
     *
     * @return mixed
     */
    public function getCargaHoraria()
    {
        return $this->cargaHoraria;
    }

    /**
     * Sets the value of cargaHoraria.
     *
     * @param mixed $cargaHoraria the carga horaria
     *
     * @return self
     */
    public function setCargaHoraria($cargaHoraria)
    {
        $this->cargaHoraria = $cargaHoraria;

        return $this;
    }
}
?>