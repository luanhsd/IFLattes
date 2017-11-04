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

    public function categoriaList(){
        $query = $this->db->query('select  distinct categoria from fat_producao;');
        return $query->result();
    }

    public function ProducoesPorAno($producao){
        if($producao==null)
            $query = $this->db->query('select t.ano_inicial as ano,count(t.ano_inicial) as qtd from fat_producao as p inner join dim_tempo as t where p.id_tempo=t.id_tempo group by t.ano_inicial order by t.ano_inicial asc;');
        else
            $query = $this->db->query('select t.ano_inicial as ano,count(t.ano_inicial) as qtd from fat_producao as p inner join dim_tempo as t where p.id_tempo=t.id_tempo and categoria="'.$producao.'" group by t.ano_inicial order by t.ano_inicial asc;');              
        return $query->result();
    }

}
