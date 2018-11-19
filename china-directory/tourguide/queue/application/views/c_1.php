<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Queue Counter</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>resources/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      <!--Firebase-->
	

	<style>
	#queue_no_object{margin:5px;}
	/*#queue_no_object:after{content:",";}
	.latenumber h2:last-child{content: "";}*/
	.qnum{display:block;}
	ul{list-style:none;}
	ul li
	ul li:first-child{display:block!important;}
	#currentnum h3{text-align:center; font-size:18px;}
	#currentnum h3 span{text-align:center;}
	#popup_content p{text-align:left;}
	.modal-backdrop.in{display:none!important;}
	</style>
	
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" type="text/javascript"></script>
</head>

<body >
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
<audio id="audio" src="http://www.soundjay.com/button/beep-07.wav" autostart="false" ></audio>

   <div class="top-header"> 
			 <div class="container">
				<div class="row">
				<div class="col-lg-12 logo">
				<a href="/momprojectd/"><img class="mom-logo" src="<?php echo base_url();?>img/mom-logo-print.png" /></a>
				<img class="sing-logo alignright" src="<?php echo base_url();?>img/singapore-government.png" />
				</div>
				</div>
			</div>
     </div> 
	
	<!-- Page Content -->
    <div class="container">
		<div class="row counter">
        <div id="qcounter" class="col-lg-12">
			<div class="row">
				<div class="row">
				<div class="qtcountercol">
				<div class="c1border">
				<h1>Current Number</h1>
				<!--<h3 id="currentnum">N0056</h3>-->
				<p><i>Enter Queuenumber below to customize the input</i></p>
				<div class="post-list" id="postList">
					<?php if(!empty($posts)): foreach($posts as $post): ?>
						<div class="list-item"><a href="javascript:void(0);"><h2><?php echo $post['ID']; ?></h2></a></div>
					<?php endforeach; else: ?>
					<p>Post(s) not available.</p>
					<?php endif; ?>
				
					<?php echo $this->ajax_pagination->create_links(); ?>
				</div>
				 
				</div>				
				</div>
				</div>
				<div class="row">
				<div class="col-lg-4 qtcountercol">
				<div class="c3border">
				<h1>Skipped Numbers</h1>
				<div class="skippednumbers">
						
					<ul>
					 
					</ul>
				
				<!--<span class="qnum num1" data-toggle="modal" data-target=".bs-example-modal-sm">N0085,</span> <span class="qnum num2" data-toggle="modal" data-target=".bs-example-modal-sm">N0025,</span> <span class="qnum num3" data-toggle="modal" data-target=".bs-example-modal-sm">N0076</span>--></h2></div>
				</div>
				</div>
				<div class="col-lg-4 qtcountercol">
				<div class="c3border">
				<h1>Upcoming Numbers</h1>
				<div class="upcomingnumber">
					
					<ul>
						
					</ul>
					
				</div>
				</div>
				</div>
				<div class="col-lg-4 qtcountercol">
				<div class="c3border">
				<h1>Numbers Served</h1>
				<div class="numberserved">
					<h2>
					<ul>
						
					</ul>
					</h2>
				</div>
				</div>
				</div>
			</div>
			
			
		</div>
		</div>
	</div>	




	
   

    <!-- jQuery -->
    <script src="<?php echo base_url();?>resources/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>resources/js/c-1.js"></script>


	
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>resources/js/bootstrap.min.js"></script>
	<script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script>
    var xj = jQuery.noConflict()
    // Closes the sidebar menu
   xj("#menu-close").click(function(e) {
        e.preventDefault();
       xj("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    xj("#menu-toggle").click(function(e) {
        e.preventDefault();
        xj("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    xj(function() {
        xj('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target :xj('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    xj('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
	<script>
		xj(function () {
			xj( '#table' ).searchable({
				striped: true,
				oddRow: { 'background-color': '#f5f5f5' },
				evenRow: { 'background-color': '#fff' },
				searchType: 'fuzzy'
			});
			
			xj( '#searchable-container' ).searchable({
				searchField: '#container-search',
				selector: '.row',
				childSelector: '.col-xs-4',
				show: function( elem ) {
					elem.slideDown(100);
				},
				hide: function( elem ) {
					elem.slideUp( 100 );
				}
			})
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url();?>resources/js/c-1.js"></script>


</body>

</html>
