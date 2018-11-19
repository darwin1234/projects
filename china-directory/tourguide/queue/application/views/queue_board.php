<!DOCTYPE html>
<html lang="en" ng-app="queueboardApp">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Queue Board</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>resources/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

   	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="<?php echo base_url();?>js/queueboard.js"></script>
	
    <style>
    	.missednumber span{margin:5px;}
 
    </style>
	
</head>

<body class="queueboard" ng-controller="queueboard">
	
	<!-- Page Content -->

           
			<div class="content">

				<div id="qboardhide">
				
				
				<div class="col-lg-6 alignright">
					<div class="head-title">
						<h1>MOM Services Centre</h1>
					</div>
					<div class="qboardcol">
						<table cellpadding="10" cellspacing="0" width="100%" align="center">
							<tr id="topTableLabel">
								<th width="60%"><h2>Queue number</h2></th>
								<th width="40%"><h2>Counter</h2></th>
							</tr>
							<tbody id="countqueue">


							</tbody>

							

						</table> 
					</div>
					<div class="qdatetime">
						<table cellpadding="0" cellspacing="0" width="100%" align="center">
							<tr>
								<td width="50%"><h1>27 April 2016</h1></td>
								<td width="50%"><h1>Wednesday 11.31am</h1></td>
							</tr>
						
							
						</table>
					</div>
				</div>
				<div class="col-lg-6 border-col alignleft">
					<img class="image-board" src="<?php echo base_url();?>img/board.jpg" />
					<div class="missed-header">
						<div class="queserve">
							<p class="quelabel">MISSED NUMBERS*:</p>
							<p class="missednumber"></p>
							<p class="qremarks">*If you missed your number, please check in your status again at the queue station.</p>
						</div>
						
					</div>
				</div>
				</div>
				
				
			</div>
			
			<div class="queue-header">
				<a href="/momproject/"><img width="120" class="alignleft mom-logo" src="<?php echo base_url();?>img/mom-logo-white.png" /></a>
				<div class="queserve">
					<div id="queticker">
						  <ul>
							<li><p class="aligncenter">Queue number may not be called in sequence.</a></li>
							<li><p class="aligncenter">Visit <span class="board-link">http://qno.me/mom</span> on your mobile device to check queue status.</p></li>
							<li><p class="aligncenter">Welcome to MOM Queue system!</a></li>
						  </ul>
					</div>
					
				</div>
			</div>
		
        <!-- /.row -->
     

    <script type="text/javascript">
		var j = jQuery.noConflict();
    	j(function(){

    		var queueboard = {

    			upcomming: function(){


			    		setInterval(function(){

							j.ajax({
			    			url: "<?php echo base_url();?>actions/upcomming",
			    			type: "POST",
			    			success: function(e){
			    				j("#countqueue").html(e);
			    			}

			    		});

			    		},500);


    			},
    			skipped: function(){


			    		setInterval(function(){

							j.ajax({
			    			url: "<?php echo base_url();?>actions/skipped",
			    			type: "POST",
			    			success: function(e){
			    				j(".missednumber").html(e);
			    			}

			    		});

			    		},500);


    			}



    		}

		queueboard.upcomming();
		queueboard.skipped();
    		

    	});
    </script>

</body>

</html>
