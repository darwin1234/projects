<?php  date_default_timezone_set("Asia/Taipei");  ?>

<?php 
	function tickornot($attendanceTable,$userID,$date,$services_attended){
		foreach($attendanceTable as $attended){
			if($attended->user_id == $userID && $attended->date_t && $date  &&  $attended->services_attended ==$services_attended){
				
				@$result =  1;
			}else{
				
				@$result =  0;
				
			}
			
		}
		
		return @$result;
		
	}
?>
<tr>
		<th>
		<span style="font-size:11px; text-align:center; display:block;">
			<?php if(tickornot($list_of_attendance,$userID,date('Y-m-d'),1) == 1){ ?>	
					<button  onclick="CCCSystem.unattend('<?php echo $userID;?>','<?php echo date('Y-m-d'); ?>','1')" name="Saturday_ReMYX" id="Saturday_ReMYX" style="width:50%; height:30px;">Attended</button>
			<?php }else{?>
					<button onclick="CCCSystem.attend('<?php echo $userID;?>','<?php echo date('Y-m-d'); ?>','1')" name="Saturday_ReMYX" id="Saturday_ReMYX" >Attend</button>

			<?php } ?>
		</span>
		</th>
		<!--<th><span style="font-size:11px; text-align:center; display:block;">
			<?php if(tickornot($list_of_attendance,$userID,date('Y-m-d')) == 2){ ?>	
				<input type="checkbox" checked="checked" onclick="CCCSystem.attend('<?php echo $userID;?>','<?php echo date('Y-m-d'); ?>','2')" name="Saturday_ReMYX" id="Sunday_Services" value="1">
			<?php }else{?>
				<input type="checkbox" onclick="CCCSystem.attend('<?php echo $userID;?>','<?php echo date('Y-m-d'); ?>','2')" name="Saturday_ReMYX" id="Sunday_Services" value="1">

			<?php } ?>
		
		
		</span></th>
		<th><span style="font-size:11px; text-align:center; display:block;"><input type="checkbox" onclick="CCCSystem.attend('<?php //echo $userID;?>','<?php //echo date('Y-m-d'); ?>','3')" name="Remyx_5pm" id="Sunday_Services" value="1"></span></th>
		<th><span style="font-size:11px; text-align:center; display:block;"><input type="checkbox" onclick="CCCSystem.attend('<?php// echo $userID;?>','<?php //echo date('Y-m-d'); ?>','4')" name="Remyx_5pm" id="Sunday" value="1"></span></th>-->
</tr>