<?php 

	//if($_POST['displaywhat']=="upcomming"){
		 
			foreach($queueboardArray as $queueBoardList) {
	
				if($queueBoardList->Status =="Upcomming"){
				
					//if($counter <=1){
						
						?>

						<li>
							<h3> <span><?php echo $queueBoardList->ID; ?></span></h3> 	
										
						</li>
						
						<?php 
					//}
				}
			}
		 
		 
		 
	//}
?>
	 