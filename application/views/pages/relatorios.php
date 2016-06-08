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
                            <h4>Maps</h4>
                            <div class="options">
                            </div>
                        </div> 
                        <div class="panel-body">                
                            <div id="map" style="height: 400px"></div>
                        </div>
                        <div class="panel-footer">
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
            url: "Maps/getEndereco",
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