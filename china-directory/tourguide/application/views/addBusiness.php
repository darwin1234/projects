
	<div id="content">
	
	<div id="left">
					<div id="menu">
						<div id="image_profile">
							<span>	
								<img id="user-image-profile" onload="this.style.opacity = 1" src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo $userID; ?>" style="border-radius:40px; height:40px; width:40px; margin-top:20px; padding:0;">
							</span>
							<span>
								<strong>Hello, <?php echo @$first_name; ?></strong>
							</span>
						</div>		
					
							<h6 id="h-menu-events"><a href="<?php echo base_url(); ?>Welcome">Dashboard</a></h6>
								<ul id="menu-events" class="closed">
									<li class="last"><a href="<?php echo base_url(); ?>Welcome/newEvent">Users</a></li>
								</ul>
								<h6 id="h-menu-settings"><a href="#settings"><span>Pages</span></a></h6>
								<h6 id="h-menu-settings"><a href="<?php echo base_url(); ?>Welcome/businesslist"><span>Business Lists</span></a></h6>
						
					
					</div>
								
		</div>
					
			
			<!-- end content / left -->
			<!-- content / right -->
			<div id="right">
				<!-- table -->
				<div class="box">
					<!-- box / title -->
					<div class="title"><h3>Edit Business</h3></div>
						
						<div class="row" style="float:left; width:900px; margin-left:10px;">
							<form action="#">
							  <div class="form-group">
								<label for="title">Business Title:</label>
								<input type="text" class="form-control" id="title" name="title" value=""> 
								
							  </div>
							  <div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" value="<?php echo @$EmailAddress; ?>">
							  </div>
							   <div class="form-group">
								<label for="contactno">Contact No:</label>
								<input type="tel" class="form-control" id="contactno" value="<?php echo @$contactno;?>">
							  </div>
							  
							  <div class="form-group">
								<label for="contactno">Choose Category:</label>
								<textarea class="form-control" id="category">
								</textarea>
							  </div>
							  <div class="form-group">
								 <input type="file" name="file" value="">
							  </div>
								
							  <div class="form-group">
								<div id="mapdd" style="position: relative; height:300px; width: 100%"></div>
							  </div>
							
								<div class="form-group">
								<label for="contactno">Description:</label>
								<textarea class="form-control" id="Description"></textarea>
							  </div>
							
							 <div class="form-group">
							  <div style="width:100%; height:40px;"></div>
							  <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
							  </div>
							  <div style="width:100%; height:40px;"></div>
							</form>
						</div>
					
						
			
				
				

				
				<script type="text/javascript">
					function initMap(){
						var myLatLng={lat:15.16976850000001,lng:121}
						var map	  =	new google.maps.Map(document.getElementById('mapdd'),{zoom:10,center:myLatLng});
						var marker = new google.maps.Marker({position:myLatLng,map:map,title:'Hello World!'});
					}
					
				</script>
					
				<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAD2cR8koCwjb3_IM5G5hBQ_XpPcxHvKU&callback=initMap"></script>
