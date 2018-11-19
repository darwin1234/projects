<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CCCG12System</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		
				<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- scripts ($query) -->
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="$avascript" type="text/$avascript" src="resources/scripts/excanvas.min.$s"></script><![endif]-->
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/jquery.tinymce.js" type="text/$avascript"></script>
		<!-- scripts (custom) -->
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.menu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.chart.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.table.js" type="text/javascript"></script>
		<!--<script src="<?php echo base_url(); ?>resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.dialog.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.autocomplete.js" type="text/javascript"></script>-->

		
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/bootstrap/bootstrap.min.css">
		<script src="<?php echo base_url(); ?>resources/bootstrap/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/bootstrap.min.js"></script>
		
		
		<link href='<?php echo base_url(); ?>resources/fullcalendar/fullcalendar.css' rel='stylesheet' />
		<link href='<?php echo base_url(); ?>resources/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='<?php echo base_url(); ?>resources/fullcalendar/lib/moment.min.js'></script>
		<script src='<?php echo base_url(); ?>resources/fullcalendar/lib/jquery.min.js'></script>
		<script src='<?php echo base_url(); ?>resources/fullcalendar/fullcalendar.min.js'></script>
	    

	    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylefront.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/bootstrapfront.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/font-awesome.minfront.css">

		<script type="text/javascript">
			var j = jQuery.noConflict();
				j(document).ready(function() {
					
					
					// add new options with default values
							$.ui.dialog.prototype.options.clickOut = true;
							$.ui.dialog.prototype.options.responsive = true;
							$.ui.dialog.prototype.options.scaleH = 0.8;
							$.ui.dialog.prototype.options.scaleW = 0.8;
							$.ui.dialog.prototype.options.showTitleBar = true;
							$.ui.dialog.prototype.options.showCloseButton = true;


							// extend _init
							var _init = $.ui.dialog.prototype._init;
							$.ui.dialog.prototype._init = function () {
								var self = this;

								// apply original arguments
								_init.apply(this, arguments);

								//patch
								$.ui.dialog.overlay.events = $.map('focus,keydown,keypress'.split(','), function (event) {
									return event + '.dialog-overlay';
								}).join(' ');

							};
							// end _init


							// extend open function
							var _open = $.ui.dialog.prototype.open;
							$.ui.dialog.prototype.open = function () {
								var self = this;

								// apply original arguments
								_open.apply(this, arguments);

								// get dialog original size on open
								var oHeight = self.element.parent().outerHeight(),
									oWidth = self.element.parent().outerWidth(),
									isTouch = $("html").hasClass("touch");

								// responsive width & height
								var resize = function () {

									//check if responsive
									// dependent on modernizr for device detection / html.touch
									if (self.options.responsive === true || (self.options.responsive === "touch" && isTouch)) {
										var elem = self.element,
											wHeight = $(window).height(),
											wWidth = $(window).width(),
											dHeight = elem.parent().outerHeight(),
											dWidth = elem.parent().outerWidth(),
											setHeight = Math.min(wHeight * self.options.scaleH, oHeight),
											setWidth = Math.min(wWidth * self.options.scaleW, oWidth);

										if ((oHeight + 100) > wHeight || elem.hasClass("resizedH")) {
											elem.dialog("option", "height", setHeight).parent().css("max-height", setHeight);
											elem.addClass("resizedH");
										}
										if ((oWidth + 100) > wWidth || elem.hasClass("resizedW")) {
											elem.dialog("option", "width", setWidth).parent().css("max-width", setWidth);
											elem.addClass("resizedW");
										}

										// only recenter & add overflow if dialog has been resized
										if (elem.hasClass("resizedH") || elem.hasClass("resizedW")) {
											elem.dialog("option", "position", "center");
											elem.css("overflow", "auto");
										}
									}

									// add webkit scrolling to all dialogs for touch devices
									if (isTouch) {
										elem.css("-webkit-overflow-scrolling", "touch");
									}
								};

								// call resize()
								resize();

								// resize on window resize
								$(window).on("resize", function () {
									resize();
								});

								// resize on orientation change
								window.addEventListener("orientationchange", function () {
									resize();
								});

								// hide titlebar
								if (!self.options.showTitleBar) {
									self.uiDialogTitlebar.css({
										"height": 0,
											"padding": 0,
											"background": "none",
											"border": 0
									});
									self.uiDialogTitlebar.find(".ui-dialog-title").css("display", "none");
								}

								//hide close button
								if (!self.options.showCloseButton) {
									self.uiDialogTitlebar.find(".ui-dialog-titlebar-close").css("display", "none");
								}

								// close on clickOut
								if (self.options.clickOut && !self.options.modal) {
									// use transparent div - simplest approach (rework)
									$('<div id="dialog-overlay"></div>').insertBefore(self.element.parent());
									$('#dialog-overlay').css({
										"position": "fixed",
											"top": 0,
											"right": 0,
											"bottom": 0,
											"left": 0,
											"background-color": "transparent"
									});
									$('#dialog-overlay').click(function (e) {
										e.preventDefault();
										e.stopPropagation();
										self.close();
									});
									// else close on modal click
								} else if (self.options.clickOut && self.options.modal) {
									$('.ui-widget-overlay').click(function (e) {
										self.close();
									});
								}

								// add dialogClass to overlay
								if (self.options.dialogClass) {
									$('.ui-widget-overlay').addClass(self.options.dialogClass);
								}
							};
							//end open


							// extend close function
							var _close = $.ui.dialog.prototype.close;
							$.ui.dialog.prototype.close = function () {
								var self = this;
								// apply original arguments
								_close.apply(this, arguments);

								// remove dialogClass to overlay
								if (self.options.dialogClass) {
									$('.ui-widget-overlay').removeClass(self.options.dialogClass);
								}
								//remove clickOut overlay
								if ($("#dialog-overlay").length) {
									$("#dialog-overlay").remove();
								}
							};
							//end close

					
					
					
				
				j('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month'
					},
					defaultDate: '<?php echo date("Y-m-d");?>',
					selectable: true,
					selectHelper: true,
					select: function(start, end) {
						
						var check = moment(start).format('YYYY/MM/DD');
						var today = moment(new Date()).format('YYYY/MM/DD');
						   if(check >= today)
							{
								 $( "#addEvent" ).dialog({
								  resizable: false,
								  height:360,
								  width:500,
								  dialogClass: "test",
								  modal: false,
								  responsive: true, 
								  title: 'What is the event?',
								  buttons: {
											"ADD EVENT": function(){
												var title		 =  j("#title").val();
												var time_start	 =  j("#start_timepicker_hours").val();
												var time_end	 =  j("#end_timepicker_hours").val();
												var event_for	 =  j("#event_for").val();
												var userID		 =  j("#userID").val();
													eventData = {title: title,start: start,end: end};
													j.ajax({
														url: "<?php echo base_url(); ?>Welcome/addEvent",
														type: "POST",
														data: 'title='+title+'&start='+start.format("YYYY-MM-DD[T]HH:mm:SS")+'&end='+end.format("YYYY-MM-DD[T]HH:mm:SS")+'&time_start='+time_start+'&time_end=' +time_end+'&event_for='+event_for+'&account_id='+userID,
														success: function(e){
															alert("Event Saved!");	
															$("#addEvent").dialog("close");
															$("#title").val("");
															$("#start_timepicker_hours").val();
															$("#end_timepicker_hours").val();
														},
														error: function(){
															alert("error!");
																	
														}
													});
													j('#calendar').fullCalendar('renderEvent', eventData, true); 
												
												j('#calendar').fullCalendar('unselect');
												 
											 }
											
										 }
								});
							}else{
								
								
							}
						 
						
						
						
					},
					eventLimit: true, // allow "more" link when too many events
					events: "<?php echo base_url();?>Welcome/getEventDisplay",
					editable: true,
					eventDrop: function(event, delta) {
						 start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
						 end = 	 event.end.format("YYYY-MM-DD[T]HH:mm:SS");
						 j.ajax({
							url: '<?php echo base_url(); ?>Welcome/dragEvent',
							data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
							type: "POST",
					success: function(json) {
						 alert("OK");
					}
					});
					},
					eventResize: function(event) {
					 start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
					 end = 	 event.end.format("YYYY-MM-DD[T]HH:mm:SS");
					 j.ajax({
						url: '<?php echo base_url(); ?>Welcome/dragEvent',
						data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
						type: "POST",
						success: function(json) {
							alert("OK");
						}
					 });
					 
					},eventClick: function(calEvent, jsEvent, view){
						id= calEvent.id;
						 var edit_title =  j("#edit_title").val(calEvent.title);
						
						 $( "#dialog" ).dialog({
							  resizable: false,
							  height:200,
							  width:500,
							  dialogClass: "test",
							  modal: false,
							  responsive: true, 
							  title: 'What do you want to do?',
							  buttons: {
										 CLOSE: function() {
											 $("#dialog").dialog( "close" );
										 },
										 "UPDATE": function(){
											$("#dialog").dialog("close");
											$("#updateForm").dialog({
												
												 resizable: false,
												 height:350,
												 width:500,
												 dialogClass: "test",
												 modal: false,
												 responsive: true, 
												 title: 'Update Event?',
												 buttons: {
													"Save" : function(){
															j.ajax({
																url: '<?php echo base_url(); ?>Welcome/updateEvent',
																data: 'id='+ id + '&title= '+ edit_title.val() + '&time_start_edit='+j("#start_timepicker_hours_edit").val() + '&time_end_edit='+j("#end_timepicker_hours_edit").val(),
																type: "POST",
																success: function(e){
																	$("#updateForm").dialog("close");
																	
																	 j('#calendar').fullCalendar('renderEvent', eventData, true); 
																
																}		
																
															});
														 eventData = {title: edit_title.val()};
														 j('#calendar').fullCalendar('renderEvent', eventData, true); 
														 
													 },
													 "Close" : function(){
														 
														  $("#updateForm").dialog( "close" );
													 }
													 
												 }
											});
														
										 },
										 "DELETE": function() {
											//do the ajax request?
											$("#dialog").dialog("close");
												$("#deleteDialog").dialog({
													
												  resizable: false,
												  height:200,
												  width:500,
												  dialogClass: "test",
												  modal: false,
												  responsive: true, 
												  title: 'Are you Sure?',
												   buttons: {
													  "YES" : function(){
														  j.ajax({
																url: '<?php echo base_url(); ?>Welcome/deleteEvent',
																data: 'id='+ id,
																type: "POST",
																success: function(e){
																	
																	$("#deleteDialog").dialog( "close" );
																	
																
																}		
																
															});
														  	j('#calendar').fullCalendar('removeEvents', calEvent._id);
														  
													  },
													  "NO" : function(){
														  
														   $("#deleteDialog").dialog( "close" );

														}
														
												   }		
														
													
												});
													
										 }
									   }
							});
						
				
					}
					
				});
				
			});

		</script>
		<style>
		.fc-time{display:block;}
		.ui-state-default {width:30px!important;}
		.ui-button{width:150px!important;}
		.ui-button-icon-only{width:20px!important;}
		@media screen and (min-width:240px) and (max-width:1024px){
			
			#calender_wrap{width:100%!important; margin:0; padding:0;}
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

			if(isset($getRecordsDisplay)){
				foreach($getRecordsDisplay as $getData){
					if($getData->mentor_id == @$userID){
						if($getData->ranking==1){
							@$countOpencell++;
						}

						if($getData->ranking==4){
							@$countpre++;
						}

						if($getData->ranking==5){
							@$countenc++;
						}

						if($getData->ranking==6){
							@$countpost++;
						}

						if($getData->ranking==7){
							@$countsol1++;
						}

						if($getData->ranking==8){
							@$countsol2++;
						}

						if($getData->ranking==9){
							@$countre++;
						}

						if($getData->ranking==10){
							@$countsol3++;
						}

						if($getData->ranking==11){
							@$countgrad++;
						}

					
					}
				}
				
			}

				?>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?php echo base_url();?>Welcome/opencell">VIP<?php echo !empty($countOpencell) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countOpencell . '</span>' : ''; ?></a>
                    </li>
                    <li><a href="<?php echo base_url();?>Welcome/pre_encounter">PRE<?php echo !empty($countpre) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countpre . '</span>' : ''; ?></a>
                    </li>
                    <li><a href="<?php echo base_url();?>Welcome/encounter">ENCOUNTER<?php echo !empty($countenc) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countenc . '</span>' : ''; ?></a>
                    </li>
                    <li><a href="<?php echo base_url();?>Welcome/post_encounter">POST<?php echo !empty($countpost) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countpost . '</span>' : ''; ?></a>
                    </li>
                    <li><a href="<?php echo base_url();?>Welcome/sol1">SOL 1<?php echo !empty($countsol1) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countsol1 . '</span>' : ''; ?></a>
                    </li>
                    <li><a href="<?php echo base_url();?>Welcome/sol2">SOL 2<?php echo !empty($countsol2) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countsol2 . '</span>' : ''; ?></a>
                    </li>
					<li><a href="<?php echo base_url();?>Welcome/re_encounter">RE<?php echo !empty($countre) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countre . '</span>' : ''; ?></a>
					</li>
					<li><a href="<?php echo base_url();?>Welcome/sol3">SOL3<?php echo !empty($countsol3) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countsol3 . '</span>' : ''; ?></a>
					</li>
					<li><a href="<?php echo base_url();?>Welcome/graduates">GRAD<?php echo !empty($countgrad) ? '<span style="margin-left:10px;background:red; padding:5px; font-size:11px; color:#fff;">' . @$countgrad . '</span>' : ''; ?></a>
					</li>
					<!--<li><a href="<?php echo base_url();?>Welcome/search">SEARCH</a></li>-->
                    
                </ul>

                 <ul class="nav navbar-nav navbar-right">
                     <li><a href="<?php echo base_url();?>Welcome/logout">LOGOUT</a></li>
                </ul>
            </div>
           
        </div>
    </div>
     <!--END NAV SECTION -->
	<div id="dialog" title="" style="display:none;">Are you sure want to delete it?</div>
	<div id="addEvent" style="display:none;">
		<input type="hidden" value="<?php echo $userID; ?>" id="userID" name="userID"/>
		<label>Event Title:</label><br>
		<input type="text" name="title" id="title" style="width:100%;">
		
		<label for="timepicker_hours">Time Start:</label>
        <input type="text" style="width: 145px" id="start_timepicker_hours" name="time_start" value="12 PM">
		
        <label for="timepicker_hours">Time End:</label>
        <input type="text" style="width: 145px" id="end_timepicker_hours"   name="time_end" value="12 PM">
		
	
	
	
		<p>
			<label>Event For</label><br>
			<select name="event_for" id="event_for" style="width:100%;">
				<option value="Primary">Primary</option>
				<option value="144">144</option>
				<option value="1728">1728</option>
				<option value="All Network">All Network</option>
			</select>
		</p>
		
	
	</div>
	<div id="deleteDialog"></div>
	<div id="updateForm" style="display:none;">
		<input type="hidden" value="<?php echo $userID; ?>" id="userID" name="userID"/>
		<label>Event Title:</label><br>
		<input type="text" name="title" id="edit_title" style="width:100%;">
		<label for="timepicker_hours">Time Start:</label>
        <input type="text" style="width: 145px" id="start_timepicker_hours_edit" name="time_start_edit" value="12 PM">
		
        <label for="timepicker_hours">Time End:</label>
        <input type="text" style="width: 145px" id="end_timepicker_hours_edit"   name="time_end_edit" value="12 PM">
		
		
		<!--<p>
			<label>Event For</label><br>
			<select name="event_for" id="event_for" style="width:100%;">
				<option value="Primary">Primary</option>
				<option value="144">144</option>
				<option value="1728">1728</option>
				<option value="All Network">All Network</option>
			</select>
		</p>-->
		
			
	</div>

          
			
			<div id="right">
				<!-- table -->
				<div class="box">
					<!-- box / title -->
					<div class="title">
					<br>
					<br>
					<br>
						
					</div>
					<!-- end box / title -->
					<div class="container table">
						<div id="calender_wrap" style="width:80%; margin:auto;">
						<h2>Event Page</h2>
						<div id='calendar'></div>
						</div>
					</div>
				</div>
			</div>	
	</div>			
				
						<!-- dialog Box -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/resources/fullcalendar/include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/resources/fullcalendar/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		
		<script type="text/javascript" src="<?php echo base_url(); ?>/resources/fullcalendar/include/ui-1.10.0/jquery.ui.core.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/resources/fullcalendar/include/ui-1.10.0/jquery.ui.widget.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/resources/fullcalendar/include/ui-1.10.0/jquery.ui.tabs.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/resources/fullcalendar/include/ui-1.10.0/jquery.ui.position.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/resources/fullcalendar/jquery.ui.timepicker.js?v=0.3.3"></script>
		
		 <script type="text/javascript">
            $(document).ready(function() {
                $('#start_timepicker_hours').timepicker({
                    showMinutes: true,
                    showPeriod: true,
                    showLeadingZero: false
                });
				
				 $('#end_timepicker_hours').timepicker({
                    showMinutes: true,
                    showPeriod: true,
                    showLeadingZero: false
                });
               
			   
			    $('#start_timepicker_hours_edit').timepicker({
                    showMinutes: true,
                    showPeriod: true,
                    showLeadingZero: false
                });
				
				 $('#end_timepicker_hours_edit').timepicker({
                    showMinutes: true,
                    showPeriod: true,
                    showLeadingZero: false
                });
            })
        </script>
				
	</body>
</html>
