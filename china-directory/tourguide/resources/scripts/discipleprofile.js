 $(function(){
				var j = jQuery.noConflict();
				var CCCSystem = {
					
							loadProfile: function(){
							
									
									$("#image_profile").load(base_url + "Welcome/profile");
									
								
								
								
							},
							formSubmit: function(){
								
									$("#formSubmit").on("submit", function(e){
										
											var formSubmit = $(this).serialize();
											$.ajax({
												url: base_url + "Welcome/AddRecords",
												type: "POST",
												data: formSubmit,
												success: function(e){
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
												
												
												
											});
											
											e.preventDefault();
										
									});							
								
							},
							EDIT_PERSONAL_INFO: function(){
								$(document).on('submit','#EDIT_PERSONAL_INFO',function(e){
										e.preventDefault();

										$form = $(this);

										CCCSystem.UPLOADIMAGE($form);

								});
					
								
								
							},
							UPLOADIMAGE: function($form){
								var formdata = new FormData($form[0]); //formelement
								var request = new XMLHttpRequest();
						
								//progress event...
								request.upload.addEventListener('progress',function(e){
								var percent = Math.round(e.loaded/e.total * 100);
					
								});
								request.onreadystatechange = function() {
									if (request.readyState == 4 && request.status == 200) {
											//dialog here
											
											$("#image_profile").html(request.responseText);
											  j(function() {
												 j( "#dialog-confirm" ).dialog({
												  resizable: false,
												  height:140,
												  modal: true
												 
												});
											  });
								
								}
								};
								request.open('post', base_url + 'Welcome/updatemyaccount');
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
								
							}
		
				}
				CCCSystem.AddDesciples();
				CCCSystem.submitUpdate();
				CCCSystem.formSubmit();
				CCCSystem.EDIT_PERSONAL_INFO();
				
			});