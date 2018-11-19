var usher;

	$(function(){
			var baseURL =  $("#baseurl").val();
		 usher  ={
				init: function(){
					setInterval(function(){
						$('[name="invitation"]').on("change",function(){
							$("#list").html($(this).val());	
						});
						
					},500);
				
				
				},
				
				submit: function(){
					
					$("#usherForm").on("submit", function(e){
						var form = $(this).serialize();
						var key = e.keyCode;
						
						$("#confirmation").dialog({
							resizable: true,
							height:200,
							width:500,
							modal: true,
							title: 'Are you sure?',
							buttons: {
								"Yes Im sure": function()
								{
										$.ajax({
											url: baseURL + "/ushers/addrecord",
											type: "POST",
											data: form,
											success: function(e){
								
													$("#visited").val("");
													$("#name").val("");
													$("#addrs").val("");
													$("#contact").val("");
													$("#email").val("");
													$("#invited").val("");
													$("#foreign_key").val("");
													$("#last_name").val("");
													$("#Send_To").val("");
													$(".first_name").val("");
													$(".maiden_name").val("");
													$(".last_name").val("");
													$(".AgeGroup").val("");
													$(".contact").val("");
										
															$("#dialog1" ).dialog({
															  resizable: false,
															  height:250,
															  width:500,
															  modal: true,
															  title: 'Success',
															  buttons: {
																 "close": function(){
																	 $("#confirmation").dialog("close");
																	 $(this).dialog("close");
																	 
																	 
																 } 
																  
																  
															  }
															});
											},error: function(){
												
												alert("Error!");
											}
												
									
										});
						
									
									
								},
								"No": function(){
											 
										$(this).dialog("close");
											 
											 
								} 
										  
										  
							}
							
							
						});
						
	
					
						e.preventDefault();
						
							
					});
						
				},
				Send_for_consodilation: function(){
					
						$(".insert_record_visitor_form").on("click", function(e){
						
							
							$('input:checkbox.select:checked').each(function () {
									   if(!$(this).val() == "" || $(this).val().length() != 0 ){
										    var theForm  = $(this).val();
											
											
										
											$.ajax({
												url: baseURL +"/Welcome/ConsolidateTo",
												type: "POST",
												data: theForm,
												dataType:'html',
												success: function(e){
														console.log(e);
														$( "#dialog1" ).dialog({
														  resizable: false,
														  height:250,
														  width:500,
														  modal: true,
														  title: 'Success',
														});
												}
												
												
												
											});
									   }
									  
							});
															
							
							
							
							e.preventDefault();
						});
					
					
					
				},
				linkmenu: function(){
					$("#VIP_Form").on("click", function(e){
					
						$("#VIPFORM").show();
						$(".table-fill").hide();
						$("#EVENT_CONTAINER").hide();
						e.preventDefault();
						
					});
					
					$("#Reports").on("click", function(e){
						$(".table-fill").show();
						$("#VIPFORM").hide();
						$("#EVENT_CONTAINER").hide();
						e.preventDefault();
						
					});
					
					$("#EVENT").on("click", function(e){
						$("#EVENT_CONTAINER").show();
						$(".table-fill").hide();
						$("#VIPFORM").hide();
						
						e.preventDefault();
					});
					
				},
				visited: function(){
						$("#visited").on("change",function(){
						
						
								if($(this).val() != 1){
									$("#second_third_fourth").show();
									$("#first_time_form").hide();
									
									
								}else{
									
									$("#second_third_fourth").hide();
									$("#first_time_form").show();
									
								}	
								/*if($(".usherForm #visited option:selected").text() =="Visiting"){
									$("#Send_To").removeAttr("required");
									$("div#Refer_To").hide();
									
								}else if($(this).val() != 1){
									$(".usherForm").hide();
									$("#second_third_fourth").show();
								}else if($(this).val() == 5 || $(this).val() == 6  || $(this).val() == 7  || $(this).val() == 8  || $(this).val() == 9  || $(this).val() == 10  || $(this).val() == 11  || $(this).val() == 12){	
									$("#second_third_fourth").hide();
									$("#first_time_form").show();
								}else{
									$("#Send_To").attr("required");
									$("div#Refer_To").show(); 
									$(".usherForm").show();
									$("#second_third_fourth").hide();
								}*/
						
						 
						});
					
				},
				searchName: function(){
					$("#searchName").on("keyup", function(e){
						
						var key = e.keyCode;
				        if ( key != 40 && key != 38 ){
							$.ajax({
								url: baseURL + "/ushers/searchname",
								type: "POST",
								data: {"searchName": $(this).val(),"visited": $("#visited").val()},
								dataType: "HTML",
								success: function(e){
									
									$("#results").html(e)
								}
								
							});
							
						}
							
					
					});
				
				},
				validation: function(){
						var phone = document.getElementById("contact").value;
						var phoneNum = phone.replace(/[^\d]/g, '');
						if(phoneNum.length > 6 && phoneNum.length < 11) {  return true;  }
					
				},
				updateRecord: function(){
					
					$("#seachUpdate").on("submit", function(e){
						var searchName 		= $("#searchName").val();
						var visitorID		= $("#visitorID").val();
						var visited			= $("#visited").val();
						var datevisited		= $(".datevisited").val();
					
						var key = e.keyCode;
						
						//if(!key == 13){
							
							$.ajax({
								url: baseURL + "/ushers/updateRecordData",
								type: "POST",
								data: {"searchName": searchName,"visitorID": visitorID,"visited":visited,"datevisited": datevisited},
								success: function(e){
								$( "#dialog" ).dialog({
								  resizable: false,
								  height:250,
								  width:500,
								  modal: true,
								  title: 'Success',
								  buttons: {
										"Close": function(){
												 $(this).dialog('close');
												  location.reload();


										}

									}
								  });
								}
							
							}); 
							
						//}
						
						e.preventDefault();
					});
					
				},
				event_attendance: function(){
					
					$("#event_attendance").on("submit", function(e){
						var event_attendance = $(this).serialize();
						//alert(event_attendance);
						
					
						
						e.preventDefault();
					});
					
					
				},
				gatheredRecord: function(level,lesson_level){
						
						
							
						$("#gatheredRecord").load(baseURL + "Ushers/gathered?level_in_post=" + level +"&lesson_level=" + lesson_level);
							
						
						
						$("#searchdelegate").on("keyup", function(){
							var gender		= $("#gender").val();
							$("#gatheredRecord").html("<img src='"+baseURL+"avatars/imageloading.gif' style='width:auto; display:block; margin:20px auto;'>");
							var searchdelegate = $(this).val();
								/*alert(gender);*/
								$.ajax({
									url: baseURL + "Ushers/gathered",
									type: "POST",
									data: {"searchdelegate" : searchdelegate, "level_in_post" : level , "lesson_level" : lesson_level,"gender": gender},
									success: function(e){
											//$("#gatheredRecord").load(baseURL + "Ushers/gathered?level=" + level);
											$("#gatheredRecord").html(e);
									}
									
								});
					});
						
					
				},
				invited: function(){
					
					$("#Send_To").on("keyup", function(e){
						var Send_To  = $(this).val();
						var gender   = $("#gender").val();
						var key = e.keyCode;
				        if ( key != 40 && key != 38 ){
							
							
							$.ajax({
								url: baseURL + "Ushers/searchPrimary",
								type: "POST",
								data: {"searchPrimary" : Send_To,"Gender" : gender},
								success: function(e)
								{
									$("#listofData").show();
									$("#results1").html(e);
										
								},error: function(){
									alert("error!");
									
								}
								
							})
							
						}
			
						
					});
					
				},
				
				//Consolidate to
				keydown: function(){
					$("#Send_To").on("keydown", function(e){
								var $listItems = $('#listofData li');
								var key = e.keyCode,
								$selected = $listItems.filter('.selected'),
								$current;

								if ( key != 40 && key != 38 ) return;

								$listItems.removeClass('selected');

								if ( key == 40 ) // Down key
								{
									if ( ! $selected.length || $selected.is(':last-child') ) {
										$current = $listItems.eq(0);
									}
									else {
										$current = $selected.next();
									}
								}
								else if ( key == 38 ) // Up key
								{
									if ( ! $selected.length || $selected.is(':first-child') ) {
										$current = $listItems.last();
									}
									else {
										$current = $selected.prev();
									}
								}

								$current.addClass('selected');
								
					
					
					
						}
					
					);
					
								$("#searchName").on("keydown", function(e){
								var $listItems = $('#listofData li');
								var key = e.keyCode,
								$selected = $listItems.filter('.selected'),
								$current;

								if ( key != 40 && key != 38 ) return;

								$listItems.removeClass('selected');

								if ( key == 40 ) // Down key
								{
									if ( ! $selected.length || $selected.is(':last-child') ) {
										$current = $listItems.eq(0);
									}
									else {
										$current = $selected.next();
									}
								}
								else if ( key == 38 ) // Up key
								{
									if ( ! $selected.length || $selected.is(':first-child') ) {
										$current = $listItems.last();
									}
									else {
										$current = $selected.prev();
									}
								}

								$current.addClass('selected');
								
					
					
					
						}
					
					);
					
					
				},enter: function(){
					
					$(document).keypress(function(e){
							
							if(e.which == 13){
								$("#searchNamedata").attr("RecordsIDAttr");
								$("#visitorID").val($("#searchNamedata").attr("RecordsIDAttr"));
								$("#searchName").val($("li.selected a").attr('FullnameAttr'));
								$("#Send_To").val($("li.selected a").attr('FullnameAttr'));
								$("#foreign_key").val($("li.selected a").attr('usernameAttr'));
								$("#listofData").hide();
							}
						
					});
				}, UshersSetting: function(){
					
					$("#UshersSetting").on("submit", function(e){
							var UshersSettingFRM = $(this).serialize();
								
									$.ajax({
										url: baseURL + "Ushers/changeUsherPassword",
										type: "POST",
										data: UshersSettingFRM,
										success: function(e){
											
											alert(e);
										}, error: function(){
											
											alert("ERROR!");
											
											
										}
										
										
									})
								
							
								
								e.preventDefault();
				
								
						
					});
					
					
				},
				validationEmail: function(){
								
								var x = $("#email").val();
								
							
								
								var atpos = x.indexOf("@");
									var dotpos = x.lastIndexOf(".");
									if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
										$(".EmailValidation").html("Invalid Email");
										return false;
									}else{
										
										$(".EmailValidation").html("Valid Email");
									}
							
								
				},validationCP: function(){
							
							
								var CellNumber = $("#contact").val();
		 						var phoneno    = "^(09)\\d{8}"; 	 
		
								/*if(CellNumber.match(phoneno))
								{
									$(".CpValidation").html("Valid CP"); 
								}else{
									$(".CpValidation").html("In Valid CP");
								}*/
								
				}
			
				
			
				
				
				
				
				
			}
			//usher.init();
			
			usher.UshersSetting();
			usher.enter();
			usher.keydown();
			usher.invited();
			//usher.searchdelegate();
			
			usher.event_attendance();
			usher.updateRecord();
			usher.searchName();
			usher.submit();	
			usher.Send_for_consodilation();
			usher.linkmenu();
			usher.visited();
			
		
		
		});
		
		function searchNamedata(data,visitorID){
				$("#listofData").hide();
				$("#searchName").val(data);
				$("#visitorID").val(visitorID);
				
						
		}
		
		
			//
			function TickButton(DataID,level,enrolledLevel){
				$(function(){
					var DateVisited =  $("#Start_" + DataID).val();
					var baseURL =  $("#baseurl").val();
						

					$("#dialog3").dialog({
						resizable: false,
						height:250,
						width:500,
						modal:true,
						title: 'Alert',
						buttons: {
							"YES AND ENROLL": function(){
								$.ajax({
										url: baseURL + "Ushers/processDone",
										type: "POST",
										data:{"id_no":DataID, "enroll":1},
										success: function(e){
											$("#dialog3").dialog("close");
											$("#gatheredRecord").load(baseURL + "Ushers/gathered/?level_in_post="+level+"&lesson_level=" + enrolledLevel);
										}
									});
								/*
								$.ajax({
										url: baseURL + "Ushers/levelplus1",
										type: "POST",
										data:{"DataID":DataID,"level":level,"enrolledLevel":enrolledLevel},
										success: function(e){
											$("#dialog3").dialog("close");
											$("#gatheredRecord").load(baseURL + "Ushers/gathered/?level_in_post="+level+"&lesson_level=" + enrolledLevel);		

										}
									});
								*/
							},
							"YES" : function(){
								$.ajax({
										url: baseURL + "Ushers/processDone",
										type: "POST",
										data:{"id_no":DataID},
										success: function(e){
											$("#dialog3").dialog("close");
											$("#gatheredRecord").load(baseURL + "Ushers/gathered/?level_in_post="+level+"&lesson_level=" + enrolledLevel);
										}
									});
								/*
									$.ajax({
										url: baseURL + "Ushers/pre_encounter_start",
										type: "POST",
										data: {"delegatesID":DataID,'level_up' : level},
										success: function(e){
											$("#dialog3").dialog("close");
											$("#gatheredRecord").load(baseURL + "Ushers/gathered/?level_in_post="+level+"&lesson_level=" + enrolledLevel);		
										},error: function(){
											alert("error!");
										}			
									});
								*/
								
							},"NO" : function(){
											  
											  $(this).dialog("close");
											  
							}

						}
					});
					
					

						/*,
						$( "#dialog3" ).dialog({
									  resizable: false,
									  height:250,
									  width:500,
									  modal: true,
									  title: 'Alert',
									  buttons: {
										  "YES AND ENROLL": function(){
											$.ajax({
												url: baseURL + "Ushers/levelplus1",
												type: "POST",
												data:{"DataID":DataID,"level":level,"enrolledLevel":enrolledLevel},
												success: function(){
													$("#dialog3").dialog("close");
													//location.reload();
													$("#gatheredRecord").load(baseURL + "Ushers/gathered/?level_in_post="+level+"&lesson_level=" + enrolledLevel);	
}

											});
													
											  
										  })
										  "YES" : function(){

												alert(baseURL);
											  $.ajax({
													url: baseURL + "Ushers/pre_encounter_start",
													type: "POST",
													data: {"delegatesID":DataID,'level_up' : level},
													success: function(e){
														/*$("#gatheredRecord").load(baseURL + "Ushers/gathered?level=" + level);
														//location.reload();
														$("#dialog3").dialog("close");
														$("#gatheredRecord").load(baseURL + "Ushers/gathered/?gender=" + gender + "&level_in_post="+level+"&lesson_level=" + enrolledLevel);	

														  
													},error: function(){
														
														alert("error!");
													}
													
													
												});
																	  
										  },
										  "NO" : function(){
											  
											  $(this).dialog("close");
											  
										  }
										  
										  
									  }	
						
								});*/
						
						
					
					
				});
				
			
				
			}
			
			function checkFinished(DataID){
				
				$(function(){
					var DateVisited =  $("#End_" + DataID).val();
						var baseURL =  $("#baseurl").val();
						
						$.ajax({
							url: baseURL + "Ushers/pre_encounter_end",
							type: "POST",
							data: {"delegatesID":DataID,"Pre_Encounter_End": DateVisited},
							success: function(e){
								/*setTimeout(function(){
									$("#gatheredRecord").html(e);
								},1000);*/
								
							},error: function(){
								
								alert("error!");
							}
							
							
						});
					
					
				});
				
			}
			
			function PrimaryLeader(FullName,foreign_key){
				$(function(){
					$("#foreign_key").val(foreign_key);
					$("#Send_To").val(FullName);
					$("#listofData").hide();
						
				});
			}
			

				