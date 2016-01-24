<?php

require_once realpath(dirname(__FILE__) . '/../assets/includes/config.php');
require_once BASE_PATH . '/php/simple_html_dom.php';

$address = '13360-000,Capivari';
var_dump($address);

$geocode = array();
$apikey = 'AIzaSyCIGzw3bLDxTLAgXJwvQq9ZEnie-JAAX5c';

$result = file_get_html('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false&key=' . $apikey);
//echo 'https://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false&key=' . $apikey;

$output = json_decode($result);

foreach ($output as $out) {
    var_dump($out[0]->geometry->location->lat);
    var_dump($out[0]->geometry->location->lng);
    $lat = $output->results[0]->geometry->location->lat;
    $long = $output->results[0]->geometry->location->lng;
    $geocode['lat'] = $lat;
    $geocode['long'] = $long;
}

var_dump($geocode);


