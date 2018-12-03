
			<div id="right"> 
				<!-- table --> 
				<div class="box">
				
					<!-- box / title -->
					<div class="title" style="width:97%; margin:auto;"><h3>Businesses</h3> 	
					
					<a href="<?php echo base_url();?>administrator/addbusiness" style="float: right; margin-top: 10px; margin-right: 20px; background: #365899; color: #fff; padding: 2px; width: 120px; text-decoration:none;"><i class="dsfont fas fa-plus-circle"></i><span class="addbusinessbtn">Add Business</span></a></div>

					<!-- end box / title -->
					<div class="table">
						
					   
						
						
						<table>
							<thead>
								<tr>
									<th>Business Name</th>
									<th style="text-align:center;">Address</th>
									<th style="text-align:center;">Category</th>
									<th style="text-align:center;">Action</th>
									
							</tr>
							</thead>
							<tbody id="listofrecords">
							
							</tbody>
							</table>
						
						
						
						
						
						<div class="">
			
						
								

				

			</div>
					</div>

				
				</div>
				<!-- end table -->
				
				
		

				<style>
					#upcomingEventsFIRSTTD, #upcomingEventsLEFTTD {
						background-color: #467CC8 !important;
					}
					
					#upcomingEventsWrapper div {
						background-color: #EEEEEE;
						color: #222222;
					}
					
					#upcomingEventsWrapper div td {
						padding-left: 10px;
						padding-right: 10px;
						font-size: 12px;
						color: #888888;
					}
					
					#upcomingEventsWrapper .upcoming-event-title td {
						background-color: #E5E5E5;
						border-bottom: 1px #DDDDDD solid;
						padding: 5px !important;
						padding-left: 10px !important;
						padding-right: 10px !important;
						font-size: 18px;
						color: #777777 !important;
					}
					
					#upcomingEventsWrapper #upcoming-event-first {
						background-color: #467CC8 !important;
						color: #FFFFFF !important;
					}
					
					#upcomingEventsWrapper #upcoming-event-first table {
						margin-bottom: 10px;
					}
					
					
					#upcomingEventsWrapper #upcoming-event-first a {
						color: #1f4265;
					}
					
					#upcomingEventsWrapper a {
						font-size: 12px;
						padding: 5px;
						margin-top: 5px;
					}
					
					.eventpart-selected {
						padding: 2px;
						padding-left: 5px;
						padding-right: 5px;
						font-weight: bold;
						font-size: 12px !important;
						background-color: #4CAF50 !important;
						color: #FFFFFF !important;
						border-radius: 5px;
						vertical-align: middle;
						margin-top: 5px;
					}

					#upcomingEventsWrapper #upcoming-event-first td {
						color: #FFFFFF !important;
					}
					
					#upcomingEventsWrapper #upcoming-event-first .upcoming-event-title td {
						background-color: #467CC8;
						border: 0px #467CC8 solid;
						padding: 5px !important;
						padding-left: 10px !important;
						padding-right: 10px !important;
						font-size: 20px;
						color: #FFFFFF !important;
					}
				</style>

				<script>
					function _(id) { return document.getElementById(id); }
					
					function setEventPart(id, status) {
						var a = new ajax("<?php echo base_url(); ?>administrator/eventpart");
						a.success = function(r){
							if(r != "") { _('eventPartCounterTD' + id).innerHTML = r; }
						};
						a.params = {
							'id_no':<?php echo $realUserID; ?>,
							'event':id,
							'status':status
							};
						a.send();
					}
					
					function updateUpcomingEventsPaneResize() {
						var e = _('upcomingEventsMainWrapper');
						var w = parseInt(getComputedStyle(e).width.replace("px", ""));
						
						if(w < 750) {
							_('upcomingEventsFIRSTTD').appendChild(_('upcoming-event-first'));
							_('upcomingEventsLEFTTD').style.width = "0px";
						}
						else {
							_('upcomingEventsLEFTTD').appendChild(_('upcoming-event-first'));
							_('upcomingEventsLEFTTD').style.width = "35%";
						}
					}
					
					function createUpcomingEvents(source) {
						var template = _('upcomingEventsTemplate').value;
						var contents = [];
						var temp = "";
						var prevDate = "";
						var l = 0;
						
						var ids = [];
						for(var i = 0; i < source.length; i++) {
							temp = template.replace("_#title#_", source[i].title);
							temp = temp.replace("_#venue#_", source[i].venue);
							temp = temp.replace("_#datetime#_", source[i].date + (source[i].date == source[i].toDate ? "" : "&nbsp;&nbsp;-&nbsp;&nbsp;" + source[i].toDate) + (source[i].time != "12:00 AM" ? " @ " + source[i].time : ""));
							temp = temp.split("_#event#_").join(source[i].id);
							ids.push(source[i].id);
							
							l = contents.length - 1;
							if(prevDate == source[i].date) { contents[l] = contents[l] + temp; }
							else { contents.push(temp); }
							
							prevDate = source[i].date;
						}
						
						_('tempUpcomingEventsWrapper').innerHTML = '<div id="upcoming-event-first">' + contents.join("</div><div>") + "<div>";
						
						_('upcomingEventsFIRSTTD').innerHTML = "";
						_('upcomingEventsLEFTTD').innerHTML = "";
						_('upcomingEventsRESTTD').innerHTML = "";
						
						
						_('upcomingEventsLEFTTD').appendChild(_('tempUpcomingEventsWrapper').firstChild);
						while(_('tempUpcomingEventsWrapper').children.length != 0) { _('upcomingEventsRESTTD').appendChild(_('tempUpcomingEventsWrapper').children[0]); }
						
						updateUpcomingEventsPaneResize();
						for(i = 0; i < ids.length; i++) { setEventPart(ids[i], -1); }
					}
					
					eval("<?php echo $upcomingevents; ?>");
					createUpcomingEvents(upcomingevents);
					
					
					window.addEventListener("resize", updateUpcomingEventsPaneResize);
				</script>
				
				<!--dito-->
				<!-- messages -->
				<div id="box-tabs" class="box">
					<!-- box / title -->
					<div class="title" style="display:none">
						<h5>Upcomming Events</h5>
					</div>
					<!-- box / title -->
					<div id="box-messages" style="display:none">
						<div class="messages">

						
					
						</div>
					</div> 
					
					
					<!---EDIT USERNAME--->
							<div class="modal fade" id="editusername" role="dialog">
								<div class="modal-dialog">
								
								  <!-- Modal content-->
								  <div class="modal-content">
									<form id="frmEditusername">
									<div class="modal-header">
						
									  	<h4 class="modal-title" style="font-size: 30px;">Change Username</h4>
									</div>
									
									<div class="modal-body">
									
										
										
											<input type="hidden" value="<?php echo $userID; ?>" name="menthorID">
											<div class="form-group">
												<label>Old Username</label>
												<input type="text" name="old_username" class="form-control" value="" required style="float:left; width:95%;"><a href='#'  style="float:right; display:block; width:5%; color:#000; text-align:center"><img id="old_username_img" src="<?php echo base_url();?>images/exclamation.png"  style="margin:0;"></a>
												<input type="hidden" name="userID" id="userID"  class="form-control" value="<?php echo $userID; ?>">
											</div>
											
											<div class="form-group">
												<label>New Username</label>
												<input type="text" name="newusername" class="form-control" value="" required style="float:left; width:95%;"><a href='#'  style="float:right; display:block; width:5%; color:#000; text-align:center"><img id="newusername_img" src="<?php echo base_url();?>images/exclamation.png"  style="margin:0;"></a>
					 							
											</div>
											
											<div class="form-group">
												<label>Retype Username</label>
												<input type="text" name="re_newusername" class="form-control" value="" required style="float:left; width:95%;"><a href='#'  style="float:right; display:block; width:5%; color:#000; text-align:center"><img id="re_newusername_img" src="<?php echo base_url();?>images/exclamation.png"  style="margin:0;"></a>
												
											</div>
															 			
										
									</div>
									<div class="modal-footer">
											<input type="submit" class="btn  btn-default" value="Change" name="ChangePassword" disabled>			
									</div>
										
										</form>									
								  </div>
								</div>
							</div>	
					
							<!--EDIT PASSWORD-->
							
							
							<div class="modal fade" id="editpassword" role="dialog">
								<div class="modal-dialog">
								
								 <!--- Modal content-->
								  <div class="modal-content">
										<form id="frmEditPassword">
									<div class="modal-header">

									  	<h4 class="modal-title" style="font-size: 30px;">Change Password</h4>
									</div>
									
									<div class="modal-body">
									
									
										
											<input type="hidden" value="<?php echo $userID; ?>" name="menthorID">
											<div class="form-group">
												<label>Old Password</label>
												<input type="password" name="old_password"  class="form-control" value="" style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/eye.png" id="repeatPasswordIfcheck" style="margin:0;"></a>
												
											</div>
											
											<div class="form-group">
												<label>New Password</label>
												<input type="password" name="newpassword"  id="newpassword" class="form-control" value="" required style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center" id="changepasswordeye"><img src="<?php echo base_url();?>images/eye.png"  style="margin:0;"></a>
												
												
											</div>
											
											<div class="form-group">
												<label>Retype Password</label>
												<input type="password" name="re_password" id="re_password" class="form-control" value="" required style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/exclamation.png" id="changepasswordcheck" style="margin:0;"></a>
												
												
											</div>
																					
										
									</div>
									<div class="modal-footer">
										<input type="submit" class="btn  btn-default" value="update" name="updatepassword" disabled>
									</div>
									
										</form>									
								  </div>
								</div>
							</div>	
								  					
							  <!-- ADD DISCIPLES POPUP total to count desciples increment -->
							  <div class="modal fade" id="addDes" role="dialog">
							  <form id="formSubmit"> 
								<div class="modal-dialog">
									
									
									
								  <!-- Modal content-->
								  <div class="modal-content">
									<div class="modal-header">
									  <h4 class="modal-title">Add Disciple</h4>
									</div>
			
									<div id="UserAlreadyExist"></div>
									
									
									<input type="hidden" value="<?php echo $total; ?>" name="DesciplesCountTotal">
									<input type="hidden" value="<?php echo $userID; ?>" name="menthorID">
									<div class="modal-body">
									  <div id="FullNameData" class="form-group">
 
										
									  </div>
									
									  <div class="form-group">
										<label for="DiscipleName">Disciple Username:</label>
										<input type="text" name="discipleUsername" value="" class="form-control" required style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/exclamation.png" id="correctUsernameornot" style="margin:0;"></a>
									  </div>
									  <div class="form-group">
										<label for="disciplePassword">Disciple Password:</label>
										<input type="password" name="disciplePassword" class="form-control" required style="float:left; width:95%;"><a href='#' id="eye" style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/eye.png" style="margin:0;"></a>
									  </div>
									  
									    <div class="form-group">
										<label for="disciplePassword">Retype Disciple Password:</label>
										<input type="password" name="retypedisciplePassword" class="form-control" required style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/exclamation.png" id="repeatPasswordIfcheck" style="margin:0;"></a>
									  </div>
									 
										<input type="hidden" name="MentorUsername" value="<?php echo $username;?>" class="form-control">
																	 
									</div>
									
								
									<div class="modal-footer">
									   <input type="submit" id="AddDesciples" class="btn btn-default AddDesciples" disabled>
									  <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									</div>
									
								  </div>
								  
								</div>
								</form>
							  </div>
			
		<!-- scripts ($query) -->
		
		<div id="dialog-confirm" title="Alert"  style="display:none; z-index:111111111;">
		  <p style="text-align:center;"><h5>Updated</h5></p>
		</div>
				
		<div id="Changed_Saved" title="Alert" style="display:none; z-index:111111111;">
		  <p style="text-align:center;"><h5>Updated</h5></p>
		</div>
		
		<div id="Changed_Username_Saved" title="Alert" style="display:none; z-index:111111111;">
		  <p style="text-align:center;"><h5>Updated</h5></p>
		</div>
		
		<!--<div id="chatbox"></div>-->
		

		<script type="text/javascript">
			var cropper;
			
			var options =
				{
					imageBox: '.imageBox',
					thumbBox: '.thumbBox',
					spinner: '.spinner',
					imgSrc: 'avatar.png'
				}
			window.onload = function() {
				
			
				document.querySelector('#file').addEventListener('change', function(){
					var reader = new FileReader();
					reader.onload = function(e) {
						options.imgSrc = e.target.result;
						cropper = new cropbox(options);
					}
					reader.readAsDataURL(this.files[0]);
					this.files = [];
				})
				document.querySelector('#imagePicChange').addEventListener('submit', function(e){
					var img = cropper.getDataURL();
					var blobImage =  cropper.getBlob();
					
					var formdata = new FormData();
					formdata.append("myimageFile",blobImage);
					
					document.getElementById('user-image-profile').style.opacity = 0.25;
					
					$.ajax({
						url: "<?php echo base_url();?>administrator/changeprofilepic",
						type: "POST",
						data: formdata,
						processData: false,
						contentType: false,
					}).done(function(respond){
						$("#image_profile img").attr("src", "administrator/userimage/<?php echo $userID;?>");				
					});
					
					e.preventDefault();
					
			   })
				document.querySelector('#btnZoomIn').addEventListener('click', function(){
					cropper.zoomIn();
				})
				document.querySelector('#btnZoomOut').addEventListener('click', function(){
					cropper.zoomOut();
				})
				
				
				
				
			};
		
		
		
	
		</script>
