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
                <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                <li><?php echo anchor('Entrada/url', "<i class='glyphicon glyphicon-link'></i><span>URL</span>"); ?></li>
            </ul>
        </li>
        <li><a href="javascript:;">Dados Gerais</a>
            <ul class="acc-menu">
                <li><a href="javascript:;"><i class="fa fa-user"></i> <span>Docentes</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Docentes', "<span>Quem são ?</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-sitemap"></i> <span>Formação</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('*', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-suitcase"></i> <span>Atuação</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-book"></i> <span>Áreas de Estudo</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-globe"></i> <span>Idioma</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="javascript:;">Produções Gerais</a>
            <ul class="acc-menu">
                <li><a href="javascript:;"><i class="fa fa-wrench"></i> <span>Produção</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-star"></i> <span>Evento</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-folder"></i> <span>Patente</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="javascript:;">Projetos</a>
            <ul class="acc-menu">
                <li><a href="javascript:;"><i class="fa fa-code-fork"></i> <span>Projeto</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-flask"></i> <span>Pesquisa</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>

            </ul>
        </li>
        <li><a href="javascript:;">Dados Complementares</a>
            <ul class="acc-menu">
                <li><a href="javascript:;"><i class="fa fa-thumb-tack"></i> <span>Orientação</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-trophy"></i> <span>Prêmio</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-edit"></i> <span>Revisor</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-group"></i> <span>Corpo Editorial</span></a>
                    <ul class='acc-menu'>
                        <li><?php echo anchor('Entrada/zip', "<i class='glyphicon glyphicon-book'></i><span>ZipFile</span><span class='badge badge-success'>new</span>"); ?></li>

                    </ul>
                </li>
            </ul>
        </li>

    </ul>
    <!-- END SIDEBAR MENU -->
</nav>     
