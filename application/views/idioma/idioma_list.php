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

                            <div class="options">
                                <?php qtd_cur(); ?>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <div class="col-sm-3">
                                    <select class="form-control" id="source" name="idioma" onchange="idioma(this.value)">  
                                        <option value="">SELECT</option>
                                        <?php foreach ($idiomas as $i) { ?>
                                            <option value="<?php echo $i->idioma; ?>"><?php echo $i->idioma; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <br/>
                            <div id="leituraType" class="col-md-6">
                                <strong id="leitura"></strong>
                                <a class="reset" href="javascript:leituraChart.filterAll();leituraChart.redrawAll();" style="display: none;">reset</a>
                                <div class="clearfix"></div>
                            </div>
                            <div id="falaType" class="col-md-6">
                                <strong id="fala"></strong>
                                <a class="reset" href="javascript:falaChart.filterAll();dc.redrawAll();" style="display: none;">reset</a>
                                <div class="clearfix"><br /></div>
                            </div>
                            <br/>
                            <div id="escritaType" class="col-md-6">
                                <strong id="escrita"></strong>
                                <a class="reset" href="javascript:escritaChart.filterAll();dc.redrawAll();" style="display: none;">reset</a>
                                <div class="clearfix"><br /></div>
                            </div>
                            <div id="compreensaoType" class="col-md-6">
                                <strong id="compreensao"></strong>
                                <a class="reset" href="javascript:compreensaoChart.filterAll();dc.redrawAll();" style="display: none;">reset</a>
                                <div class="clearfix"><br /></div>
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
                                            <th width="30%">DOCENTE</th>
                                            <th>DATA</th>
                                            <th>IDIOMA</th>
                                            <th>LE</th>
                                            <th>FALA</th>
                                            <th>ESCREVE</th>
                                            <th>COMPREENDE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) { ?>
                                            <tr class="odd gradeX">
                                                <td data-title="DOCENTE"  align="left"><?php echo $d->nm_user ?></td>
                                                <td data-title="DATA"><?php echo $d->data_cadastro ?></td>
                                                <td data-title="IDIOMA"><?php echo $d->idioma ?></td>
                                                <td data-title="LE"><?php echo $d->le ?></td>
                                                <td data-title="FALA"><?php echo $d->fala ?></td>
                                                <td data-title="ESCREVE"><?php echo $d->escreve ?></td>
                                                <td data-title="COMPREENDE"><?php echo $d->compreende ?></td>
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
    function idioma(idioma) {
        $('#leitura').html("Leitura");
        $('#fala').html("Fala");
        $('#escrita').html("Escrita");
        $('#compreensao').html("Compreensão");
        var leituraChart = dc.pieChart("#leituraType");
        var falaChart = dc.pieChart("#falaType");
        var escritaChart = dc.pieChart("#escritaType");
        var compreensaoChart = dc.pieChart("#compreensaoType");

        d3.json("<?php echo base_url('/Json/IdiomaLeitura/'); ?>/" + idioma, function (error, experiments) {

            var ndx = crossfilter(experiments),
                    runDimension = ndx.dimension(function (d) {
                        return d.le;
                    })
            speedSumGroup = runDimension.group().reduceSum(function (d) {
                return d.qtd;
            });
            leituraChart
                    .slicesCap(4)
                    .innerRadius(100)
                    .externalLabels(50)
                    .externalRadiusPadding(50)
                    .drawPaths(true)
                    .dimension(runDimension)
                    .group(speedSumGroup)
                    .legend(dc.legend());
            // example of formatting the legend via svg
            // http://stackoverflow.com/questions/38430632/how-can-we-add-legends-value-beside-of-legend-with-proper-alignment
            leituraChart.on('pretransition', function (chart) {
                chart.selectAll('.dc-legend-item text')
                        .text('')
                        .append('tspan')
                        .text(function (d) {
                            return d.name;
                        })
                        .append('tspan')
                        .attr('x', 100)
                        .attr('text-anchor', 'end')
                        .text(function (d) {
                            return d.data;
                        });
            });
            leituraChart.render();
        });
        
        d3.json("<?php echo base_url('/Json/IdiomaFala/'); ?>/" + idioma, function (error, experiments) {

            var ndx = crossfilter(experiments),
                    runDimension = ndx.dimension(function (d) {
                        return d.fala;
                    })
            speedSumGroup = runDimension.group().reduceSum(function (d) {
                return d.qtd;
            });
            falaChart
                    .slicesCap(4)
                    .innerRadius(100)
                    .externalLabels(50)
                    .externalRadiusPadding(50)
                    .drawPaths(true)
                    .dimension(runDimension)
                    .group(speedSumGroup)
                    .legend(dc.legend());
            // example of formatting the legend via svg
            // http://stackoverflow.com/questions/38430632/how-can-we-add-legends-value-beside-of-legend-with-proper-alignment
            falaChart.on('pretransition', function (chart) {
                chart.selectAll('.dc-legend-item text')
                        .text('')
                        .append('tspan')
                        .text(function (d) {
                            return d.name;
                        })
                        .append('tspan')
                        .attr('x', 100)
                        .attr('text-anchor', 'end')
                        .text(function (d) {
                            return d.data;
                        });
            });
            falaChart.render();
        });
        
        d3.json("<?php echo base_url('/Json/IdiomaEscrita/'); ?>/" + idioma, function (error, experiments) {

            var ndx = crossfilter(experiments),
                    runDimension = ndx.dimension(function (d) {
                        return d.escreve;
                    })
            speedSumGroup = runDimension.group().reduceSum(function (d) {
                return d.qtd;
            });
            escritaChart
                    .slicesCap(4)
                    .innerRadius(100)
                    .externalLabels(50)
                    .externalRadiusPadding(50)
                    .drawPaths(true)
                    .dimension(runDimension)
                    .group(speedSumGroup)
                    .legend(dc.legend());
            // example of formatting the legend via svg
            // http://stackoverflow.com/questions/38430632/how-can-we-add-legends-value-beside-of-legend-with-proper-alignment
            escritaChart.on('pretransition', function (chart) {
                chart.selectAll('.dc-legend-item text')
                        .text('')
                        .append('tspan')
                        .text(function (d) {
                            return d.name;
                        })
                        .append('tspan')
                        .attr('x', 100)
                        .attr('text-anchor', 'end')
                        .text(function (d) {
                            return d.data;
                        });
            });
            escritaChart.render();
        });
        
        d3.json("<?php echo base_url('/Json/IdiomaCompreensao/'); ?>/" + idioma, function (error, experiments) {

            var ndx = crossfilter(experiments),
                    runDimension = ndx.dimension(function (d) {
                        return d.compreende;
                    })
            speedSumGroup = runDimension.group().reduceSum(function (d) {
                return d.qtd;
            });
            compreensaoChart
                    .slicesCap(4)
                    .innerRadius(100)
                    .externalLabels(50)
                    .externalRadiusPadding(50)
                    .drawPaths(true)
                    .dimension(runDimension)
                    .group(speedSumGroup)
                    .legend(dc.legend());
                    
            // example of formatting the legend via svg
            // http://stackoverflow.com/questions/38430632/how-can-we-add-legends-value-beside-of-legend-with-proper-alignment
            compreensaoChart.on('pretransition', function (chart) {
                chart.selectAll('.dc-legend-item text')
                        .text('')
                        .append('tspan')
                        .text(function (d) {
                            return d.name;
                        })
                        .append('tspan')
                        .attr('x', 100)
                        .attr('text-anchor', 'end')
                        .text(function (d) {
                            return d.data;
                        });
            });
            compreensaoChart.render();
        });
    }
</script>
