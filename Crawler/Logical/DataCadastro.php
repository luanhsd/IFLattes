<?php

final class DataCadastro {
	public $idData;
        public $date;
        

        public function getIdData() {
            return $this->idData;
        }

        public function setIdData($idData) {
            $this->idData = $idData;
        }

            /**
     * Gets the value of date.
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the value of date.
     *
     * @param mixed $date the date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}

?>