<?php

class Relatorio_model extends CI_Model {

    private $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function insert() {
        $this->db->insert('', $this->data);
    }

    public function update() {
        $this->db->update('', $this->data, array('' => $_POST['']));
    }

    public function datalist($table) {
        $query = $this->db->get($table);
        return $query->result();
        
    }
    
    public function fielddata($table){
        $query = $this->db->get($table);
        return $query->field_data();
    }
    
    public function getNameUser($id){
        $query = $this->db->get($table);
        return $query->field_data();
    }
    
    public function search($placa) {
        $query = $this->db->query('SELECT *FROM where placa=');
        $row = $query->row();
        return $row;
    }

}
