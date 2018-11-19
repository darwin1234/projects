<style>
@media only screen and (min-width : 240px) and (max-width : 1024px) {
	
	.events{width:90%; margin: auto;  margin-top:100px!important;} 
	 .container{margin:0!important;}
	}

</style>

<div class="container" style="background:#fff; margin-top:16px;">
<?php 

//echo $today['month'] . ' - ' . $today['mon'] . ' - ' . $today['year'];
//echo var_dump($today);
 $date = strtotime("+7 day");
 //echo strtotime(date('M d, Y', $date));
 //echo var_dump($today); 
 //echo $today['mday'];

?>



<?php 

//$date = $today['month'] . ' - ' . $today['mon'] . ' - ' . $today['year'];
//$date = strtotime($date);
//$date = strtotime("+7 day", $date);
//echo date('M d, Y', $date);

?>

</div>

<?php  

	function events_display($params,$birthdays){ 
		$today = getdate();
		
		if($today['mon'] == 1){$birthMonth = "Jan";}
		if($today['mon'] == 2){$birthMonth = "Feb";}
		if($today['mon'] == 3){$birthMonth = "Mar";}
		if($today['mon'] == 4){$birthMonth = "Apr";}
		if($today['mon'] == 5){$birthMonth = "May";}
		if($today['mon'] == 6){$birthMonth = "Jun";}
		if($today['mon'] == 7){$birthMonth = "Jul";}
		if($today['mon'] == 8){$birthMonth = "Aug";}
		if($today['mon'] == 9){$birthMonth = "Sep";}
		if($today['mon'] == 10){$birthMonth = "Oct";}
		if($today['mon'] == 11){$birthMonth = "Nov";}
		if($today['mon'] == 12){$birthMonth = "Dec";}
	
		
		foreach($birthdays as $birthdaysEvent) { 
			
			//echo $today['mday'] . "<br>";
			if($params =="Birthday"){
					$remaining_days =  (int)($birthdaysEvent->birthdate - $today['mday']);
					if($remaining_days <=30 && $birthMonth == $birthdaysEvent->birthmonth) {
									
								
							
							echo "<h4 style='font-size:12px;'>" . $birthdaysEvent->first_name .' '. $birthdaysEvent->maiden_name . ' ' . $birthdaysEvent->last_name . "<span style='float:right; margin-right:10px;'>".$birthdaysEvent->birthmonth . " ". $birthdaysEvent->birthdate ."</span>"."</h4>";
					}
				 
			}  
			 
			
			if($params =="Aniversaries"){
				if( $birthMonth  == $birthdaysEvent->wedding_month){
					if($birthdaysEvent->wedding_date <= $today['mday'] + 20  ) {
						$years_together = date("Y") - $birthdaysEvent->wedding_year ; 
						echo "<h4 style='font-size:12px;'>" . $birthdaysEvent->first_name . $birthdaysEvent->last_name . "<span style=' margin-right:10px;'>" . " and " .$birthdaysEvent->spouse_name . "</span>".  $birthdaysEvent->wedding_month . " ".  $birthdaysEvent->wedding_date . " " . $birthdaysEvent->wedding_year  ."<span style='float:right; margin-right:5px;'>" . $years_together . " years together</span>"  . "</h4>";
					}
					
				}
			
				
			}
			
		 } 
		
		

	}

?>

<div class="container">
<header class="form_head" style="background: #f2b135; padding: 30px 20px; color: white; font-size: 1.2em; font-weight: 600;
  										border-radius: 10px 10px 0 0; overflow:auto; margin-top: 30px; border-bottom: 4px solid #9ea7af;">		
			<h2 style="float:left"> Upcoming Events </h2>
			<h3 style="float:right"><?php echo date('F jS l') ;?></h3>	
					
			</header>
</div>
<div class="container">
	
	
	
	<div class="events col-md-4" style="background:#fff; padding:0;">
	<h3 style="margin:0; padding:5px; background:#39a7e5;">Church Event</h3>
	<table style="color:#000; width:100%; border:0;">  

	<?php foreach($events_list as $eventList){ ?>
	
			<?php if(strtotime(date('M d, Y', $date)) >= strtotime($eventList->start)){ ?>
				<tr style="width:50%;">
				<td style="color:#000;"><?php echo $eventList->title; ?></td>
				<td style="color:#000;"><span> <?php echo $eventList->start; ?></span></td>
				</tr>
			<?php }?>
	
	
	<?php }?>
	</table>
	</div>
	<div class="events col-md-4" style="background:#fff; width:365px; padding:0;">
	<h3 style="margin:0; padding:5px; background:#e65901;">Birtdays</h3>
	<?php events_display("Birthday",$birthdays); ?>
	</div></ul>
	
	<div class="events col-md-4" style="background:#fff; padding:0;">
	<h3 style="margin:0; padding:5px; background:#9fcc24;">Anniversaries</h3>
	<?php events_display("Aniversaries",$birthdays); ?>
	</div>

</div>

