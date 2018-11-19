<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Queue Station</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>resources/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
   <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

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
				<a href="<?php base_url(); ?>"><img class="mom-logo" src="<?php echo base_url(); ?>img/mom-logo-print.png" /></a>
				<img class="sing-logo alignright" src="<?php echo base_url();?>img/singapore-government.png" />
				</div>
				</div>
			</div> 
     </div>
	<!-- Page Content -->
    <div class="container">

		
		<div id="newqueue">
			<div class="col-lg-4 appt">
			 <div class="form-group viewapp">
                <label for="InputName">Enter Your NRIC or FIN</label>
                <div class="input-group">
                    <input type="text" class="Enter_NRIC_or_FIN form-control" name="Enter_NRIC_or_FIN" placeholder="Enter NRIC or FIN" required="">
                        </div>
                </div>
			</div>

			<div class="newq">

				<p>
				<h2>What do you want to do?</h2>
				<input type="button" id="newq-select"  style="width: 400px; margin: auto; clear:both; display:block;" class="btn btn-default" value="Work pass card registration">
				<input type="button" id="newq-select1" style="width: 400px; margin: auto; clear:both; display:block;"class="btn btn-default" value="Lost card interview" >
				<input type="button" id="newq-select2" style="width: 400px; margin: auto;clear:both; display:block;" class="btn btn-default" value="Work pass issuance, renewal or cancellation">
				<input type="button" id="newq-select3" style="width: 400px; margin: auto; clear:both; display:block;"class="btn btn-default" value="Salary and employment related claims">
				<input type="button" id="newq-select4" style="width: 400px; margin: auto; clear:both; display:block;" class="btn btn-default" value="Resignation of Work Permit holders">
				</p>
			</div>
			
				 
		</div>
		<div id="newqueue-success">
		</div>
		
		
		

    
	</div>
   




    <!--Firebase-->
	<script src="https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>
   
	<!-- jQuery -->
    <script src="<?php echo base_url(); ?>resources/js/jquery.js"></script>
    
    <!-- Queueing JavaScript -->
    <script src="<?php echo base_url();?>resources/js/queing.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>resources/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        $("#Enter_Your_NRIC_or_FIN").on("submit", function(e){


            alert(1);
            e.preventDefault();
        });


    </script>

  



</body>

</html>
