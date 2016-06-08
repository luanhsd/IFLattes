<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- BEGIN SIDEBAR -->
<nav id="page-leftbar" role="navigation">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="acc-menu" id="sidebar">
        <li id="search">
            <a href="javascript:;"><i class="fa fa-search opacity-control"></i></a>
            <form>
                <input type="text" class="search-query" placeholder="Buscar...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span><?php echo $name ?> </span></a></li>
        <li class="divider"></li>        
            <li><a href="javascript:;"><i class="glyphicon glyphicon-inbox"></i> <span>Metodos de Entrada</span> <span class="badge badge-success">1</span></a>
                <ul class='acc-menu'>
                    <li><?php echo anchor('Entrada/zip',"<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    <li><?php echo anchor('Entrada/url',"<i class='glyphicon glyphicon-link'></i><span>URL</span>"); ?></li>
                </ul>
            </li>
            <li><?php echo anchor('Registros',"<i class='glyphicon glyphicon-list-alt'></i><span>Registros</span>"); ?></li>
            <li><?php echo anchor('Curriculos',"<i class='glyphicon glyphicon-briefcase'></i><span>Currículos</span>"); ?></li>
            <li><?php echo anchor('Relatorios',"<i class='glyphicon glyphicon-bookmark'></i><span>Relatórios</span>"); ?></li>
            
    </ul>
    <!-- END SIDEBAR MENU -->
</nav>     
