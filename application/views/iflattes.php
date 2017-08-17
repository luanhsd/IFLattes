<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><?php echo $name; ?></li>
            </ol>

            <h1><?php echo $h1; ?></h1>
        </div>
        <div class="container">



            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>CURRÍCULOS</h4>
                            <div class="options">

                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="table-vertical">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="table-cliente">
                                    <thead>
                                        <tr>
                                            <th width="30%">NOME</th>
                                            <th>ID</th>
                                            <th>URL</th>
                                            <th>VERSÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) { 
                                            $data=new DateTime($d->versao);
                                            ?>
                                            <tr class="odd gradeX">
                                                <td data-title="NOME"  align="left"><?php echo $d->nome; ?></td>
                                                <td data-title="ID"><?php echo $d->id_curriculo; ?></td>
                                                <td data-title="URL"><?php echo $d->url; ?></td>
                                                <td data-title="VERSÃO"><?php echo $data->format("d/m/Y"); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->
