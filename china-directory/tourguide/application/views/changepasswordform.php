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
					
<form role="form" id="retrievepassword">
	
  <div class="form-group">
    <label for="New_Password">New Password:</label>
    <input type="password" class="form-control" id="new_password">
	 <label for="Retype_Password">Retype Password:</label>
    <input type="password" class="form-control" id="retype_password">
  </div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>


						</div>
					
	</div>
</div>		

