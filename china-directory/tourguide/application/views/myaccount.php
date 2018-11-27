<script src="<?php echo base_url(); ?>/resources/scripts/imagecrop.js"></script>
<?php
	$item = (array)$list_of_records;
	$personalAcc			= (array)$active_account[0];
	$first_name 			= $personalAcc['first_name'];
	$activeIDD				= $personalAcc['id_no'];
	$photo 					= $personalAcc['profile_pic'];
	$maiden_name			= $personalAcc['maiden_name'];
	$last_name				= $personalAcc['last_name'];
	$email					= $personalAcc['email'];
	$contactno 				= $personalAcc['contact'];
	$CivilStatus			= $personalAcc['civil_status'];
	$Address				= $personalAcc['address'];
	$Role					= $personalAcc['role'];
	$Gender					= $personalAcc['Gender'];
	$birthmonth				= $personalAcc['birthmonth'];
	$birthdate				= $personalAcc['birthdate'];
	$birthyear				= $personalAcc['birthyear'];
	?> 
<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/circle.css">
<input type="hidden" id="user-gender" value="<?php echo $Gender; ?>">
<script src="<?php echo base_url(); ?>administrator/scripts/ajax.js"></script>
<script src="<?php echo base_url(); ?>administrator/scripts/search.js"></script>
<div id="content">
	<!-- end content / left -->
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
<div id="right"> 
	<div id="box-tabs" class="box">
			<div class="title"><h3>My Account</h3></div>
				<div class="row" style="float:left; width:900px; margin-left:10px;">
							<ul class="basicinfo">
								<li><a href="<?php echo base_url();?>account">Basic Info</a></li>
								<li><a href="<?php echo base_url();?>account/changepassword">Change Password</a></li>
								<li><a href="#">Change Avatar</a></li>
							</ul>
							<form action="<?php echo base_url();?>account/updateaccount" method="POST">
							  <input type="hidden" name="imagefile" id="imagefile" value="">
							  <div class="form-group">
								<label for="Firstname">Firstname:</label>
								<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $first_name;?>">
							  </div>
							  
							  <div class="form-group">
								<label for="lastname">Lastname:</label>
								<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $last_name;?>"> 
							  </div>
							  <div class="form-group" style="">
								<label for="business_address">Address:</label>
								<input type="text" class="form-control" id="address" name="address" value="<?php echo $Address; ?>">
							  </div>
							  <div class="form-group" style="">
								<label for="Email">Email:</label>
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>">
							  </div>
							    <div class="form-group" style="">
								<label for="business_address">Contact No:</label>
								<input type="text" class="form-control" id="contactno" name="contactno" value="<?php echo $contactno; ?>">
							  </div>
							

							
							

							 <div class="form-group">
							  <div style="width:100%; height:40px;"></div>
							  <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
							  </div>
							  <div style="width:100%; height:40px;"></div>
							</form>
						</div>
					
	</div>
</div>		

