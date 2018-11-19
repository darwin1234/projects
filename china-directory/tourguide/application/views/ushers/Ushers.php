<?php require_once('HeaderUsher.php');?>

    <!-- Guest Form -->

<div class="container" id="VIPFORM" style="background:white; padding:0;">

		<header id="form_head">		
			<h2 style="float:left"> Guest Information Form </h2>
			<h3 style="float:right"><?php echo date('F jS l') ;?></h3>	
					
		</header>
	 <form id="seachUpdate" >
		<div id="" class="form-group">
		   
			<label>Choose</label>
			<select name="visited" id="visited" class="form-control" required/>
			  <option value="0"></option>
			  <option value="1">1st time visitor</option>
			  <option value="2">2nd time visitor</option>
			  <option value="3">3rd time visitor</option>
			  <option value="4">4th time visitor</option>
		
			</select>
		 </div>
		 <div id="second_third_fourth" style="display:none;">
				<div class="form-group" style="margin-bottom:0;">
				  <input type="hidden" name="date" value="<?php echo date('F jS l Y') ;?>">
				  <label for="name">Search Name:</label>
				  <input type="text" autocomplete="off" name="name" class="form-control" name="" id="searchName" placeholder="Enter Full Name" required>
				  <input type='hidden' name="datevisited" id="datevisited" value="<?php echo date("j/n/Y"); ?>">
				  <button id="update" class="pull-right btn btn-primary" value="submit" style="margin-right:28px; margin-bottom:20px; margin-top: 20px; border-radius: inherit;" >Update</button>
				</div>
				<div class="form-group">
				<div id="results" style="margin-top: 0px; margin-left: 20px; background: #e2d5d5; width: 93%;">
				</div>
				</div>
				
		 </div>
	</form> 

  <form id="usherForm">
  
		<div id="first_time_form">
			<div class="form-group">
			  <input type="hidden" name="date" value="<?php echo date('F jS l Y') ;?>">
			  <label for="name">FullName:</label>
			  <input type="text" name="name" autocomplete="off" class="form-control" name="" id="name" placeholder="Enter Full Name" required>
			</div>
			<div class="form-group">
			  <label for="addrs">Address:</label>
			  <input type="text" name="Address" class="form-control" id="addrs" placeholder="Enter Address" required>
			</div>
			<div class="form-group">
			  <label for="contact">Contact Number</label>
			  <input type="text"  name="contact" autocomplete="off" class="form-control" id="contact" placeholder="Enter Contact Number" required>
			</div>
			<div class="form-group">
			  <label for="email">Email:</label>
			  <input type="text" name="Email" autocomplete="off" class="form-control"id="email" placeholder="Email" required>
			</div>
			<div class="form-group">
			  <label for="gender">Gender:</label>
			  <select  name="Gender" class="form-control" id="gender" placeholder="Enter Gender" required> 
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			  </select>
			 
			</div>
			<div class="form-group">
			  <label for="civil">Civil Status:</label>
			   <select   name="civilstatus" class="form-control" id="civilstatus" placeholder="Enter Civil Status" required> 
				<option value="Single">Single</option>
				<option value="Married">Married</option>
				<option value="Widow">Widow</option>
			  </select>
			
			</div>

			<div id="statusfields">
			
			</div>
			<div class="form-group">
				<label>Age Group</label>
				  <select name="AgeGroup" class="form-control" required>
						<option value="0"></option>
						<option value="1">11 yrs. and blw</option>
						<option value="2">12-15</option>
						<option value="2">16-20</option>
						<option value="2">21-25</option>
						<option value="2">26-35</option>
						<option value="2">36-45</option>
						<option value="2">46+</option>
				 </select>
			 </div>
			   <input type='hidden' name="datevisited" id="datevisited" value="<?php echo date("j/n/Y"); ?>">
			 <div class="form-group">
				<label for="invited">Invited By:</label>
				<input  type="text" name="invitation" class="form-control" id="invited" value="" placeholder="Name of the person who invited you">
				<div id="list" style="margin-left:20px;"></div>
			</div>
				<input type="hidden" name="visited" id="visited" value="1">
				<div class="form-group">
					<input type="submit" class="pull-right btn btn-primary" value="Submit" style="margin-right:60px; margin-bottom:20px; margin-top: 10px; border-radius: inherit;">
			</div>
			</div>
			 
		
  </form>
</div>
 		<!-- End of Guest Form -->

<?php require_once('FooterUsher.php');?>