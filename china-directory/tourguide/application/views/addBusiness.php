<?php
	$item = (array)$list_of_records;
	$dslong = "";
	$dslat  = "";
	$personalAcc			= (array)$active_account[0];
	$first_name 			= $personalAcc['first_name'];
	$activeIDD				= $personalAcc['id_no'];
	$photo 					= $personalAcc['profile_pic'];
	$LeaderName 			= $personalAcc['first_name'] . ' ' . $personalAcc['maiden_name'] . ' ' . $personalAcc['last_name'];
	$maiden_name			= $personalAcc['maiden_name'];
	$last_name				= $personalAcc['last_name'];
	$EmailAddress			= $personalAcc['email'];
	$contactno 				= $personalAcc['contact'];
	$CivilStatus			= $personalAcc['civil_status'];
	$Work					= $personalAcc['work'];
	$Address				= $personalAcc['address'];
	
	$Role					= $personalAcc['role'];
	$Gender					= $personalAcc['Gender'];
	$birthmonth				= $personalAcc['birthmonth'];
	$birthdate				= $personalAcc['birthdate'];
	$birthyear				= $personalAcc['birthyear'];
?> 
	<div id="content">
	
<div id="left">
	<div id="menu">
		<div id="image_profile">
			<span>	
				<img id="user-image-profile" onload="this.style.opacity = 1" src="<?php echo base_url(); ?>administrator/userimage2/<?php echo $userID; ?>" style="border-radius:40px; height:40px; width:40px; margin-top:0px; padding:0;">
			</span>
			<span style="font-size:12px;">
				<strong>Hello, <?php echo @$first_name; ?></strong>
			</span>
		</div>		
		<?php if(isset($settings) && $setting ='display'){?>		
			<h6 id="h-menu-events"><a href="<?php echo base_url(); ?>administrator"><i class="dsfont fa fa-home" aria-hidden="true"></i>Dashboard</a></h6>
				<ul id="menu-events" class="closed">
					<li class="last"><a href="<?php echo base_url(); ?>administrator/newEvent">Users</a></li>
				</ul>
				<h6 id="h-menu-settings"><a href="<?php echo base_url(); ?>administrator/media"><i class="dsfont fas fa-folder-plus"></i>Media</a></h6>
				<h6 id="h-menu-settings"><a href="#settings"><i class="dsfont fas fa-folder-plus"></i>Pages</a></h6>
				<h6 id="h-menu-settings"><a href="<?php echo base_url(); ?>administrator/businesslist"><i class="dsfont fas fa-list-alt"></i>Business Lists</a></h6>
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
							  <input type="hidden" name="imagefile" id="imagefile" value="">
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
							  <div class="form-group" style="display:none;">
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
								<button type="button" id="loadmedia" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Select Image
								</button>
								<div id="imgcontainer">
								</div>
							  </div>
							  	<div class="control-group"> 
								<div class="control-label"><label>Search: </label></div>
								<input id="autocomplete" class="form-control" placeholder="Enter your address" onfocus="geolocate()" type="text"  autocomplete="off">
							</div>
							<div class="control-group"> 
								<div class="control-label"><label>Street Number: </label> </div>
								<input type='text' class="form-control" id="street_number" name="street_number" value="">
							</div> 
							<div class="control-group">
								<div class="control-label"><label>Address:</label></div>
								<input type='text'class="form-control" id="route" name="route"  value="">
							</div>
							<div class="control-group">
								<div class="control-label"><label>City: </label></div>
								<input class="form-control" id="locality" name="locality" class="form-control" value="">
							</div>
							<div class="control-group">
								<div class="control-label"><label>State: </label></div>
								<input  id="administrative_area_level_1" name="administrative_area_level_1" class="form-control" value="">
							</div>
							<div class="control-group">
								<div class="control-label"><label>Zip code: </label></div>
								<input id="postal_code" name="postal_code" class="form-control" value="">
							</div>
							<div class="control-group">
								<div class="control-label"><label>Country: </label></div>
								<input class="form-control" id="country" name="country" value="">	
							</div>
							<div class="control-group" style="display:block;">
								
								<input aria-invalid="false"  type="hidden" class="field" id="dslat" name="dslat" style="margin-left:15px;" value="">
							</div>
							<div class="control-group" style="display:block;">
							
								<input aria-invalid="false" type="hidden" class="field" id="dslong" name="dslong" style="margin-left:15px;" value="">
							</div>
								
							

							 <div class="form-group">
							  <div style="width:100%; height:40px;"></div>
							  <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
							  </div>
							  <div style="width:100%; height:40px;"></div>
							</form>
						</div>
					
						
			
				
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<div id="imagelists">
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" id="addimage" class="addimage">Add Image</button>
						  </div>
						</div>
					  </div>
					</div>	

				
	
				
<script>
  var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
		var lat = place.geometry.location.lat();
		document.getElementById("dslat").value = lat;
			// get lng
		var lng = place.geometry.location.lng()
		document.getElementById("dslong").value= lng ;
        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
		
		document.getElementById("dsaddress").value = document.getElementById("street_number").value;
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
</script>				
					
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Mw47t0olm54GFx6Vc0O1CgJDL8hRCmg&amp;libraries=places&amp;callback=initAutocomplete" async="" defer=""></script>