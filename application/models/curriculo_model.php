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

    public function update($dados = NULL) {
        if ($dados != null) {
            $this->db->update('cliente', $dados, array('id_cliente' => $dados['id_cliente']));
            var_dump($dados);
        }
    }

    public function datalist($table) {
        $query = $this->db->get($table);
        return $query->result();
    }

    public function search($id) {
        $query = $this->db->query('select c.id_cliente as id, c.nm_cliente as nome, c.cpf_cnpj, c.rg,c.email, t.tel_local, t.celular, t.tel_comercial, e.cep, e.estado, e.cidade, e.bairro, e.logradouro, e.numero, e.complemento from cliente as c inner join endereco as e inner join telefone as t where c.id_endereco=e.id_endereco and c.id_telefone=t.id_telefone and c.id_cliente=' . $id);
        $row = $query->row();
        return $row;
    }

    public function returnLastId() {
        $query = $this->db->query('select id_cliente from cliente limit 1');
        $row = $query->row_array();
        return $row['id_cliente'];
    }

}
