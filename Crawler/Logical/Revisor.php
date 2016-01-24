<?php
final class Revisor{
	public $idUser;
	public $idTempo;
	public $periodico;
	public $tipoRevisao;
        public $instituicao;
        
        public function getIdUser() {
            return $this->idUser;
        }

        public function getIdTempo() {
            return $this->idTempo;
        }

        public function getPeriodico() {
            return $this->periodico;
        }

        public function getTipoRevisao() {
            return $this->tipoRevisao;
        }

        public function getInstituicao() {
            return $this->instituicao;
        }

        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }

        public function setIdTempo($idTempo) {
            $this->idTempo = $idTempo;
        }

        public function setPeriodico($periodico) {
            $this->periodico = $periodico;
        }

        public function setTipoRevisao($tipoRevisao) {
            $this->tipoRevisao = $tipoRevisao;
        }

        public function setInstituicao($instituicao) {
            $this->instituicao = $instituicao;
        }


        
}
?>