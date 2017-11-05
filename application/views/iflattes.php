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
                            <h4>CAMPUS CADASTRADOS</h4>
                            <div class="options">
                                <?php qtd_cur(); ?>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div id="map"></div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>CURRÍCULOS</h4>
                            <div class="options">
                                <?php qtd_cur(); ?>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="table-vertical">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="table-cliente">
                                    <thead>
                                        <tr>
                                            <th width="30%">NOME</th>
                                            <th>ID</th>
                                            <th>URL</th>
                                            <th>VERSÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) { 
                                            $data=new DateTime($d->versao);
                                            ?>
                                            <tr class="odd gradeX">
                                                <td data-title="NOME"  align="left"><?php echo $d->nome; ?></td>
                                                <td data-title="ID"><?php echo $d->id; ?></td>
                                                <td data-title="URL"><a href="<?php echo 'http://lattes.cnpq.br/'.$d->id; ?>" target='blank'><?php echo  'http://lattes.cnpq.br/'.$d->id; ?></a></td>
                                                <td data-title="VERSÃO"><?php echo $data->format("d/m/Y"); ?></td>
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
      var map;
      function initMap() {
        var myOptions = {
            zoom: 7,
            center: new google.maps.LatLng(-23.5489, -46.6388),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map"), myOptions);

        $.ajax({
            url: "Json/CampusCadastrados",
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
