<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atuacao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function vinculo_count() {
        $query = $this->db->query("select count(a.id_user), a.tipo_vinculo from fat_atuacao as a where a.tipo_vinculo != '' group by a.tipo_vinculo;");
        return $query->result();
    }

    public function datalist(){
        $query = $this->db->query("select f.id_versao,p.nm_user,t.ano_inicial,t.ano_final,f.instituicao,f.tipo_vinculo,f.enq_funcional,f.carga_horaria 
        from fat_atuacao as f inner join dim_pessoa as p inner join dim_tempo as t 
        where f.id_user=p.id_user and f.id_tempo=t.id_tempo
        and id_versao=(select max(id_versao) from fat_atuacao as f2 where f2.id_user=f.id_user)
        order by t.ano_final,t.ano_inicial DESC;");
        return $query->result();
    }

}
