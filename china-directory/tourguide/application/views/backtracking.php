
<style>
.selected {
    background:#8a7474;
}
.ui-button-icon-only .ui-button-text, .ui-button-icons-only .ui-button-text{padding:0!important;}
#listofData{list-style:none; margin:0; padding:0;}
#listofData li{margin:0;  padding:0;}
#listofData li a{padding:5px;}
input[type="text"]{width:90%;}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datevisited" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd/mm/yy'
    });
  } );
  </script>
    <!-- Guest Form -->


	<?php  date_default_timezone_set("Asia/Taipei");  ?>
<div class="container" id="VIPFORM" style="background:white; padding:0;">

		<header id="form_head" style="background: #ff3838;">		
			<h2 style="float:left"> Backtracking Form</h2>					
			<!--<h3 style="float:right"><?php echo date('F jS l') ;?></h3>-->				
		</header>
		
	<!-- <form id="seachUpdate" class="container seachUpdate" style="display:none;" >
		<div id="" class="form-group">
		   
			<label>Choose *</label>
			<select name="visited" id="visited" class="form-control" required />
			  <option value="1">1st time visitor</option>
			  <option value="2">2nd time visitor</option>
			  <option value="3">3rd time visitor</option>
			  <option value="4">4th time visitor</option>
			
			</select> 
		 </div>
		 <div id="second_third_fourth" style="display:none;">
				<div class="form-group" style="margin-bottom:0;">
				  <input type="hidden" name="date" value="<?php echo date('F jS l Y') ;?>">
				  <label for="name">Search Name</label>
				  <input type="text" autocomplete="off" name="name" class="form-control" name="" id="searchName" placeholder="Enter Full Name" required>
				  <input type='hidden' name="datevisited" id="datevisited" value="<?php echo date("j/n/Y"); ?>">
				  <input type="hidden" name="visitorID" id="visitorID" value="">
				  <button id="update" class="pull-right btn btn-primary" value="submit" style="margin-right:28px; margin-bottom:20px; margin-top: 20px; border-radius: inherit;" >Update</button>
				</div>
				<div class="form-group">
				<div id="results" style="margin-top: 0px;  background: #e2d5d5; width: 100%;">
				</div>
				</div>
				
		 </div>
	</form>--> 

  <form id="usherForm" class="container usherForm" style="display:block!important;">
		<div id="" class="form-group">
		   
			<label>Choose *</label>
			<select name="visited" id="visited" class="form-control" required >
			  <option value="1">1st time visitor</option>
			  <option value="2">2nd time visitor</option>
			  <option value="3">3rd time visitor</option>
			  <option value="4">4th time visitor</option>
			  <option value="4">Pre Encounter</option>
			  <option value="5">Encounter</option>
			  <option value="6">Post Encounter</option>
			  <option value="7">SOL 1</option>
			  <option value="8">SOL 2</option>
			  <option value="9">Re Ecounter</option>
			  <option value="10">SOL 3</option>
			  <option value="11">Graduate</option>
			  <option value="12">Visiting</option>
			</select>
		 </div>
		  
		
		  
		 
		 
		  
		
		
		<div class="first_time_form">
		
		  <label for="name">Choose Date *</label>
			<input type="text" name="datevisited" id="datevisited" style="margin-top:10px;" value="<?php echo date("j/n/Y"); ?>" >
		
		
		 <div class="col-md-6" style="padding:0;">
			<div class="form-group">
			  <input type="hidden" name="date" value="<?php echo date('F jS l Y') ;?>">
			  <label for="name">First Name *</label>
			  <input type="text" name="first_name" autocomplete="off" class="form-control first_name" name="" id="name"  placeholder="Enter First Name" required>
			</div>
			<div class="form-group">
			  <input type="hidden" name="date" value="<?php echo date('F jS l Y') ;?>">
			  <label for="name">Maiden Name</label>
			  <input type="text" name="maiden_name" autocomplete="off" class="form-control maiden_name" id="name" placeholder="Enter Maiden Name" >
			</div>
			
			<div class="form-group">
			  <input type="hidden" name="date" value="<?php echo date('F jS l Y') ;?>">
			  <label for="name">Last Name *</label>
			  <input type="text" name="last_name" autocomplete="off" class="form-control last_name" name="" id="name"   placeholder="Enter Last Name" required>
			</div>
			
			<div class="form-group">
			  <label for="addrs">Address *</label>
			  <input type="text" name="Address" class="form-control" id="addrs" placeholder="Complete Address" required>
			</div>
			<div class="form-group">
			  <label for="contact">Contact Number *</label>
			  <input type="text"  name="contact" autocomplete="off"  onkeypress="usher.validationCP();" id= autocomplete="off" class="form-control contact" id="contact" placeholder="Must be 11 digit, ex. 09101234567">
			  <div class="CpValidation" style="margin-left:20px;"></div>
			</div>
			
		 
		 </div>
		
		  <div class="col-md-6"  style="padding:0;">
			<div class="form-group">
			  <label for="email">Email</label>
			  <input type="text" name="Email" autocomplete="off" onkeypress="usher.validationEmail();" class="form-control"id="email" placeholder="Enter Email">
			  <div class="EmailValidation" style="margin-left:20px;"></div>
			</div>
			 <div class="form-group">
				  <label for="gender">Gender *</label>
				  <select  name="Gender" class="form-control" id="gender" placeholder="Choose Gender" required> 
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				  </select>
				 
				</div>
				<div class="form-group">
				  <label for="civil">Civil Status *</label>
				   <select   name="civilstatus" class="form-control" id="civilstatus" placeholder="Choose Civil Status" required> 
					<option value="Single">Single</option>
					<option value="Married">Married</option>
					<option value="Widow">Widower</option>
				  </select>
				
				</div>

				<div id="statusfields">
				
				</div>
				<div class="form-group">
				
				<!-- 1 Children
					 2-3 Youth
					 4-5 Young Adult
					 6-7 Adult -->
					 
					<label>Age Group *</label>
					  <select name="AgeGroup" class="form-control AgeGroup" required/>
							<option value="1" selected>11 yrs. and blw</option>
							<option value="2">12-15</option>
							<option value="3">16-20</option>
							<option value="4">21-25</option>
							<option value="5">26-35</option>
							<option value="6">36-45</option>
							<option value="7">46+</option>
					 </select>
				 </div>
				 <!--<input type='hidden' name="datevisited" id="datevisited" value="<?php echo date("j/n/Y"); ?>">-->

				 <label for="invited">Invited by *</label>
				 <input  type="text" name="invitation"  autocomplete="off"  class="form-control" id="invited" value="" placeholder="Inviter Full Name, if none please type Walk In">	
		 
		  </div>
			
			 <div class="form-group" style="width:100%; clear:both;">
						
						<div id="Refer_To">
							<label for="Send_To">Refer To *</label>
							<input  type="text" name="Send_To" autocomplete="off" class="form-control" id="Send_To" value="" placeholder="Network Leader" required>
						</div>
						<div id="list" style="margin-left:20px;"></div>
						<div id="results1" style="width: 100%; margin: auto; background: #e2d5d5;"></div>
						<!--<input type="hidden" name="visited" id="visited" value="1">-->
						<input type="hidden" name="foreign_key" id="foreign_key" value="">
						<div class="form-group">
								<input type="submit" class="pull-right btn btn-primary" value="SUBMIT" 
								style="margin-bottom:20px; margin-top: 20px; border-radius: inherit;">
						</div>
			</div>
			 		
  </form>
</div>

<div id="confirmed" title="Dialog Title">

</div>
