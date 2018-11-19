<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/multimedialogin.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
<style>
	#multimedialogin{width:40%; margin: auto;} 
    #multimedialogin form{width:100%; margin: auto;} 
	
@media only screen and (min-width : 240px) and (max-width : 720px) {
	
	#multimedialogin{width:90%; margin: auto;} 
	 
	}
</style>
 </head>
 <body>
   <div id="multimedialogin">
   
   
  
   <?php echo form_open('Multimedialogin'); ?>
	 <header>Multimedia Login</header>
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
 
 </body>
</html>