<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function datalist() {
        $query = $this->db->query('select t.ano_inicial,e.nome,e.natureza from fat_evento as e inner join dim_tempo as t where e.id_tempo=t.id_tempo order by ano_inicial asc;');
        return $query->result();
    }
}
