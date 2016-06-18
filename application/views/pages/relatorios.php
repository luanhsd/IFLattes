<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?> "><?php echo $name; ?> </a></li>
                <li><?php echo $title; ?> </li>
            </ol>

            <h1><?php echo $h1; ?></h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4>CAMPUS CADASTRADOS</h4>
                            <div class="options">
                                <a onclick="maps('campus');" name = "view" id="campus">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="map_campus" style="height:400px"></div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>TITULAÇÃO</h4>
                            <div class="options">
                                <a onclick="graphs('qtd-titulacao');">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body" id="graph_titulacao">
                            
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>PUBLICAÇÃO POR CAMPUS</h4>
                            <div class="options">
                                <a onclick="">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>PUBLICAÇÃO POR TITULAÇÃO</h4>
                            <div class="options">
                                <a onclick="" name = "view" id="">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>PUBLICAÇÃO POR TEMPO</h4>
                            <div class="options">
                                <a onclick="" name = "view" id="">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>TEMPO DE ATUAÇÃO</h4>
                            <div class="options">
                                <a onclick="">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>AREAS DE ATUAÇÃO/CONHECIMENTO</h4>
                            <div class="options">
                                <a onclick="graphs('areas_atuacao');">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>AREAS DE CONHECIMENTO POR CAMPUS</h4>
                            <div class="options">
                                <a onclick="" name = "view" id="">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div> 
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content --> 

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeewbHaInUFv1a6vtaWdZuPPt30ksa1Z8&callback=maps">
</script>

