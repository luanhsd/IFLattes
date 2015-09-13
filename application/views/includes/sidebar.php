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
        <li><a href="javascript:;"><i class="fa fa-briefcase"></i> <span>Relatórios</span> <span class="badge badge-danger">1</span></a>
            <ul class="acc-menu">
                <li><a href="extras-signupform.htm">Currículos</a></li>
                <li><a href="extras-404.htm">404 Page</a></li>
                <li><a href="extras-500.htm">500 Page</a></li>
                <li><a href="extras-login.htm">Login 1</a></li>
                <li><a href="extras-login2.htm">Login 2</a></li>
                <li><a href="extras-forgotpassword.htm">Password Reset</a></li>
                <li><a href="extras-blank.htm">Blank Page</a></li>
            </ul>
        </li>
        <li><a href="javascript:;"><i class="fa fa-sitemap"></i> <span>Outros</span></a>
            <ul class="acc-menu">
                <li><a href="javascript:;">Menu Item 1</a></li>
                <li><a href="javascript:;">Menu Item 2</a>
                    <ul class="acc-menu">
                        <li><a href="javascript:;">Menu Item 2.1</a></li>
                        <li><a href="javascript:;">Menu Item 2.2</a>
                            <ul class="acc-menu">
                                <li><a href="javascript:;">Menu Item 2.2.1</a></li>
                                <li><a href="javascript:;">Menu Item 2.2.2</a>
                                    <ul class="acc-menu">
                                        <li><a href="javascript:;">And deeper yet!</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</nav>     
