<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Docente_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function datalist() {
        $query = $this->db->query('select p.id_user as id,p.nm_user as docente,p.citacao,e.cidade as campus from dim_pessoa as p inner join ref_endereco as e where p.id_user=e.id_user;');
        return $query->result();
    }

    public function search($id) {
        $query = $this->db->query('select id_user as id,nm_user as nome,citacao from dim_pessoa where id_user=' . $id . ';');
        return $query->row();
    }

    public function curriculo_list() {
        $query = $this->db->query('select c.nome,c.id_curriculo,c.url,cad.data_cadastro as versao from curriculum as c inner join dim_cadastro as cad where c.data_cadastro=cad.id_dataCadastro;');
        return $query->result();
    }

    public function timeline($id) {
        $array = Array();
        $query = $this->db->query("select 'area' as fato,t.ano_inicial,a.grande_area,a.area,a.sub_area,a.espec from fat_area as a inner join dim_tempo as t where a.id_tempo=t.id_tempo and a.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        $query = $this->db->query("select 'atuacao' as fato,t.ano_inicial,a.instituicao,a.tipo_vinculo,a.enq_funcional,a.carga_horaria from fat_atuacao as a inner join dim_tempo as t where a.id_tempo=t.id_tempo and a.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        $query = $this->db->query("select 'banca' as fato,t.ano_inicial,b.banca,b.tipo,b.natureza,b.titulo,b.sobre from fat_banca as b inner join dim_tempo as t where b.id_tempo=t.id_tempo and b.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        $query = $this->db->query("select 'evento' as fato,t.ano_inicial,e.nome,e.titulo,e.natureza from fat_evento as e inner join dim_tempo as t where e.id_tempo=t.id_tempo and e.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        $query = $this->db->query("select 'formacao' as fato,t.ano_inicial,f.nivel,f.curso,f.local,f.titulo,f.orientador,f.bolsa from fat_formacao as f inner join dim_tempo as t where f.id_tempo=t.id_tempo and f.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        $query = $this->db->query("select 'orientacao' as fato,t.ano_inicial,o.titulo,o.natureza,o.tipo,o.categoria,o.keywords,o.setor,o.status from fat_orientacao as o inner join dim_tempo as t where o.id_tempo=t.id_tempo and o.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        $query = $this->db->query("select 'patente' as fato,t.ano_inicial,p.titulo,p.categoria,p.instituicao,p.descricao from fat_patente as p inner join dim_tempo as t where p.id_tempo=t.id_tempo and p.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        $query = $this->db->query("select 'premio' as fato,t.ano_inicial,p.nome,p.entidade from fat_premio as p inner join dim_tempo as t where p.id_tempo=t.id_tempo and p.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        $query = $this->db->query("select 'producao' as fato,t.ano_inicial,p.titulo,p.natureza,p.tipo,p.categoria,p.keywords,p.setor from fat_producao as p inner join dim_tempo as t where p.id_tempo=t.id_tempo and p.id_user='" . $id . "';");
        $array = array_merge($array, $query->result());
        return $array;
    }

}
