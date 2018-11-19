
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	
</head>
<body>  
<div class="container">

</div>

		<div class="container" style="margin-top:150px;">
			<div class="row">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="text-center">
								  <h3><i class="fa fa-lock fa-4x"></i></h3>
								  <h2 class="text-center">Change your password</h2>
								 
									<div class="panel-body">
									  
									  <form class="form" action="<?php echo base_url();?>ForgotPassword/changePassword" method="POST">
										<fieldset>
										  <div class="form-group">
											
											<label for="New Password" class="pull-left">New Password</label>
											<input type="password" name="new_password"  class="form-control" value="">
											
										  </div>
										  <div class="form-group">
											
												<label for="Retype Password" class="pull-left">Retype Password</label>
												<input type="password" name="retype_password"  class="form-control" value="">
											
										  </div>
										  <div class="form-group">
												<input type="submit" class="btn btn-primary" name="submit" value="Change Password"/>
										  </div>
										</fieldset>
										<h3><?php echo @$response; ?></h3>
									  </form>
									  
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



</body>
</html>