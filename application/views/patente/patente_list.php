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
                                <?php qtd_cur(); ?>
                            </div>
                        </div>
                        <div class="panel-body">

                        <div id="PatentePerYear">
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4></h4>
                            <div class="options">
                                <?php qtd_cur(); ?>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="table-vertical">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="table-cliente">
                                    <thead>
                                        <tr>
                                            <th width="8%">ANO</th>
                                            <th width="30%">DOCENTE</th>
                                            <th>PATENTE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) { ?>
                                            <tr class="odd gradeX">                                                
                                                <td data-title="ANO"><?php echo $d->ano_inicial ?></td>
                                                <td data-title="DOCENTE"  align="left"><?php echo $d->nm_user ?></td>
                                                <td data-title="PATENTE"><?php echo $d->titulo ?></td>
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

<script>
    var chart = dc.barChart("#PatentePerYear");
    d3.json("<?php echo base_url('/Json/PatentesPorAno'); ?>", function (error, data) {
        var ndx=crossfilter(data),
        yearDimension = ndx.dimension(function(d){ return +d.ano;}),
        qtdGroup= yearDimension.group().reduceSum(function(d){return d.qtd;});
        chart
    .width(1000)
    .height(600)
    .x(d3.scale.linear().domain([0, data.length + 1]))
    .brushOn(false)
    .centerBar(true)
    .renderLabel(false)
    .yAxisLabel("Quantidade de Patentes")
    .xAxisLabel("Ano")
    .elasticX(true)
    .dimension(yearDimension)
    .group(qtdGroup)
    .renderTitle(true).title(function (d) {
      return d.key +": "+ d.value;
        })
    .renderHorizontalGridLines(true)
    

  chart.render()
       
    });
</script>