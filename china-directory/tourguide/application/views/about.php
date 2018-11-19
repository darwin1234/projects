

		<?php  foreach(@$list_of_records as $activeAccountFields){  
			if($activeAccountFields->id_no == $userID){
				
				@$EmailAddress			= $activeAccountFields->email;
				@$CellNumber			= $activeAccountFields->contact;
				@$CivilStatus			= $activeAccountFields->civil_status;
				@$Work					= $activeAccountFields->work;
				@$Address				= $activeAccountFields->address;
				@$Role					= $activeAccountFields->role;
				@$birthmonth			= $activeAccountFields->birthmonth;
				@$birthdate				= $activeAccountFields->birthdate;
				@$birthyear				= $activeAccountFields->birthyear;
			
				
			}
			
		}
			
		?>
				
				
					<li><h4>About</h4></li>
					<li>Role: <?php echo  @$Role;?> </li>
					<li>Email:		   <span style='color:#365899;'><?php echo @$EmailAddress;?></span></li>
					<li>Contact No:    <span style='color:#365899;'><?php echo @$CellNumber; ?></span></li>
					<li>Civil Status:  <span style='color:#365899;'><?php echo @$CivilStatus; ?></span></li>	
					<li>Work:		   <span style='color:#365899;'><?php echo @$Work; ?></span></li>	
					<li>Address 	   <span style='color:#365899;'><?php echo @$Address; ?></span></li>
					<li>Birth Date	   <span style='color:#365899;'><?php echo @$birthmonth . "-" . @$birthdate	. '-' . @$birthyear; ?></span></li>		
		