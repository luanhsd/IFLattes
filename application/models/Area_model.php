<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function datalist() {
        $query = $this->db->query('SELECT grande_area,if(area="","Não Informado",area) as area,if(sub_area="","Não Informado",sub_area) as sub_area,if(espec="","Não Informado",espec) as espec FROM fat_area;');
        return $query->result();
    }

    public function count() {
        
    }

}
