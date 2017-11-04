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
                <div class="col-md-12" >

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4></h4>
                            <div class="options">
                                <?php qtd_cur(); ?>
                            </div>
                        </div>
                        <div class="panel-body">
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <select class="form-control" id="source" name="idioma" onchange="producao(this.value)">  
                                        <option>SELECIONE</option>
                                        <?php foreach($categoria as $c){ ?>
                                            <option value="<?php echo $c->categoria; ?>"><?php echo $c->categoria; ?></option>
                                        <?php } ?>                                                                  
                                    </select>
                                </div>
                            </div>

                        <div id="producaoPerYear">
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

<script>
var chart = dc.barChart("#producaoPerYear");
    d3.json("<?php echo base_url('/Json/ProducoesPorAno'); ?>", function (error, data) {
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
    .yAxisLabel("Quantidade de Produções")
    .xAxisLabel("Ano da Produção")
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

<script>
    function producao(tipo) {
        console.log(tipo);
        var chart = dc.barChart("#producaoPerYear");
        if(tipo!=null){
            url="<?php echo base_url('/Json/ProducoesPorAno/'); ?>/" + tipo;
        }else{
            url="<?php echo base_url('/Json/ProducoesPorAno/'); ?>/";
        }

    d3.json(url, function (error, data) {
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
    .yAxisLabel("Quantidade de Produções")
    .xAxisLabel("Ano do Produção")
    .elasticX(true)
    .dimension(yearDimension)
    .group(qtdGroup)
    .renderTitle(true).title(function (d) {
      return d.key +": "+ d.value;
        })
    .renderHorizontalGridLines(true)
    

  chart.render()
       
    });
    }
</script>
