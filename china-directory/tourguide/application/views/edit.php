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
  ?>
										


		<div id="content">
			<!-- end content / left -->
				<!-- end content / left -->
			<div id="left">
				<div id="menu">
					<div id="image_profile">
						<a data-toggle="modal" data-target="#changeprofile" style="position:relative; display:block;">
					   
					   <span style="background-image: url('<?php echo base_url(); ?>Welcome/images/loading2.gif'); background-position: center center; height: 50px; background-repeat: no-repeat; font-size: 100px;">
							<img id="user-image-profile" onload="this.style.opacity = 1" src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo $activeIDD; ?>" style="opacity: 1; width:100%; border: 5px solid #00376E; margin:0; padding:0; ">
					   </span>
					  
						 
						<p id="camera" ><i class="fa fa-camera" aria-hidden="true" style="font-size:20px; color:#ccc;"></i><span id="uploadImage" style="color:transparent; font-size:12px; float:right;">Update Profile Picture</span></p>
				
					   
					   </a>
					   
					   <div id="changeprofile" class="modal fade" role="dialog" style="z-index:11111;">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header" style="height:50px; overflow:hidden;background:#F6F7F9;">
										<button type="button" class="close" style="margin:15px;" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" style="margin-left:10px!important; text-align:left; color:#4B4F56!important; font-size:15px; padding:5px;"><strong>Edit Picture</strong></h4>
							  </div>
							  <div class="modal-body">
								<p>  <form id="imagePicChange" class="imagePicChange"  enctype="multipart/form-data">
										<div class="imageBox">
											<div class="thumbBox"></div>
											<div class="spinner" style="display: none">Loading...</div>
										</div>
										<div class="action">
											<input type="file" id="file" style="float:left; width: 250px">
											<input type="submit" id="btnCrop" value="Crop and Save" style="float: right; background: #4267B2; border: 0; color: #fff; padding: 3px; font-weight: 700;">
											<input type="button" id="btnZoomIn" value="+" style="float: right;">
											<input type="button" id="btnZoomOut" value="-" style="float: right;">
										</div>
										
										<div class="cropped" style="">

										</div>
									
										
										
									</form>
								</p>
							  </div>
							 <div style="height:30px;"></div>
							</div>

						  </div>
						</div>
						
						
					   
					</div>		
					
					
					<h6 id="h-menu-settings"><a href="#settings"><span>Settings</span></a></h6>
					<ul id="menu-settings" class="closed">
						<li><a href="javascript:void()"  data-toggle="modal" data-target="#editAccount" >Edit Info</a></li>
						<li style="display: none"><a href="javascript:void()" data-toggle="modal" data-target="#editusername">Change Username</a></li>
						<li class="last" style="display: none"><a href="javascript:void()" data-toggle="modal" data-target="#editpassword">Change Password</a></li>
					</ul>
					<h6 id="h-menu-products"><a href="<?php echo base_url(); ?>Welcome/insights/<?php echo $activeIDD; ?>"><span>Insights</span></a></h6>
					
				</div>   
				
				<ul  id="about_info" style="width:95%; float:right; font-weight:bold;">
					<li><h4>About</h4></li>
					<?php if(!empty(@$Role)){ ?>
					<li><i class="fa fa-user" aria-hidden="true"></i> 			<strong><?php echo $getRole;?> </strong></li>
					<?php } ?>
					<?php if(!empty(@$EmailAddress)){ ?>
					<li><i class="fa fa-envelope" aria-hidden="true"></i>		<strong><?php echo @$EmailAddress;?></strong></li>
					<?php } ?>
					<?php if(!empty(@$CellNumber)){ ?>
					<li><i class="fa fa-phone" aria-hidden="true"></i>   		<strong><?php echo @$CellNumber; ?></strong></li>
					<?php } ?>
					<?php if(!empty(@$CivilStatus)){ ?>
					<li><i class="fa fa-heart" aria-hidden="true"></i> 			<strong><?php echo @$CivilStatus;?></strong></li>
					<?php } ?>
					<?php if(!empty(@$Work)){ ?>
					<li><i class="fa fa-briefcase" aria-hidden="true"></i>		<strong><?php echo @$Work; ?></strong></li>	
					<?php } ?>
					<?php if(!empty(@$Address)){ ?>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i> 	<strong><?php echo @$Address; ?></strong></li>
					<?php } ?>
					<?php if(!empty(@$birthmonth)  &&  !empty(@$birthdate) && !empty(@$birthyear)){ ?>
					<li><i class="fa fa-birthday-cake" aria-hidden="true"></i>	<strong><?php echo @$birthmonth . "-" . @$birthdate	. '-' . @$birthyear; ?></strong></li>		
					<?php } ?>
				</ul>
				
				
			
				
			

				
			
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
								<input type="text" class="form-control" id="title" name="title" value="<?php echo !empty($LeaderName) ?  $LeaderName : '' ?>"> 
								
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
