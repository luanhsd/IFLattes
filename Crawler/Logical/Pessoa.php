<?php

final class Pessoa{
	public $idUser;
	public $nmUser;
	public $citacao;
      

        public function getIdUser() {
            return $this->idUser;
        }

        public function getNmUser() {
            return $this->nmUser;
        }

        public function getCitacao() {
            return $this->citacao;
        }

        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }

        public function setNmUser($nmUser) {
            $this->nmUser = $nmUser;
        }

        public function setCitacao($citacao) {
            $this->citacao = $citacao;
        }


}
?>