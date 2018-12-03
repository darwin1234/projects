	<script src="<?php echo base_url(); ?>/resources/scripts/imagecrop.js"></script>
<?php
$item = (array)$list_of_records;
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

<script src="<?php echo base_url(); ?>administrator/scripts/ajax.js"></script>

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
			<form action="" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload Image" name="submit" id="mainupload">
			</form>

	</div>
</div>		

