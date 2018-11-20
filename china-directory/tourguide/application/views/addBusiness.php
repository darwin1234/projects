
	<div id="content">
	
	<div id="left">
		<div id="menu">
			<div id="image_profile">
				<span>	
					<img id="user-image-profile" onload="this.style.opacity = 1" src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo $userID; ?>" style="border-radius:40px; height:40px; width:40px; margin-top:0px; padding:0;">
				</span>
				<span style="font-size:12px;">
					<strong>Hello, <?php echo @$first_name; ?></strong>
				</span>
			</div>		
			<?php if(isset($settings) && $setting ='display'){?>		
				<h6 id="h-menu-events"><a href="<?php echo base_url(); ?>Welcome"><i class="dsfont fa fa-home" aria-hidden="true"></i>Dashboard</a></h6>
					<ul id="menu-events" class="closed">
						<li class="last"><a href="<?php echo base_url(); ?>Welcome/newEvent">Users</a></li>
					</ul>
					<h6 id="h-menu-settings"><a href="#settings"><i class="dsfont fas fa-folder-plus"></i>Pages</a></h6>
					<h6 id="h-menu-settings"><a href="<?php echo base_url(); ?>Welcome/businesslist"><i class="dsfont fas fa-list-alt"></i>Business Lists</a></h6>
				<?php } ?>
		
		</div>
					
	</div>
						
			
			<!-- end content / left -->
			<!-- content / right -->
			<div id="right">
				<!-- table -->
				<div class="box">
					<!-- box / title -->
					<div class="title"><h3>Add Business</h3></div>
						
						<div class="row" style="float:left; width:900px; margin-left:10px;">
							<form action="<?php echo base_url();?>Actions/Create" method="POST">
							  <div class="form-group">
								<label for="business_name">Business Name:</label>
								<input type="text" class="form-control" id="business_name" name="business_name">
							  </div>
							  
							  <div class="form-group">
								<label for="business_owner">Business Owner:</label>
								<input type="text" class="form-control" id="business_owner" name="business_owner"> 
							  </div>
								<input type="hidden" class="form-control" id="business_latide" name="business_latitude"> 
								<input type="hidden" class="form-control" id="business_longitude" name="business_longitude"> 
							  <div class="form-group">
								<label for="business_address">Business Address:</label>
								<input type="text" class="form-control" id="business_address" name="business_address">
							  </div>
							   <div class="form-group">
								<label for="business_category">Business Category:</label>
								<select class="form-control" id="business_category" name="business_category">
									<option value="Dentistry">Dentistry</option>
									<option value="Beauty Salon">Salon</option>
									<option value="Flower Shop">Flower Shop</option>
								</select>
							  </div>
							  
							  <div class="form-group">
								<input type="calendar" name="publish_date">
							  </div>
							  <div class="form-group">
								 <input type="file" name="business_image" accept="images/*">
							  </div>
								
							  <div class="form-group">
								<div id="mapdd" style="position: relative; height:300px; width: 100%"></div>
							  </div>
							
								<!-- for future use
								<div class="form-group">
								<label for="contactno">Description:</label>
								<textarea class="form-control" id="Description"></textarea>
								</div>
								-->
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
