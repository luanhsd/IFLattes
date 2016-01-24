<?php
require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/php/simple_html_dom.php';
require_once BASE_PATH . '/dao/EnderecoDAO.php';

$EnderecoDAO = new EnderecoDAO();

global $result;

$result =$EnderecoDAO->GetCampus();

//var_dump($result[1]);

$EnderecoDAO->GetGeoCode($result[1]->cidade);

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
        </style>
        <script type="text/javascript"
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIGzw3bLDxTLAgXJwvQq9ZEnie-JAAX5c">
        </script>
        <script type="text/javascript">
            var json = <?php echo $result ?>;
            
            function initialize() {
                var myLatlng = new google.maps.LatLng(-23.682818703499485, -46.5952992);
                var mapOptions = {
                    zoom: 6,
                    center: {lat: -23.682818703499485, lng: -46.5952992}
                }
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


                for (var i = 0, length = json.length; i < length; i++) {
                    var data = json[i],
                            latLng = new google.maps.LatLng(data.lat, data.long);

                    // Creating a marker and putting it on the map
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map,
                        title: data.cidade
                    });
                }
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
        <div id="map-canvas"></div>
    </body>
</html>
