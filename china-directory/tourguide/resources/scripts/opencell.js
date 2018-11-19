var j = jQuery.noConflict();
j(function(){
	var base_url =  j("#base_url").val();
				
				var openCell = {
					
					consolidation_form: function(){
						
						j(".consolidation_form").on("submit", function(e){
							var FormData = j(this).serialize();
							
							j.ajax({
								url: base_url + "Welcome/consolidate",
								type: "POST",
								data: FormData,
								success: function(e){
									alert(e);
								},error: function(){
									alert("error!");
									
								}
							});
							
							e.preventDefault();
							
							
						});
						
						
						
					}
					
					
				}
				
				openCell.consolidation_form();
			});