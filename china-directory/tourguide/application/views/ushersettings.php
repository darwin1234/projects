<?php require_once('headers/HeaderUsher.php');?>
	<div class="container" style="margin-top:100px;">
		<form id="UshersSetting" action="">
			<div class="form-group">
				<input type="hidden" id="mentorID" value="<?php echo $userID; ?>" name="mentorID">
				<label>Old Password</label>
				<input type="password" name="old_password" class="form-control" value="">
				<label>New Password</label>
				<input type="password" name="new_password" class="form-control" value="">
				<label>Re Password</label>
				<input type="password" name="retype_password" class="form-control" value="">
				<input type="submit" name="submit" value="Update" class="pull-right"/>
			</div>
		
		</form>
	

	</div>
<?php require_once('footers/FooterUsher.php');?>