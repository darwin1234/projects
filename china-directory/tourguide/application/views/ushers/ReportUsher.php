<?php require_once('HeaderUsher.php');?>


<!-- Report -->


		<table class="table-fill">
		<thead>
			<tr>
			<th class="text-left" style="color: white;">Full Name</th>

			<th class="text-left" style="color: white; display:none;">Mentor</th>
			<th class="text-left" style="color: white; display:none;" >Gender</th>

			</tr>
		</thead>
		<tbody class="table-hover">

		<?php foreach($list_of_records as $records)
		{ ?>

							<?php $counter++; ?>
							<?php if($records->Roles =="Primary Leader") { ?>
							<tr>
							<td class="title"><a href="#" data-toggle="modal" data-target="#myModal-<?php echo $counter;?>">
							<?php echo $records->FullName;?></a>
							
							<div id="myModal-<?php echo $counter;?>" class="modal fade" role="dialog">
															<div class="modal-dialog">

																		<!-- Modal content-->
															<div class="modal-content">
															<form id="Send_for_consodilation">
															<div class="modal-header">

															<h4 class="modal-title" style="color: black;">Consolidate to: </h4>

															<div class="modal-body">
															<table class="table">
															<thead>
															<tr>
															<th>FullName</th>
															<th>Address</th>
															<th>Invited By:</th>
															<th>Gender</th>
															<th>Select</th>
															</tr>
															</thead>

															<?php foreach($visitors as $visitorsRow){ ?>
																<?php if($visitorsRow->visited == 1) { ?>
																	<?php if($records->Gender == $visitorsRow->Gender) {?>
																			<?php if(empty($visitorsRow->foreign_key)){ ?>
																						<tr>
																						<td>
																						<input type="hidden" name="Name[]" NamevistorsID="<?php echo $visitorsRow->ID; ?>" class="Name" value="<?php echo $visitorsRow->name; ?>">
																						<?php echo $visitorsRow->name; ?>
																						</td>
																						<td><input type="hidden" name="Address" AddressvistorsID="<?php echo $visitorsRow->ID; ?>"  class="Address" value="<?php echo $visitorsRow->Address; ?>">
																						<?php echo $visitorsRow->Address; ?>
																						</td>
																						<td><input type="hidden" name="invitor" invitorvistorsID="<?php echo $visitorsRow->ID; ?>"  class="invitor" value="<?php echo $visitorsRow->invitation; ?>">
																						<?php echo $visitorsRow->invitation; ?></td>
																						<td><input type="hidden" name="gender" gendervistorsID="<?php echo $visitorsRow->ID; ?>"  class="gender" value="<?php echo $visitorsRow->Gender; ?>">
																						<?php echo $visitorsRow->Gender; ?></td>
																						<td><input type="checkbox" class="select" id="select" name="select" value="<?php echo 'ID=' .$visitorsRow->ID; echo "&leaderID=".$records->username;?>"></td>
																						</tr>
																			<?php } ?>
																	<?php } ?>	
																<?php } ?>
																					
															<?php } ?>
																			</table>
															</div>

															<div class="modal-footer">
															<input type="submit" class="insert_record_visitor_form btn btn-primary" value="Send to <?php echo $records->FullName;?> ">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
															</form>
															</div>

																	  </div>
																	</div>
							</td>
							<td class="MentorName" style="display:none; ">
												<?php //echo $records->MentorUsername; ?>
															
												
											
							</td>
							<td style="display:none; ">
							<?php echo $records->Gender; ?>
							</td>
						</tr>	
							<?php } ?>

								
										
		<?php } ?>
					

			</tbody>
	</table>