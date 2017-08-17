<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Formacao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function qtd_nivel() {
        $query = $this->db->query('select nivel,count(nivel) as qtd from fat_formacao group by nivel order by nivel asc;');
        return $query->result();
    }
    
    public function qtd_curso() {
        $query = $this->db->query('select curso,count(curso) as qtd from fat_formacao group by curso order by qtd desc;');
        return $query->result();
    }

}
