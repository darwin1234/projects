<?php
 date_default_timezone_set("Asia/Taipei"); 
 
 function attend($attendedTable,$userID,$date_t,$services_t){
	 
	 foreach($attendedTable as $attendedList){
		 
		 if($attendedList->user_id == $userID && $attendedList->date_t == $date_t && $attendedList->services_attended == $services_t){
			 
			 	@$tick = "<span style='text-align:center; display:block;'>Attended</span> ";			
		 }
			
		  
	 }
	 
	 
	 return @$tick;
	 
 }
 

	foreach($attendance_for_attendance as $attendancelist){
		?>
		
			  <tr>
								<td><img src="<?php echo !empty($attendancelist->profile_pic) ? base_url() . 'images/' . $attendancelist->profile_pic : "http://www.sheffield.com/wp-content/uploads/2013/06/placeholder.png"; ?>" style="width:40px; height:40px; margin:15px auto; padding:0; border-radius:20px; display:block;"><strong><span style="clear:both; font-size:9px;  text-align:center; display:block; margin:0;"> <?php echo $attendancelist->first_name; ?></span></strong></td>
								<td style="text-align:right;">
								  <table class="table table-striped">
										<thead> 
											<tr>
												<th><span style="font-size:11px; text-align:center; display:block; ">Saturday ReMYX</span></th>
												<th><span style="font-size:11px; text-align:center; display:block;">Sunday Services</span></th>
												<th><span style="font-size:11px; text-align:center; display:block;">Remyx: 5pm</span></th>
												<th><span style="font-size:11px; text-align:center; display:block;">Sunday</span></th>
											</tr>
										</thead>
										<tbody>
										  <tr>
											<td>
											<?php  echo attend($list_of_attendance,$attendancelist->id_no,date('Y-m-d'),1);?>
											</td>
											<td>
											<?php  echo attend($list_of_attendance,$attendancelist->id_no,date('Y-m-d'),2);?>
											</td>
											<td>
											<?php  echo attend($list_of_attendance,$attendancelist->id_no,date('Y-m-d'),3);?>
											</td>
											<td>
											<?php  echo attend($list_of_attendance,$attendancelist->id_no,date('Y-m-d'),4);?>
											</td>
										  </tr>
										</tbody>
								  </table>	
								
								</td>
								
								
			</tr>  
		 
		
		
		<?php
		
		
		
	}
?>