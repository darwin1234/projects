<script src="<?php echo base_url(); ?>Welcome/scripts/ajax.js"></script>
<script src="<?php echo base_url(); ?>Welcome/scripts/search.js"></script>
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
				
				@$leaderData =  "<a href='".base_url()."Welcome/disciples/" . $leadersfields->id_no  . "'style=' color:#333333; '>" . $leadersfields->first_name . "</a>";
				
			}
			
		}
		
		return @$leaderData;
		
	}
							
								
	?>

	<script>
/*$(function(){
	CCCSystem.listofdata(4);
	CCCSystem.primary_search(4);
});
	*/

</script>
<div class="container" style="width:90% margin:0 auto;">
	<div class="inner_pages row">
		<?php  date_default_timezone_set("Asia/Taipei");  ?>
		<?php 
			$bg = "#FFFFFF";
			$title = "NONE";
			switch($level) {
				case 4:
					$bg = "#FB9D00";
					$title = "Pre-Encounter Delegates";
					break;
				case 5:
					$bg = "#FF3838";
					$title = "Encounter Delegates";
					break;
				case 6:
					$bg = "#B404A4";
					$title = "Post Encounter Delegates";
					break;
				case 7:
					$bg = "#00A0A4";
					$title = "School of Leader 1 Enrollees";
					break;
				case 8:
					$bg = "#0A324F";
					$title = "School of Leader 2 Enrollees";
					break;
				case 9:
					$bg = "#1E105D";
					$title = "RE Encounter";
					break;
				case 10:
					$bg = "#AAA796";
					$title = "School of Leader 3 Enrollees";
					break;
				case 11:
					$bg = "#A100F1";
					$title = "Graduates";
					break;
			}
		
		?>
		
		<header class="form_head" style="background: <?php echo $bg; ?>; padding: 30px 20px; color: white; font-size: 1.2em; font-weight: 600;
  										border-radius: 10px 10px 0 0; overflow:auto; margin-top: 30px; border-bottom: 4px solid #9ea7af; height:160px;">		
			<h2 style="float:left"> <?php echo $title; ?> </h2>
			
			<h3 style="float:right"><?php echo date('F jS l') ;?></h3>
			
			<input value="<?php echo (!empty($_SESSION['LEVEL_SEARCH_NAME']) ? $_SESSION['LEVEL_SEARCH_NAME'] : "") ?>" type='text' id='primary_search' name='primary_search' placeholder='Search' style="background-image: url(''); background-position: right center; background-repeat: no-repeat;color: #000000; float: right; clear: both; padding: 5px 9px; height: 30px; width: 380px; border: 1px solid #a4c3ca;  background-color: #f1f1f1; -moz-border-radius: 50px 50px 50px 50px; border-radius: 50px 50px 50px 50px; -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1); -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1);">
			
			<?php 
				/*
				if($userRole == "Primary Leader"){
					
					echo "<input type='text' id='primary_search' name='primary_search' placeholder='Search' style='float:right; clear:both;color:#000;'>";
			
				}
				
				*/

			?>	
			
			
			
			<?php 
			/* Display photo */
			
			foreach($getRecordsDisplay as $fieldsPhoto){
					if($fieldsPhoto->id_no == $userID){
						@$photo 		= $fieldsPhoto->profile_pic;
						@$imagePIC		= $fieldsPhoto->image_pic;
						$name			= $fieldsPhoto->first_name;
						$role			= $fieldsPhoto->role;
					}
			}
			
			
			?>
			
				<div id="picFrame">
				<img src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo $userID; ?>" style="padding:4px; background:#fff; border: 1px solid #ccc; width:100%;">
				<h4><?php echo $name;?></h4>
				<h4><?php echo $role; ?></h4>
				</div>  
			
			   
		</header>
		<!--<div id="listofrecordsdatainfo">
		 
		</div>-->
		
			
		
			<div style="width: 86%; display: block; margin-top: 15px; float: right;">
								<style>
									.level-link {
										color: blue;
									}
									
									.level-link:hover {
										color: red;
									}
									
									.EditAccountInformation input, .EditAccountInformation select {
										border: 1px solid #ccc;
									}
								</style>
					
					<div class="modal fade" id="edit_dialog" role="dialog">
			<div class="modal-dialog" id="EDITINFORMATION">
			
			  <!-- Modal content-->
			  
			  <div class="modal-content">
				<form class="EditAccountInformation"> 
						<div class="modal-header">
					
							<h4 class="modal-title" style="font-size: 30px;">EDIT PERSONAL INFO</h4>
						</div>

								<input type="hidden" value="" name="delegatesID" id="edit_id_no">
								<div class="modal-body">
									<div class="col-md-6">
										  <div class="form-group">
												<label for="FirstName">First Name</label>
												<input type="text" name="first_name" class="form-control" value="" id="edit_first_name">
												<label for="Maiden Name">Maiden Name</label>
												<input type="text" name="maiden_name" class="form-control" value="" id="edit_maiden_name">
												<label for="Last Name">Last Name</label>
												<input type="text" name="last_name" class="form-control" value="" id="edit_last_name">
										  
										  </div>

										  <div class="form-group">
											<label for="birthdate">Birthday</label>
											
												
												<select style="display:none" aria-label="Month" class="form-control birthday" name="birthday_month" title="Month" id="edit_birthday_month">
													<option value="Jan">Jan</option>
													<option value="Feb">Feb</option>
													<option value="Mar">Mar</option>
													<option value="Apr">Apr</option>
													<option value="May">May</option>
													<option value="Jun">Jun</option>
													<option value="Jul">Jul</option>
													<option value="Aug">Aug</option>
													<option value="Sep">Sep</option>
													<option value="Oct">Oct</option>
													<option value="Nov">Nov</option>
													<option value="Dec">Dec</option>
												</select>
												
												<select style="display:none" aria-label="Day" class="form-control birthday" name="birthday_day" title="Day" id="edit_birthday_date">
													<?php
													
														for($i = 1; $i <= 31; $i++) {
															?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
															<?php
														}
													
													?>
												</select>
												
												<select style="display:none" aria-label="Year" class="form-control birthday" name="birthday_year" title="Year" id="edit_birthday_year">
													<?php
													
														for($i = 2016; $i >= 1905; $i--) {
															?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
															<?php
														}
													
													?>
												</select>
												
												<input onchange="setBirthday(this);" type="text" id="birthdate" value="" class="form-control">
										  </div>

										  <div class="form-group">
											<label for="EmailAddress">Email Address:</label>
											<input type="text" name="EmailAddress" autocomplete="off" onkeypress="CCCSystem.validationEmail()" value="" class="form-control" id="edit_email">
											<div class="EmailValidation"></div>
										  </div>
										 
									
								</div>
							<div class="col-md-6">
								 <div class="form-group">
											<label for="civil_status"> Civil Status </label>
												<select name="civil_status" class="form-control" id="edit_civil_status">
														<option value="Single">Single</option>
														<option value="Married">Married</option>
														<option value="Widow">Widow</option>
												</select>
												
												<div id="statusfields" class="statusfields" style="display:none;">
													<label for="SpouseName">Spouse Name</label>
													<input type="text" name="SpouseName"  placeholder="Spouse Name" value="" class="form-control" id="edit_spouse">	
													<label>Wedding Anniversary</label>
													sadasdasd
												</div>								  
								</div>
												
								  <div class="form-group">
									<label for="CellNumber">Phone Number</label>
									<input type="text" name="CellNumber" min='11'  autocomplete="off" onkeypress="CCCSystem.validationCP()"  value="" class="form-control" id="edit_contact">
									<div class="CpValidation"></div>
								  </div>
								  
								   <div class="form-group">
									<label for="Address">Address</label>
									<input type="text" name="Address" value="" class="form-control" id="edit_address">
								  </div>
								  
								  <input type="hidden" name="MentorName" value="" class="form-control">
							</div>	
							<div style="clear:both;">
								 
							</div>
							</div>
					
					
						 <div class="modal-footer">
							<table width="100%">
								<tr>
									<td align="left"><a href="#" style="font-size: 15px; font-weight: bold;" onclick="doDelete()"><span style="font-family: FontAwesome; font-size: 20px;"></span>&nbsp;Delete</a></td>
									<td>
										<input type="submit" id="submitUpdate" class="btn btn-default">
										<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									</td>
								</tr>
							</table>							 
						</div>
				</form>
			  </div>
			  
			</div>
		  </div>
			
					
					
					<div id="transfer_dialog" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Transfer Disciple</h4>							
						  </div>
						  <div class="modal-body">
							<table style="width: 100%; border-width: 0px; padding: 0px" cellpadding="0" cellspacing="0" class="transfer-search">
								<tr>
									<td rowspan="2" width="1" style="border-width: 0px;">
										<img id="img-user-transfer" src="IMAGE_HERE" style="width:100px; margin:0; padding:0; display:block;">
									</td>
									<td style="border-width: 0px; padding-bottom: 7px" valign="top" align="center">
										<div style="margin-bottom: 7px; font-weight: bold; font-size: 20px;" id="full-name-div">FULL_NAME</div>
										<span style="font-size: 12px; color: #AAAAAA; font-weight: bold"><i>Transfer to</i></span>
									</td>
									<td rowspan="2" width="1" style="border-width: 0px; vertical-align: top" id="transfer-to-image-container" valign="top">
										
										<img onload="LOADED" src="http://massconline.com/memberpages/images/portrait_placeholder.jpg" style="vertical-align: top; width:100px; margin:0; padding:0; display:block;" id="transferto-image">
										<img id="transfer-load-image" src="<?php echo base_url() . "Welcome/images/imageloading.gif"; ?>" style="display: none; vertical-align: top; width: 100px; margin: 0px;">
										
									</td>
								</tr>
								<tr>
									<td style="border-width: 0px;" align="center">										
										<input type="text" onkeyup="doSearch();" name="search-transfer" class="form-control"  placeholder="Search" value="" id="search-transfer" style="margin-bottom: 10px; width: 90%">
										<button class="btn btn-default" id="transfer-button" style="display: none" onclick="confirmTransfer()">Confirm Transfer</button>
									</td>
								</tr>
								<tr>
									<td colspan="3" style="border-width: 0px;" align="center">
										<img style="display: none; margin: 0px" src="<?php echo base_url(); ?>Welcome/images/loading.gif" id="transfer-search-loading">
										<div id="transfer-search-results" style="margin: 0px"></div>
									</td>
								</tr>
							</table>
						  </div>
						  <div class="modal-footer">
							<button id="modal-close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>

					  </div>
					</div>
								
								<style>
									#forBGEnroll {
										background-image: url('<?php echo base_url(); ?>Welcome/images/loading2.gif');
										background-position: -100px;
										background-repeat: no-repeat;
									}
								</style>
								
								<input type="hidden" id="base_url_text" value="<?php echo base_url(); ?>">
								
								
								
								 <table class="table">
										<thead>
										  <tr>
											<th>Name</th>
											<th>Cell Leader</th>
											
											<th>Contact</th>
											<th>Email </th>
											<th>Action</th>
											<th><?php echo ($level != 11) ? "Send" : "&nbsp;" ?></th>
										  </tr>
										</thead>
										<tbody id="data-table">	
											<script>
												var __ = function(id){ return document.getElementById(id); };
												
												function setBirthday(elem) {
													var month = [];
													month[1] = "Jan";
													month[2] = "Feb";
													month[3] = "Mar";
													month[4] = "Apr";
													month[5] = "May";
													month[6] = "Jun";
													month[7] = "Jul";
													month[8] = "Aug";
													month[9] = "Sep";
													month[10] = "Oct";
													month[11] = "Nov";
													month[12] = "Dec";
												
													var children = elem.parentElement.getElementsByTagName("select");
													var b = elem.value.split("/");
													children[0].value = month[b[0] * 1];
													children[1].value = b[1] * 1;
													children[2].value = b[2] * 1;
												}
												
												function EditInfoEnabled(state) {
													__('edit_first_name').disabled = !state;
													__('edit_maiden_name').disabled = !state;
													__('edit_last_name').disabled = !state;
													
													__('edit_birthday_month').disabled = !state;
													__('edit_birthday_date').disabled = !state;
													__('edit_birthday_year').disabled = !state;
													
													__('birthdate').disabled = !state;
													
													__('edit_email').disabled = !state;
													__('edit_civil_status').disabled = !state;
													__('edit_spouse').disabled = !state;
													
													__('edit_contact').disabled = !state;
													__('edit_address').disabled = !state;
													
													__('submitUpdate').disabled = !state;
												}
												
												var editID = 0;
												function setEditInfo(id) {
													editID = id;
													
													__('edit_id_no').value = id;
													EditInfoEnabled(false);
													
													
													var a = new ajax('<?php echo base_url(); ?>Welcome/userinfojs/'+id);
													a.success = function(r){
														eval(r);
														
													EditInfoEnabled(true);
														
													__('edit_first_name').value = info.first_name;
													__('edit_maiden_name').value = info.maiden_name;
													__('edit_last_name').value = info.last_name;
													
													__('edit_birthday_month').value = info.birthmonth;
													__('edit_birthday_date').value = info.birthdate;
													__('edit_birthday_year').value = info.birthyear;
													
													var month = [];
													month["Jan"] = 1;
													month["Feb"] = 2;
													month["Mar"] = 3;
													month["Apr"] = 4;
													month["May"] = 5;
													month["Jun"] = 6;
													month["Jul"] = 7;
													month["Aug"] = 8;
													month["Sep"] = 9;
													month["Oct"] = 10;
													month["Nov"] = 11;
													month["Dec"] = 12;
													
													var bmonth = (month[info.birthmonth] < 10 ? "0" + month[info.birthmonth] : month[info.birthmonth]);
													var bdate = (info.birthdate < 10 ? "0" + info.birthdate : info.birthdate);
													
													__('birthdate').value = bmonth + "/" + bdate + "/" + info.birthyear;
													
													__('edit_email').value = info.email;
													__('edit_civil_status').value = info.civil_status;
													__('edit_spouse').value = info.spouse_name;
													
													__('edit_contact').value = info.contact;
													__('edit_address').value = info.address;														
													};
													
													a.send();
												}
												
												function doDelete() {
													if(!__('submitUpdate').disabled) {
														if(confirm("This action will delete the disciple's account/information permanently.\nContinue?")) {
															var a = new ajax('<?php echo base_url(); ?>Welcome/deleteaccount');
															a.params = {'id':editID};
															a.success = function(r){
																if(r == "") { location.reload(); }
																else { alert(r); }
															};
															a.send();
														}
														
													}
												}
												
												
												
												
												
												
												
												
												
												
												
												
												
												var currentTransferUserID = 0;
												var currentTransferGender = "";
												var transferToMentor = 0;
												
												var sss = new search('<?php echo base_url(); ?>Welcome/search2');
												sss.recordTemplate = '<tr style="border-bottom: 1px solid #cdcdcd;"><td align="right" width="100" style="border-right-width: 0px; padding: 10px;"><a style="" href="#" onclick="setMentorInfo(<#id_no#>, \'<#full_name#>\'); return false;"><img src="<?php echo base_url(); ?>Welcome/userimage2/<#id_no#>" style="width: 40px; margin: 0px; margin-left: 50px"></a></td><td class="search-transfer-result-item-name" style="border-width: 0px; border-bottom-width: 1px; padding: 10px;" align="left"><a id="trasfer-user-name-link" href="#" onclick="setMentorInfo(<#id_no#>, \'<#full_name#>\'); return false;"><#full_name#></a></td></tr>';
												sss.success = function(){
													
													var div = document.getElementById('transfer-search-results');
													div.innerHTML = "";
													var t = "";
													var c = 0;
													while(r = sss.fetchRecordAsText()) {
														if( c >= 10 ) break;
														t += r;
														c++;
													}
													document.getElementById('transfer-search-loading').style.display = "none"; 
													div.innerHTML = (t) ? '<table style="background: #ffffff; width: 100%;"><tr>' + t + '</table>' : '<span style="font-size: 12px; color: gray">No results found.</span>';													
												};
												
												function setTransferInfo(id, name, gender) {
													currentTransferUserID = id;
													currentTransferGender = gender;
													__('img-user-transfer').src = "<?php echo base_url(); ?>Welcome/userimage2/" + id + "?r=" + Math.random();
													__('full-name-div').innerHTML = name;
													return false;
												}
												
												function setMentorInfo(id, name) {
													transferToMentor = id;
													document.getElementById('transfer-search-results').innerHTML = ""; 
													document.getElementById('transferto-image').src = "<?php echo base_url(); ?>Welcome/userimage2/" + id + "?r=" + Math.random();; 
													document.getElementById('search-transfer').value = name; 
													document.getElementById('transfer-button').style.display = "";
												};
												
												function doSearch() {
													document.getElementById('transfer-button').style.display = "none";
													document.getElementById('transfer-search-results').innerHTML = ""; 
													document.getElementById('transfer-search-loading').style.display = ""; 
													if(__('search-transfer').value.length == 0) { document.getElementById('transfer-search-loading').style.display = "none";  return; }
													sss.search(__('search-transfer').value, currentTransferUserID, "all", 0, currentTransferGender, 0, 1, 1);
												}
												
												function confirmTransfer() {
													var a = new ajax('<?php echo base_url(); ?>Welcome/transferto2');
													a.params = {'id':currentTransferUserID, 'mentor':transferToMentor};
													a.success = function(){
														if(a.responseText == "DONE") { 
															alert("Transfer success");
															location.reload();
														} else { alert(a.responseText); }
													};
													a.send();
													__('transfer_dialog').click();
												}

												
												
												/***********************************************************/
												var SEARCHSUCCESS = false;
												var s = new search('<?php echo base_url(); ?>Welcome/search2');
													s.success = function() {
														SEARCHSUCCESS = true;
														
														c = "";
														var tCount = 0;
														var i = 0;
														var link = "";
														
														document.getElementById('data-table').innerHTML = c;
														
														var u = setInterval(function(){
															if(i < s.results.length) {
																e = s.results[i].enrolled;

																switch(<?php echo $level; ?>) {
																	case 4: enrolled = (e == 1); break;
																	case 5: enrolled = (e == 3); break;
																	case 6: enrolled = (e == 5); break;
																	case 7: enrolled = (e == 7); break;
																	case 8: enrolled = (e == 9); break;
																	case 9: enrolled = (e == 11); break;
																	case 10: enrolled = (e == 13); break;
																	case 11: enrolled = false; break;
																}

																link = (s.results[i].username == "") ? ' href="#" onclick="alert(\'No account yet.\'); return false;"' : ' class="level-link" href="<?php echo base_url(); ?>Welcome/disciples/<#id_no#>"';
																
																if(<?php echo $level; ?> != 11) {
																	if(enrolled) { s.recordTemplate = '<tr><td><img src="<?php echo base_url(); ?>Welcome/userimage2/<#id_no#>" style="float: left; margin:0; padding:0; width: 40px; height: 40px; margin-right:10px; border-radius: 20px;"><span><a' + link + '><#full_name#></a></span></td><td><#leader_full_name#></td><td><#contact#></td><td><#email#></td><td align="center"><a style="text-align:center; font-size:12px;" href="#" data-toggle="modal" data-target="#edit_dialog" onclick="return setEditInfo(<#id_no#>);"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:15px;"></i></a>&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#transfer_dialog" onclick="return setTransferInfo(<#id_no#>, \'<#full_name#>\', \'<#Gender#>\')"><i class="fa fa-exchange" aria-hidden="true"></i></a></td><td><button class="btn btn-default" style="font-size:12px;"  id="forBGEnroll" onclick="CCCSystem.unenroll_func(<#id_no#>, (<#ranking#>-4),<#ranking#>, this);" arg="<#id_no#>|(<#ranking#>-4)|<#ranking#>">Enrolled</button></td></tr>'; }
																	else { s.recordTemplate = '<tr><td><img src="<?php echo base_url(); ?>Welcome/userimage2/<#id_no#>" style="float: left; margin:0; padding:0; width: 40px; height: 40px; margin-right:10px; border-radius: 20px;"><span><a' + link + '><#full_name#></a></span></td><td><#leader_full_name#></td><td><#contact#></td><td><#email#></td><td align="center"><a style="text-align:center; font-size:12px;" href="#" data-toggle="modal" data-target="#edit_dialog" onclick="return setEditInfo(<#id_no#>);"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:15px;"></i></a>&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#transfer_dialog" onclick="return setTransferInfo(<#id_no#>, \'<#full_name#>\', \'<#Gender#>\')"><i class="fa fa-exchange" aria-hidden="true"></i></a></td><td><button class="btn btn-default" style="font-size:12px;"  id="forBGEnroll" onclick="CCCSystem.enroll_func(<#id_no#>, (<#ranking#>-3),<#ranking#>, this);" arg="<#id_no#>|(<#ranking#>-4)|<#ranking#>">Enroll</button></td></tr>'; }
																} else {
																	s.recordTemplate = '<tr><td><img src="<?php echo base_url(); ?>Welcome/userimage2/<#id_no#>" style="float: left; margin:0; padding:0; width: 40px; height: 40px; margin-right:10px; border-radius: 20px;"><span><a' + link + '><#full_name#></a></span></td><td><#leader_full_name#></td><td><#contact#></td><td><#email#></td><td align="center"><a style="text-align:center; font-size:12px;" href="#" data-toggle="modal" data-target="#edit_dialog" onclick="return setEditInfo(<#id_no#>);"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:15px;"></i></a>&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#transfer_dialog" onclick="return setTransferInfo(<#id_no#>, \'<#full_name#>\', \'<#Gender#>\')"><i class="fa fa-exchange" aria-hidden="true"></i></a></td><td>&nbsp;</td></tr>';
																}
																document.getElementById('data-table').innerHTML += s.fetchRecordAsText();
																tCount++;
																
																i++;
															} else {
																document.getElementById('primary_search').style.backgroundImage = "";
																document.getElementById('total-counts').innerHTML = (SEARCHSUCCESS ? "Total: " + tCount : "");
																clearInterval(u);
															}
														}, 50);
													};
												
												
												window.addEventListener("load", function(){
													document.getElementById('primary_search').onkeyup = function(e){
														var key = event.which || event.keyCode;
														if(key != 13) { return; }

														document.getElementById('primary_search').style.backgroundImage = "url('<?php echo base_url(); ?>Welcome/images/loading2.gif')";
														document.getElementById('data-table').innerHTML = "";
														document.getElementById('total-counts').innerHTML = "";
														
														SEARCHSUCCESS = false;
														s.search(document.getElementById('primary_search').value, <?php echo $userID; ?>, <?php echo $level; ?>, 1, "<?php echo $Gender; ?>", <?php echo $userID; ?>, 0, 0);
													};
													
													var tm = setTimeout(function(){
														document.getElementById('primary_search').style.backgroundImage = "url('<?php echo base_url(); ?>Welcome/images/loading2.gif')";
														s.search(document.getElementById('primary_search').value, <?php echo $userID; ?>, <?php echo $level; ?>, 1, "<?php echo $Gender; ?>", <?php echo $userID; ?>, 0, 0);
														clearTimeout(tm);
													}, 1000);
													
												});
											</script>
										</tbody>
								</table>		
										<h2 id="total-counts"></h2>
											

													
											
											
										
			</div>
		
	</div>
</div>	