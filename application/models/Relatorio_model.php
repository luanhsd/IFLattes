<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function campus() {
        $query = $this->db->query('select local,cidade,latitude,longitude from ref_endereco group by cidade');
        return $query->result();
    }

    public function qtd_titulacao() {
        $query = $this->db->query('select e.cidade,f.nivel,count(f.nivel) as qtd from fat_formacao as f inner join ref_endereco as e where f.id_user=e.id_user group by e.cidade,f.nivel order by e.cidade');
        return $query->result();
    }

    public function areas_tree() {
        $query = $this->db->query('select a.grande_area, a.area,a.sub_area,a.espec from fat_area as a where area!=""');
        return $query->result();
    }

    public function grande_area_campus() {
        $query = $this->db->query('select f.id_user,r.cidade,f.id_tempo,f.grande_area from fat_area as f inner join ref_endereco as r where f.id_user = r.id_user and f.grande_area!="" group by f.grande_area;');
        return $query->result();
    }

    public function area_campus() {
        $query = $this->db->query('select f.id_user,r.cidade,f.id_tempo,f.area from fat_area as f inner join ref_endereco as r where f.id_user = r.id_user and f.area!="" group by f.area;
');
        return $query->result();
    }

    public function sub_area_campus() {
        $query = $this->db->query('select f.id_user,r.cidade,f.id_tempo,f.sub_area from fat_area as f inner join ref_endereco as r where f.id_user = r.id_user and f.sub_area!="" group by f.sub_area;
');
        return $query->result();
    }

    public function espec_campus() {
        $query = $this->db->query('select f.id_user,r.cidade,f.id_tempo,f.espec from fat_area as f inner join ref_endereco as r where f.id_user = r.id_user and f.espec!="" group by f.espec;');
        return $query->result();
    }

}
