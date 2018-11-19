<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ushering</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylefront.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/bootstrapfront.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/font-awesome.minfront.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/report.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/guestform.css">			
		<script src="<?php echo base_url(); ?>resources/bootstrap/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
				<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/guestform.js"></script>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
		<style>
		#searchListDisplay{list-style:none; margin:0;}
		#searchListDisplay li{margin:0; padding:0; border:1px solid #ccc;}
		.ui-icon-closethick{display:none!important;}
		.ui-button-icon-only{display:none!important;}
		.modal-backdrop{display:none;}
		</style>
		  
</head>

<body>
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">

		 <!-- NAV SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="<?php echo base_url();?>Welcome">G12 NETWORK</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?php  echo base_url(); ?>Welcome/vipform">FORM</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                     <li><a href="<?php echo base_url();?>Welcome/logout">LOGOUT</a></li>
                </ul>
                </div>
                
        <!-- Modal -->
<div id="myModal_changepass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
	   <form name="frmChange" id="change_password_ushers" class="form-signin" method="POST" action="#">

  <div class="form-group">
	<label for="userID"></label>
	<input type="hidden" class="form-control" name="userID" value= "<?php echo $userID; ?>">
	<label for="OldPassword">Old Password</label>
	<input type="password" class="form-control" id="OldPassword" placeholder="Old Password" name="OldPassword">
    <label for="InputPassword2">New Password</label>
    <input type="password" class="form-control" id="InputPassword2" placeholder="New Password" name="newPassword">
     <label for="InputPassword3">Confirm New Password</label>
    <input type="password" class="form-control" id="InputPassword3" placeholder="Confirm Password" name="confirmPassword">  </div>
   <center><button class="btn btn-lrg btn-default" type="submit" value="send" >Change it</button></center>


      </div>


      </form>
         </div>
    </div>

  </div>
		
		</div>


            </div>
           
        </div>
  </div>
  <div id="confirmation"></div>