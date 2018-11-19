<?php  foreach(@$list_of_records as $records){  ?>
				<?php if($records->mentor_id == $userID){ ?>
					<?php if($records->ranking >= 4 && $records->added_as_close_cell == 1 && $records->active == 1) { @$total++?>
					
					<li class="title"><a href="#" data-toggle="modal" data-target="#deactmyModal_<?php echo $records->id_no; ?>" style='color:#fff; display:block; width:79%; margin:auto; text-align:center;'  ><?php echo $records->first_name;?></a>
						<!-- Modal --> 
								<div id="deactmyModal_<?php echo $records->id_no; ?>" class="modal fade deactivate_activate" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header" style="clear:both;">
									<h1 style="text-align:center;"><?php echo $records->first_name; ?></h1>
								</div> 
								 
								  <div class="modal-body">
								  <form>
								   <div class="form-group">
								  
								   <img src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo $records->id_no; ?>" style="width:200px; margin: auto; display:block; margin-bottom:10px;">
									
									<?php if($records->active == 0){ ?>	
										<button class="btn btn-default" onclick="CCCSystem.deactivateAccount('<?php echo $records->id_no; ?>','1')" style="clear:both; display:block; margin:auto;">Deactive Account</button>
									<?php }else{?>
										
										 <button class="btn btn-default" onclick="CCCSystem.activateAccount('<?php echo $records->id_no; ?>','0')" style="clear:both; display:block; margin:auto;">Activate Account</button>
									
									<?php } ?>
									</div>
								  </form>	
								  </div>
								  <form id="searhLeaders" style="display: none">
								  <div class="modal-footer" style="clear:both;">
									<input type="text" name="search" value="" placeholder="Transer to" class="form-control" style="margin-bottom:10px;">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								  </form> 
								</div>

							  </div>
							</div>
					
					</li>
					<?php }?>
			 <?php } ?>					
		<?php }  ?>	
