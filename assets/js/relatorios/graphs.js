function graphs(id) {
        switch (id) {
            case 'qtd-titulacao':
                var url = "/IFLattes/Relatorios/getQTDTitulacao";
                var id = 'graph_titulacao';
                break;
            case 'areas_atuacao':
                var url = "/IFLattes/Relatorios/getAreas";
                var id = 'graph_areas';
                break;
        }

        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                console.log(data);
                var result = Array();
                for (var i = 0; i < data.length; i++) {
                    result[i] = {Name: data[i].nivel, Spent: data[i].qtd};
                }
                //console.log(result);

            }
        }
        );
}



/*
 *   
 
 
 
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
 */