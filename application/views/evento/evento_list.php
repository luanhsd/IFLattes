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
                                    <select class="form-control" id="source" name="idioma" onchange="evento(this.value)">  
                                        <option value="" selected>TODOS</option>
                                        <option value="Congresso">CONGRESSO</option>
                                        <option value="Encontro">ENCONTRO</option>
                                        <option value="Exposicao">EXPOSIÇÃO</option>
                                        <option value="Feira">FEIRA</option>
                                        <option value="Oficina">OFICINA</option>
                                        <option value="Olimpiada">OLIMPÍADA</option>
                                        <option value="Seminario">SEMINÁRIO</option>   
                                        <option value="Simposio">SIMPÓSIO</option> 
                                        <option value="Outra">OUTROS</option>                                                                               
                                    </select>
                                </div>
                            </div>

                        <div id="eventoPerYear">
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
                                            <th width="30%">ANO</th>
                                            <th>EVENTO</th>
                                            <th>TIPO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($eventos as $e) { ?>
                                            <tr class="odd gradeX">
                                                <td data-title="ANO"  align="left"><?php echo $e->ano_inicial ?></td>
                                                <td data-title="EVENTO"><?php echo $e->nome ?></td>
                                                <td data-title="TIPO"><?php echo $e->natureza ?></td>
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
var chart = dc.barChart("#eventoPerYear");
    d3.json("<?php echo base_url('/Json/EventosPorAno'); ?>", function (error, data) {
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
    .yAxisLabel("Quantidade de Eventos")
    .xAxisLabel("Ano do Evento")
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
    function evento(tipo) {
        console.log(tipo);
        var chart = dc.barChart("#eventoPerYear");
        if(tipo!=null){
            url="<?php echo base_url('/Json/EventosPorAno/'); ?>/" + tipo;
        }else{
            url="<?php echo base_url('/Json/EventosPorAno/'); ?>/";
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
    .yAxisLabel("Quantidade de Eventos")
    .xAxisLabel("Ano do Evento")
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