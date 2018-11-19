 <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/opencell.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylefront.css">
 <script>
	$(function(){
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

		
		
	});
 
 </script>
 <?php 

								function getRecordWithParentId($id, $records) {
								$records_under_parent = [];
									foreach ($records as $record) {
										if ($record->mentor_id == $id) {
											$records_under_parent[] = $record;
											$records_under_parent = array_merge($records_under_parent, getRecordOfSubRecordWithParenId($record->id_no, $records));
										}
									}
									return $records_under_parent;
								}

								function getRecordOfSubRecordWithParenId($id, $records) {
									$records_under_parent = [];
									foreach ($records as $record) {
										if ($record->mentor_id == $id) {
											$records_under_parent[] = $record;
											$records_under_parent = array_merge($records_under_parent, getRecordOfSubRecordWithParenId($record->id_no, $records));
										}
									}
									return $records_under_parent;
								}
								
								function leaders($leaders,$leadersID){
									
									foreach($leaders as $leadersfields){
										if($leadersfields->id_no == $leadersID){
											
											@$leaderData =  "<a href='".base_url()."Welcome/disciples/" . $leadersfields->id_no  . "'style='float:right; color:#fff; '>" . $leadersfields->first_name . "</a>";
											
										}
										
									}
									
									return @$leaderData;
									
								}
								
								
							?>
	
  <?php  date_default_timezone_set("Asia/Taipei");  ?>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
    
<div id="opencell" class="container" style="width:90% margin:0 auto;">
	<div class="row">

			<header class="form_head" style="background: #244083; padding: 30px 20px; color: white; font-size: 1.2em; font-weight: 600;
  										 overflow:auto;  border-bottom: 4px solid #9ea7af;">		
			<h2 style="float:left"> VIP </h2>
			<h3 style="float:right"><?php echo date('F jS l') ;?></h3>	
					
		</header>
		<div id="list1" class="col-md-3">
				<div  class="pepsol" style='float:left; width:315px; height:400px; overflow:auto; margin-bottom:10px; background:#b5b631;'>
						<h4 style='text-align:left; margin:0; padding:10px; ; color:#fff;'>First Timer <span style="float:right;">Leader</span></h4>
							 <table class="table">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Address</th>
									<th>Leader</th>
								  </tr>
								</thead>
								<tbody>
								
			
								<?php
											
											$totalCount = 0;
											@$count=0;
											foreach(getRecordWithParentId($userID, @$getRecordsDisplay) as $pepsollevelfields){
													if($pepsollevelfields->ranking == 1){ //first timer
														@$count++;
														$totalCount++;
														echo "<tr>";
														echo 	"<td><a href='#' data-toggle='modal' data-target='#modelFourth_"  .  @$count . "'>" . $pepsollevelfields->first_name .' ' .$pepsollevelfields->last_name . "</td>";
														echo 	"<td>" . $pepsollevelfields->address . "</td>" ;
														echo 	"<td>" .leaders(@$getRecordsDisplay,$pepsollevelfields->mentor_id) .
														 popUp($count,$pepsollevelfields->first_name,$pepsollevelfields->maiden_name,$pepsollevelfields->last_name,$pepsollevelfields->id_no,$getRecordsDisplay,$pepsollevelfields->Gender,$pepsollevelfields->role,$userID) .
														"</td>" ;
														echo "</tr>";
															
													}
													
												
												}


											
								?>
							</tbody>
						</table>			
						
				</div>
		 </div>
		 
		 <div id="list2" class="col-md-3">
			<h2>Second Timer</h2>
		 <table class="table">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Address</th>
									<th>Leader</th>
								  </tr>
								</thead>
								<tbody>
								
			
								<?php
											
											@$count=0;
											foreach(getRecordWithParentId($userID, @$getRecordsDisplay) as $pepsollevelfields){
													if($pepsollevelfields->ranking == 2){ //first timer
														@$count++;
														$totalCount++;
														echo "<tr>";
														echo 	"<td><a href='#' data-toggle='modal' data-target='#modelFourth_"  .  @$count . "'>" . $pepsollevelfields->first_name .' ' .$pepsollevelfields->last_name . "</td>";
														echo 	"<td>" . $pepsollevelfields->address . "</td>" ;
														echo 	"<td>" .leaders(@$getRecordsDisplay,$pepsollevelfields->mentor_id) .

														 popUp($count,$pepsollevelfields->first_name,$pepsollevelfields->maiden_name,$pepsollevelfields->last_name,$pepsollevelfields->id_no,$getRecordsDisplay,$pepsollevelfields->Gender,$pepsollevelfields->role,$userID) .
														"</td>" ;
														echo "</tr>";
															
													}
													
												
												}


											
								?>
							</tbody>
						</table>			
						
		 </div>
		 
		 <div id="list3" class="col-md-3">
		 <h2>Third Timer</h2>
				<table class="table">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Address</th>
									<th>Leader</th>
								  </tr>
								</thead>
								<tbody>
								
			
								<?php
											
											@$count=0;
											foreach(getRecordWithParentId($userID, @$getRecordsDisplay) as $pepsollevelfields){
													if($pepsollevelfields->ranking == 3){ //first timer
														@$count++;
														$totalCount++;
														echo "<tr>";
														echo 	"<td><a href='#' data-toggle='modal' data-target='#modelFourth_"  .  @$count . "'>" . $pepsollevelfields->first_name .' ' .$pepsollevelfields->last_name . "</td>";
														echo 	"<td>" . $pepsollevelfields->address . "</td>" ;
														echo 	"<td>" .leaders(@$getRecordsDisplay,$pepsollevelfields->mentor_id) .

													 popUp($count,$pepsollevelfields->first_name,$pepsollevelfields->maiden_name,$pepsollevelfields->last_name,$pepsollevelfields->id_no,$getRecordsDisplay,$pepsollevelfields->Gender,$pepsollevelfields->role,$userID) .
														"</td>" ;
														echo "</tr>";
															
													}
													
												
												}


											
								?>
							</tbody>
				</table>			
		 </div>
		 
		 
		 <div id="list4" class="col-md-3">
		 <h2>Fourth Timer</h2>
	<table class="table">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Address</th>
									<th>Leader</th>
								  </tr>
								</thead>
								<tbody>
								
			
								<?php
											
											@$count=0;
											foreach(getRecordWithParentId($userID, @$getRecordsDisplay) as $pepsollevelfields){
													if($pepsollevelfields->ranking == 4){ //first timer
														@$count++;
														$totalCount++;
														echo "<tr>";
														echo 	"<td><a href='#' data-toggle='modal' data-target='#modelFourth_"  .  @$count . "'>" . $pepsollevelfields->first_name .' ' .$pepsollevelfields->last_name . "</td>";
														echo 	"<td>" . $pepsollevelfields->address . "</td>" ;
														echo 	"<td>" .leaders(@$getRecordsDisplay,$pepsollevelfields->mentor_id) .

													 popUp($count,$pepsollevelfields->first_name,$pepsollevelfields->maiden_name,$pepsollevelfields->last_name,$pepsollevelfields->id_no,$getRecordsDisplay,$pepsollevelfields->Gender,$pepsollevelfields->role,$userID) .
														"</td>" ;
														echo "</tr>";
															
													}
													
												
												}


											
								?>
							</tbody>
				</table>			
		  <div>
			
		 </div>
	 </div>
 </div> 
 

