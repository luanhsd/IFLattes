<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><?php echo $name; ?></li>
            </ol>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4><b><?php echo $docente->nome; ?></b></h4>
                            <div class="options">
                                <b>ID: <?php echo $docente->id; ?></b>
                            </div>
                        </div>
                        <div class="panel-body" id='timeline'>
                            <section id="cd-timeline" class="cd-container">
                                <?php
                                foreach ($timeline as $fact) {
                                    switch ($fact->fato) {
                                        case 'area':
                                            block_area($fact);
                                            break;
                                        case 'atuacao':
                                            block_atuacao($fact);
                                            break;
                                        case 'banca':
                                            block_banca($fact);
                                            break;
                                        case 'evento':
                                            block_evento($fact);
                                            break;
                                        case 'formacao':
                                            block_formacao($fact);
                                            break;
                                        case 'orientacao':
                                            block_orientacao($fact);
                                            break;
                                        case 'patente':
                                            block_patente($fact);
                                            break;
                                        case 'premio':
                                            block_premio($fact);
                                            break;
                                        case 'producao':
                                            block_producao($fact);
                                            break;
                                    }
                                }
                                ?>

                            </section> <!-- cd-timeline -->

                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->
