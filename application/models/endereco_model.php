<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function datalist() {
        $query = $this->db->query('select cidade,latitude,longitude from ref_endereco group by cidade;');
        return $query->result();
    }
}