<?php 
function popUp($count,$first_name,$maiden_name,$last_name,$id_no,$getRecordsDisplay,$Gender,$Role,$userID){
	?>
	<div id="modelFourth_<?php echo @$count; ?>" class="modal fade referpopup" role="dialog">
		<div class="modal-dialog">
				
			<div class="modal-content">
							  <div class="modal-header">
										<h4 class="modal-title" style="color:#000;"><?php echo $first_name . ' '. $maiden_name .' '. $last_name; ?></h4>
									  </div>
									
									<form class="consolidation_form" action='#'>
									  <div class="modal-body">
									   
										
									
											<div class="form-group">
											<?php 
												
												//@$conArray4  = json_decode($getData->ConDone4,true);
					
											?>
											<input type="hidden" name="formNumber" value="4" style="color:#000;">
											<input type="hidden" name="visitorID" value="<?php echo $id_no; ?>" style="color:#000;">
											<input type="checkbox"name="Prayed"  <?php echo @$conArray4["Prayed"] == 1 ? "checked=checked" : ""; ?> value="1">	
											<label for="Prayed" style="color:#000;">Prayed</label>			
											</div>
											<div class="form-group">
											<input type="checkbox" name="Shared_a_verse"  <?php echo @$conArray4["Shared_a_verse"] == 1 ? "checked=checked" : ""; ?>  value="1">		
											<label for="Shared a verse" style="color:#000;">Shared a verse</label>	
											</div>
											<div class="form-group">
											
											<input type="checkbox"name="Contacted"   <?php echo @$conArray4["Contacted"] == 1 ? "checked=checked" : ""; ?>   value="1">
											<label for="Contacted" style="color:#000;">Contacted</label>				
											</div>
											<div class="form-group">
											<input type="checkbox"name="Visited"  <?php echo @$conArray4["Visited"] == 1 ? "checked=checked" : ""; ?> value="1">
											<label for="Visited" style="color:#000;">Visited</label>				
											</div>		
										
										
									  </div>

									  </form>
									  <div class="modal-footer" style="margin-top:60px!important; background: #d0d0cc;">
										   
										   <div class="form-group">
											<h3 style="float:left; color:#000;">Refer To</h3>
												
											<form id="form_referto" class="form_referto">
													<input type="hidden" name="accountID" class="form-control" value="<?php echo $id_no;?>">
													<select id="referto" name="referto" class="form-control">
														<?php $cData = 0; ?>
														<?php
															foreach($getRecordsDisplay as $referto){ ?>
															<?php if($referto->Gender ==$Gender && $referto->role ==  $Role && $referto->id_no != $userID || $referto->mentor_id == $userID && $referto->added_as_close_cell == 1) {?>
																<?php $cData++;?>
																	<?php
																		if($cData == 1) { ?>
																			<option value="<?php echo $referto->id_no?>" selected><?php echo $referto->first_name . ' ' . $referto->last_name . "----" .  $referto->role; ?></option>
																		<?php }else{ ?>
																			<option value="<?php echo $referto->id_no?>"><?php echo $referto->first_name . ' ' . $referto->last_name . "----" .  $referto->role; ?></option>
																		<?php } ?>
															
															<?php }?>
														<?php }  ?>
													
													</select>
													<button type="button" class="btn btn-default" data-dismiss="modal"  style="margin-top:20px;">Close</button>
													<input type="submit" value="Refer To" class="btn" style="margin-top:20px; background:#428bca; " >
													
											</form>
											</div>
											
										  </div>
									</div>

				</div>
		</div>
		<?php 
	
	
	
	
}	

?> 
							
<div id="refertopopoupsuccess" title="Success" style="z-index:1111111111111; display:none;">
  <p>Successfully Refered</p>
</div>
<script src="<?php echo base_url(); ?>resources/scripts/opencell.js"></script>			

 <script>
	//alert('<?php echo $totalCount; ?>');
 </script>
