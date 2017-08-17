<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-07-18 17:22:34 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:22:37 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:22:39 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:23:40 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:23:42 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:24:13 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:24:15 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:24:23 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:24:25 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:24:52 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:27:55 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:27:57 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:27:59 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:28:07 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:28:10 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:28:11 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 17:28:13 --> Severity: Error --> Call to undefined method Idioma_model::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 19:45:32 --> Severity: Warning --> Missing argument 1 for Idioma_model::IdiomaLeitura(), called in C:\wamp\www\IFLattes\application\controllers\Json.php on line 39 and defined C:\wamp\www\IFLattes\application\models\Idioma_model.php 26
ERROR - 2017-07-18 19:45:32 --> Severity: Notice --> Undefined variable: idioma C:\wamp\www\IFLattes\application\models\Idioma_model.php 32
ERROR - 2017-07-18 19:45:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group by idioma' at line 6 - Invalid query: select idioma as idi,count(idioma) as qtd,
        (select count(le) from fat_idioma where idioma=idi and le="NAO INFORMADO") as NÃO_INFORMADO,
        (select count(le) from fat_idioma where idioma=idi and le="POUCO") as POUCO,
        (select count(le) from fat_idioma where idioma=idi and le="RAZOAVELMENTE") as RAZOAVEL,
        (select count(le) from fat_idioma where idioma=idi and le="BEM") as BEM
        from fat_idioma where idioma= group by idioma;
ERROR - 2017-07-18 19:46:01 --> Severity: Notice --> Use of undefined constant idioma - assumed 'idioma' C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 99
ERROR - 2017-07-18 19:46:38 --> Severity: Notice --> Use of undefined constant idioma - assumed 'idioma' C:\wamp\www\IFLattes\application\views\idioma\idioma_list.php 98
ERROR - 2017-07-18 19:47:02 --> 404 Page Not Found: Json/IdiomaLeituraDE
ERROR - 2017-07-18 19:47:18 --> Severity: Warning --> Missing argument 1 for Idioma_model::IdiomaLeitura(), called in C:\wamp\www\IFLattes\application\controllers\Json.php on line 39 and defined C:\wamp\www\IFLattes\application\models\Idioma_model.php 26
ERROR - 2017-07-18 19:47:18 --> Severity: Notice --> Undefined variable: idioma C:\wamp\www\IFLattes\application\models\Idioma_model.php 32
ERROR - 2017-07-18 19:47:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group by idioma' at line 6 - Invalid query: select idioma as idi,count(idioma) as qtd,
        (select count(le) from fat_idioma where idioma=idi and le="NAO INFORMADO") as NÃO_INFORMADO,
        (select count(le) from fat_idioma where idioma=idi and le="POUCO") as POUCO,
        (select count(le) from fat_idioma where idioma=idi and le="RAZOAVELMENTE") as RAZOAVEL,
        (select count(le) from fat_idioma where idioma=idi and le="BEM") as BEM
        from fat_idioma where idioma= group by idioma;
ERROR - 2017-07-18 19:47:37 --> Query error: Unknown column 'DE' in 'where clause' - Invalid query: select idioma as idi,count(idioma) as qtd,
        (select count(le) from fat_idioma where idioma=idi and le="NAO INFORMADO") as NÃO_INFORMADO,
        (select count(le) from fat_idioma where idioma=idi and le="POUCO") as POUCO,
        (select count(le) from fat_idioma where idioma=idi and le="RAZOAVELMENTE") as RAZOAVEL,
        (select count(le) from fat_idioma where idioma=idi and le="BEM") as BEM
        from fat_idioma where idioma=DE group by idioma;
ERROR - 2017-07-18 19:47:50 --> Query error: Unknown column 'DE' in 'where clause' - Invalid query: select idioma as idi,count(idioma) as qtd,
        (select count(le) from fat_idioma where idioma=idi and le="NAO INFORMADO") as NÃO_INFORMADO,
        (select count(le) from fat_idioma where idioma=idi and le="POUCO") as POUCO,
        (select count(le) from fat_idioma where idioma=idi and le="RAZOAVELMENTE") as RAZOAVEL,
        (select count(le) from fat_idioma where idioma=idi and le="BEM") as BEM
        from fat_idioma where idioma=DE group by idioma;
ERROR - 2017-07-18 19:51:39 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-18 19:51:39 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-18 19:59:05 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-18 19:59:05 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-18 20:02:43 --> Severity: Warning --> Missing argument 1 for Json::IdiomaLeitura() C:\wamp\www\IFLattes\application\controllers\Json.php 36
ERROR - 2017-07-18 20:02:43 --> Severity: Notice --> Undefined variable: idioma C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 20:42:19 --> Severity: Warning --> Missing argument 1 for Json::Idioma() C:\wamp\www\IFLattes\application\controllers\Json.php 36
ERROR - 2017-07-18 20:42:19 --> Severity: Notice --> Undefined variable: idioma C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 20:42:44 --> Severity: Warning --> Missing argument 1 for Json::Idioma() C:\wamp\www\IFLattes\application\controllers\Json.php 36
ERROR - 2017-07-18 20:42:44 --> Severity: Notice --> Undefined variable: idioma C:\wamp\www\IFLattes\application\controllers\Json.php 39
ERROR - 2017-07-18 20:42:44 --> Severity: Notice --> Undefined variable: idioma C:\wamp\www\IFLattes\application\controllers\Json.php 40
ERROR - 2017-07-18 20:42:44 --> Severity: Notice --> Undefined variable: idioma C:\wamp\www\IFLattes\application\controllers\Json.php 41
ERROR - 2017-07-18 20:42:44 --> Severity: Notice --> Undefined variable: idioma C:\wamp\www\IFLattes\application\controllers\Json.php 42
ERROR - 2017-07-18 20:42:44 --> Severity: Notice --> Array to string conversion C:\wamp\www\IFLattes\application\controllers\Json.php 43
ERROR - 2017-07-18 20:42:59 --> Severity: Notice --> Array to string conversion C:\wamp\www\IFLattes\application\controllers\Json.php 43
ERROR - 2017-07-18 20:53:40 --> 404 Page Not Found: Json/IdiomaDE
ERROR - 2017-07-18 21:46:37 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-18 21:46:37 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\atuacao\atuacao_list.php 36
ERROR - 2017-07-18 21:47:01 --> Severity: Notice --> Undefined variable: docentes C:\wamp\www\IFLattes\application\views\projeto\projeto_list.php 36
ERROR - 2017-07-18 21:47:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\projeto\projeto_list.php 36
ERROR - 2017-07-18 21:47:08 --> Severity: Notice --> Undefined variable: data C:\wamp\www\IFLattes\application\views\pages\registros.php 36
ERROR - 2017-07-18 21:47:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\IFLattes\application\views\pages\registros.php 36
