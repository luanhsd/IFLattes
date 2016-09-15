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
                        <div class="panel-body" id="panel-zip">
                            <form id="uploadform" action="zip" method="POST" enctype="multipart/form-data">
                                <div class="progress progress-striped active" id="progress">
                                    <div class="progress-bar progress-bar-info" id="progressbar" style="width:0%">
                                    </div>                                        
                                </div>
                                <div class="form-group">
                                    <input type="file" multiple="multiple" id="file" name="file[]" multiple data-preview-file-type="any" data-upload-url="#">
                                </div> 
                        </div>
                        <div class="panel-footer" id="panel-footer-zip">
                            <button type="submit" class="btn btn-success " id="submitzip" name="submit">CADASTRAR</button> 
                        </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->

