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

                            <div id="formacaoType">
                                <strong>Legenda</strong>
                                <a class="reset" href="javascript:chart.filterAll();dc.redrawAll();" style="display: none;">reset</a>
                                <div class="clearfix"><br /></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->

<script>
    var chart = dc.pieChart("#formacaoType");
    d3.json("<?php echo base_url('/Json/countFormacao'); ?>", function (error, data) {
        console.log(data);
        var ndx = crossfilter(data),
                NivelDimension = ndx.dimension(function (d) {
                    return d.nivel;
                })
        QTDSumGroup = NivelDimension.group().reduceSum(function (d) {
            return d.qtd;
        });
        chart
                .width(900)
                .height(480)
                .dimension(NivelDimension)
                .group(QTDSumGroup)
                .legend(dc.legend())
                // workaround for #703: not enough data is accessible through .label() to display percentages
                .on('pretransition', function (chart) {
                    chart.selectAll('text.pie-slice').text(function (d) {
                        return dc.utils.printSingleValue((d.endAngle - d.startAngle) / (2 * Math.PI) * 100) + '%';
                    })
                }
                );
        chart.render();
    });
</script>