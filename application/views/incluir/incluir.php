<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Upload de Arquivos</h4>
                            <div class="options">
                            </div>
                        </div> 
                        <div class="panel-body">
                        <?php if(!empty($alert)){
                                var_dump($alert);
                            }; ?>
                                <form action="Incluir/inserir" class="dropzone" method="POST">
                        </div>
                        <div class="panel-footer">
                                    <button type="submit" class="btn btn-success">CADASTRAR</button>
                        </div>
                        </form>
                   </div>
                </div>
            </div>



        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->