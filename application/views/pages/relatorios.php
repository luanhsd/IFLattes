<?php defined('BASEPATH') OR exit('No direct script access allowed');
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
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4>CAMPUS CADASTRADOS</h4>
                            <div class="options">
                                <a onclick="maps()" name = "view" id="campus">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="map_campus" style="height:400px"></div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>TITULAÇÃO</h4>
                            <div class="options">
                                <a onclick="maps()" name = "view" id="qtd_titulacao">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>PUBLICAÇÃO POR CAMPUS</h4>
                            <div class="options">
                                <a onclick="maps()" name = "view" id="null">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>PUBLICAÇÃO POR TITULAÇÃO</h4>
                            <div class="options">
                                <a onclick="maps()" name = "view" id="campus">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>PUBLICAÇÃO POR TEMPO</h4>
                            <div class="options">
                                <a onclick="maps()" name = "view" id="campus">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>TEMPO DE ATUAÇÃO</h4>
                            <div class="options">
                                <a onclick="maps()" name = "view" id="campus">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>AREAS DE ATUAÇÃO/CONHECIMENTO</h4>
                            <div class="options">
                                <a onclick="maps()" name = "view" id="campus">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>AREAS DE CONHECIMENTO POR CAMPUS</h4>
                            <div class="options">
                                <a onclick="maps()" name = "view" id="campus">
                                    <i class="glyphicon glyphicon-download"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div> 
            </div>

        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content --> 


<script type="text/javascript">

    var yearRingChart = dc.pieChart("#chart-ring-year"),
            spenderRowChart = dc.rowChart("#chart-row-spenders");

    var data1 = [
        {Name: 'Mr A', Spent: 40, Year: 2011},
        {Name: 'Mr B', Spent: 10, Year: 2011},
        {Name: 'Mr C', Spent: 40, Year: 2011},
        {Name: 'Mr A', Spent: 70, Year: 2012},
        {Name: 'Mr B', Spent: 20, Year: 2012},
        {Name: 'Mr B', Spent: 50, Year: 2013},
        {Name: 'Mr C', Spent: 30, Year: 2013}
    ];

    var data2 = [
        {Name: 'Mr A', Spent: 10, Year: 2011},
        {Name: 'Mr B', Spent: 20, Year: 2011},
        {Name: 'Mr C', Spent: 50, Year: 2011},
        {Name: 'Mr A', Spent: 20, Year: 2012},
        {Name: 'Mr B', Spent: 40, Year: 2012},
        {Name: 'Mr B', Spent: 50, Year: 2013},
        {Name: 'Mr C', Spent: 50, Year: 2013}
    ];

    // data reset function (adapted)
    function resetData(ndx, dimensions) {
        dimensions.forEach(function (dim) {
            dim.filter(null);
        });
        ndx.remove();
    }

    // set crossfilter with first dataset
    var ndx = crossfilter(data1),
            yearDim = ndx.dimension(function (d) {
                return +d.Year;
            }),
            spendDim = ndx.dimension(function (d) {
                return Math.floor(d.Spent / 10);
            }),
            nameDim = ndx.dimension(function (d) {
                return d.Name;
            }),
            spendPerYear = yearDim.group().reduceSum(function (d) {
        return +d.Spent;
    }),
            spendPerName = nameDim.group().reduceSum(function (d) {
        return +d.Spent;
    }),
            spendHist = spendDim.group().reduceCount();

    function render_plots() {
        yearRingChart
                .width(200).height(200)
                .dimension(yearDim)
                .group(spendPerYear)
                .innerRadius(50);

        spenderRowChart
                .width(250).height(200)
                .dimension(nameDim)
                .group(spendPerName)
                .elasticX(true);

        dc.renderAll();
    }

    render_plots();

    // REFRESH DATA AFTER 3 SECONDS
    setTimeout(function () {
        console.log("data reset");
        resetData(ndx, [yearDim, spendDim, nameDim]);

        ndx = crossfilter(data2),
                yearDim = ndx.dimension(function (d) {
                    return +d.Year;
                }),
                spendDim = ndx.dimension(function (d) {
                    return Math.floor(d.Spent / 10);
                }),
                nameDim = ndx.dimension(function (d) {
                    return d.Name;
                }),
                spendPerYear = yearDim.group().reduceSum(function (d) {
            return +d.Spent;
        }),
                spendPerName = nameDim.group().reduceSum(function (d) {
            return +d.Spent;
        }),
                x = spendPerName,
                spendHist = spendDim.group().reduceCount();

        render_plots();
    }, 3000);

</script>
