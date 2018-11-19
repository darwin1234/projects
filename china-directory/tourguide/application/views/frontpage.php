<html>
<head>
<style>
body{margin:0; padding:0;}
</style>
</head>
<body>
<div id="mapdd" style="position: relative; height:100%; width: 100%"></div>
<script>function initMap(){var myLatLng={lat:15.16976850000001,lng:121}
	;var map=new google.maps.Map(document.getElementById('mapdd'),{zoom:10,center:myLatLng});var marker=new google.maps.Marker({position:myLatLng,map:map,title:'Hello World!'});}</script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAD2cR8koCwjb3_IM5G5hBQ_XpPcxHvKU&callback=initMap"></script>
</body>
</html>	