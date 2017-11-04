<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Formacao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function qtd_nivel($id) {
        $query = $this->db->query("select f.id_user,t.id_tempo,t.ano_final,f.nivel,nivel(f.nivel) as cod
        from fat_formacao as f inner join dim_tempo as t 
        where f.id_tempo=t.id_tempo and f.id_user=$id and t.ano_final!=0 order by nivel(f.nivel) desc limit 1;");
        return $query->result();
    }

    public function list_nivel(){
        $query = $this->db->query("select p.nm_user as user,temp_table.nivel,temp_table.curso,temp_table.local, temp_table.ano_final as Conclusão
        from(
            select f.id_user, f.id_tempo, t.ano_inicial, t.ano_final,f.nivel,f.curso,f.local 
            from fat_formacao as f inner join dim_tempo as t
            where f.id_tempo = t.id_tempo 
            and f.nivel!='GRADUACAO'
            and f.nivel!='FORMACAO-COMPLEMENTAR'
            and t.ano_final = (select MAX(t1.ano_final) from 
                                fat_formacao as f1 inner join dim_tempo as t1
                                where f1.id_tempo = t1.id_tempo and f.id_user = f1.id_user
                                and f1.nivel!='GRADUACAO'
                                and f1.nivel!='FORMACAO-COMPLEMENTAR')
        )as temp_table inner join dim_pessoa as p
            where temp_table.id_user=p.id_user
            order by p.nm_user;");
        return $query->result();
    }
    
    public function qtd_curso() {
        $query = $this->db->query('select curso,count(curso) as qtd from fat_formacao group by curso order by qtd desc;');
        return $query->result();
    }

}
