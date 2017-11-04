<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-10-31 18:49:21 --> Query error: FUNCTION lattes.nivel does not exist - Invalid query: select f.id_user,t.id_tempo,t.ano_final,f.nivel,nivel(f.nivel) as cod
        from fat_formacao as f inner join dim_tempo as t 
        where f.id_tempo=t.id_tempo and f.id_user=41476511097254 and t.ano_final!=0 order by nivel(f.nivel) desc limit 1;
ERROR - 2017-10-31 18:49:22 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\iflattes\application\views\atuacao\atuacao_list.php 37
ERROR - 2017-10-31 18:49:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\iflattes\application\views\atuacao\atuacao_list.php 37
ERROR - 2017-10-31 19:19:20 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\iflattes\application\views\atuacao\atuacao_list.php 37
ERROR - 2017-10-31 19:19:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\iflattes\application\views\atuacao\atuacao_list.php 37
