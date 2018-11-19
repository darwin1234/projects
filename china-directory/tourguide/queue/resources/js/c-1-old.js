$(function(){
	var ref = new Firebase("https://dazzling-torch-589.firebaseio.com/queue");
	var count2 = 0;
	var serialGeneratedID = 0;
	var i = 0 ;
	var pad = "0000";
	var lastDataGeneratedID = 0;
	var generatedIDArr = {};


	var firebaseAPI = {

		firebaseINIT: function(){

				ref.orderByChild("generatedID").on("child_added", function(snapshot) {
							++count2;
					
							if(snapshot.val().Status=="skipped"){
								$(".latenumber").append("<span class='btn btn-default val1'>"+ snapshot.val().generatedID + "</span>");
							}else{

									if(snapshot.val().generatedID !="undefined"){
										generatedIDArr[count2] = snapshot.val().generatedID;
									}
									console.log(generatedIDArr[count2]); 
									
							} 
 
					 
						 
						});
			},
		CURRENT_NUMBER: function(){

			ref.orderByChild("generatedID").equalTo("0001").on("child_added", function(snapshot) {


					if(snapshot.val().Status !="skipped"){

							 $("#hiddenKey").html("<span>"+  snapshot.key() + "</span>");

							 $("<div /> ").html("<span>" + snapshot.val().generatedID + "</span>").appendTo(".container_wrap_slider");
						

					}



			});


		},
		move_to_next_queue: function(queue_no){

				
			ref.orderByChild("generatedID").equalTo(queue_no).on("child_added", function(snapshot) {


					if(snapshot.val().Status !="skipped"){

							 $("#hiddenKey").html("<span>"+  snapshot.key() + "</span>");

							 $(".container_wrap_slider ").html("<span>" + snapshot.val().generatedID + "</span>");
					}



			});

				//alert(queue_no);


		},
		next_f: function(){

			$("#next").on("click", function(e){
				
				++i;
				lastDataGeneratedID = generatedIDArr[i];
				firebaseAPI.move_to_next_queue(lastDataGeneratedID);		
				e.preventDefault();
				$("#previous").attr('style','background:#286090!important');
				$("#previous").prop('disabled', false);	
			

			});



		},
		prev_f: function(){


			$("#previous").on("click", function(e){
				--i;
				lastDataGeneratedID = generatedIDArr[i];
				firebaseAPI.move_to_next_queue(lastDataGeneratedID);	
				e.preventDefault();


			});


		},
		button_initialized: function(){
	
				$("#previous").attr('style','background:gray!important');
				$("#previous").prop('disabled', true);	

		},
		skip: function(){

			$("#skip").on("click", function(){
							
							var queue_id; 
							queue_id = $("#hiddenKey").text();
							var fredRef = new Firebase('https://dazzling-torch-589.firebaseio.com/queue/' + queue_id);
							alert("skipped");
							
							fredRef.update({ Status: "skipped"});
							fredRef.child('Status').set("skipped");
			});


		}	

	}

	firebaseAPI.firebaseINIT();
	firebaseAPI.CURRENT_NUMBER();
	firebaseAPI.next_f();
	firebaseAPI.prev_f();
	firebaseAPI.button_initialized();
	firebaseAPI.skip();



});
					
			
				

/*

				

				
						$("#skipfirebaseAPI").on("click", function(){
							
							var queue_id; 
							queue_id = $("#hiddenKey").text();
							var fredRef = new Firebase('https://dazzling-torch-589.firebaseio.com/' + queue_id);
							alert("skipped");
							
							fredRef.update({ Status: "skipped"});
							fredRef.child('Status').set("skipped");
						});



					});


			$(function(){
				var currentIndex = 0,
				  items = $('.container_wrap_slider div'),
				  itemAmt = items.length;

				function cycleItems() {
				  var item = $('.container_wrap_slider div').eq(currentIndex);
				  items.hide();
				  item.css('display','inline-block');
				}

				var autoSlide = setInterval(function() {
				  currentIndex += 1;
				  if (currentIndex > itemAmt - 1) {
				    currentIndex = 0;
				  }
				  cycleItems();
				}, 3000);

				$('.next').click(function() {
				  clearInterval(autoSlide);
				  currentIndex += 1;
				  if (currentIndex > itemAmt - 1) {
				    currentIndex = 0;
				  }
				  cycleItems();
				});

				$('.prev').click(function() {
				  clearInterval(autoSlide);
				  currentIndex -= 1;
				  if (currentIndex < 0) {
				    currentIndex = itemAmt - 1;
				  }
				  cycleItems();
				});
			});
*/