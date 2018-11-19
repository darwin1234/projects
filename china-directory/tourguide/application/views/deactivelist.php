
		<?php  foreach(@$list_of_records as $records){  ?>
				<?php if($records->mentor_id == $userID){ ?>
					<?php if($records->ranking >= 6 && $records->added_as_close_cell == 1 && $records->active == 1) { @$total++?>
					<tr>
					<td class="title"><a href="<?php echo base_url();?>Welcome/disciples/<?php echo $records->id_no; ?>"><?php echo $records->first_name. ' '. $records->maiden_name. ' '. $records->last_name;?></a></td>

					 <td class="selected last"><a href="javascript:void();" data-toggle="modal" data-target="#myModal_Edit<?php echo $records->id_no; ?>"  >Edit</a> 
					 	<!-- Modal -->
							<div id="myModal_Edit<?php echo $records->id_no; ?>" class="modal fade deactivate_activate" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header" style="clear:both;">
									<h1><?php echo $records->first_name; ?></h1>
								</div> 
								 
								  <div class="modal-body">
								  <form>
								   <div class="form-group">
								  
								   <img src="<?php echo !empty($records->profile_pic) ? base_url() . 'images/' . $records->profile_pic : ' http://massconline.com/memberpages/images/portrait_placeholder.jpg'; ?>" style="width:200px; margin: auto; display:block; margin-bottom:10px;">
									
									<?php if($records->active == 0){ ?>	
										<button class="btn btn-default" onclick="CCCSystem.deactivateAccount('<?php echo $records->id_no; ?>','1')" style="clear:both;">Deactive Account</button>
									<?php }else{?>
										
										 <button class="btn btn-default" onclick="CCCSystem.activateAccount('<?php echo $records->id_no; ?>','0')" style="clear:both;">Activate Account</button>
									
									<?php } ?>   
									</div>
								  </form>	
								  </div>
								  <form id="searhLeaders">
								  <div class="modal-footer" style="clear:both;">
									<input type="text" name="search" value="" placeholder="Transer to" class="form-control" style="margin-bottom:10px;">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								  </form> 
								</div>

							  </div>  
							</div>
					 
					 </td>
					</tr>
					<?php }?> 
			 <?php } ?>					 
		<?php }  ?>	 
	