<?php
final class Projeto{
	public $idUser;
	public $idTempo;
        public $tipo;
	public $titulo;
	public $descricao;
	public $situacao;
	public $natureza;
        public $alunos;
        public $integrantes;
        public $financiador;
        public $producoes;
        
        public function getIdUser() {
            return $this->idUser;
        }

        public function getIdTempo() {
            return $this->idTempo;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getSituacao() {
            return $this->situacao;
        }

        public function getNatureza() {
            return $this->natureza;
        }

        public function getAlunos() {
            return $this->alunos;
        }

        public function getIntegrantes() {
            return $this->integrantes;
        }

        public function getFinanciador() {
            return $this->financiador;
        }

        public function getProducoes() {
            return $this->producoes;
        }

        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }

        public function setIdTempo($idTempo) {
            $this->idTempo = $idTempo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function setSituacao($situacao) {
            $this->situacao = $situacao;
        }

        public function setNatureza($natureza) {
            $this->natureza = $natureza;
        }

        public function setAlunos($alunos) {
            $this->alunos = $alunos;
        }

        public function setIntegrantes($integrantes) {
            $this->integrantes = $integrantes;
        }

        public function setFinanciador($financiador) {
            $this->financiador = $financiador;
        }

        public function setProducoes($producoes) {
            $this->producoes = $producoes;
        }



}
?>