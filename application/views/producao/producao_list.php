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
                            <h4></h4>
                            <div class="options">
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="table-vertical">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="table-cliente">
                                    <thead>
                                        <tr>
                                            <th width="8%">ANO</th>
                                            <th width="30%">DOCENTE</th>
                                            <th>TITULO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) { ?>
                                            <tr class="odd gradeX">
                                                <td data-title="ANO"  align="left"><?php echo $d->ano_inicial ?></td>
                                                <td data-title="DOCENTE"><?php echo $d->nm_user ?></td>
                                                <td data-title="TITULO"><?php echo $d->titulo ?></td>
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
