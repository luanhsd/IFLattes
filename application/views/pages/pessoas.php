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
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="table-cliente">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOME</th>
                                        <th>URL</th>
                                        <th>VIEW</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $d) { ?>
                                        <tr class="odd gradeX">
                                            <td data-title="NOME"  align="left"><?php echo $d->id_curriculo ?></td>
                                            <td data-title="CPF/CNPJ"><?php echo $d->nome ?></td>
                                            <td data-title="RG"><a href="<?php echo $d->url ?>" target="blank"><?php echo $d->url ?></a></td>
                                            <td>batata</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->

