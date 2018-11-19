<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgot Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body >
 


  

  <?php if(isset($_GET['hash'])) { ?>
		<?php if(@$hash_data  == $_GET['hash']) {  ?>
		<form action="" method="POST">
			<label for="newpassword">New Password</label>
			<input type="password" name="new_password" class="form-control" value="">
			<label for="newpassword">Retype Password</label>
			<input type="password" name="retype_password" class="form-control" value="">
			<input type="submit" name="change_password" class="btn btn-default" value="Change Password">
		</form>	
		<?php } ?>
  <?php } else{?>
	
	 
		<div class="container" style="margin-top:150px;">
			<div class="row">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="text-center">
								  <h3><i class="fa fa-lock fa-4x"></i></h3>
								  <h2 class="text-center">Forgot Password?</h2>
								  <p>You can reset your password here.</p>
									<div class="panel-body">
									  
									  <form class="form" action="<?php echo base_url();?>ForgotPassword" method="POST">
										<h2><?php echo @$response; ?></h2>
										<fieldset>
										  <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
											  
											 <input type="email" class="form-control" id="email" name="useremail" placeholder="Enter email">
											</div>
										  </div>
										  <div class="form-group">
											<input class="btn btn-lg btn-primary btn-block"  name="Retrieve" value="Retrieve My Password" type="submit">
										  </div>
										</fieldset>
									  </form>
									  
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
 
  
  <?php } ?>

 
</body>
</html>

