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
                            <h4>RELATÓRIOS</h4>
                        </div>
                        <div class="panel-body">
                            <div id="accordioninpanel" class="accordion-group">
                                <div class="accordion-item">
                                    <a class="accordion-title" data-toggle="collapse" data-parent="#accordioninpanel" href="#collapseinOne"><h4>CAMPUS CADASTRADOS</h4></a>
                                    <div id="collapseinOne" class="collapse">
                                        <div id="map" style="height: 400px"></div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a class="accordion-title" data-toggle="collapse" data-parent="#accordioninpanel" href="#collapseinTwo"><h4>TITULAÇÃO</h4></a>
                                    <div id="collapseinTwo" class="collapse">
                                        <div>
                                            <div id="chart-ring-year"></div>
                                            <div id="chart-row-spenders"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a class="accordion-title" data-toggle="collapse" data-parent="#accordioninpanel" href="#collapseinThree"><h4>PUBLICAÇÃO POR CAMPUS</h4></a>
                                    <div id="collapseinThree" class="collapse">
                                        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a class="accordion-title" data-toggle="collapse" data-parent="#accordioninpanel" href="#collapseinFour"><h4>PUBLICAÇÃO POR TITULAÇÃO</h4></a>
                                    <div id="collapseinFour" class="collapse">
                                        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a class="accordion-title" data-toggle="collapse" data-parent="#accordioninpanel" href="#collapseinFive"><h4>PUBLICAÇÃO POR TEMPO</h4></a>
                                    <div id="collapseinFive" class="collapse">
                                        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a class="accordion-title" data-toggle="collapse" data-parent="#accordioninpanel" href="#collapseinSix"><h4>TEMPO DE ATUAÇÃO</h4></a>
                                    <div id="collapseinSix" class="collapse">
                                        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a class="accordion-title" data-toggle="collapse" data-parent="#accordioninpanel" href="#collapseinSeven"><h4>AREAS DE ATUAÇÃO/CONHECIMENTO</h4></a>
                                    <div id="collapseinSeven" class="collapse">
                                        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <a class="accordion-title" data-toggle="collapse" data-parent="#accordioninpanel" href="#collapseinEight"><h4>AREAS DE CONHECIMENTO POR CAMPUS</h4></a>
                                    <div id="collapseinEight" class="collapse">
                                        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content --> 
<script>
    var map; // Global declaration of the map    

    function initialize()
    {
        var myOptions = {
            zoom: 7,
            center: new google.maps.LatLng(-23.5489, -46.6388),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map"), myOptions);

        $.ajax({
            url: "Relatorios/getEndereco",
            dataType: "json",
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    var markerOptions = {
                        map: map,
                        position: new google.maps.LatLng(data[i].latitude, data[i].longitude),
                        title: data[i].local
                    };
                    marker = new google.maps.Marker(markerOptions);

                    var iw = new google.maps.InfoWindow();
                    var content = "<b>" + data[i].cidade + "<b>";

                    google.maps.event.addListener(marker, 'click', (function (marker, content, iw) {
                        return function () {
                            iw.setContent(content);
                            iw.open(map, marker);
                        };
                    })(marker, content, iw));



                }
            }
        }
        );
    }
</script>


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