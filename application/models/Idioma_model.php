<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Idioma_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        $query = $this->db->query('select idioma,count(idioma) from fat_idioma group by idioma order by idioma asc;');
        return $query->result();
    }

    public function datalist() {
        $query = $this->db->query('select i.id_versao,p.nm_user,c.data_cadastro,i.idioma,i.le,i.fala,i.escreve,i.compreende 
        from fat_idioma as i inner join dim_pessoa as p inner join dim_cadastro as c
        where i.id_user=p.id_user and c.id_dataCadastro=i.data_cadastro and
        i.id_versao=(select max(i2.id_versao) from fat_idioma as i2 where i2.id_user=i.id_user);');
        return $query->result();
    }

    public function listIdiomas() {
        $query = $this->db->query('select distinct idioma from fat_idioma order by idioma;');
        return $query->result();
    }

    public function IdiomaLeitura($idioma) {
        $query = $this->db->query('select le,count(le) as qtd from fat_idioma where idioma="'.$idioma.'" group by le order by le;');
        return $query->result();
    }
    
    public function IdiomaFala($idioma) {
        $query = $this->db->query('select fala,count(fala) as qtd from fat_idioma where idioma="'.$idioma.'" group by fala order by fala;');
        return $query->result();
    }
    
    public function IdiomaEscrita($idioma) {
        $query = $this->db->query('select escreve,count(escreve) as qtd from fat_idioma where idioma="'.$idioma.'" group by escreve order by escreve;');
        return $query->result();
    }
    
    public function IdiomaCompreensao($idioma) {
        $query = $this->db->query('select compreende,count(compreende) as qtd from fat_idioma where idioma="'.$idioma.'" group by compreende order by compreende;');
        return $query->result();
    }
}
