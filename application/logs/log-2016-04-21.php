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
ERROR - 2016-04-21 22:52:56 --> Severity: Warning --> fopen(C:\wamp\www\IFLattes/uploads/): failed to open stream: No such file or directory C:\wamp\www\IFLattes\application\libraries\Unzip.php 246
ERROR - 2016-04-21 22:52:56 --> Severity: Warning --> rename(C:\wamp\www\IFLattes/uploads/curriculo.xml,C:\wamp\www\IFLattes/uploads/.xml):  C:\wamp\www\IFLattes\application\controllers\Curriculo.php 50
ERROR - 2016-04-21 22:52:56 --> Severity: Warning --> simplexml_load_file(): I/O warning : failed to load external entity &quot;file:///C:/wamp/www/IFLattes/uploads/.xml&quot; C:\wamp\www\IFLattes\application\controllers\Curriculo.php 61
ERROR - 2016-04-21 22:52:56 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\wamp\www\IFLattes\application\controllers\Curriculo.php:71) C:\wamp\www\IFLattes\system\core\Common.php 573
ERROR - 2016-04-21 22:52:56 --> Severity: Error --> Call to a member function children() on a non-object C:\wamp\www\IFLattes\application\controllers\Curriculo.php 71
ERROR - 2016-04-21 22:53:02 --> Severity: Warning --> fopen(C:\wamp\www\IFLattes/uploads/): failed to open stream: No such file or directory C:\wamp\www\IFLattes\application\libraries\Unzip.php 246
ERROR - 2016-04-21 22:53:02 --> Severity: Warning --> rename(C:\wamp\www\IFLattes/uploads/curriculo.xml,C:\wamp\www\IFLattes/uploads/.xml):  C:\wamp\www\IFLattes\application\controllers\Curriculo.php 50
ERROR - 2016-04-21 22:53:02 --> Severity: Warning --> simplexml_load_file(): I/O warning : failed to load external entity &quot;file:///C:/wamp/www/IFLattes/uploads/.xml&quot; C:\wamp\www\IFLattes\application\controllers\Curriculo.php 61
ERROR - 2016-04-21 22:53:02 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\wamp\www\IFLattes\application\controllers\Curriculo.php:71) C:\wamp\www\IFLattes\system\core\Common.php 573
ERROR - 2016-04-21 22:53:02 --> Severity: Error --> Call to a member function children() on a non-object C:\wamp\www\IFLattes\application\controllers\Curriculo.php 71
ERROR - 2016-04-21 22:53:34 --> Severity: Warning --> fopen(C:\wamp\www\IFLattes/uploads/): failed to open stream: No such file or directory C:\wamp\www\IFLattes\application\libraries\Unzip.php 246
ERROR - 2016-04-21 22:53:34 --> Severity: Warning --> rename(C:\wamp\www\IFLattes/uploads/curriculo.xml,C:\wamp\www\IFLattes/uploads/.xml):  C:\wamp\www\IFLattes\application\controllers\Curriculo.php 50
ERROR - 2016-04-21 22:53:34 --> Severity: Warning --> simplexml_load_file(): I/O warning : failed to load external entity &quot;file:///C:/wamp/www/IFLattes/uploads/.xml&quot; C:\wamp\www\IFLattes\application\controllers\Curriculo.php 61
ERROR - 2016-04-21 22:53:34 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\wamp\www\IFLattes\application\controllers\Curriculo.php:71) C:\wamp\www\IFLattes\system\core\Common.php 573
ERROR - 2016-04-21 22:53:34 --> Severity: Error --> Call to a member function children() on a non-object C:\wamp\www\IFLattes\application\controllers\Curriculo.php 71
ERROR - 2016-04-21 22:53:51 --> Severity: Warning --> rename(C:\wamp\www\IFLattes/uploads/curriculo.xml,C:\wamp\www\IFLattes/uploads/0135813952022069.xml):  C:\wamp\www\IFLattes\application\controllers\Curriculo.php 50
ERROR - 2016-04-21 22:53:51 --> Query error: Duplicate entry '135813952022069' for key 'PRIMARY' - Invalid query: INSERT INTO `dim_pessoa` (`id_user`, `nm_user`, `citacao`) VALUES ('0135813952022069', 'Adna Viana Dutra', 'DUTRA, A. V.')