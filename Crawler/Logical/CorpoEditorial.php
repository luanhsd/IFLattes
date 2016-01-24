<?php
final class CorpoEditorial{
    
	public $idUser;
	public $idTempo;
	public $editorial;
	

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
     * Gets the value of editorial.
     *
     * @return mixed
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * Sets the value of editorial.
     *
     * @param mixed $editorial the editorial
     *
     * @return self
     */
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;

        return $this;
    }
}
?>