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

        <div class="row mainstation">
			<h1>Choose your option below</h1>
            
			<div class="station-content">
					<div class="col-lg-6">
							<div class="btn-station">
								<p><a href="<?php echo base_url();?>queue/with_appointment">With appointment</a></p>
							</div>
					</div>
					<div class="col-lg-6">
							<div class="btn-station">
								<p><a href="<?php echo base_url();?>queue/without_appointment">Without appointment</a></p>
							</div>
					</div>
					
					
			</div>
        </div>
		
		<div id="newqueue">
			<div class="col-lg-4 appt">
			
			</div>
			
			
				 
		</div>
		<div id="newqueue-success">
		</div>
		
		
		
		
        <!-- /.row -->
     `
	</div>
   




    <!--Firebase-->
	<script src="https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>
   
	<!-- jQuery -->
    <script src="<?php echo base_url(); ?>resources/js/jquery.js"></script>
    
    <!-- Queueing JavaScript -->
    <script src="<?php echo base_url();?>resources/js/queing.js"></script>-->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>resources/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        $("#Enter_Your_NRIC_or_FIN").on("submit", function(e){


            alert(1);
            e.preventDefault();
        });


    </script>

   <!-- <script type="text/javascript">

        $(function(){

            $(".queue_station1").on("click", function(e){

                    $(".customerRegistration").show();

                    $('.add-queue-form').prepend("<input type='hidden' id='station' name='station' value='station-2'/>");

                    $("#queue-station").hide();

                     e.preventDefault();

            });

            $(".queue_station2").on("click", function(e){

                 $(".customerRegistration").show();

                 $('.add-queue-form').prepend("<input type='hidden' id='station' name='station' value='station-2'/>");

                  $("#queue-station").hide();

                     e.preventDefault();

            });

            $(".queue_station3").on("click", function(e){

                $(".customerRegistration").show();

                $('.add-queue-form').prepend("<input type='hidden' id='station' name='station' value='station-2'/>");

                $("#queue-station").hide();

                e.preventDefault();

            });

        }); 

    </script>-->



    <!-- Custom Theme JavaScript -->
   <!-- <script>
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

    <script type="text/javascript">
        $(function($){
            alert(1);
            $(".queue_station1").on("click", function(e){

                alert(1);
                e.preventDefault();

            });

        });

    </script>-->



</body>

</html>
