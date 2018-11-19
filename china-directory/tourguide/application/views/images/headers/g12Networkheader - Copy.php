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
		
		<script src="<?php echo base_url(); ?>resources/bootstrap/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/admin.js"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/jquery.tinymce.js" type="text/$avascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.js" type="text/javascript"></script>
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="<?php echo base_url(); ?>resources/scripts/canvasjs.min.js"></script>
		<script src="<?php echo base_url(); ?>/resources/scripts/imagecrop.js"></script>
	
		
		<style>
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
		.modal-header{background:#ff4b5a;}
		#EDITINFORMATION{width:93%;}
		.birthday{margin-bottom:10px;}
		.Wedding_Anniversary{margin-bottom:10px;}
		.modal-footer{margin-top:25px!important;}
		#content div.box h1{border:0;}
		.expandSearch{width:150px!important;}
		#circleProgress { float:right; width:240px; display:block; }
		#progresswrapper{width:100%; margin: auto; clear:both;}
		#about_info{font-size:12px;}
		#secondNav{float:right;margin-top: -75px;height: 30px;padding: 0;}
		.nav_wrap {width:94%; margin:0 auto;}
		.modal-backdrop{display:none;}
		</style>
		
 
		
	</head>
	
<body>
<div class="page-container">
      <input type="hidden" id="base_url" value="<?php echo base_url()?>">

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
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?php echo base_url();?>Welcome/opencell" <?php echo !empty($countOpencell) ? "style='margin: 0; margin-top:14px; padding:0px;'" : '' ;?>>VIP<?php echo !empty($countOpencell) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countOpencell . '</span>' : ''; ?></a>
                    </li>
                    <li><a href="<?php echo base_url();?>Welcome/level/4">PRE<span id="liveCount_4"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/5">ENCOUNTER<span id="liveCount_5"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/6">POST<span id="liveCount_6"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/7">SOL&nbsp;1<span id="liveCount_6"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/8">SOL&nbsp;2<span id="liveCount_8"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/9">RE<span id="liveCount_9"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/10">SOL&nbsp;3<span id="liveCount_10"></span></a></li>
                    <li><a href="<?php echo base_url();?>Welcome/level/11">GRAD<span id="liveCount_11"></span></a></li>
 
                    
                </ul>
					<?php if(@$userRole =="Pastor"){ 
					
						?>
						<a  data-toggle="modal" data-target="#myModal"><img src='<?php echo base_url(); ?>avatars/searchicon.png' style='width:20px; height:20px; padding:0; margin:0; margin-top:15px;'></a>
						<?php 				
					
					} ?>
                <ul class="nav navbar-nav navbar-right">
                     <li><a href="<?php echo base_url();?>Welcome/logout">LOGOUT</a></li>
                </ul>
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
				var s = true;
				setInterval(function(){getLiveCounts()}, 5000);
				
				function getLiveCounts(){

					if(s){
						s = false;
						$(function()
						{
							$.ajax({
								url: '<?php echo base_url();?>Welcome/livecounts/<?php echo $userID;?>',
								success: function(r)
								{
									
									var c = r.split("-");
						
									for(var i = 0; i < c.length; i++) {										
										if((c[i] * 1) > 0) {
											countHTML = '<span id="liveCount_span_'+(i + 4)+'" style="position:relative; left:-10px; top:-40px; background:red; padding:4px; border-radius:10px; font-size:8px; color:#fff;">'+c[i]+'</span>';
										} else {
											countHTML = "";
										}
										
										$("#liveCount_" + (i + 4)).html(countHTML);
//										fallIn((i + 4));
									}									

									s = true;
								}
							});
							
						});
					
					}
				}
			
			
				
				function fallIn(target) {
					var top = -40;
					var t1 = setInterval(function(){
						top+=2;
						document.getElementById('liveCount_span_'+target).style.top = top + 'px';
						if(top >= -15) {
							clearInterval(t1);
						}
					},5);
				}
				
			
			var t = setTimeout(function(){getLiveCounts(); clearTimeout(t);}, 500);
			</script>
           
        </div>
    </div>
     <!--END NAV SECTION -->
	 
	 
<!-- Modal -->
<!--<div id="searchForm" class="modal fade" role="dialog">
  <div class="modal-dialog">

  
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>
		
		<form id="searchForm">
			<input type="text" name="searchdisciples" value="" placeholder="Search" style="float:left; margin-left:100px; width:50%; color:#000;">
		</form>
		<div id="listofreacords"></div>				
						</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>-->