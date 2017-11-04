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
                            <h4>CURRÍCULOS</h4>
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
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 2,
          center: new google.maps.LatLng(2.8,-187.3),
          mapTypeId: 'terrain'
        });

        // Create a <script> tag and set the USGS URL as the source.
        var script = document.createElement('script');
        // This example uses a local copy of the GeoJSON stored at
        // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        script.src = '<?php echo base_url('/Json/CampusCadastrados'); ?>';
        document.getElementsByTagName('head')[0].appendChild(script);
      }

      // Loop through the results array and place a marker for each
      // set of coordinates.
      window.eqfeed_callback = function(results) {
        console.log(results);
        for (var i = 0; i < results.features.length; i++) {
          var coords = results.features[i].geometry.coordinates;
          var latLng = new google.maps.LatLng(coords[1],coords[0]);
          var marker = new google.maps.Marker({
            position: latLng,
            map: map
          });
        }
      }
</script>
