<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ministry of Manpower - Queuenumber System</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>resources/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Menu</a>
            </li>
            <li>
                <a href="index.html" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="admin.html" onclick = $("#menu-close").click(); >Settings</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click(); >Logout</a>
            </li>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
			<a href="/momproject/"><img class="mom-logo" src="<?php echo base_url(); ?>img/mom-logo-print.png" /></a>
            <h1>Ministry of Manpower</h1>
            <h3>Queuenumber System</h3>
            <br>
            <a href="#services" class="btn btn-dark btn-lg">Start Now</a>
        </div>
    </header>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Our Main Features</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-globe fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>MOM Online Booking</strong>
                                </h4>
                                <p>Online booking on Ministry of ManPower site.</p>
                                <a href="<?php echo base_url(); ?>queue/online_booking/" class="btn btn-light">Book Now</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-users fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Queue Station</strong>
                                </h4>
                                <p>For walk-in visitors to get new queue number</p>
                                <a href="<?php echo base_url(); ?>queue/queue_station" class="btn btn-light">Get Now</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-desktop fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Queue Board</strong>
                                </h4>
                                <p>This will show all the current queues.</p>
                                <a href="<?php echo base_url(); ?>queue/queue_board" class="btn btn-light">View Now</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cogs fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Queue Counter</strong>
                                </h4>
                                <p>Manage to serve for the next queue number</p>
                                <a href="<?php echo base_url(); ?>queue/queue_counter" class="btn btn-light">Serve Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

   

     

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; QueueNumber 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>resources/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>

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

</body>

</html>
