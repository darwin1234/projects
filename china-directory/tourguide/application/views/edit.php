<script src="<?php echo base_url(); ?>/resources/scripts/imagecrop.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/circle.css">
<script src="<?php echo base_url(); ?>Welcome/scripts/ajax.js"></script>
<script src="<?php echo base_url(); ?>Welcome/scripts/search.js"></script>

<?php
	if(!empty(@$active_account)){
		foreach(@$active_account as $activeAccountFields) { 
		@$activeIDD				= $activeAccountFields->id_no;
		@$photo 				= $activeAccountFields->profile_pic;
		@$LeaderName 			= $activeAccountFields->first_name . ' ' . $activeAccountFields->maiden_name . ' ' . $activeAccountFields->last_name;
		@$first_name			= $activeAccountFields->first_name;
		@$maiden_name			= $activeAccountFields->maiden_name;
		@$last_name				= $activeAccountFields->last_name;
		@$EmailAddress			= $activeAccountFields->email;
		@$contactno 			= $activeAccountFields->contact;
		@$CivilStatus			= $activeAccountFields->civil_status;
		@$Work					= $activeAccountFields->work;
		@$Address				= $activeAccountFields->address;
		@$BirthDate				= $activeAccountFields->birthday;
		@$Role					= $activeAccountFields->role;
		@$Gender				= $activeAccountFields->Gender;
		@$birthmonth			= $activeAccountFields->birthmonth;
		@$birthdate				= $activeAccountFields->birthdate;
		@$birthyear				= $activeAccountFields->birthyear;
		}
	}
	$item = (array)$list_of_records;
  ?>
										
	

		<div id="content">
			<!-- end content / left -->
				<!-- end content / left -->
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
					<?php foreach ($item as $items) : ?>
					<div class="title"><h3>Edit Business</h3></div>
						
						<div class="row" style="float:left; width:900px; margin-left:10px;">
							<form action="<?php echo base_url();?>Actions/edit/<?php echo $items->business_id; ?>" method="POST">
							
							  <div class="form-group">
								<label for="business_name">Business Name:</label>
								<input type="text" class="form-control" id="business_name" name="business_name" value="<?php echo $items->business_name; ?>">
							  </div>
							  
							  <div class="form-group">
								<label for="business_owner">Business Owner:</label>
								<input type="text" class="form-control" id="business_owner" name="business_owner" value="<?php echo $items->business_owner; ?>"> 
							  </div>
								<input type="hidden" class="form-control" id="business_latide" name="business_latitude" value="<?php echo $items->business_latitude; ?>"> 
								<input type="hidden" class="form-control" id="business_longitude" name="business_longitude" value="<?php echo $items->business_longitude; ?>"> 
							  <div class="form-group" style="display:none;">
								<label for="business_address">Business Address:</label>
								<input type="text" class="form-control" id="business_address" name="business_address">
							  </div>
							   <div class="form-group">
								<label for="business_category">Business Category:</label>
								<select class="form-control" id="business_category" name="business_category" value="<?php echo $items->business_category; ?>">
									<option <?php if ($items->business_category=='Dentistry')   { echo "selected";} ?> value="Dentistry">Dentistry</option>
									<option <?php if ($items->business_category=='Beauty Salon') { echo "selected"; } ?> value="Beauty Salon">Salon</option>
									<option <?php if ($items->business_category=='Flower Shop') { echo "selected"; } ?> value="Flower Shop">Flower Shop</option>
								</select>
							  </div>
							  
							  
							  <div class="form-group">
								<a href="#">Select Photo</a>
							  </div>
							  	<div class="control-group"> 
								<div class="control-label"><label>Search: </label></div>
								<input id="autocomplete" class="form-control" placeholder="Enter your address" onfocus="geolocate()" type="text"  autocomplete="on" >
							</div>
							<div class="control-group"> 
								<div class="control-label"><label>Street Number: </label> </div>
								<input type='text' class="form-control" id="street_number" name="street_number" value="<?php echo $items->street_number; ?>">
							</div> 
							<div class="control-group">
								<div class="control-label"><label>Address:</label></div>
								<input type='text'class="form-control" id="route" name="route"  value="<?php echo $items->route; ?>">
							</div>
							<div class="control-group">
								<div class="control-label"><label>City: </label></div>
								<input class="form-control" id="locality" name="locality" class="form-control" value="<?php echo $items->locality; ?>">
							</div>
							<div class="control-group">
								<div class="control-label"><label>State: </label></div>
								<input  id="administrative_area_level_1" name="administrative_area_level_1" class="form-control" value="<?php echo $items->administrative_area_level_1; ?>">
							</div>
							<div class="control-group">
								<div class="control-label"><label>Zip code: </label></div>
								<input id="postal_code" name="postal_code" class="form-control" value="<?php echo $items->postal_code; ?>">
							</div>
							<div class="control-group">
								<div class="control-label"><label>Country: </label></div>
								<input class="form-control" id="country" name="country" value="<?php echo $items->country; ?>">	
							</div>
							<div class="control-group" style="display:block;">
								
								<input aria-invalid="false"  type="hidden" class="field" id="dslat" name="dslat" style="margin-left:15px;" value="<?php echo $items->dslat; ?>">
							</div>
							<div class="control-group" style="display:block;">
							
								<input aria-invalid="false" type="hidden" class="field" id="dslong" name="dslong" style="margin-left:15px;" value="<?php echo $items->dslong; ?>">
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
					<?php endforeach; ?>
						</div>
					
			
			
				
					<script type="text/javascript">
					function initMap(){
						var myLatLng={lat:15.16976850000001,lng:121}
						var map	  =	new google.maps.Map(document.getElementById('mapdd'),{zoom:10,center:myLatLng});
						var marker = new google.maps.Marker({position:myLatLng,map:map,title:'Hello World!'});
					}
					
				</script>
				
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

		