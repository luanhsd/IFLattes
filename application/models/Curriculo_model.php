<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Curriculo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($table, $dados = NULL) {
        if ($dados != null) {
            $this->db->insert($table, $dados);
            return $this->db->insert_id();
        }
    }
    
    public function insertLog($dados = NULL){
            if($dados!= null)
                $this->db->insert('logs',$dados);
    }

    public function verifyId($id) {
        $query = $this->db->get_where('dim_pessoa', array(
            'id_user' => $id
        ));
        return $query->num_rows();
    }

    public function insertOrUpdateAddress($dados = NULL) {
        $this->db->where('id_user', $dados['id_user']);
        $q = $this->db->get('ref_endereco');

        if ($q->num_rows() > 0) {
            $this->db->where('id_user', $dados['id_user']);
            $this->db->update('ref_endereco', $dados);
        } else {
            $this->db->set('id_user', $dados['id_user']);
            $this->db->insert('ref_endereco', $dados);
        }
    }

    public function insertOrUpdateCurriculo($dados = NULL) {
        $this->db->where('id_curriculo', $dados['id_curriculo']);
        $q = $this->db->get('curriculos');

        if ($q->num_rows() > 0) {
            $this->db->where('id_curriculo', $dados['id_curriculo']);
            $this->db->update('curriculos', $dados);
        } else {
            $this->db->set('id_curriculo', $dados['id_curriculo']);
            $this->db->insert('curriculos', $dados);
        }
    }

    public function listID() {
        $query = $this->db->query("select distinct id_user from dim_pessoa");
        return $query->result();
    }

    public function delete($url, $table) {
        $this->db->where('url', $url);
        $this->db->delete($table);
    }

    public function datalist($table) {
        $query = $this->db->get($table);
        return $query->result();
    }

    public function returnFirstUrl() {
        $query = $this->db->query('select *from fila_process limit 1');
        $row = $query->row_array();
        return $row;
    }

    public function getQtdCur() {
        $query = $this->db->query('select count(id_curriculo) as qtd from curriculos');
        $row = $query->row();
        return $row->qtd;
    }

    public function getDataLastVersion($id) {
        $query = $this->db->query("select data_cur as versao from curriculos where id_curriculo=$id;");
        $row = $query->row();
        if($row==0)
            return null;
        else
            return $row->versao;
    }

    public function CreateFila() {
        $query = $this->db->query("insert into fila_process(url,type) select url,'XML' from curriculos;");
    }

}
