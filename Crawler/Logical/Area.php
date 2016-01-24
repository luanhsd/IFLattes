<?php
final class Area{
	public $idUser;
	public $idTempo;
	public $grandeArea;
        public $area;
	public $subArea;
        public $espec;
        
	public function getIdUser() {
            return $this->idUser;
        }

        public function getidTempo() {
            return $this->idTempo;
        }

        public function getGrandeArea() {
            return $this->grandeArea;
        }
        
        public function getArea() {
            return $this->area;
        }

        public function getSubArea() {
            return $this->subArea;
        }
        
        public function getEspec() {
            return $this->espec;
        }

        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }

        public function setIdTempo($idTempo) {
            $this->idTempo = $idTempo;
        }

        public function setGrandeArea($grandeArea) {
            $this->grandeArea = $grandeArea;
        }
        
        public function setArea($area) {
            $this->area = $area;
        }

        public function setSubArea($subArea) {
            $this->subArea = $subArea;
        }
        
        public function setEspec($espec) {
            $this->espec = $espec;
        }

}