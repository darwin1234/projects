 <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/opencell.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylefront.css">
 <script src="<?php echo base_url(); ?>Welcome/scripts/ajax.js"></script>
<script src="<?php echo base_url(); ?>Welcome/scripts/search.js"></script>
<style>
	body{
		margin-top: 60px;
		padding: 0px;
	}
</style>
<?php 

	function leaders($leaders,$leadersID){
		
		foreach($leaders as $leadersfields){
			if($leadersfields->id_no == $leadersID){
				
				@$leaderData =  "<a href='".base_url()."Welcome/disciples/" . $leadersfields->id_no  . "'style=' color:#333333; '>" . $leadersfields->first_name . "</a>";

			}
			
		}
		
		return @$leaderData;
		
	}
							
								
?>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
    
	<div id="opencell" class="container" style="width:90%; margin:0 auto; padding:0; background:#fff;>
		<div class="row">

		<header class="form_head" style="background: #244083; padding: 30px 20px; color: white; font-size: 1.2em; font-weight: 600;
  										 overflow:auto;  border-bottom: 4px solid #9ea7af; height:160px; ">		
			<h2 style="float:left"> VIP </h2>
			<h3 style="float:right"><?php echo date('F jS l') ;?></h3>	
			<!--<div style="background: #eaf8fc; background-image: -moz-linear-gradient(#fff, #d4e8ec); background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #d4e8ec),color-stop(1, #fff)); -moz-border-radius: 35px; border-radius: 35px; border-width: 1px; border-style: solid; border-color: #c4d9df #a4c3ca #83afb7; width: 500px; height: 35px; padding: 10px; overflow: hidden;">-->

			<input type="text" placeholder="Search" id="sname" style="color: #000000; float: right; clear: both; padding: 5px 9px; height: 23px; width: 380px; border: 1px solid #a4c3ca;  background: #f1f1f1; -moz-border-radius: 50px 50px 50px 50px; border-radius: 50px 50px 50px 50px; -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1); -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1);" >
			<!--</div>-->
			<input type="hidden" id="id" value="<?php echo $userID?>">
			<input type="hidden" id="level" value="*">			  
			
			<script>
				window.addEventListener('load', function(){
					document.getElementById('sname').onkeyup = function(){
						var s = document.getElementById('sname').value;
						var i = document.getElementById('id').value;
						sss1.search(s, i, 1);
						sss2.search(s, i, 2);
						sss3.search(s, i, 3);
						sss4.search(s, i, 4);
					};
					document.getElementById('sname').onkeyup();
				});
				
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

			</script>
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
			
			   <?php if(!empty($imagePIC)){ ?>
						<div id="picFrame">
						<img src="<?php echo base_url(); ?>Welcome/userimage/<?php echo $userID; ?>" style="padding:4px; background:#fff; border: 1px solid #ccc; width:100%;">
						<h4><?php echo $name;?></h4>
						<h4><?php echo $role; ?></h4>
						</div>   
					   <?php }else{ ?> 
						<div id="picFrame">
						<img src="<?php echo strlen(@$photo)!= 0 ? base_url() .'images/' . $photo : 'http://massconline.com/memberpages/images/portrait_placeholder.jpg'; ?>" style="padding:4px; background:#fff; border: 1px solid #ccc; width:100%;">
						<h4><?php echo $name;?></h4>
						<h4><?php echo $role; ?></h4>
						</div>
			  
			  <?php }?>
			
			
		</header>
		
		<style>
			.vip-counts {
				position: relative;
				padding: 2px 6px;
				color: rgb(255, 255, 255);
				font-style: normal;
				font-variant: normal;
				font-weight: bold;
				font-stretch: normal;
				font-size: 0.9em;
				line-height: normal;
				font-family: Tahoma, Arial, Helvetica;
				border-radius: 3px;
				background: rgb(224, 36, 36);
			}
			.active{background:red!important; height:20px; width:20px; color:#fff; border-radius: 20px; text-align:center;}
			#paginate a{background:#fff; float:left; height:20px; width:20px; border-radius: 20px; text-align:center; padding-top:2px;}
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
										<div style="padding-bottom: 7px; font-weight: bold; font-size: 20px; color: black" id="full-name-div">FULL_NAME</div>
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
				.level-link {
					color: blue;
				}
				
				.level-link:hover {
					color: red;
				}
				
				.EditAccountInformation input, .EditAccountInformation select {
					border: 1px solid #ccc;
				}
				
				#vip_ul { margin-bottom: 25px !important; }
				
				#vip_ul li.vip_li_1 { border: 2px #7cbb2e solid; }
				#vip_ul li.vip_li_2 { border: 2px #0a9381 solid; }
				#vip_ul li.vip_li_3 { border: 2px #eea620 solid; }
				#vip_ul li.vip_li_4 { border: 2px #16a1c8 solid; }
				
			</style>
			
			<script>
												var __ = function(id){ return document.getElementById(id); };
												
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

											</script>
			
		
		<?php
		echo "<ul id='vip_ul'>";
		   for($x = 1; $x <= 4; $x++){
			   ?>
			   
			   	<li id="vip_li_<?php echo $x;?>" class='vip_li_<?php echo $x;?>' onclick="vip_loads_data('<?php echo $x; ?>')">
						<?php
							switch($x) {
								case 1: echo "First"; break;
								case 2: echo "Second"; break;
								case 3: echo "Third"; break;
								case 4: echo "Fourth"; break; 
							}
				
						?> 
					Timer<span style="float: right; display: none; " class="vip-counts" id="vip-count-<?php echo $x; ?>"></span>
				</li>
			   <?php 

		   }
		   ?>
									<div style="text-align: right; padding-top: 15px; padding-right: 30px; white-space: nowrap">
										Download Complete VIP List: <a href="<?php echo base_url(); ?>Welcome/viplistexcel/0/0">Excel Format</a> | <a href="<?php echo base_url(); ?>Welcome/viplistcsv/0/0">CSV Format</a>
									</div>
									<?php
		   echo "</ul>";
		   
			for($i = 1; $i <= 4; $i++) {
				?>

			<div id="list<?php echo $i; ?>" class="list_class col-md-3" style="<?php echo $i == 1 ? 'display:block;' : 'display:none;' ?>">
				
					 <table class="table">
						<thead>
						  <tr>
							<th>VIP</th>
							<th>Date</th>
							<th>Leader</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Actions</th>
						  </tr>
						</thead>
						<tbody id="vip<?php echo $i; ?>TBody">
							
						</tbody>
					</table>
				</h4>
			</div>
			
			
			
			<script>
				var count<?php echo $i; ?>Done = false;
				var sss<?php echo $i; ?> = new search('<?php echo base_url(); ?>Welcome/search2');
				sss<?php echo $i; ?>.recordTemplate = '<tr><td><#full_name#></td><td><#DATEVISITED#></td><td><a style="color:#FFFFFF" href="<?php echo base_url() ?>Welcome/disciples/<#mentor_id#>"><#leader#></a></td><td><#contact#></td><td><#email#></td><td align="left"><a style="color: white; text-align:center; font-size:12px;" href="#" data-toggle="modal" data-target="#edit_dialog" onclick="return setEditInfo(<#id_no#>);"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:15px; color: white; "></i></a>&nbsp;&nbsp;<a style="color: white;" href="#" data-toggle="modal" data-target="#transfer_dialog" onclick="return setTransferInfo(<#id_no#>, \'<#full_name#>\', \'<#Gender#>\')"><i style="color: white;" class="fa fa-exchange" aria-hidden="true"></i></a><a href="#" onclick="moveVip(<#id_no#>)"><i class="fa fa-arrow-right" style="color:#fff; font-size:15px; margin-left:8px; " aria-hidden="true"></i></a></td></tr>';
				//sss<?php echo $i; ?>.recordTemplate = '<a href="#" onclick="alert(<#id_no#>)"><#full_name#></a><br>';
				sss<?php echo $i; ?>.success = function(){
					var t = ""; 
					var c = 0;
					while(r = sss<?php echo $i; ?>.fetchRecordAsText()) {
						t += r;
						c++;
					}
					
					if(!count<?php echo $i; ?>Done) {
						document.getElementById('vip-count-<?php echo $i; ?>').innerHTML = sss<?php echo $i; ?>.results.length;
						document.getElementById('vip-count-<?php echo $i; ?>').style.display = "";
						count<?php echo $i; ?>Done = true;
					}
					
					document.getElementById('vip<?php echo $i; ?>TBody').innerHTML = "";
					document.getElementById('vip<?php echo $i; ?>TBody').innerHTML = t;
					
					var pages = Math.floor(c / 20) + 1;
					var pageStr = "";
					for(var j = 1; j <= pages; j++) {
					

						pageStr += '<a href="#" class="' + (j  == 1 ? 'active' : '' )  + '" onclick="showPage<?php echo $i; ?>(this.innerHTML, this); return false;">' + j + '</a>&nbsp;';
					}
					
					document.getElementById('vip<?php echo $i; ?>TBody').innerHTML += '<br>Page: <div id="paginate" style="padding-top:10px;">' + pageStr + '</div>';
					showPage<?php echo $i; ?>(1);
				};
				
				
				function showPage<?php echo $i; ?>(n, a) {
					var p = a.parentElement;
					for(var i = 0; i < p.childNodes.length; i++) {	
						p.childNodes[i].className = "";
					}
					a.className = "active";


					var nodes = document.getElementById('vip<?php echo $i; ?>TBody').childNodes;
					
					var c = 0;
					var p = 1;
					for(var ff = 0; ff < nodes.length; ff++) { 
						if(nodes[ff].nodeName == "TR") {
						
							if(n == p) {
								nodes[ff].style.display = "";
							} else {
								nodes[ff].style.display = "none";
							}
							
							if( c < 20 ) { c++; }
							else { c = 0; p++; }
						}
					}
				
					//document.getElementById('vip<?php echo $i; ?>TBody').getElementsTagName('tr');
				}
				
				function vip_loads_data(list_no){
					  for(i=1;i<=4;i++){
								if (i == list_no) {
									document.getElementById('vip_li_'+i).style.border = "2px red solid";
									document.getElementById('list'+i).style.display = 'block';
								} else {
									document.getElementById('vip_li_'+i).style.border = "2px white solid";
									document.getElementById('list'+i).style.display = 'none';
								}
						}
						return false;
					
					
				}
				
				vip_loads_data(1);
				
				
				function moveVip(id_no){
					var txt;
					var r = confirm("Update?");
					var xhttp = new XMLHttpRequest();
					
					
					if (r == true) {
							
							
							xhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
									alert(this.responseText);
									location.reload();
								}
							
	
							}
							
							xhttp.open("GET", "<?php echo base_url(); ?>Welcome/yessss/" + id_no, true);
							xhttp.send();
					}else {txt = "Canceled";alert(txt);}
					
			
					
				
					
					
				}
				
			</script>
			
				<?php
			}
		
		?>
				
		</div>
	</div>
	
	
	
	
<?php 

//-------------------------------------------------------------------------------------------------------------

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
	