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
                                            <th width="30%">DOCENTE</th>
                                            <th>CITAÇÃO</th>
                                            <th>CAMPUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($docentes as $d) { ?>
                                            <tr class="odd gradeX">
                                                <td data-title="DOCENTE"  align="left"><?php echo $d->docente ?></td>
                                                <td data-title="CITAÇÃO"><?php echo $d->citacao ?></td>
                                                <td data-title="CAMPUS"><?php echo $d->campus ?></td>
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
