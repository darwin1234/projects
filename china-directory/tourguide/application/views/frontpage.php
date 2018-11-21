<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
  <style>
	body{padding:0; margin:0;}
  </style>
</head> 
<body>
  <?php //echo var_dump($businesslist);?>
  <div id="map" style="width: 100%; height: 600px"></div>
	
  <script type="text/javascript">
  
    var locations = [
      <?php  $count = 0; 
	  foreach($businesslist as $businessItems){?>['<?php echo $businessItems->business_name; ?>',  <?php echo $businessItems->dslong; ?>,  <?php echo $businessItems->dslat; ?>, <?php echo $count++;?>],<?php } ?>
	  
	];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>