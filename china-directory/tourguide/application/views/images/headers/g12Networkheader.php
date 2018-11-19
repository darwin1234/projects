<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CCCG12System</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/style.css" media="screen" />
		<link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/colors/blue.css" />
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
		<script src="<?php echo base_url(); ?>resources/bootstrap/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/jquery.tinymce.js" type="text/$avascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.js" type="text/javascript"></script>
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="<?php echo base_url(); ?>resources/scripts/canvasjs.min.js"></script>
	
		<script src="<?php echo base_url(); ?>/resources/scripts/anim.js"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/admin.js"></script>
		
	
		
		<style>
		body{background:url('<?php echo base_url();?>avatars/bg.png'); margin:0; padding:0;}
		 .selected{font-size:14px;} 
		 .title {font-size:14px;}
		 .date{fon-size:14px;}
		 #list_of_data_records_list{margin:0; padding:0;}
		 #list_of_data_records_list li{margin:5px; display:inline-table;}
		 #list_of_data_records_list li img{width:100px!important; height:100px!important;}
		 #dialog-confirm{display:none;}
		 #content div.box table{margin-bottom:20px;}
		 .modal-header{overflow:auto; padding:0;}
		 .canvasjs-chart-credit{display:none!important;}
		 .modal-title{color:#FFF!important;}
		 h1#Event_Title{padding:0!important; border:0!important;}
		@media (min-width: 768px) and (max-width: 1024px) {
		    .navbar-collapse.collapse {
		        display: none !important;
		    }
		    .navbar-collapse.collapse.in {
		        display: block !important;
		    }
		    .navbar-header .collapse, .navbar-toggle {
		        display:block !important;
		    }
		    .navbar-header {
		        float:none;
		    }
		   .navbar-nav > li {
			    float: left;
			    width: 100%!important;
			    clear:both;
			}
			.navbar-nav{float:left!important; clear:both;}
			.navbar-nav li a{font-size:18px;}
			#circleProgress {margin: 0 auto; width:100%!important; display:block; }

		}
		@media only screen and (min-width: 240px) and (max-width: 1024px){
			.pepsol{width:100%!important;}
			#input{display:none;}
			.searchclick{display:none;}
			#circleProgress {margin: 0 auto; width:100%!important; display:block; }
		}
		body.modal-open {
			  position: fixed;
			  top: 0;
			  right: 0;
			  bottom: 0;
			  left: 0;
			  overflow-y: scroll;
			}
		.modal-content{border:0;}
		.modal-title{border:0; text-align:center; font-size:26px; border:0; margin:0!important; padding:16px 0 16px 0!important; width:100%;}
		.modal-header{background:#2B86EC;}
		#EDITINFORMATION{width:93%;}
		.birthday{margin-bottom:10px;}
		.Wedding_Anniversary{margin-bottom:10px;}
		.modal-footer{margin-top:25px!important;}
		#content div.box h1{border:0;}
		.expandSearch{width:150px!important;}
		#circleProgress {width: 96%; display: block; margin: 0 auto;background: #fff; overflow: auto; }
		#progresswrapper{width:100%; margin: auto; clear:both;}
		
		#about_info{font-size:11px;}
		#secondNav{float:right;margin-top: -75px;height: 30px;padding: 0;}
		.nav_wrap {width:94%; margin:0 auto;}
		.modal-backdrop{display:none;}
		.navbar-inverse{background:#222222!important;}
		#main_menu > li {border-right: 1px solid #393939;}
		#content div.box table th{background:#fff!important;}
		.table a, .table th a{color:#000; text-decoration:none; font-weight:400;}
		#about_info li{line-height:30px;}
		#about_info i{margin-right:3px; color:#000; font-size:12px; text-decoration:none; font-weight:400;}
		#main_menu{margin-top:5px; margin-bottom:5px;}
		#main_menu li{width:90px; height:50px;}
		#main_menu li a{text-align:center;}
		#main_menu{width:75%;}
		#picFrame{position:absolute; clear:both; width:120px;}
		#picFrame h4{color:#000; text-align:center; line-height:15px; padding:0; margin:0; font-size: 12px;font-weight: 700;  word-wrap: break-word;}
		.inner_pages{background:#fff;}
		#camera{position: absolute; height: 45px;  width:100%; margin:0;  padding:10px; display:block; border-right:5px solid #00376E;  border-left:5px solid #00376E; bottom:5px!important;}
		#image_profile:hover #camera{background: rgba(0, 0, 0, 0.8);}
		#image_profile:hover #uploadImage{color:#fff!important; display:block!important; margin-right:20px; margin-top:-5px; font-size:15px;}	
		#about_info li{clear:both;}
		#about_info li strong{float:right; width:90%;}
		.EditAccountInformation input,.EditAccountInformation select  {border: 2px solid #2B86EC;}
		#listofrecords .table a, .table th a{color:#CC0000!important;}
		#listofrecords .table a, .table th a:hover {color:#2B86EC!important;}
		.action{width:100%;}
		
		
		@media (max-width: 1250px) {
			.navbar-header {
				float: none;
			}
			.navbar-toggle {
				display: block;
			}

			.navbar-collapse {
				border-top: 1px solid transparent;
				box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
			}
			.navbar-collapse.collapse {
				display: none!important;
			}
			.navbar-nav {
				float: none!important;
				margin: 7.5px -15px;
			}
			.navbar-nav>li { 
				float: none;
			}
			.navbar-nav>li>a {
				padding-top: 10px;
				padding-bottom: 10px;
			}
			.navbar-text {
				float: none;
				margin: 15px 0;
			}
			/* since 3.1.0 */
			.navbar-collapse.collapse.in { 
				display: block!important;
			}
			.collapsing {
				overflow: hidden!important;
			}
		}
		</style>
		
 
		
	</head>
	
<body>
<div class="page-container">
      <input type="hidden" id="base_url" value="<?php echo base_url()?>">

			 <!-- NAV SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div id="menu_contain" class="container" style="width:93%!important;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>Welcome">G12 NETWORK</a>
            </div>
            <div class="navbar-collapse collapse">
			<?php 	
			@$countOpencell = 0;
			@$countpre      = 0;
			@$countenc      = 0;
			@$countpost     = 0;
			@$countsol1     = 0;
			@$countsol2     = 0;
			@$countre       = 0;
			@$countsol3     = 0;
			@$countgrad     = 0;
			@$id 			= '';
			if(isset($getRecordsDisplay)){
				foreach($getRecordsDisplay as $getData){
		
					if($getData->mentor_id == @$userID){
						if($getData->ranking==1 && $getData->active != 1){
							@$countOpencell++;
						}

						if($getData->ranking==4 && $getData->active != 1){
							@$countpre++;
						}

						if($getData->ranking==5 && $getData->active != 1){
							@$countenc++;
						}

						if($getData->ranking==6 && $getData->active != 1){
							@$countpost++;
						}

						if($getData->ranking==7 && $getData->active != 1){
							@$countsol1++;
						}

						if($getData->ranking==8 && $getData->active != 1){
							@$countsol2++;
						}

						if($getData->ranking==9 && $getData->active != 1){
							@$countre++;
						}

						if($getData->ranking==10 && $getData->active != 1){
							@$countsol3++;
						}

						if($getData->ranking==11 && $getData->active != 1){
							@$countgrad++;
						}

					
					}
				}
				
			}

				?>
                <ul id="main_menu" class="nav navbar-nav navbar-left">
                    <li><a href="<?php echo base_url();?>Welcome/vip/<?php echo $userID;?>">VIP<span id="liveCount_3"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/4/<?php echo $userID;?>">PRE<span id="liveCount_4"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/5/<?php echo $userID;?>">ENC<span id="liveCount_5"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/6/<?php echo $userID;?>">POST<span id="liveCount_6"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/7/<?php echo $userID;?>">SOL&nbsp;1<span id="liveCount_7"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/8/<?php echo $userID;?>">SOL&nbsp;2<span id="liveCount_8"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/9/<?php echo $userID;?>">RE<span id="liveCount_9"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/10/<?php echo $userID;?>">SOL&nbsp;3<span id="liveCount_10"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/11/<?php echo $userID;?>">GRAD<span id="liveCount_11"></span></a></li>
				
                    
                </ul>
					<a href="<?php echo base_url();?>Welcome/logout"><i class="fa fa-power-off" style="font-size:25px; margin-top:14px; text-decoration:none; color:#fff;" aria-hidden="true"></i></a>
             
            </div>
			
	

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<h4 class="modal-title">Search</h4>
				  </div>
				  <div class="modal-body">
					<input type='text' id='pastor_search' name='pastor_search' placeholder='Search' style='top:11px; border:1px solid #ccc; height: 31px; font-size: 14px; padding-left: 10px; clear:both; color:#000; width:100%;'>
					<div id='listofrecordsdatainfo' style=' width: 100%; background: #fff;  top: 37px;'></div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
			
			<script type="text/javascript">
				window.addEventListener('load', function(){
					var success = true;
					var counts = [0, 0, 0, 0, 0, 0, 0, 0];
					var fallInQueue = [];
					var animDone = true;
			
					function getLiveCounts(){
						if(success){
							success = false;
							$(function()
							{
								$.ajax({
									url: '<?php echo base_url();?>Welcome/livecounts/<?php echo $userID;?>',
									success: function(r)
									{
										
										var c = r.split("-");
							
										for(var i = 0; i < c.length; i++) {
											
											if( (c[i] * 1) != counts[i] ) {
												counts[i] = c[i] * 1;
												
												if(counts[i] > 0) {
													countHTML = '<span id="liveCount_span_'+(i + 3)+'" style="position:relative; left:12px; top:-47px; /*background: #e02424;*/  background:#FF7519; padding: 2px 6px; color: #fff; font: bold .9em Tahoma, Arial, Helvetica; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px;">'+counts[i]+'</span>';
												} else {
													countHTML = "";
												}
												
												$("#liveCount_" + (i + 3)).html(countHTML);
												var anim = new fallIn('liveCount_span_'+(i + 3), -47, -17);
												asyncAnimQueue.push(anim);
											}

											
										}

										success = true;
									}
								});
								
							});
						
						}
					}
				
				getLiveCounts();
				setInterval(function(){getLiveCounts()}, 5000);
				});
			</script>
           
        </div>
    </div>
     <!--END NAV SECTION -->
	 