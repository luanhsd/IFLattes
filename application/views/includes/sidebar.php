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
            <li><a href="javascript:;"><i class="fa fa-list-ol"></i> <span>Metodos de Entrada</span> <span class="badge badge-indigo">1</span></a>
                <ul class='acc-menu'>
                    <li><?php echo anchor('Incluir',"ZipFile<span class='badge badge-success'>new</span>"); ?>
                    <li><a href="ui-buttons.htm">Url</a></li>
                </ul>
            </li>
            
    </ul>
    <!-- END SIDEBAR MENU -->
</nav>     
