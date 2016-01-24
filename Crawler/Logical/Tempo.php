<?php

final class Tempo{
	public $idTempo;
	public $anoInicial;
	public $mesInicial;
	public $anoFinal;
	public $mesFinal;

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
     * Gets the value of anoInicial.
     *
     * @return mixed
     */
    public function getAnoInicial()
    {
        return $this->anoInicial;
    }

    /**
     * Sets the value of anoInicial.
     *
     * @param mixed $anoInicial the ano inicial
     *
     * @return self
     */
    public function setAnoInicial($anoInicial)
    {
        $this->anoInicial = $anoInicial;

        return $this;
    }

    /**
     * Gets the value of mesInicial.
     *
     * @return mixed
     */
    public function getMesInicial()
    {
        return $this->mesInicial;
    }

    /**
     * Sets the value of mesInicial.
     *
     * @param mixed $mesInicial the mes inicial
     *
     * @return self
     */
    public function setMesInicial($mesInicial)
    {
        $this->mesInicial = $mesInicial;

        return $this;
    }

    /**
     * Gets the value of anoFinal.
     *
     * @return mixed
     */
    public function getAnoFinal()
    {
        return $this->anoFinal;
    }

    /**
     * Sets the value of anoFinal.
     *
     * @param mixed $anoFinal the ano final
     *
     * @return self
     */
    public function setAnoFinal($anoFinal)
    {
        $this->anoFinal = $anoFinal;

        return $this;
    }

    /**
     * Gets the value of mesFinal.
     *
     * @return mixed
     */
    public function getMesFinal()
    {
        return $this->mesFinal;
    }

    /**
     * Sets the value of mesFinal.
     *
     * @param mixed $mesFinal the mes final
     *
     * @return self
     */
    public function setMesFinal($mesFinal)
    {
        $this->mesFinal = $mesFinal;

        return $this;
    }
}


?>