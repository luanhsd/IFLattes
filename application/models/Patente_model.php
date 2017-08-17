<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patente_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function datalist() {
        $query = $this->db->query('select p.nm_user, t.ano_inicial, pat.titulo from fat_patente as pat inner join dim_pessoa as p inner join dim_tempo as t where p.id_user = pat.id_user and pat.id_tempo = t.id_tempo order by t.ano_inicial;');
        return $query->result();
    }

}
