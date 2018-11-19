<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/sollogin.css">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
	
   <style>
	#g12login{width:40%; margin: auto;} 
    #g12login form{width:100%; margin: auto;} 
	
@media only screen and (min-width : 240px) and (max-width : 720px) {
	
	#g12login{width:90%; margin: auto;} 
	 
	}
   </style>
 </head> 
 <body>
 <div id="g12login">

   <?php echo form_open('Sollogin'); ?>
	 <header>SOL Login</header>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
		<?php echo validation_errors(); ?>
     <br/>
     <input type="submit" id="button" value="Login"/>
   </form>
</div>


		<!-- dialog Box -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 </body>
</html>