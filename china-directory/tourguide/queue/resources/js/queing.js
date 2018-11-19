var generatedID;
var serialGeneratedID;
var i  = 1;
var pad = "0000";
var lastDataGeneratedID = 0;
var lastData;
var result;
var jg = jQuery.noConflict();
jg(document).ready(function(){
	
	var firebaseEvent = {
			
			addRecord: function(services,parameter){
				var Enter_NRIC_or_FIN = jg(".Enter_NRIC_or_FIN").val();
				var ref = new Firebase("https://dazzling-torch-589.firebaseio.com/queue/");

				ref.once("value", function(snapshot){
					
					snapshot.forEach(function(){
						++i;
						
						serialGeneratedID = "" + i;
						lastDataGeneratedID = pad.substring(0, pad.length - serialGeneratedID.length) + serialGeneratedID;
							
						
						
					});
					
					//push record
					if(lastDataGeneratedID == 0){
						lastDataGeneratedID = "0001";
					}
					ref.push({
						generatedID: lastDataGeneratedID,
						Enter_NRIC_or_FIN: Enter_NRIC_or_FIN,
						Services: services,
						Status: 'upcomming'
					});
		
					if(parameter == 1){
						jg( ".mainstation").hide();
						jg( "#newqueue").hide();
						jg( "#newqueue-success").html("<h3>Thank You for Registering!</h3><h4>Your Queue Number is "  +  lastDataGeneratedID   + ", Please Wait at MOMSC Hall A</h4><p>To see the queue status in real time on your mobile device, please go to <span class='station-link'>http://qno.me/mom</span> to keep yourself updated.</p><p><input type='submit' name='exit' id='exit' value='Exit' class='btn btn-danger btnqboard aligncenter' ></p>").show();
						jg( "#newqueue-success").html("<h3>Thank You for Registering!</h3><h4>Your Queue Number is "  +  lastDataGeneratedID   + ", Please Wait at MOMSC Hall A</h4><p>To see the queue status in real time on your mobile device, please go to <span class='station-link'>http://qno.me/mom</span> to keep yourself updated.</p><p><input type='submit' name='exit' id='exit' value='Exit' class='btn btn-danger btnqboard aligncenter' ></p>").show();
					}else{
						
						jg( ".mainstation").hide();
				
						jg( "#madeapp-success").html("<h3>Thank You!</h3><h4>Your Queue Number is  " + lastDataGeneratedID + "  Please Wait at MOMSC Hall B</h4><p>To see the queue status in real time on your mobile device, please go to <span class='station-link'>http://qno.me/mom</span> to keep yourself updated.</p><p><input type='submit' name='exit' id='exit1' value='Exit' class='btn btn-danger btnqboard aligncenter' ></p>").show();
		
						
						
					}
				
					
				});
				
			},
			updateRecord: function(){
				
				
			}
		
		
	}	
	
	
	
	
	
	
    jg( "#submit", this).on("click",function(e) {
	 var myFirebaseRef = new Firebase("https://dazzling-torch-589.firebaseio.com/queue/");
  
	 //return false;
	 var form1 = jg(this).serialize();

		var InputName 			= jg("#InputName").val();
		var Enter_NRIC_or_FIN	= jg(".Enter_NRIC_or_FIN").val();
		var InputEmailFirst		= jg("#InputEmailFirst").val();
		var DateValue			= jg("#Date").val();
		var Services			= jg("#Services").val();
		var Location			= jg("#location").val();
		
		
		myFirebaseRef.push({ 
		  Name: InputName,
		  Enter_NRIC_or_FIN: Enter_NRIC_or_FIN,
		  Email: InputEmailFirst,
		  Dates: DateValue,
		  Services: Services,
		  Location: Location
		}); 
		e.preventDefault();
		jg( "#qboardhide").toggle( 1000 );
		jg( "#qboardshow").show();
	
	});
	
	jg( "#viewapptment", this).click(function() {
		var ref = new Firebase("https://dazzling-torch-589.firebaseio.com/queue/");
		var Enter_Your_NRIC_or_FIN	= jg("#Enter_Your_NRIC_or_FIN").val();
		ref.orderByChild("Enter_NRIC_or_FIN").on("child_added", function(snapshot) {
			if(Enter_Your_NRIC_or_FIN == snapshot.val().Enter_NRIC_or_FIN){
					
				;
				 jg( "#qboardhide").toggle( 500 );
				jg( "#viewappt").html("<div><h3>Your Appointment Date is on " + snapshot.val().Dates +  " at 10:00 AM</h3><h3>Please be there.</h3><p><input type='submit' name='back' id='back1' value='Back' class='btn btn-danger btnqboard aligncenter' ></p></div>").show();
	  
				
			}
			
		
		});
					 
		
     return false;
    });
	
	jg( "#changeappt", this).click(function() {
      jg( "#qboardhide").toggle( 500 );
	  jg( "#changeapp").show();
	  return false;
    });
	
	jg( "#cancelappt", this).click(function() {
      jg( "#qboardhide").toggle( 500 );
	  jg( "#cancelapp").show();
	  return false;
    });
	
	jg( "#viewboard", this).click(function() {
      jg( "#qboard-login").toggle();
	  jg( "#qboardshow").show();
	  return false;
    });
	jg( "#back", this).click(function() {
      jg( "#qboardhide").show();
	  jg( "#qboardshow").hide();
	  return false;
    });
	jg( "#back1", this).click(function() {
      jg( "#qboardhide").show();
	  jg( "#viewappt").hide();
	  return false;
    });
	jg( "#back2", this).click(function() {
      jg( "#qboardhide").show();
	  jg( "#changeapp").hide();
	  return false;
    });
	jg( "#back3", this).click(function() {
      jg( "#qboardhide").show();
	  jg( "#cancelapp").hide();
	  return false;
    });
	
	jg( "#newqnumber", this).click(function() {
      jg( ".mainstation").toggle();
	  jg( "#newqueue").show();
	  return false;
    });
	jg( "#newq-select", this).click(function() {

		firebaseEvent.addRecord(jg(this).text(),1);

	 	return false;
    });



	jg( "#newq-select1", this).click(function() {
		firebaseEvent.addRecord(jg(this).text(),1);
	 	return false;
	
    });

    jg( "#newq-select2", this).click(function() {
		firebaseEvent.addRecord(jg(this).text(),1);
	 	return false;
    });
	jg( "#newq-select3", this).click(function() {
		firebaseEvent.addRecord(jg(this).text(),1);
	 	return false;
    });
	jg( "#newq-select4", this).click(function() {
		firebaseEvent.addRecord(jg(this).text(),1);
	 	return false;

    });
	
	
	jg( "#madeanappt", this).click(function() {
      jg( ".mainstation").hide();
	  jg( "#madeanapp").show();
	  return false;
    });
	jg( "#getqnum", this).click(function() {
		 firebaseEvent.addRecord(jg(this).text(),0);
	 	 return false;
    });
	jg( "#exit", this).click(function() {
      jg( ".mainstation").show();
	  jg( "#newqueue-success").hide();
	  return false;
    });
	jg( "#exit1", this).click(function() {
      jg( ".mainstation").show();
	  jg( "#madeapp-success").hide();
	  return false;
    });
	
	 jg('.inputs').keydown(function (e) {
     if (e.which === 13) {
         var index = jg('.inputs').index(this) + 1;
         jg('.inputs').eq(index).focus();
     }
	 });
		
	 jg('.btnnext').click(function(){
		validateName();
		jg('#oldlabel').focus();
	 });
	 
	 jg('.btnprev').click(function(){
		jg('#firstinput').show();
		jg('#secondinput').hide();
		jg('#namelabel').focus();
	 });
	 
	 jg('.btnnext2').click(function(){
		validateOld();
		jg('.inputs').focus();
	 });
	 
	 jg('.btnprev2').click(function(){
		jg('#thirdinput').hide();
		jg('#secondinput').show();
	 });
	 
	 jg('.latenumber span').click(
		function() {
		jg(this).addClass('valactive');
		jg(this).hide();
		});
	
	jg('#namelabel').keyup(function(e){
        if (e.which === 32) {
            alert('No space are allowed in name');
            var str = jg(this).val();
            str = str.replace(/\s/g,'');
            jg(this).val(str);            
        }
    }).blur(function() {
        var str = jg(this).val();
        str = str.replace(/\s/g,'');
        jg(this).val(str);            
    });
	
	//Toggle the Board
	jg( '.btnqstation', this).click(function() {
      jg( "#qboardhide").toggle( 500 );
	  jg( "#qboardshow").css("display", "inline-block");
	  jg( "#firstinput").show();
	  jg( "#secondinput").hide();
	  jg( "#thirdinput").hide();
	  jg('#namelabel').focus();
	  return false;
    });
		
	jg( '.btnsubmit', this).click(function() {
	  validateForm();
    });
	
	jg( '.btncancel', this).click(function() {
	  jg( "#qboardshow").fadeOut('fast');
	  jg("#qstationthankyou").hide();
	  jg( "#qboardhide").show();
    });
	
	jg( '.btnback', this).click(function() {
	  jg( "#qboardshow").hide();
	  jg("#qstationthankyou").hide();
	  jg( "#qboardhide").show();
    });
	
	function validateName(){
		var nameReg = /^[A-Za-z]+jg/;
		
		var names = jg('#namelabel').val();
		
		var inputVal = new Array(names);

		var inputMessage = new Array("Name");

		jg('.error').hide();
		
		if(inputVal[0] == ""){
            jg('#namelabel').after('<div class="error"> Please enter your ' + inputMessage[0] + '</div>');
        } 
        else if(!nameReg.test(names)){
            jg('#namelabel').after('<div class="error"> Letters only</div>');
        }
		else{
			jg('#firstinput').hide();
			jg('#secondinput').show();
		}
	}
	
	function validateOld(){
		var numberReg =  /^[0-9]+jg/;
		
		var old = jg('#oldlabel').val();
		
		var inputVal = new Array(old);

		var inputMessage = new Array("Age");
	
		jg('.error').hide();
		
		if(inputVal[0] == ""){
            jg('#oldlabel').after('<div class="error"> Please enter your ' + inputMessage[0] + '</div>');
        } 
        else if(!numberReg.test(old)){
            jg('#oldlabel').after('<div class="error"> Numbers only</div>');
        }
		else{
			jg('#thirdinput').show();
			jg('#secondinput').hide();
		}
	}
	
	function validateForm(){

    var nameReg = /^[A-Za-z]+jg/;
    var numberReg =  /^[0-9]+jg/;

    var names = jg('#namelabel').val();
    var old = jg('#oldlabel').val();

    var inputVal = new Array(names,old);

    var inputMessage = new Array("Name", "Age");

     jg('.error').hide();
	 

        if(inputVal[0] == ""){
            jg('#namelabel').after('<div class="error"> Please enter your ' + inputMessage[0] + '</div>');
        } 
        else if(!nameReg.test(names)){
            jg('#namelabel').after('<div class="error"> Letters only</div>');
        }
        if(inputVal[1] == ""){
            jg('#oldlabel').after('<div class="error"> Please enter your ' + inputMessage[1] + '</div>');
        } 
        else if(!numberReg.test(old)){
            jg('#oldlabel').after('<div class="error"> Numbers only</div>');
        }
		else{
			jg( "#qboardshow").toggle( 500 );
			jg( "#qstationthankyou").css("display", "inline-block");
			
			setTimeout(function() {
				jg('#qstationthankyou').fadeOut('fast');
				jg( "#qboardhide").show();
			}, 60000);
			
			jg('form').trigger("reset");
		}
	   
     
	}
	

		//qboardcol start
		var ref = new Firebase("https://dazzling-torch-589.firebaseio.com/queue/");
		var count 	= 0;

		ref.orderByChild("Status").equalTo("upcomming").on("child_added", function(snapshot) {
			++count;
			
	
					jg("#topTableLabel").after("<tr><td width='60%'><h1>"+ snapshot.val().generatedID + "</h1></td> <td width='40%'><h1>" + count + "</h1></td></tr>");
				
					
				
					
			
		});
	
			
		ref.orderByChild("Status").equalTo("skipped").on("child_added", function(snapshot){

				jg(".missednumber").append("<span>" + snapshot.val().generatedID + "</span>");


		});

});