<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	if(!empty(@$active_account)){
		foreach(@$active_account as $activeAccountFields) { 
			@$photo 				= $activeAccountFields->profile_pic;
			@$imagePIC				= $activeAccountFields->image_pic;
			@$LeaderName 			= $activeAccountFields->first_name . ' ' . $activeAccountFields->maiden_name . ' ' . $activeAccountFields->last_name;
			@$first_name			= $activeAccountFields->first_name;
			@$maiden_name			= $activeAccountFields->maiden_name;
			@$last_name				= $activeAccountFields->last_name;
			@$EmailAddress			= $activeAccountFields->email;
			@$CellNumber			= $activeAccountFields->contact;
			@$CivilStatus			= $activeAccountFields->civil_status;
			@$Work					= $activeAccountFields->work;
			@$Address				= $activeAccountFields->address;
			@$Role					= $activeAccountFields->role;
			@$Gender				= $activeAccountFields->Gender;
			@$birthmonth			= $activeAccountFields->birthmonth;
			@$birthdate				= $activeAccountFields->birthdate;
			@$birthyear				= $activeAccountFields->birthyear;
			@$wedding_month			= $activeAccountFields->wedding_month;
			@$wedding_date			= $activeAccountFields->wedding_date;
			@$wedding_year			= $activeAccountFields->wedding_year;
			@$spouse_name			= $activeAccountFields->spouse_name;
			
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Dashboard</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/style.css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylefront.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/bootstrapfront.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/font-awesome.minfront.css">
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>images/fav.png"/>
	
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/mobile.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/imagecrop.css">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<script>
			var baseURL = "<?php echo base_url();?>";
		</script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.js" type="text/javascript"></script>
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="<?php echo base_url(); ?>resources/scripts/canvasjs.min.js"></script>
	
		<script src="<?php echo base_url(); ?>/resources/scripts/anim.js"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/admin.js"></script>
		
		<style>
		.left{width:300px; float:left;}
		#image_profile{width:90%; margin:20px auto;}
		#image_profile img {margin-right:10px;}
		.dsfont{font-size:25px; margin-right:10px;}
		.myaccount{margin-top:15px; width:180px;}
		.myaccount strong{font-size:12px;}
		.myacc {margin-top: -2px; display: block; float: left;}
		.myacc2{font-size:10px; margin-left:5px;}
		.addbusinessbtn{margin-top:-25px; display:block; margin-left: 28px;}
		.image{float:left; width:23.3%; background:green; height:200px; margin:5px; }
		.myaccount{position:relative; width:150px;}
		.myaccountdropdown{width:140px; background:#fff; position:absolute; top:24px; display:none;}
		.myaccountdropdown ul{text-align:left;}
		.myaccountdropdown li a{padding:5px; display:block; text-decoration:none;}
		</style>		
	</head>
	
<body>
<div class="page-container">
      <input type="hidden" id="base_url" value="<?php echo base_url()?>">

			 <!-- NAV SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top" style="background:#82D2B4!important; boder-color:#82D2B4!important;">
        <div id="menu_contain" class="container" style="width:93%!important;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>Welcome">TourGuide</a>
            </div>
            <div id="myaccount" class="myaccount navbar-collapse collapse pull-right">
				<a href="#"><strong><i class="myacc dsfont fas fa-user-circle"></i><?php echo @$first_name; ?></strong>
				<i class="myacc2 fas fa-arrow-down"></i>
				<div id="myaccountdropdown" class="myaccountdropdown">
					<ul>
						<li><a href="#">My Account</a></li>
						<li><a href="<?php echo base_url();?>administrator/logout">Logout</a></li>
					</ul>
				</div>
				</a>
			</div>
			

           
        </div>
    </div>
     <!--END NAV SECTION -->
	 