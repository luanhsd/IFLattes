<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>

    .node circle {
        fill: #999;
    }

    .node text {
        font: 10px sans-serif;
    }

    .node--internal circle {
        fill: #555;
    }

    .node--internal text {
        text-shadow: 0 1px 0 #fff, 0 -1px 0 #fff, 1px 0 0 #fff, -1px 0 0 #fff;
    }

    .link {
        fill: none;
        stroke: #555;
        stroke-opacity: 0.4;
        stroke-width: 1.5px;
    }

</style>

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
                            <h4></h4>
                            <div class="options">
                                <?php qtd_cur(); ?>
                            </div>
                        </div> 
                        <div class="panel-body">


                            <div id="grandeCount">
                                <strong>Grande Area</strong>
                                <a class="reset" href="javascript:grandeCountChart.filterAll();dc.redrawAll();" style="display: none;">reset</a>
                                <div class="clearfix"></div>

                            </div>

                            <div id="areaCount">
                                <strong>Area</strong>
                                <a class="reset" href="javascript:areaCountChart.filterAll();dc.redrawAll();" style="display: none;">reset</a>
                                <div class="clearfix"></div>
                            </div>

                            <div id="subCount">
                                <strong>Sub Area</strong>
                                <a class="reset" href="javascript:subCountChart.filterAll();dc.redrawAll();" style="display: none;">reset</a>
                                <div class="clearfix"></div>
                            </div>

                            <table class="table table-hover dc-data-table">
                            </table>
                        </div>             
                        </form> 
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->

<script>

    var grandeCountChart = dc.rowChart("#grandeCount"),
            areaCountChart = dc.rowChart("#areaCount"),
            subCountChart = dc.rowChart("#subCount"),
            visCount = dc.dataCount(".dc-data-count"),
            visTable = dc.dataTable(".dc-data-table");


    d3.json("<?php echo base_url('/Json/area'); ?>", function (err, data) {

        if (err)
            throw err;

        data.forEach(function (d) {
            d.Timestamp = new Date(d.Timestamp);
        });

        var ndx = crossfilter(data);
        var all = ndx.groupAll();

        var grandeCountDim = ndx.dimension(function (d) {
            return d["grande_area"];
        });

        var areaCountDim = ndx.dimension(function (d) {
            return d["area"];
        });

        var subCountDim = ndx.dimension(function (d) {
            return d["sub_area"];
        });

        var dateDim = ndx.dimension(function (d) {
            return d.Timestamp;
        });

        var grandeCountGroup = grandeCountDim.group();
        var areaCountGroup = areaCountDim.group();
        var subCountGroup = subCountDim.group();
        var dateGroup = dateDim.group();


        grandeCountChart
                .dimension(grandeCountDim)
                .group(grandeCountGroup)
                .elasticX(true);


        areaCountChart
                .dimension(areaCountDim)
                .group(areaCountGroup)
                .elasticX(true)
                .data(function (group) {
                    return group.top(10);
                });

        subCountChart
                .dimension(subCountDim)
                .group(subCountGroup)
                .elasticX(true)
                .data(function (group) {
                    return group.top(10);
                });

        visCount
                .dimension(ndx)
                .group(all);

        visTable
                .dimension(dateDim)

                .group(function (d) {
                    var format = d3.format('02d');
                    return d.Timestamp.getFullYear() + '/' + format((d.Timestamp.getMonth() + 1));
                })
                .columns([
                    "grande_area",
                    "area",
                    "sub_area",
                    "espec"
                ]);

        dc.renderAll();

    });
</script>

