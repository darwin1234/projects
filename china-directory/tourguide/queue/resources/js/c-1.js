var c1;
$(function(){
	var base_url =	$("#base_url").val();
	   c1 = {
		 
		 UPCOMING_C1: function(){
			
				$.ajax({
					url: base_url + "actions/upcomming_c1",
					type: "POST",
					datatype:"HTML",
					data:{"displaywhat":"upcomming" , "next": 1},
					success: function(e){
						$("#upcomming_c1").html(e);
						
					}
					
				});
			 
		 },
		 UPCOMING_NUMBERS: function(){
			 
			 $.ajax({
					url: base_url + "actions/upcomming_c1",
					type: "POST",
					datatype:"HTML",
					data:{"displaywhat":"UPCOMING_NUMBERS"},
					success: function(e){
						$(".upcomingnumber ul").html(e);
						
					}
					
			});
			 
			 
		 },
		 SERVED: function(){
			 
			 $.ajax({
					url: base_url + "actions/upcomming_c1",
					type: "POST",
					datatype:"HTML",
					data:{"displaywhat":"SERVED"},
					success: function(e){
						$(".numberserved ul").html(e);
						
					}
					
			});
			 
			 
		 },
		SKIPPEDNUMBERS: function(){
			 
			 $.ajax({
					url: base_url + "actions/upcomming_c1",
					type: "POST",
					datatype:"HTML",
					data:{"displaywhat":"SKIPPED"},
					success: function(e){
						$(".skippednumbers ul").html(e);
						
					}
					
			});
			 
			 
		},
		nextFunc: function(next){
				alert(next);
				$.ajax({
					url: base_url + "actions/upcomming_c1",
					type: "POST",
					datatype:"HTML",
					data:{"displaywhat":"upcomming" , "next": next},
					success: function(e){
						$("#upcomming_c1").html(e);
						
					}
					
				});
			
		},
		prevFunc: function(){
			
			alert(1);
			
		}
		 
	 }
	
		setInterval(function(){
			c1.UPCOMING_C1();	
			c1.UPCOMING_NUMBERS();
			c1.SERVED();
			c1.SKIPPEDNUMBERS();
			
			
		},500);
		
});

	
			
 