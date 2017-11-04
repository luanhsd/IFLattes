<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-11-04 07:19:08 --> Query error: FUNCTION lattes.nivel does not exist - Invalid query: select f.id_user,t.id_tempo,t.ano_final,f.nivel,nivel(f.nivel) as cod
        from fat_formacao as f inner join dim_tempo as t 
        where f.id_tempo=t.id_tempo and f.id_user=41476511097254 and t.ano_final!=0 order by nivel(f.nivel) desc limit 1;
ERROR - 2017-11-04 07:20:42 --> Query error: FUNCTION lattes.nivel does not exist - Invalid query: select f.id_user,t.id_tempo,t.ano_final,f.nivel,nivel(f.nivel) as cod
        from fat_formacao as f inner join dim_tempo as t 
        where f.id_tempo=t.id_tempo and f.id_user=41476511097254 and t.ano_final!=0 order by nivel(f.nivel) desc limit 1;
