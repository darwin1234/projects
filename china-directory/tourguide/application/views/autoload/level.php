 <?php $level =  @$_GET['level'] | @$_POST['level'];?>
<?php if(@$userRole == "Pastor") { ?>
<table class="table">
		
			<?php @$limitDisplay = 0; ?>
			<?php foreach($getRecordsDisplay as $getRecordsDisplayfields){ ?>
					<?php  @$limitDisplay++; ?>
					<?php if(@$limitDisplay <= 5){ ?>
					<tr style="height: 0px;">
										<td style="width: 40px;" align="center"><img src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo $getRecordsDisplayfields->id_no; ?>" style="width: 40px; height: 40px; margin: 0px;"></td>
										<td valign="center" style="vertical-align: middle"><?php echo "<a href='".base_url()."Welcome/disciples/". $getRecordsDisplayfields->id_no ." ' class='admin-searchResults'> ". strtoupper( $getRecordsDisplayfields->first_name .' '. $getRecordsDisplayfields->maiden_name. ' ' .$getRecordsDisplayfields->last_name ) . "</a>"; ?></td>
								
					</tr>					
					<?php } ?>
			
			<?php } ?>
			
		
</table>			
<style>
	.admin-searchResults { color: black }
	.admin-searchResults:hover { color: red }
</style>

<?php } else {?> 
 <table class="table">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Email </th>
				<th>Send</th>

			  </tr>
			</thead>
			<tbody id="encounter">
			<?php $counter = 0;?>
				<?php foreach($getRecordsDisplay as $getRecordsDisplayfields){ ?>
					<?php if($getRecordsDisplayfields->ranking ==$level && $getRecordsDisplayfields->id_no != @$userID ) { ?>
							<?php if(!empty(@$_POST['level'])) { ?>
									<tr>
										<td><?php echo "<a href='".base_url()."Welcome/disciples/". $getRecordsDisplayfields->id_no ." '> ".$getRecordsDisplayfields->first_name .' '. $getRecordsDisplayfields->maiden_name. ' ' .$getRecordsDisplayfields->last_name . "</a>"; ?></td>
										<td><?php echo $getRecordsDisplayfields->address;?></td>
										<td><?php echo $getRecordsDisplayfields->contact; ?></td>
										<td><?php echo  $getRecordsDisplayfields->email; ?></td>
										 <?php if($level ==4 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 1 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',0,4)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 0 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',1,4)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>	


										<?php if($level ==5 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 2 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',1,5)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 1 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',2,5)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>		
												
												
												
										 <?php if($level ==6 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 3 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',2,6)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 2 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',3,6)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>			
												
												
										<?php if($level ==7 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 4 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',3,7)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 3 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',4,7)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>			
												
												
										<?php if($level ==8 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 5 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',4,8)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 4 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',5,8)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>		


										<?php if($level ==9 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 6 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',5,9)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 5 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',6,9)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>

										<?php if($level ==10 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 7 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',6,8)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 6 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',7,8)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>	

										  
												</tr>
							
							<?php }else{ ?>
							<?php if($getRecordsDisplayfields->mentor_id == @$userID) { ?>
								<?php $counter++; ?>
									<tr>
										<td><?php echo "<a href='".base_url()."Welcome/disciples/". $getRecordsDisplayfields->id_no ." '> ".$getRecordsDisplayfields->first_name .' '. $getRecordsDisplayfields->maiden_name. ' ' .$getRecordsDisplayfields->last_name . "</a>"; ?></td>
										<td><?php echo $getRecordsDisplayfields->address;?></td>
										<td><?php echo $getRecordsDisplayfields->contact; ?></td>
										<td><?php echo  $getRecordsDisplayfields->email; ?></td>
										 <?php if($level ==4 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 1 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',0,4)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 0 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',1,4)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>	


										<?php if($level ==5 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 2 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',1,5)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 1 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',2,5)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>		
												
												
												
										 <?php if($level ==6 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 3 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',2,6)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 2 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',3,6)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>			
												
												
										<?php if($level ==7 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 4 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',3,7)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 3 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',4,7)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>			
												
												
										<?php if($level ==8 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 5 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',4,8)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 4 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',5,8)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>		


										<?php if($level ==9 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 6 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',5,9)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 5 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',6,9)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>

										<?php if($level ==10 ){ ?>
											<?php  if($getRecordsDisplayfields->enrolled == 7 && $getRecordsDisplayfields->active !=1){?>
												<td><button  id="enroll_func_id" onclick="CCCSystem.enroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',6,8)">Enrolled</button></td>
											<?php }else{ ?>
													<?php  if($getRecordsDisplayfields->enrolled == 6 && $getRecordsDisplayfields->active !=1){?>
														<td><button  id="enroll_func_id" onclick="CCCSystem.unenroll_func('<?php echo $getRecordsDisplayfields->id_no; ?>',7,8)">Enroll</button></td>
													<?php } ?>
												<?php } ?>
										  <?php } ?>	

										  
												</tr>
											<?php } ?>
								<?php } ?>
										<?php } ?>
									
								<?php } ?>
			
				
		  </table>	
<h2>Total: <?php echo $counter;?></h2>
<?php } ?>