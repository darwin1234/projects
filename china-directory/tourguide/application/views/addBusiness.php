<?php
if(!empty(@$active_account)){
		foreach(@$active_account as $activeAccountFields) { 
		@$activeIDD				= $activeAccountFields->id_no;
		@$photo 				= $activeAccountFields->profile_pic;
		
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
							<form action="<?php echo base_url();?>/Actions/createQuery" method="post">
							  <div class="form-group">
								<label for="title">Business Name:</label>
								<input type="text" class="form-control" id="title" name="business_name" value=""> 
								
							  </div>
							  <div class="form-group">
								<label for="email">Business Owner:</label>
								<input type="text" class="form-control" id="business_owner" name="business_owner">
							  </div>
							   <div class="form-group">
								<input type="hidden" class="form-control" id="business_latitude" name="business_latitude">
							  </div>
							  <div class="form-group">
								<input type="hidden" class="form-control" id="business_longitude" name="business_longitude">
							  </div>
							  
							  <div class="form-group">
								<label for="business_category">Business Category:</label>
								<select class="form-control" name="business_category" id="category">
								<option value="Dentist">Dentistry</option>
								<option value="Beauty Salon">Beauty Salon</option>
								<option value="Dentist">Hiking</option>
								</select>
							  </div>
							  
							  <div class="form-group">
								<label for="address">Business Address</label>
							  <input type="text" class="form-control" id="business_address" name="business_address">
							  </div>
								
							   <div class="form-group">
								<label for="status">Business Status</label>
							  <input type="text" class="form-control" id="business_status" name="business_status">
							  </div>
								
							  <div class="form-group">
								<label for="publish_date">Publish Date</label>
							  <input type="text" class="form-control" id="publish_date" name="publish_date">
							  </div>
								
							  	
							  <div class="form-group">
								<div id="mapdd" style="position: relative; height:300px; width: 100%"></div>
							  </div>
							
								<!--<div class="form-group">
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
