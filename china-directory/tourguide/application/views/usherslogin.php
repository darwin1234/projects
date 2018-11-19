<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/usherslogin.css">
  	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
  <style>
	#usherslogin{width:40%; margin: auto;} 
    #usherslogin form{width:100%; margin: auto;} 
	@media only screen and (min-width : 240px) and (max-width : 720px) {
		
		#usherslogin{width:90%; margin: auto;} 
	 
	}
		 </style>
  
 </head>
 <body>
    <div id="usherslogin">

   <?php echo form_open('Usherlogin'); ?>
 
	 <header>Backtrack Login</header>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
	 <?php echo validation_errors(); ?>
     <br/> 
     <input type="submit" id="button" value="Login"/>
	
   </form>
   		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</div>
 </body>
 
 <script src="<?php echo base_url(); ?>resources/scripts/usherslogin.js"></script>
</html>