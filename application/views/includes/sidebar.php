<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- BEGIN SIDEBAR -->
<nav id="page-leftbar" role="navigation">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="acc-menu" id="sidebar">
        <li id="search">
            <a href="javascript:;"><i class="icon-search opacity-control"></i></a>
            <form>
            <input type="text" class="search-query" placeholder="Search..." />
            <button type="submit"><i class="icon-search"></i></button>
            </form>
        </li>
        <li class="divider"></li>
        <li><?php 
        $text='<i class="icon-home"></i> <span>'.$name.'</span>';
        echo anchor(base_url(),$text); 
        ?></li>
        <li><a href="javascript:;"><i class="icon-th"></i> <span>Metodos de Entrada</span> </a>
            <ul class="acc-menu">
                <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                <li><?php echo anchor('Entrada/url', "<i class='glyphicon glyphicon-link'></i><span>URL</span>"); ?></li>
                <li><?php echo anchor('Entrada/log', "<i class='glyphicon glyphicon-warning-sign'></i><span>LOG</span>"); ?></li>
            </ul>

        <li><a href="javascript:;"><i class="icon-sitemap"></i> <span>Dados Gerais</span></a>
            <ul class="acc-menu">
                <li><a href="javascript:;">Docentes</a>
                    <ul class="acc-menu">
                        <li><?php echo anchor('Docentes','Quem São?'); ?></li>
                    </ul>
                </li>
                <li><?php echo anchor('Formacao','Formação'); ?></li>
                <li><?php echo anchor('Atuacao','Atuacao'); ?></li>
                <li><?php echo anchor('Area','Areas de Estudo'); ?></li>
                <li><?php echo anchor('Idiomas','Idiomas'); ?></li>
            </ul>
        </li>
        <li><a href="javascript:;"><i class="icon-tasks"></i> <span>Produções Gerais</span></a>
            <ul class="acc-menu">
                <li><?php echo anchor('Producao','Produção'); ?></li>
                <li><?php echo anchor('Evento','Evento'); ?></li>
                <li><?php echo anchor('Patente','Patente'); ?></li>
            </ul>
        </li>
        <li><a href="javascript:;"><i class="icon-table"></i> <span>Projetos</span></a>
            <ul class="acc-menu">
                <li><?php echo anchor('Projeto','Projeto'); ?></li>
                <li><?php echo anchor('Pesquisa','Pesquisa'); ?></li>
            </ul>
        </li>
        <li><a href="javascript:;"><i class="icon-sitemap"></i> <span>Dados Complementares</span></a>
            <ul class="acc-menu">
                <li><?php echo anchor('Orientacao','Orientação'); ?></li>
                <li><?php echo anchor('Premio','Prêmio'); ?></li>
                <li><?php echo anchor('Revisor','Revisor'); ?></li>
                <li><?php echo anchor('Editorial','Corpo Editorial'); ?></li>
            </ul>
        </li>
        <li class="divider"></li>
        </li></ul>
    <!-- END SIDEBAR MENU -->
</nav>