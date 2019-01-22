<html>
<head>
	<title>Tourguide</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-">
	<meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?php echo base_url();?>resources/map/leaflet.css" rel="stylesheet">
	<script src="<?php echo base_url();?>resources/map/leaflet.js"></script>
	<link href="<?php echo base_url();?>resources/map/map.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	 
	<style>
	body{padding:0;margin:0;}
	.mainApp{position:relative; overflow:auto; width:100%; overflow:auto;}
		.olFramedCloudPopupContent{overflow:hidden!important;}
		#search{position:absolute; top:120px; z-index:11111; left:3%;  width:93%;}
		#search #search_text{width:100%; height:50px; padding-left:20px;}
		.btnfoot{width:33.3%; padding:0; margin:0; float:left;}
		#menu{display:none; z-index:11111; width:100%; height:50px; background:#379ADD; padding:0; margin:0;}
		#menu ul{padding:0; margin:0; list-style:none;}
		#menu ul li {float:left; width:50%; text-align:center;}
		#menu ul li a{color:#fff; color:#fff; font-size:20px; line-height:50px; text-align:center; text-decoration:none;}
		#map{margin-top:50px;}
	#footer{clear:both; width:100%;}	
	</style>
</head>
  <body>
   <div class="mainApp">
	   <div id="search" style="display:none;">
			<form action="" method="POST">
			<input type="text" name="search_text" id="search_text" placeholder="Where do you like to go?" style="text-align:center;" />
			<div id="result"></div>
		
			</form>
	   </div>
	   
		
		
		<div style="clear:both"></div>

<<<<<<< HEAD
		<div id="menu">
			<ul>
				<li><a href="#">Map</a></li>
				<li><a href="#">Listing</a></li>
			</ul>	
		</div>

		<div id="map"></div>
		
		
		
	</div>
	<div id="footer">
		<button class="btnfoot" id="Nearby">Listing</button>
		<button class="btnfoot" id="Nearby">Search Nearby</button>
	</div>
=======
   <div id="search">
		<input type="text" name="search_text" id="search_text" placeholder="Where do you like to go?" style="text-align:center;" />
		<div id="result" style="display:none;"></div>
	
   </div>
   	<button class="nearby" id="Nearby">Search Nearby</button>
    <div style="clear:both"></div>

	<div id="map"></div>
	<div id="menu">
		<ul>
			<li><a href="#">Map</a></li>
			<li><a href="#">Listing</a></li>
		</ul>	
	</div>
	
	<script>
$(document).ready(function(){

 load_data();
  
 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Actions/search",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
  $("#result").css("display","block");
   load_data(search);
  }
	else{
		$("#result").css("display","none");
		load_data(search);
	}
 });
});
</script>

	
>>>>>>> 7cea182ee16e3c778dd8777889afedc230328842
	<script src="<?php echo base_url();?>resources/map/map.js"></script>

</body>
</html>
    