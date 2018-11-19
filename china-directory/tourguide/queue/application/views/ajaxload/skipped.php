<?php 
	
	@$counter2 = 0;

	foreach($queueboardArray as $queueBoardList) {

		if($queueBoardList->Status =="Skipped"){
			$counter2++;
			if($counter2 != 5){
			?>
		
												
					<span><?php echo $queueBoardList->ID; ?></span>
				
										
			
			<?php 
			}

		}
	}






?>
