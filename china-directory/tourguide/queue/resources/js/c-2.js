var jn = jQuery.noConflict();

var app = angular.module("c2App", ["firebase"]);
var arrayData = {};
var counter = 0;


	app.controller("SampleCtrl", function($scope, $firebaseArray) {
		
		var ref = new Firebase("https://dazzling-torch-589.firebaseio.com/queue");
			
				
				
			 $scope.list = $firebaseArray(ref);
			 
			 $scope.press_when_done = function(){
					var queue_id; 
					queue_id = jn("#hiddenKey").text();
					
					var updateRef = new Firebase('https://dazzling-torch-589.firebaseio.com/queue/' + queue_id);
					updateRef.update({ Status: "Done"});
					updateRef.child('Status').set("Done");	
				 
			 }
				 
			
	
	
	});
	


	
			
 




/*
jn(function(){

	var ref = new Firebase("https://dazzling-torch-589.firebaseio.com/queue");
	var count2 = 0;
	var serialGeneratedID = 0;
	var i = 0 ;
	var pad = "0000";
	var lastDataGeneratedID = 0;
	var generatedIDArr = {};

	var firebaseAPI = {


			firebaseINIT: function(){

						ref.orderByChild("Status").equalTo("upcomming").on("child_added", function(snapshot) {
							++count2;
					
								
								
										
										if(count2 == 1){

											 $("#hiddenKey").html(snapshot.key());  
			                    			 $("#Customer_No").append("<i class='fa fa-users'></i> Customer No. " + "<span id='generatedID'>" + snapshot.val().generatedID + "</span>");
			                    			


										}
										generatedIDArr[count2] = snapshot.val().generatedID;

								

			                                 
			               
 
					 
						 
						});
			},
			Press_when_Done: function(){

				jn(".Press_when_Done").on("click", function(){
					
						++i;
						lastDataGeneratedID = generatedIDArr[i];
						
						var queue_id; 
						queue_id = jn("#hiddenKey").text();
						var fredRef = new Firebase('https://dazzling-torch-589.firebaseio.com/queue/' + queue_id);

						fredRef.update({ Status: "Done"});
						fredRef.child('Status').set("Done");
						firebaseAPI.move_to_next_queue();

				});

				


			},
			skip: function(){

							jn(".skip").on("click", function(){
							
							var queue_id; 
							queue_id = jn("#hiddenKey").text();
							var fredRef = new Firebase('https://dazzling-torch-589.firebaseio.com/queue/' + queue_id);
								fredRef.update({ Status: "skipped"});
								fredRef.child('Status').set("skipped");
								firebaseAPI.move_to_next_queue();
							});


		},
		move_to_next_queue: function(){

			ref.orderByChild("Status").equalTo("upcomming").on("child_added", function(snapshot){


				jn("#hiddenKey").html("<span>"+  snapshot.key() + "</span>");

				$("#Customer_No").html("<i class='fa fa-users'></i> Customer No. " + "<span id='generatedID'>" + snapshot.val().generatedID + "</span>");
			                   


			});


		}
		move_to_next_queue: function(queue_no){

				
			ref.orderByChild("generatedID").equalTo(queue_no).on("child_added", function(snapshot) {


					if(snapshot.val().Status !="skipped" || snapshot.val().Status != "Done"  ){

							 jn("#hiddenKey").html("<span>"+  snapshot.key() + "</span>");

							  $("#Customer_No").html("<i class='fa fa-users'></i> Customer No. " + "<span id='generatedID'>" + snapshot.val().generatedID + "</span>");
			                    			
					}



			});


		}



	}

	firebaseAPI.firebaseINIT();
	firebaseAPI.Press_when_Done();
	firebaseAPI.skip();


});*/