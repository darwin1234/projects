<?php 



	@$counter = 0;
	foreach($queueboardArray as $queueBoardList) {

		if($queueBoardList->Status =="Upcomming"){
			$counter++;
			if($counter !== 5){
				
			?>
			<tr>
												
					<td  width="60%"><h2><?php echo $queueBoardList->ID; ?></h2></td>
					<td  width="40%"><h2><?php echo ++$counter; ?></h2></td>
										
			</tr>
			<?php 
			}
		}
	}






?>
