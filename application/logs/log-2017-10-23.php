<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-10-23 01:21:34 --> Query error: Unknown column '2017-10-02' in 'field list' - Invalid query: INSERT INTO `dim_versao` (`2017-10-02`) VALUES ('')
ERROR - 2017-10-23 01:25:06 --> Severity: Error --> Maximum execution time of 120 seconds exceeded C:\wamp\www\iflattes\application\controllers\Entrada.php 139
ERROR - 2017-10-23 01:26:51 --> Severity: Notice --> Undefined variable: fileXML C:\wamp\www\iflattes\application\controllers\Entrada.php 185
ERROR - 2017-10-23 01:26:51 --> Severity: Warning --> simplexml_load_file(): I/O warning : failed to load external entity &quot;&quot; C:\wamp\www\iflattes\application\controllers\Entrada.php 189
ERROR - 2017-10-23 01:26:51 --> Severity: error --> Exception: Call to a member function children() on boolean C:\wamp\www\iflattes\application\controllers\Entrada.php 204
ERROR - 2017-10-23 01:27:47 --> Query error: Unknown column 'user_id' in 'where clause' - Invalid query: SELECT *
FROM `ref_endereco`
WHERE `user_id` = '0041476511097254'
ERROR - 2017-10-23 01:29:04 --> Severity: Notice --> Undefined variable: id_versao C:\wamp\www\iflattes\application\controllers\Entrada.php 389
ERROR - 2017-10-23 01:29:04 --> Query error: Column 'id_versao' cannot be null - Invalid query: INSERT INTO `fat_producao` (`id_versao`, `id_user`, `categoria`, `id_tempo`, `titulo`, `natureza`, `keywords`, `setor`) VALUES (NULL, '0041476511097254', 'TRABALHOS-EM-EVENTOS', 25, 'Análise Cinestática de uma Garra Antropomórfica com três Dedos Utilizando a Teoria Helicoidal', 'RESUMO', NULL, NULL)
ERROR - 2017-10-23 01:39:31 --> Severity: Notice --> Undefined variable: fileXML C:\wamp\www\iflattes\application\controllers\Entrada.php 185
ERROR - 2017-10-23 01:39:31 --> Severity: Warning --> simplexml_load_file(): I/O warning : failed to load external entity &quot;&quot; C:\wamp\www\iflattes\application\controllers\Entrada.php 189
ERROR - 2017-10-23 01:39:32 --> Severity: error --> Exception: Call to a member function children() on boolean C:\wamp\www\iflattes\application\controllers\Entrada.php 204
ERROR - 2017-10-23 01:40:11 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`lattes`.`fat_orientacao`, CONSTRAINT `fk_fat_orientacao_dim_versao1` FOREIGN KEY (`id_versao`) REFERENCES `dim_versao` (`id_versao`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `fat_orientacao` (`id_user`, `id_tempo`, `titulo`, `natureza`, `keywords`, `setor`, `status`) VALUES ('0041476511097254', 37, 'PLATAFORMA DE ESTUDO DO SINAL ELETROMIOGRÁFICO DESTINADO AO ACIONAMENTO DE PRÓTESE DE MÃO', 'Dissertação de mestrado', '[sinal eletromiografico][reabilitação][próteses]', NULL, 'CONCLUIDA')
ERROR - 2017-10-23 01:45:00 --> Query error: Table 'lattes.curriculum' doesn't exist - Invalid query: INSERT INTO `curriculum` (`nome`, `data_cadastro`, `id_curriculo`, `url`, `content`) VALUES ('Paulo Marcos de Aguiar', 2, '0041476511097254', 'http://lattes.cnpq.br/0041476511097254', '')
ERROR - 2017-10-23 01:59:16 --> Severity: Warning --> Illegal string offset 'id_curriculo' C:\wamp\www\iflattes\application\models\Curriculo_model.php 40
ERROR - 2017-10-23 01:59:16 --> Severity: Warning --> Illegal string offset 'id_curriculo' C:\wamp\www\iflattes\application\models\Curriculo_model.php 48
ERROR - 2017-10-23 01:59:16 --> Query error: Unknown column 'curriculos' in 'field list' - Invalid query: INSERT INTO `curriculos` (`id_curriculo`, `curriculos`) VALUES ('c', '')
ERROR - 2017-10-23 02:01:57 --> Query error: Unknown column 'nome' in 'field list' - Invalid query: INSERT INTO `curriculos` (`id_curriculo`, `nome`, `url`, `data_cur`) VALUES ('0041476511097254', 'Paulo Marcos de Aguiar', 'C:/wamp/www/iflattes/uploads/0041476511097254.xml', '2017-10-02')
