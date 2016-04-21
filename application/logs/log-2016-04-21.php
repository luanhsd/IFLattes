<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-04-21 02:44:59 --> Query error: Column 'ano_inicial' cannot be null - Invalid query: INSERT INTO `dim_tempo` (`ano_inicial`, `ano_final`) VALUES (NULL, 'ANO-DE-CONCLUSAO')
ERROR - 2016-04-21 02:46:46 --> Query error: Column 'ano_inicial' cannot be null - Invalid query: INSERT INTO `dim_tempo` (`ano_inicial`, `ano_final`) VALUES (NULL, 'ANO-DE-CONCLUSAO')
ERROR - 2016-04-21 02:48:38 --> Query error: Column 'ano_inicial' cannot be null - Invalid query: INSERT INTO `dim_tempo` (`ano_inicial`, `ano_final`) VALUES (NULL, 'ANO-DE-CONCLUSAO')
ERROR - 2016-04-21 02:49:32 --> Query error: Column 'ano_inicial' cannot be null - Invalid query: INSERT INTO `dim_tempo` (`ano_inicial`, `ano_final`) VALUES (NULL, 'ANO-DE-CONCLUSAO')
ERROR - 2016-04-21 02:50:15 --> Query error: Column 'ano_inicial' cannot be null - Invalid query: INSERT INTO `dim_tempo` (`ano_inicial`, `ano_final`) VALUES (NULL, 'ANO-DE-CONCLUSAO')
ERROR - 2016-04-21 02:50:56 --> Query error: Column 'ano_inicial' cannot be null - Invalid query: INSERT INTO `dim_tempo` (`ano_inicial`, `ano_final`) VALUES (NULL, 'ANO-DE-CONCLUSAO')
ERROR - 2016-04-21 03:41:45 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`lattes`.`fat_formacao`, CONSTRAINT `fk_Formacao_Geral` FOREIGN KEY (`id_user`) REFERENCES `dim_pessoa` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `fat_formacao` (`id_user`, `id_tempo`, `nivel`, `curso`, `local`) VALUES ('0041476511097254', 1, 'FORMACAO-COMPLEMENTAR', 'Iniciação Científica - segurança do trabalho', 'Universidade Estadual Paulista Júlio de Mesquita Filho')
ERROR - 2016-04-21 03:59:08 --> Query error: Column 'nome' cannot be null - Invalid query: INSERT INTO `fat_evento` (`id_user`, `id_tempo`, `natureza`, `titulo`, `nome`) VALUES ('7799906288400968', 10997, 'Outra', 'V Competição SAE Brasil de AeroDesign', NULL)
ERROR - 2016-04-21 03:59:08 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\wamp\www\IFLattes\application\controllers\Curriculo.php:568) C:\wamp\www\IFLattes\system\core\Common.php 573
ERROR - 2016-04-21 06:54:20 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\wamp\www\IFLattes\application\controllers\Curriculo.php:593) C:\wamp\www\IFLattes\system\core\Common.php 573
ERROR - 2016-04-21 06:54:20 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 57903909 bytes) C:\wamp\www\IFLattes\system\libraries\Profiler.php 556
ERROR - 2016-04-21 07:52:12 --> 404 Page Not Found: Indexhtm/index
ERROR - 2016-04-21 09:06:42 --> Query error: Duplicate entry '41476511097254' for key 'PRIMARY' - Invalid query: INSERT INTO `dim_pessoa` (`id_user`, `nm_user`, `citacao`) VALUES ('0041476511097254', 'Paulo Marcos de Aguiar', 'AGUIAR, P. M.')
