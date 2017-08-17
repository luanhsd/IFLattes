<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function datalist() {
        $query = $this->db->query('select p.nm_user as docente,p.citacao,e.cidade as campus from dim_pessoa as p inner join ref_endereco as e where p.id_user=e.id_user;');
        return $query->result();
    }

}
