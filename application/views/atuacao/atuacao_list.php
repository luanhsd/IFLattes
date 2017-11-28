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
                            <h4>Listagem de Registros</h4>
                            <div class="options">
                                <?php qtd_cur(); ?>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="table-vertical">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="table-cliente">
                                    <thead>
                                        <tr>  
                                            <th width="30%">DOCENTE</th>
                                            <th>INICIO</th>
                                            <th>FIM</th>
                                            <th>INSTITUIÇÃO</th>
                                            <th>TIPO</th>
                                            <th>ENQUADRAMENTO</th>                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) { ?>
                                            <tr class="odd gradeX">
                                                <td data-title="DOCENTE"  align="left"><?php echo $d->nm_user; ?></td>
                                                <td data-title="INICIO"><?php echo $d->ano_inicial; ?></td>
                                                <td data-title="FIM"><?php echo $d->ano_final; ?></td>
                                                <td data-title="INSTITUIÇÃO"><?php echo $d->instituicao; ?></td>
                                                <td data-title="TIPO"><?php echo $d->tipo_vinculo; ?></td>
                                                <td data-title="ENQUADRAMENTO"><?php echo $d->enq_funcional; ?></td>
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
