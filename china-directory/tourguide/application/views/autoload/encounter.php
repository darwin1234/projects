 <table class="table">
			<thead>
			  <tr>
				<th>FullName</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Email </th>
				<th>Send</th>

			  </tr>
			</thead>
			<tbody id="encounter">
			<?php $counter = 0;?>
				<?php foreach($getRecordsDisplay as $getRecordsDisplayfields){ ?>
					<?php if($getRecordsDisplayfields->ranking ==5) { ?>
							<?php  if($getRecordsDisplayfields->mentor_id == $userID) { ?>
								<?php $counter++; ?>
									<tr>
										<td><?php echo "<a href='#'> ".$getRecordsDisplayfields->first_name .' '. $getRecordsDisplayfields->maiden_name. ' ' .$getRecordsDisplayfields->last_name . "</a>"; ?></td>
										<td><?php echo "<a href='#'> ".$getRecordsDisplayfields->address . "</a>";?></td>
										<td><?php echo "<a href='#'> ".$getRecordsDisplayfields->contact . "</a>"; ?></td>
										<td><?php echo "<a href='#'> ".$getRecordsDisplayfields->email . "</a>"; ?></td>
										 
											<?php  if($getRecordsDisplayfields->enrolled == 2){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',1)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',2)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									</tr>
								<?php } ?>
			
				
		  </table>	
<h2>Total Encounter Delegates: <?php echo $counter;?></h2>