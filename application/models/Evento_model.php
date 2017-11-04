<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function datalist() {
        $query = $this->db->query('select t.ano_inicial,e.nome,e.natureza from fat_evento as e inner join dim_tempo as t where e.id_tempo=t.id_tempo order by ano_inicial asc;');
        return $query->result();
    }

    public function EventosPorAno($evento){
        if($evento==null)
            $query = $this->db->query('select t.ano_inicial as ano,count(t.ano_inicial) as qtd from fat_evento as f inner join dim_tempo as t where f.id_tempo=t.id_tempo group by t.ano_inicial order by t.ano_inicial asc;');
        else
            $query = $this->db->query('select t.ano_inicial as ano,count(t.ano_inicial) as qtd from fat_evento as f inner join dim_tempo as t where f.id_tempo=t.id_tempo and natureza="'.$evento.'" group by t.ano_inicial order by t.ano_inicial asc;');              
        return $query->result();
    }
}
