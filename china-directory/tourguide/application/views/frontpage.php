<html>
<head>
	<title>Tourguide</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-">
	<meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?php echo base_url();?>resources/map/leaflet.css" rel="stylesheet">
	<script src="<?php echo base_url();?>resources/map/leaflet.js"></script>
	<link href="<?php echo base_url();?>resources/map/map.css" rel="stylesheet">

	<style>
	body{padding:0;margin:0;}
		.olFramedCloudPopupContent{overflow:hidden!important;}
		#search{position:absolute; top:120px; z-index:11111; left:3%;  width:93%;}
		#search #search_text{width:100%; height:50px; padding-left:20px;}
		.nearby{position:absolute; bottom:0px; width:100%; z-index:11111; height:50px; background:#379ADD; color:#fff;}
		#menu{z-index:11111; width:100%; height:50px; background:#379ADD; padding:0; margin:0;}
		#menu ul{padding:0; margin:0; list-style:none;}
		#menu ul li {float:left; width:50%; text-align:center;}
		#menu ul li a{color:#fff; color:#fff; font-size:20px; line-height:50px; text-align:center; text-decoration:none;}
		#map{margin-top:50px;}
	</style>
</head>
  <body>

   <div id="search">
		<form action="" method="POST">
		<input type="text" name="search_text" id="search_text" placeholder="Where do you like to go?" style="text-align:center;" />
		<div id="result"></div>
	
		</form>
   </div>
   	<button class="nearby" id="Nearby">Search Nearby</button>
    <div style="clear:both"></div>
<<<<<<< HEAD
=======
   <script>
		 function load_data(query)
		 {
		  $.ajax({
		   url:"<?php echo base_url(); ?>actions/search",
		   method:"POST",
		   data:{query:query},
		   success:function(data){
			$('#result').html(data);
		   }
		  })
		 }
		 $('#search_text').keyup(function(event){
		  var search = $(this).val();
		  if(search != '')
		  {
		   load_data(search);
		  } 
		  else{
			  $("#result").slideToggle();
		  }
			e.stopPropagation()
		 	});   			
	</script>
  <div id="mapdiv">
	
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/2.11/lib/OpenLayers.js"></script> 
  <script>
  
  </script>
  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());
    
    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)
   
    var lonLat = new OpenLayers.LonLat(116.363625 ,39.913818 ).transform(epsg4326, projectTo);
          
    
    var zoom=14;
    map.setCenter (lonLat, zoom);
>>>>>>> 7b89267358d391291300ca6e7dec81da766e81f3

	<div id="menu">
		<ul>
			<li><a href="#">Map</a></li>
			<li><a href="#">Listing</a></li>
		</ul>	
	</div>

	<div id="map"></div>
	
	<script src="<?php echo base_url();?>resources/map/map.js"></script>

</body>
</html>
    