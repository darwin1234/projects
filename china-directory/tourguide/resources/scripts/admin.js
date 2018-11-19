var CCCSystem;
var ondeactivate = false;
var ondeactivate2 = false;

$(function(){
	
		// on window resize run function
		$(window).resize(function () {
			fluidDialog();
		});

		// catch dialog if opened within a viewport smaller than the dialog width
		$(document).on("dialogopen", ".ui-dialog", function (event, ui) {
			fluidDialog();
		});

		function fluidDialog() {
			var $visible = $(".ui-dialog:visible");
			// each open dialog
			$visible.each(function () {
				var $this = $(this);
				var dialog = $this.find(".ui-dialog-content").data("ui-dialog");
				// if fluid option == true
				if (dialog.options.fluid) {
					var wWidth = $(window).width();
					// check window width against dialog width
					if (wWidth < (parseInt(dialog.options.maxWidth) + 50))  {
						// keep dialog from filling entire screen
						$this.css("max-width", "90%");
					} else {
						// fix maxWidth bug
						$this.css("max-width", dialog.options.maxWidth + "px");
					}
					//reposition dialog
					dialog.option("position", dialog.options.position);
				}
			});

		}
				var j = jQuery.noConflict();
				var base_url = j("#base_url").val();
				var switchVar = 0;
				var switchVar2 = 0;
				
				CCCSystem = {
						
					
							loadProfile: function(){
								setInterval(function(){
									
									$("#image_profile").load(base_url + "ajax/profile");
									
								},1000);
								
								 
							},
							formSubmit: function(){
								
									$("#formSubmit").on("submit", function(e){
										
											var formSubmit 	= $(this).serialize();
											var GetID	   	= $("#FullNameData #FullName option:selected").attr("attrID");
											
										
										
											$.ajax({
												url: base_url + "Welcome/AddRecords",
												type: "POST",
												data: formSubmit + "&GetID=" + GetID ,
												success: function(e){
													$("#listofrecords").load(base_url + "ajax/discipleslist");
													$("#FullNameData").load(base_url + "ajax/listofnameaddedasclose");
													$("[name=discipleUsername]").val("");
													$("[name=discipleUsername]").val("");
													$("[name=disciplePassword]").val("");
													$("[name=retypedisciplePassword]").val("");
													$("img#correctUsernameornot").attr("src", base_url + "images/exclamation.png");
													$("img#repeatPasswordIfcheck").attr("src", base_url + "images/exclamation.png");
													  j(function() {
														 j( "#dialog-confirm" ).dialog({
														  resizable: false,
														  height:140,
														  modal: true
														 
														});
													  });
												},
												error: function(e){
													
													//alert("Error");
												}
												
												
												
											})
											
											e.preventDefault();
										
									});							
								
							},
							EDIT_PERSONAL_INFO: function(){
								
								$(document).on('submit','#EDIT_PERSONAL_INFO',function(e){
										e.preventDefault();
										$form = $(this);
										
										CCCSystem.UPLOADIMAGE($form, 1);										
										}); 
								
							},
							
							UPLOADIMAGE: function($form, fromUp){
								var formdata = new FormData($form[0]); //formelement
								var request = new XMLHttpRequest();
								
								
								
								if(!fromUp) {
									//progress event...
									request.upload.addEventListener('progress',function(e){
									var percent = Math.round(e.loaded/e.total * 100);
						
									});
								}
								
								request.onreadystatechange = function() {
									if (request.readyState == 4 && request.status == 200) {
												//dialog here
												
												if(!fromUp) {
													$("#image_profile").load(base_url + "/ajax/profile");
													
													  j(function() {
														 j( "#dialog-confirm" ).dialog({
														  resizable: false,
														  height:140,
														  modal: true
														 
														});
													  });
												 }
												 
												 
												 location.reload();
											//j("#about_info").load(base_url + "ajax/aboutInfo");
									}else{
										
										
										if(!fromUp) { $("#image_profile img").attr("src" , base_url + 'avatars/imageloading.gif'); }
									}
								};
								request.open('post', base_url + "Welcome/updatemyaccount");
								request.send(formdata);
							},
							
							submitUpdate: function(){
								$("#submitUpdate").on("click", function(){
									//setInterval(function(){
										
										  $('#editAccount').modal('hide');
										
									//},50)
									
						
								});
							},
							AddDesciples: function(){
								
								$("#AddDesciples").on("click", function(){
									
										$("#myModal").modal('hide');
								});
								
							},
							frmEditPassword: function(){
								
								$("#frmEditPassword").on("submit", function(e){
									var frmEditPassword =  $(this).serialize();
									$.ajax({
										url: base_url + "Welcome/changePassword",
										type: 'POST',
										data: frmEditPassword,
										success: function(e){
											$("#editpassword").modal("hide");
											 j(function() {
												 j("#Changed_Saved" ).dialog({
												  resizable: false,
												  height:140,
												  modal: true
												 
												});
											  });
										}, error: function(){
											alert("error!");
											
										}
										
										
									});
								
									e.preventDefault();
								});
								
							},
							frmEditusername: function(){
								
								$("#frmEditusername").on("submit", function(e){
									var frmEditusername =  $(this).serialize();
									
									
									
									$.ajax({
										url: base_url + "Welcome/changeusername",
										type: 'POST',
										data: frmEditusername,
										success: function(e){
											
											
											$("#editusername").modal('hide');
									
											j("#Changed_Username_Saved" ).dialog({
												  resizable: false,
												  height:140,
												  modal: true
												 
											});
										
										
										}, error: function(){
											alert("error!");
											 
										}
										
										
									})
								
									e.preventDefault();
								});
								
							},
							validationEmail: function(){
								
								var x = $("#EmailAddress").val();
								
							
								
								
				
									var atpos = x.indexOf("@");
									var dotpos = x.lastIndexOf(".");
									if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
										$(".EmailValidation").html("Invalid Email");
										return false;
									}else{
										
										$(".EmailValidation").html("valid Email");
									}
							
								
							},
							validationCP: function(){
							
							
								var CellNumber = $("#CellNumber").val();
		 						var phoneno    = "^(09)\\d{8}"; 	 
		
								if(CellNumber.match(phoneno))
								{
										$(".CpValidation").html("Valid CP"); 
								}else{
									$(".CpValidation").html("In Valid CP");
								}
								
							},
							listofrecords: function(){
								//$("#right .table").html('<img src="'+ base_url + 'avatars/imageloading.gif" style="margin: auto; width: auto; display:block;">');
								
								
								$("#listofrecords").html('<tr><td colspan="4" ><img src="'+ base_url + 'avatars/imageloading.gif" style="margin: auto; width: auto; display:block;"></td></tr>');
								$("#listofrecords").load(base_url + "ajax/discipleslist");
							},
							form_referto: function(){
								$(".form_referto").on("submit", function(e){
									var form_referto =  $(this).serialize();
									
									$.ajax({
										"url": base_url+"welcome/form_referto",
										"type": "POST",
										"data": form_referto,
										"success": function(e){
											$(".referpopup").hide();
											location.reload();
											//$("#refertopopoupsuccess p").html(e);
											j("#refertopopoupsuccess" ).dialog({
												
 
											}); 
											
											$(".modal-backdrop").hide();
											
										},error: function(){
											
											alert("error!");
										}
										 
									});
									e.preventDefault();	
									
								});
								 
							},civilstatus: function(){
					
								var civilstatus = $("#civilstatus").val();
						
								
									$("#civilstatus").on("change", function(){
										
										
										civilstatus = $(this).val();
										
										if(civilstatus  == "Married" || civilstatus=="Widow"){
												
											$(".statusfields").show();
											
										}else{
											$(".statusfields").hide();
											
										}
									
										
									});
								
								
									
									if(civilstatus  == "Married" || civilstatus=="Widow"){
											$(".statusfields").show();
										
									}else{
											$(".statusfields").hide();
										
									}
									
						
					
					
							},
							aboutProfile: function(){
								
									$("#about_info").load(base_url + "ajax/aboutInfo");
								
							},
							searchForm: function(){
								
								$("#searchForm").on("change", function(e){
									var searchFrm =  $(this).serialize();
									$.ajax({
										url: base_url + "welcome/searchForm",
										type: "POST",
										data: searchFrm,
										success: function(){
											
											
										}
										
										
									});
									e.preventDefault();
									
								});
								
								
							},
							listofnameaddedasclose: function(){
								
								$("#FullNameData").load(base_url + "ajax/listofnameaddedasclose");
								
							},
							enroll_func: function(id_no,enroll_val,level, btn){
								btn.style.backgroundPosition = "center";
								btn.disabled = true;
								
								$.ajax({
									url: base_url + "Welcome/enroll",
									type: "POST",
									data: {"id_no" : id_no, "enroll_val" : enroll_val,"level" : level},
									success: function(e){
										btn.style.backgroundPosition = "-100px";
										btn.innerHTML = "Enrolled";
										btn.disabled = false;
										
										var s = btn.getAttribute("arg").split("|");
										btn.onclick = function(){
											CCCSystem.unenroll_func(s[0], eval(s[1]), s[2], this);
										};
										
										//$("#listofrecordsdatainfo").load( base_url+ "ajax/level?level="+level);
										//location.reload();
										
									},
									error: function(){
										
										alert("Error!");
										
									}
									
								}); 
								
							},
							unenroll_func: function(id_no,enroll_val,level, btn){
								btn.style.backgroundPosition = "center";
								btn.disabled = true;
								
								$.ajax({
									url: base_url + "Welcome/unenroll",
									type: "POST",
									data: {"id_no": id_no, "enroll_val" : enroll_val},
									success: function(e){
										btn.style.backgroundPosition = "-100px";
										btn.innerHTML = "Enroll";
										btn.disabled = false;
										
										var s = btn.getAttribute("arg").split("|");
										btn.onclick = function(){
											CCCSystem.enroll_func(s[0], eval(s[1]), s[2], this);
										};
									//$("#listofrecordsdatainfo").load( base_url+ "ajax/level?level="+level);
									//location.reload();
									},
									error: function(){
										
										alert("Error!");
										
									}
									
								});
								
							},
							listofdata: function(level){
								$("#listofrecordsdatainfo").load( base_url+ "ajax/level?level="+level);
								
							},
							Interested: function(event_title,eventid,status,userid){
								$.ajax({
									url: base_url + "Welcome/eventVisitorsReactions",
									type: "POST",
									data: "event_title="+ event_title + "&eventid=" + eventid + "&status=" + status + "&userid=" + userid,
									success: function(e){
									
										$(".messages").load(base_url + "welcome/listofevents");
										
									}
									
								});
							},
							Going: function(event_title,eventid,status,userid){
								$.ajax({
									url: base_url + "Welcome/eventVisitorsReactions",
									type: "POST",
									data: "event_title="+ event_title + "&eventid=" + eventid + "&status=" + status + "&userid=" + userid,
									success: function(e){
									
										$(".messages").load(base_url + "welcome/listofevents");
										
									}
									
								});
							},
							Maybe: function(event_title,eventid,status,userid){
								$.ajax({
									url: base_url + "Welcome/eventVisitorsReactions",
									type: "POST",
									data: "event_title="+ event_title + "&eventid=" + eventid + "&status=" + status + "&userid=" + userid,
									success: function(e){
									
										$(".messages").load(base_url + "welcome/listofevents");
										
									}
									
								});
							},								
							Decline: function(event_title,eventid,status,userid){
								$.ajax({
									url: base_url + "Welcome/eventVisitorsReactions",
									type: "POST",
									data: "event_title="+ event_title + "&eventid=" + eventid + "&status=" + status + "&userid=" + userid,
									success: function(e){
									
										$(".messages").load(base_url + "welcome/listofevents");
										
									}
									
								});
							},		
							chatForm: function(userID){
								
								$("#chatForm").on("submit", function(){
									var chatMessage = $(this).serialize();
									
									$.ajax({
										url: base_url + "welcome/chat",
										type: "POST",
										data: chatMessage,
										success: function(e){
											
											$("#messagesdata").append(e);
											
										},error: function(){
										
										alert("Error!");
										
										}
										
									})
									
									
								});
								
							},
							eventListData: function(){
								setInterval(function(){
									
									$(".messages").load(base_url + "welcome/listofevents");
									
								},500);
								
								
							},
							eye:function(){
								
								$("#eye").on("click", function(e){
									switchVar++;
									if(switchVar == 1){
											$("[name=disciplePassword]").attr('type','text');
											switchVar=-1;
										
									}else{
											if(switchVar == 0){
												
												$("[name=disciplePassword]").attr('type','password');
												switchVar=0;
											}
											
									}
			
									e.preventDefault();
								});
								
								$("#changepasswordeye").on("click", function(e){
									
									switchVar2++;
									if(switchVar2 == 1){
											$("[name=newpassword]").attr('type','text');
											switchVar2=-1;
										
									}else{
											if(switchVar2 == 0){
												
												$("[name=newpassword]").attr('type','password');
												switchVar2=0;
											}
											
									}
			
									e.preventDefault();
									
									
								});
							
							
								
							},
							matchPassword: function(){
								
							 	
								$("[name=retypedisciplePassword]").on("keyup", function(){
									var disciplePassword = $("[name=disciplePassword]").val();
									var match =  $(this).val();
									console.log(match);
									if(match != disciplePassword){
										

										$("img#repeatPasswordIfcheck").attr("src", base_url + "images/exclamation.png");
										$(".AddDesciples").attr('disabled',true);
											
									}else{
										
									
										$("img#repeatPasswordIfcheck").attr("src", base_url + "images/check.png");
										
										$(".AddDesciples").attr('disabled',false);
										
											
									}
									
								});
								
							},
							discipleUsername: function(){
								
								$("[name=discipleUsername]").on("keyup", function(){
									
									var discipleUsername =  $(this).val();
									if(discipleUsername.length ==0){
										
										$("#correctUsernameornot").attr("src", base_url + "images/exclamation.png");
										 
									}else{
											$.ajax({
													url: base_url + "welcome/checkifusernameismatch",
													type: "POST",
													data:{"discipleUsername" : discipleUsername},
													success: function(e){
														
														if(e=="True"){
															$("#correctUsernameornot").attr("src", base_url + "images/check.png");
															return "True";
															
															
															
														}else{
															$("#correctUsernameornot").attr("src", base_url + "images/exclamation.png");
															return "False";
															
														}
														
														
													},error: function(){
														
														console.log('error');
														
													}
										
											});
										
									}
								
									
										
									
								});
								
							},
							enableSubmit: function(){ 
								
									//alert(1);	
									//console.log(CCCSystem.discipleUsername());
									if(CCCSystem.matchPassword()=="true"){
										
										
									}
										
								
							},
							newusername: function(){
								
								$("[name=re_newusername]").on("keyup", function(){
									var newusername 	= $("[name=newusername]").val();
									var re_newusername	= $(this).val();
										$("img#new_username").attr("src", base_url + "images/check.png");
									if(newusername==re_newusername){
										$("img#new_username").attr("src", base_url + "images/check.png");
										$("[name=ChangePassword]").attr("disabled",false);
									}else{
										$("img#new_username").attr("src", base_url + "images/exclamation.png");
										$("[name=ChangePassword]").attr("disabled",true);
										
									}
									 
								});
							},
							newpassword: function(){
								
								$("[name=re_password]").on("keyup", function(){
									var re_password	= $(this).val();
									var newpassword	= $("[name=newpassword]").val();
									
									
									if(re_password == newpassword){
										
										$("#changepasswordcheck").attr("src", base_url + "images/check.png");
										$("[name=updatepassword]").attr("disabled",false);
									}else{
										if(re_password.length == 0 || newpassword.length ==0 ){
											$("#changepasswordcheck").attr("src", base_url + "images/exclamation.png");
											$("[name=updatepassword]").attr("disabled",true);
										}else{
											$("#changepasswordcheck").attr("src", base_url + "images/exclamation.png");
											$("[name=updatepassword]").attr("disabled",true);
										}
									}
									
									
									
								});
								
							},
							deactivateAccount: function(userid,activestatuschance){
								
								ondeactivate = true;
								ondeactivate2 = true;

								$.ajax({
									url: base_url + "Welcome/active_action",
									type: "POST",
									data: {"userID": userid,"activestatuschance":activestatuschance},
									success: function(e){
										if(e == "") {
											$("#listofrecords").load(base_url + "ajax/discipleslist");
											$(".deactivate_activate").hide();
											$(".modal-backdrop").hide();
											location.reload();
										} else {
											alert(e);
										}
										
									},error: function(){
										
										alert("error");
										
									}
									
								});
							},
							
							activateAccount: function(userid,activestatuschance){
								$.ajax({
									url: base_url + "Welcome/active_action",
									type: "POST",
									data: {"userID": userid,"activestatuschance":activestatuschance},
									success: function(e){
										$("#listofrecords").load(base_url + "ajax/discipleslist");
										$(".deactivate_activate").hide();
										$(".modal-backdrop").hide();
										location.reload();
									},error: function(){
										
										alert("error");
										
									}
									
								})
								
							},
							deactivelistofrecords: function(){
								$("#deactivelistofrecords").load(base_url + "Ajax/deactivatelist");
								
							},
							deactivated_account: function(){
								$(".deactivated_account").load(base_url + "Welcome/Deactivated_Accounts");
								
							},
							old_username: function(){
								
								$("[name=old_username]").on("keyup", function(){
									
									var userID = $("#userID").val();
									var discipleUsername =  $(this).val();
									if(discipleUsername.length ==0){
										$("#correctUsernameornot").attr("src", base_url + "images/exclamation.png"); 
									}else{
											$.ajax({
													url: base_url + "welcome/checkifusernameismatch",
													type: "POST",
													data:{"discipleUsername" : discipleUsername, "userID_t": userID},
													success: function(e){
														
														if(e=="True"){
															
															$("#old_username_img").attr("src", base_url + "images/exclamation.png");
															return "False";
															
															
														}else{
															
															$("#old_username_img").attr("src", base_url + "images/check.png");
															return "True";
															
														}
														
														
													},error: function(){
														
														console.log('error');
														
													}
										
											});
										
									}
								
								
								
								
									
								});
								
							},
							admin_transfer_to: function(){
								
								alert(1);
								
							},
							attendance_list: function(){
								setInterval(function(){
											
									$("#attendance_list").load(base_url + "Welcome/display_record_for_attendance");
									
								},1000);
							
								 
								
							},
							attend: function(userID,dateAttended,servicesAttended){
								
								//alert(userID +'-------'+dateAttended);
								
								$.ajax({
									url: base_url + "Welcome/attend",
									type: "POST",
									data: {"userID" : userID, "dateAttended":dateAttended,'servicesAttended': servicesAttended},
									success: function(e){
										//alert(e);
										CCCSystem.tickattendance();
									},error: function(){
										alert("Error!");
										
									}
									
								});
							},
							unattend: function(){
								
								alert(1);
							},
							tickattendance: function(){
								
								$("#ticktoAttend").load(base_url + "Welcome/tickattendance");
								
								
							},
							
							admin_transer_to: function(gender,id_no){
								
									var admin_transer_to;
									$(".searhLeaders .admin_transer_to").each(function(){
										 
											admin_transer_to = $(this).val();
											if(admin_transer_to.length !=0){
													$.ajax({
														url: base_url + "Welcome/transfer_to",
														type: "POST",
														data:{"admin_transer_to": admin_transer_to,"Gender": gender,"id_no": id_no },
														success: function(e){
															$(".transer_to_list_display").html(e);
															$("#listofData").show();
														},error: function(){
															
															//alert(1);
															
														}
													
													});
													
													
											}else{
													$(".transer_to_list_display").html("");
											}
														
											
										 
									});
							
									
									
									
									
							 
								
								
							},
							PrimaryLeader: function(fullname,userID,role){
							
								$(".admin_transer_to").val(fullname);
								$("#iduser").val(userID);
								$("#userrole").val(role);
							},
							searhLeaders: function(){
								
								
								
									var iduser 		= $("#iduser").val();
									var his_id 		= $("#his_id").val();
									var userrole	= $("#userrole").val();		
									//alert(userrole);
								
						
								
									$.ajax({
										url: base_url + "welcome/transferto",
										type: "POST",
										data:{"data0":iduser,"data1": his_id, "data2": userrole},
										success: function(e){
											alert(e);
										}
										
										
									});
								
								
								return false;
							},
							primary_search: function(level){
								$("#primary_search").on('keyup', function(){
									var primary_search = $(this).val();
									$.ajax({
										url: base_url +"ajax/primary_search",
										type: "POST",
										data:{"primary_search" : primary_search,"level":level },
										success: function(e){
											
											$("#listofrecordsdatainfo").html(e);
										},
										error: function(){
											
											
										}
										
										
									})
									
								});
								
							},
							pastor_search: function(){
								
								$("#pastor_search").on('keyup', function(){
									var pastor_search =  $(this).val();
									
									if(pastor_search.length != 0){
										
											$.ajax({
												url: base_url +"ajax/primary_search",
												type: "POST",
												data:{"pastor_search" : pastor_search},
												success: function(e){
													$("#listofrecordsdatainfo").show();
													$("#listofrecordsdatainfo").html(e);
												},
												error: function(){
													
													
												}
										
										
											})
										
										
									}else{
										$("#listofrecordsdatainfo").hide();
									}
								
									
								});
							},
							searchclick: function(){
								var closeopen = 0;
								$(".searchclick").on("click",function(){
									closeopen++;
									
									if(closeopen == 1){
										$("#pastor_search").show().addClass('expandSearch');
										closeopen= -1;
										
									}else{
										
										$("#pastor_search").removeClass('expandSearch').attr("style","position:absolute; right:240px; top:11px; margin-bottom:10px; clear:both; color:#000; width:0; display:none;");
			
									
									}
									
									
								});
								
							},
							EditAccountInformation:function(){
								
								$(document).on("submit", ".EditAccountInformation", function(e){
									var form = this;
									var t = setTimeout(function(){
										if(!ondeactivate) {
											var dataFrm =  $(form).serialize();
											$.ajax({
												url: base_url + "Welcome/EditAccountInformation",
												type: "POST",
												data: dataFrm,
												success: function(e){
													location.reload();
												},
												error: function(){

												}
											});
										
										} else {
											ondeactivate = false;
										}
										
										clearTimeout(t);
									}, 500);

									e.preventDefault();
									return false;
								});
							},
							
							EditAccountInformationFromDisciple : function(){
								//if()
							}

						
				}

				CCCSystem.frmEditusername(); 
				CCCSystem.frmEditPassword();
				CCCSystem.AddDesciples();
				CCCSystem.submitUpdate();
				CCCSystem.formSubmit();
				CCCSystem.EDIT_PERSONAL_INFO();
				CCCSystem.listofrecords();
				CCCSystem.form_referto();
				CCCSystem.civilstatus();
				CCCSystem.listofnameaddedasclose();
				CCCSystem.eventListData();
				CCCSystem.eye();
				CCCSystem.matchPassword();
				CCCSystem.discipleUsername();
				CCCSystem.enableSubmit();
				CCCSystem.newusername();
				CCCSystem.newpassword();
				CCCSystem.deactivelistofrecords();
				CCCSystem.deactivated_account();
				CCCSystem.old_username();
				CCCSystem.pastor_search();
				CCCSystem.searchclick();
				CCCSystem.EditAccountInformation();
				CCCSystem.EditAccountInformationFromDisciple();
			
				//CCCSystem.attendance_list();
				//CCCSystem.tickattendance();
				 
				

 
				
			});
		