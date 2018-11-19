<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Booking</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>resources/css/custom.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>resources/css/vertical-tabs.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	


	
</head>

<body>
   <div class="top-header">
			 <div class="container">
				<div class="row">
				<div class="col-lg-12 logo">
				<a href="/momproject/"><img class="mom-logo" src="<?php echo base_url();?>img/mom-logo-print.png" /></a>
				<img class="sing-logo alignright" src="<?php echo base_url();?>img/singapore-government.png" />
				</div>
				</div>
			</div>
     </div>
	 <div class="subheader">
			<h1>Make an appointment</h1>
			<p>Make an appointment for services available at MOM Services Centre (MOMSC) or Employment Pass Services Centre (EPSC).</p>
	 </div>
	<!-- Page Content -->
    <div class="container">

        <div class="row">
            
			<div class="content">
				<div id="qboardhide" class="col-lg-12">
				
				<div class="col-lg-12 services">

							
							
							<div class="tabs">
							  <nav> <a>Make an appointment</a> <a>View my appointment</a> <a>Change my appointment</a> <a>Cancel my appointment</a> </nav>
							  <div class="content">
										<form role="form" id="form1">
											
												<div class="form-group">
													<label for="InputName">Enter Name</label>
													<div class="input-group">
														<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
														
													</div>
												</div>
												<div class="form-group">
													<label for="InputName">Enter NRIC or FIN</label>
													<div class="input-group">
														<input type="text" class="form-control" name="Enter_NRIC_or_FIN" id="Enter_NRIC_or_FIN" placeholder="Enter NRIC or FIN" required>
														
													</div>
												</div>
												<div class="form-group">
													<label for="InputEmail">Enter Email</label>
													<div class="input-group">
														<input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" required>
			
													</div>
												</div>
												<div class="form-group">
													<label for="InputMessage">Date and Time Appointment</label>
																	<div class="input-group">
																		<div class='input-group date' id='datetimepicker5'>
																	<input type='text' class="form-control" id="Date"/>
																	<span class="input-group-addon">
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																	</div>
																</div>
													
												</div>
												<div class="form-group">
													<label for="InputName">Choose Services:</label>
													<div class="input-group">
														<select class="form-control" id="Services">
														  <option  value="Work pass card registration">Work pass card registration</option>
														  <option  value="Lost card interview">Lost card interview</option>
														  <option  value="Work pass issuance, renewal or cancellation">Work pass issuance, renewal or cancellation</option>
														  <option  value="Salary and employment related claims">Salary and employment related claims</option>
														  <option  value="Resignation of Work Permit holders">Resignation of Work Permit holders</option>
														  <option  value="Special Pass for newborn">Special Pass for newborn</option>
														</select> 
														</div>
												</div>
												<div class="form-group">
													<label for="InputName">Choose Location:</label>
													<div class="input-group">
														<select class="form-control" id="location">
															<option>Hall A</option>
															<option>Hall B</option>
														</select>
														
													</div>
												</div>
												
												<div class="qboardcol">
												<input type="submit" name="submit" id="submit" value="Register" class="btn btn-danger btnqboard aligncenter" >
												</div>
										
										</form>							  
								</div>
							  <div class="content">
									<form role="form">
											
												
												<div class="form-group viewapp">
													<label for="InputName">Enter Your NRIC or FIN</label>
													<div class="input-group">
														<input style="width:200px;" type="text" class="form-control" name="Enter_Your_NRIC_or_FIN" id="Enter_Your_NRIC_or_FIN" placeholder="Enter NRIC or FIN" required>
														
													</div>
												</div>
																						
												<div class="qboardcol">
												<input type="submit" name="submit" id="viewapptment" value="View My Appointment" class="btn btn-danger btnqboard aligncenter" >
												</div>
										
										</form>			
							  </div>
							  <div class="content">
										<form role="form">
											
												
												<div class="form-group viewapp">
													<label for="InputName">Enter Your NRIC or FIN</label>
													<div class="input-group">
														<input style="width:200px;" type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter NRIC or FIN" required>
														
													</div>
												</div>
												
												<div class="form-group viewapp">
													<label for="InputMessage">Date and Time</label>
														<div class="input-group">
															<div class='input-group date' id='datetimepicker5'>
																<input type='text' class="form-control" />
																<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
																				
												</div>
																						
												<div class="qboardcol">
												<input type="submit" name="submit" id="changeappt" value="Update My Appointment" class="btn btn-danger btnqboard aligncenter" >
												</div>
										
										</form>									  
								</div>
							  <div class="content">
												<form role="form">
											
												
												<div class="form-group viewapp">
													<label for="InputName">Enter Your NRIC or FIN</label>
													<div class="input-group">
														<input style="width:200px;" type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter NRIC or FIN" required>
														
													</div>
												</div>
																						
												<div class="qboardcol">
												<input type="submit" name="submit" id="cancelappt" value="Cancel My Appointment" class="btn btn-danger btnqboard aligncenter" >
												</div>
										
								</form>		
							  </div>
							</div>
									
					
				</div>
				
				
				
				
				</div>
				
				<div id="qboardshow" class="col-lg-12">
					<div>
					<h1><i class="fa fa-check"></i></h1>
					<h1>Thank you for Registering</h1>
					<h3>Appointment has been made. Please be punctual to avoid re-queuing.</h3>
					<p><input type="submit" name="back" id="back" value="Back" class="btn btn-danger btnqboard aligncenter" ></p>
					</div>
				</div>
				<div id="viewappt" class="display_data" style="display:none;" class="col-lg-12">
					
				</div>
				<div id="changeapp" style="display:none;" class="col-lg-12">
					<div>
					<h2>You have successfully Update Your Appointment</h2>
					<h3>Your New Appointment Schedule will be on April 28, 2016 at 10:00 AM</h3>
					<p><input type="submit" name="back" id="back2" value="Back" class="btn btn-danger btnqboard aligncenter" ></p>
					</div>	
				</div>
				<div id="cancelapp" style="display:none;" class="col-lg-12">
					<div>
					<h2>You have successfully Cancelled Your Appointment</h2>
					<p><input type="submit" name="back" id="back3" value="Back" class="btn btn-danger btnqboard aligncenter" ></p>					
					</div>	
				</div>
			</div>
        </div>
		
        <!-- /.row -->

      
     

	<!--Firebase-->
	<script src="https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>reources/js/jquery.js"></script>
	
	<!-- Queueing JavaScript -->
    <script src="<?php echo base_url(); ?>resources/js/queing.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>resources/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
	<script>
	$(function() {
	  $('.tabs nav a').on('click', function() {
		show_content($(this).index());
	  });
	  
	  show_content(0);

	  function show_content(index) {
		// Make the content visible
		$('.tabs .content.visible').removeClass('visible');
		$('.tabs .content:nth-of-type(' + (index + 1) + ')').addClass('visible');

		// Set the tab to selected
		$('.tabs nav a.selected').removeClass('selected');
		$('.tabs nav a:nth-of-type(' + (index + 1) + ')').addClass('selected');
	  }
	});
	</script>
	
	 <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datetimepicker();
            });
      </script>
</body>

</html>
