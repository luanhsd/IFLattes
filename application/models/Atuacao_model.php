<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atuacao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function vinculo_count() {
        $query = $this->db->query("select count(a.id_user), a.tipo_vinculo from fat_atuacao as a where a.tipo_vinculo != '' group by a.tipo_vinculo;");
        return $query->result();
    }

}
