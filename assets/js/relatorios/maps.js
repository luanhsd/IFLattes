function maps() {
    var map;
    var url; // url do metodo php que retorna a consulta com o db
    var id; //identificação da div onde ira ser gerado o map
    var element = document.getElementsByName("view");
    $(element).click(function () {
        var id = this.id;
        switch (id) {
            case 'campus':
                var url = "/IFLattes/Relatorios/getCampus";
                var id = 'map_campus';
                break;
        }
        var myOptions = {
            zoom: 7,
            center: new google.maps.LatLng(-23.5489, -46.6388),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById(id), myOptions);



        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    var markerOptions = {
                        map: map,
                        position: new google.maps.LatLng(data[i].lat, data[i].long),
                        title: data[i].local
                    };
                    marker = new google.maps.Marker(markerOptions);

                    var iw = new google.maps.InfoWindow();
                    var content = data[i].content;

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
    });
}

