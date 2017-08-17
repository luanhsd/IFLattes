<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Producao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function datalist() {
        $query = $this->db->query('select t.ano_inicial, p.nm_user, prod.titulo from fat_producao as prod inner join dim_pessoa as p inner join dim_tempo as t where prod.id_user = p.id_user and prod.id_tempo = t.id_tempo;');
        return $query->result();
    }

}
