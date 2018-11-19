<!DOCTYPE html>
<html lang="en">
<head>
  <title>Multimedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylefront.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/bootstrapfront.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/font-awesome.minfront.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/multimedia.css"> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/guestform.css">     
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>

  <style>
  .modal-backdrop {display:none;}

  
  @media only screen and (max-width: 1024px) and (min-width: 240px){
	  
	 .events {
		width: 90%!important;
		margin: auto;
		margin-top: 22px!important;
		overflow:auto;
	} 
  }
   @media only screen and (width: 1024px) and (orientation : landscape) {
	    .events {
		width: 100%!important;
		margin: auto;
		margin-top: 22px!important;
	} 
   }

  </style>
 </head>
 
<body>

		 <!-- NAV SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>ushers/multimedia">MULTIMEDIA</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">

                    <li><a href="<?php echo base_url();?>Multimedia/Templates">TEMPLATES</a></li>
                    <!--<li><a href="<?php echo base_url();?>Multimedia/Schedules">SCHEDULES</a></li>-->
                    <li><a href="<?php echo base_url();?>Multimedia/UpcomingEvents">UPCOMING EVENTS</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal_changepass">CHANGE PASSWORD</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">					
					<li><a href="<?php  echo base_url(); ?>Ushers/logout">LOGOUT</a></li>
					</ul>
<!-- Modal -->
<div id="myModal_changepass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
	   <form name="frmChange" id="change_password" class="form-signin" method="POST" action="#">

  <div class="form-group">
	<label for="userID"></label>
	<input type="hidden" class="form-control" name="userID" value= "<?php echo $userID; ?>">
	<label for="OldPassword">OldPassword</label>
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
  </ul	>
</div>

                    <!--<li><a href="<?php echo base_url();?>Multimedia/WebMaintenance">WEBSITE MAINTENANCE</a></li>-->
                    <!--<li><a href="<?php  echo base_url(); ?>Ushers/vipform">Settings</a></li>-->
					

              

             
           <!-- <li>

              <div class="dropdown">
                    <a href="#"><img src="<?php echo base_url(); ?>/avatars/dropdown.png"></a>
                <div class="dropdown-content">
                    <a href="<?php  echo base_url(); ?>Ushers/vipform">Settings</a>
                    <a href="<?php  echo base_url(); ?>Ushers/logout">Logout</a>
                </div>
              </div>-->

             

            
         


            </div>
           
        </div>
  </div>
 