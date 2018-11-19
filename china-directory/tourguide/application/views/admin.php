	<script src="<?php echo base_url(); ?>/resources/scripts/imagecrop.js"></script>
<?php
	if(!empty(@$active_account)){
		foreach(@$active_account as $activeAccountFields) { 
			@$photo 				= $activeAccountFields->profile_pic;
			@$imagePIC				= $activeAccountFields->image_pic;
			@$LeaderName 			= $activeAccountFields->first_name . ' ' . $activeAccountFields->maiden_name . ' ' . $activeAccountFields->last_name;
			@$first_name			= $activeAccountFields->first_name;
			@$maiden_name			= $activeAccountFields->maiden_name;
			@$last_name				= $activeAccountFields->last_name;
			@$EmailAddress			= $activeAccountFields->email;
			@$CellNumber			= $activeAccountFields->contact;
			@$CivilStatus			= $activeAccountFields->civil_status;
			@$Work					= $activeAccountFields->work;
			@$Address				= $activeAccountFields->address;
			@$Role					= $activeAccountFields->role;
			@$Gender				= $activeAccountFields->Gender;
			@$birthmonth			= $activeAccountFields->birthmonth;
			@$birthdate				= $activeAccountFields->birthdate;
			@$birthyear				= $activeAccountFields->birthyear;
			@$wedding_month			= $activeAccountFields->wedding_month;
			@$wedding_date			= $activeAccountFields->wedding_date;
			@$wedding_year			= $activeAccountFields->wedding_year;
			@$spouse_name			= $activeAccountFields->spouse_name;
			
		}
	}
	?> 
<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/circle.css">
<input type="hidden" id="user-gender" value="<?php echo $Gender; ?>">
<script src="<?php echo base_url(); ?>Welcome/scripts/ajax.js"></script>
<script src="<?php echo base_url(); ?>Welcome/scripts/search.js"></script>
<div id="content">
	<!-- end content / left -->
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
		<?php if(isset($settings) && $setting ='display'){?>		
			<h6 id="h-menu-events"><a href="<?php echo base_url(); ?>Welcome">Dashboard</a></h6>
				<ul id="menu-events" class="closed">
					<li class="last"><a href="<?php echo base_url(); ?>Welcome/newEvent">Users</a></li>
				</ul>
				<h6 id="h-menu-settings"><a href="#settings"><span>Pages</span></a></h6>
				<h6 id="h-menu-settings"><a href="<?php echo base_url(); ?>Welcome/businesslist"><span>Business Lists</span></a></h6>
			<?php } ?>
	
	</div>
				
</div>
<div id="right"> 
	<div id="box-tabs" class="box">
					
	</div>
</div>		

