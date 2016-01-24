<?php
final class Formacao{
	public $idUser;
	public $idTempo;
	public $nivel;
	public $curso;
        public $local;
        public $titulo;
        public $orientador;
	public $bolsa;
        public $keywords;
        public $setor;
        
        public function getIdUser() {
            return $this->idUser;
        }

        public function getIdTempo() {
            return $this->idTempo;
        }

        public function getNivel() {
            return $this->nivel;
        }

        public function getCurso() {
            return $this->curso;
        }

        public function getLocal() {
            return $this->local;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function getOrientador() {
            return $this->orientador;
        }

        public function getBolsa() {
            return $this->bolsa;
        }

        public function getKeywords() {
            return $this->keywords;
        }

        public function getSetor() {
            return $this->setor;
        }

        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }

        public function setIdTempo($idTempo) {
            $this->idTempo = $idTempo;
        }

        public function setNivel($nivel) {
            $this->nivel = $nivel;
        }

        public function setCurso($curso) {
            $this->curso = $curso;
        }

        public function setLocal($local) {
            $this->local = $local;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function setOrientador($orientador) {
            $this->orientador = $orientador;
        }

        public function setBolsa($bolsa) {
            $this->bolsa = $bolsa;
        }

        public function setKeywords($keywords) {
            $this->keywords = $keywords;
        }

        public function setSetor($setor) {
            $this->setor = $setor;
        }


}
?>