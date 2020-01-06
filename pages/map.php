<?php
$title = "Map";
include_once "../inc/header.php";
include_once "../inc/head.php";
?>
  <body>
    <!--The div element for the map -->
    <div id="map"></div>

<?php
//ZIP_code, street_name and house_nr from the database -> <a href="../pages/map.php?address='.$value['ZIP_code'].$value['street_name'].'">
if (isset($_GET['address'])){
    $address = $_GET['address'];
    $stripped = str_replace(' ', '', $address);
}

require_once 'RESTful.php';//from the API DAY2 Prework
$url = 'https://maps.googleapis.com/maps/api/geocode/xml?address='.$stripped.'&key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M';
$response = curl_get($url);
$xml = simplexml_load_string($response);
$lat = $xml->result->geometry->location->lat;
$lng =  $xml->result->geometry->location->lng;

include_once "../inc/footer.php";

    echo "<script>

      var map;
      var standort = {lat:". $lat.", lng:".$lng."}
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: standort,
          zoom: 14
        });
        var marker = new google.maps.Marker({position: standort, map:map});
      }

    </script>";
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap"
async defer></script>

</body>
</html>