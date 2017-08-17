<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-07-13 12:55:09 --> Severity: Notice --> Undefined variable: qtd_nivel C:\wamp\www\IFLattes\application\views\formacao\formacao_list.php 25
ERROR - 2017-07-13 13:01:58 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:01:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:06:37 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:06:37 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:06:47 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:06:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:54:11 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:54:11 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:56:16 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 13:56:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-13 18:23:08 --> Severity: Notice --> Undefined property: Json::$formacao_model C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 18:23:08 --> Severity: Error --> Call to a member function grauIdioma() on null C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 18:31:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 56
ERROR - 2017-07-13 18:31:50 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 18:33:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 18:33:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 18:35:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 18:37:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:04:54 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:04:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from fat_idioma group by idioma' at line 6 - Invalid query: select idioma as idi,count(idioma),
        (select count(le) from fat_idioma where le="NAO INFORMADO" and idioma=idi group by le) as le_nao, 
        (select count(le) from fat_idioma where le="POUCO" and idioma=idi group by le) as le_pouco,
        (select count(le) from fat_idioma where le="RAZOAVELMENTE" and idioma=idi group by le) as le_razoavel,
        (select count(le) from fat_idioma where le="BEM" and idioma=idi group by le) as le_bem,
        from fat_idioma group by idioma;
ERROR - 2017-07-13 20:12:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:12:08 --> 404 Page Not Found: Json/IdiomaGrau
ERROR - 2017-07-13 20:12:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:12:27 --> 404 Page Not Found: Json/IdiomaGrau
ERROR - 2017-07-13 20:12:39 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:12:39 --> 404 Page Not Found: Json/IdiomaGrau
ERROR - 2017-07-13 20:12:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:12:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from fat_idioma group by idioma' at line 6 - Invalid query: select idioma as idi,count(idioma),
        (select count(le) from fat_idioma where le="NAO INFORMADO" and idioma=idi group by le) as le_nao, 
        (select count(le) from fat_idioma where le="POUCO" and idioma=idi group by le) as le_pouco,
        (select count(le) from fat_idioma where le="RAZOAVELMENTE" and idioma=idi group by le) as le_razoavel,
        (select count(le) from fat_idioma where le="BEM" and idioma=idi group by le) as le_bem,
        from fat_idioma group by idioma;
ERROR - 2017-07-13 20:13:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:13:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from fat_idioma group by idioma' at line 6 - Invalid query: select idioma as idi,count(idioma),
        (select count(le) from fat_idioma where le="NAO INFORMADO" and idioma=idi group by le) as le_nao, 
        (select count(le) from fat_idioma where le="POUCO" and idioma=idi group by le) as le_pouco,
        (select count(le) from fat_idioma where le="RAZOAVELMENTE" and idioma=idi group by le) as le_razoavel,
        (select count(le) from fat_idioma where le="BEM" and idioma=idi group by le) as le_bem,
        from fat_idioma group by idioma;
ERROR - 2017-07-13 20:14:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:14:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from fat_idioma group by idioma' at line 6 - Invalid query: select idioma as idi,count(idioma),
        (select count(le) from fat_idioma where le="NAO INFORMADO" and idioma=idi group by le) as le_nao, 
        (select count(le) from fat_idioma where le="POUCO" and idioma=idi group by le) as le_pouco,
        (select count(le) from fat_idioma where le="RAZOAVELMENTE" and idioma=idi group by le) as le_razoavel,
        (select count(le) from fat_idioma where le="BEM" and idioma=idi group by le) as le_bem,
        from fat_idioma group by idioma;
ERROR - 2017-07-13 20:14:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from fat_idioma group by idioma' at line 6 - Invalid query: select idioma as idi,count(idioma),
        (select count(le) from fat_idioma where le="NAO INFORMADO" and idioma=idi group by le) as le_nao, 
        (select count(le) from fat_idioma where le="POUCO" and idioma=idi group by le) as le_pouco,
        (select count(le) from fat_idioma where le="RAZOAVELMENTE" and idioma=idi group by le) as le_razoavel,
        (select count(le) from fat_idioma where le="BEM" and idioma=idi group by le) as le_bem,
        from fat_idioma group by idioma;
ERROR - 2017-07-13 20:15:11 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:16:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:20:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:20:56 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 61
ERROR - 2017-07-13 20:35:22 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:35:37 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:35:58 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:36:06 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:37:20 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:37:48 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:37:58 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:38:03 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:41:44 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:42:44 --> Severity: Error --> Call to undefined method Idioma_model::idiomaList() C:\wamp\www\IFLattes\application\controllers\Idiomas.php 20
ERROR - 2017-07-13 20:43:01 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:45:35 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:45:52 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:46:09 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:46:30 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:46:44 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:47:03 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:47:10 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-13 20:47:22 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
