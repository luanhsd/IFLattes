<?php
final class Endereco{
	public $idEndereco;
        public $idUser;
        public $local;
	public $cep;
	public $estado;
	public $cidade;
	public $bairro;
	public $rua;
	public $num;
        public $latitude;
        public $longitude;
        
        public function getIdEndereco() {
            return $this->idEndereco;
        }

        public function getIdUser() {
            return $this->idUser;
        }
        
        public function getLocal() {
            return $this->local;
        }

        public function getCep() {
            return $this->cep;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function getBairro() {
            return $this->bairro;
        }

        public function getRua() {
            return $this->rua;
        }

        public function getNum() {
            return $this->num;
        }
        
        public function getLatitude() {
            return $this->latitude;
        }
        
        public function getLongitude() {
            return $this->longitude;
        }

        public function setIdEndereco($idEndereco) {
            $this->idEndereco = $idEndereco;
        }

        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }
        
        public function setLocal($local) {
            $this->local = $local;
        }

        public function setCep($cep) {
            $this->cep = $cep;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }

        public function setBairro($bairro) {
            $this->bairro = $bairro;
        }

        public function setRua($rua) {
            $this->rua = $rua;
        }

        public function setNum($num) {
            $this->num = $num;
        }
        
        public function setLatitude($latitude) {
            $this->latitude = $latitude;
        }
        
        public function setLongitude($longitude) {
            $this->longitude = $longitude;
        }

}
?>