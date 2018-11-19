<?php 
@$counter = 0;



	 if($_POST['displaywhat']=="upcomming"){
		 
			foreach($queueboardArray as $queueBoardList) {
	
				if($queueBoardList->Status =="Upcomming"){
					$counter++;
					if($counter <=1){
						
						?>

						<li>
							<h3> <span><?php echo $queueBoardList->ID; ?></span></h3> 	
										
						</li>
						
						<?php 
					}
				}
			}
		 
		 
		 
	 }
	 
	 
	 if($_POST['displaywhat'] == "UPCOMING_NUMBERS"){
		 
		 foreach($queueboardArray as $queueBoardList) {
	
				if($queueBoardList->Status =="Upcomming"){
					
				
						
						?>

						<li>
							<h3> <span><?php echo $queueBoardList->ID; ?></span></h3> 	
										
						</li>
						
						<?php 
				
				}
			}
		 
		 
		 
	 }
	
	
	if($_POST['displaywhat'] == "SERVED"){
		 
		 foreach($queueboardArray as $queueBoardList) {
	
				if($queueBoardList->Status =="SERVED"){
					
				
						
						?>

						<li>
							<h3> <span><?php echo $queueBoardList->ID; ?></span></h3> 	
										
						</li>
						
						<?php 
				
				}
			}
		 
		 
		 
	}
	
	
	if($_POST['displaywhat'] == "SKIPPED"){
		 
		 foreach($queueboardArray as $queueBoardList) {
	
				if($queueBoardList->Status =="SKIPPED"){
					
				
						
						?>

						<li>
							<h3> <span><?php echo $queueBoardList->ID; ?></span></h3> 	
										
						</li>
						
						<?php 
				
				}
			}
		 
		 
		 
	}
	
	 
	 
	 

	
	






?>


