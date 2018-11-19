<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
		$(function(){
			
				$("#retrievepassword").on("submit",function(e){
					
					alert(1);
					e.preventDefault();
					
				});
			
		});
	
	</script>
	
</head>
<body>  
<div class="container">
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



</body>
</html>