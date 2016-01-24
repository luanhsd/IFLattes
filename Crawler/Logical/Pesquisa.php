<?php
final class Pesquisa{
	public $idUser;
	public $dataCadastro;
	public $descricao;
        
        public function getIdUser() {
            return $this->idUser;
        }

        public function getDataCadastro() {
            return $this->dataCadastro;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }

        public function setDataCadastro($dataCadastro) {
            $this->dataCadastro = $dataCadastro;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }     
	
}
?>