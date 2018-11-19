 <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/opencell.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylefront.css">
<?php 

	function getRecordWithParentId($id, $records) {
	$records_under_parent = [];
		foreach ($records as $record) {
			if ($record->mentor_id == $id) {
				$records_under_parent[] = $record;
				$records_under_parent = array_merge($records_under_parent, getRecordOfSubRecordWithParenId($record->id_no, $records));
			}
		}
		return $records_under_parent;
	}

	function getRecordOfSubRecordWithParenId($id, $records) {
		$records_under_parent = [];
		foreach ($records as $record) {
			if ($record->mentor_id == $id) {
				$records_under_parent[] = $record;
				$records_under_parent = array_merge($records_under_parent, getRecordOfSubRecordWithParenId($record->id_no, $records));
			}
		}
		return $records_under_parent;
	}
	
	function leaders($leaders,$leadersID){
		
		foreach($leaders as $leadersfields){
			if($leadersfields->id_no == $leadersID){
				
				@$leaderData =  "<a href='".base_url()."Welcome/disciples/" . $leadersfields->id_no  . "'style=' color:#333333; '>" . $leadersfields->first_name . "</a>";
				
			}
			
		}
		
		return @$leaderData;
		
	}
							
								
?>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
    
	<div id="opencell" class="container" style="width:90%;  margin:0 auto; margin-bottom:50px;">
		<div class="row">

		<header class="form_head" style="background: #244083; padding: 30px 20px; color: white; font-size: 1.2em; font-weight: 600;
  										 overflow:auto;  border-bottom: 4px solid #9ea7af;">		
			<h2 style="float:left"> VIP </h2>
			<h3 style="float:right"><?php echo date('F jS l') ;?></h3>	
					
		</header>
		<style>
			.vip-counts {
				position: relative;
				padding: 2px 6px;
				color: rgb(255, 255, 255);
				font-style: normal;
				font-variant: normal;
				font-weight: bold;
				font-stretch: normal;
				font-size: 0.9em;
				line-height: normal;
				font-family: Tahoma, Arial, Helvetica;
				border-radius: 3px;
				background: rgb(224, 36, 36);
			}
		</style>
		<?php
		
			for($i = 1; $i <= 4; $i++) {
				?>
			
		<div id="list<?php echo $i; ?>" class="col-md-3">
			<h4 style='text-align:left; margin:0; padding:10px; ; color:#fff;'><?php
				switch($i) {
					case 1: echo "First"; break;
					case 2: echo "Second"; break;
					case 3: echo "Third"; break;
					case 4: echo "Fourth"; break;
				}
				
			?> Timer<span style="float: right; display: none" class="vip-counts" id="vip-count-<?php echo $i; ?>"></span></h4>
				 <table class="table">
					<thead>
					  <tr>
						<th>Name</th>
						<th>Leader</th>
					  </tr>
					</thead>
					<tbody>
						<?php

							$count=0;
							foreach(getRecordWithParentId($userID, @$getRecordsDisplay) as $pepsollevelfields){
									if($pepsollevelfields->ranking == $i){
										$count++;
										echo "<tr>";
										echo 	"<td><a href='#' data-toggle='modal' data-target='#modelFourth_"  .  @$count . "'>" . $pepsollevelfields->first_name .' ' .$pepsollevelfields->last_name . "</td>";
										echo 	"<td>" .leaders(@$getRecordsDisplay,$pepsollevelfields->mentor_id) .
										 popUp($count,$pepsollevelfields->first_name,$pepsollevelfields->maiden_name,$pepsollevelfields->last_name,$pepsollevelfields->id_no,$getRecordsDisplay,$pepsollevelfields->Gender,$pepsollevelfields->role,$userID) .
										"</td>" ;
										echo "</tr>";
									}
								}
						?>
					</tbody>
				</table>
			</h4>
		</div>
			<script>
				var vipListDiv<?php echo $i; ?> = document.getElementById('vip-count-<?php echo $i; ?>');
				vipListDiv<?php echo $i; ?>.style.display = "";
				vipListDiv<?php echo $i; ?>.innerHTML = "<?php echo $count ?>";
			</script>
				<?php
			}
		
		?>
				
		</div>
	</div>
	
	
	
	
<?php 

//-------------------------------------------------------------------------------------------------------------

function popUp($count,$first_name,$maiden_name,$last_name,$id_no,$getRecordsDisplay,$Gender,$Role,$userID){
	?>
	<div id="modelFourth_<?php echo @$count; ?>" class="modal fade referpopup" role="dialog">
		<div class="modal-dialog">
				
			<div class="modal-content">
							  <div class="modal-header">
										<h4 class="modal-title" style="color:#000;"><?php echo $first_name . ' '. $maiden_name .' '. $last_name; ?></h4>
									  </div>
									
									<form class="consolidation_form" action='#'>
									  <div class="modal-body">
									   
										
									
											<div class="form-group">
											<?php 
												
												//@$conArray4  = json_decode($getData->ConDone4,true);
					
											?>
											<input type="hidden" name="formNumber" value="4" style="color:#000;">
											<input type="hidden" name="visitorID" value="<?php echo $id_no; ?>" style="color:#000;">
											<input type="checkbox"name="Prayed"  <?php echo @$conArray4["Prayed"] == 1 ? "checked=checked" : ""; ?> value="1">	
											<label for="Prayed" style="color:#000;">Prayed</label>			
											</div>
											<div class="form-group">
											<input type="checkbox" name="Shared_a_verse"  <?php echo @$conArray4["Shared_a_verse"] == 1 ? "checked=checked" : ""; ?>  value="1">		
											<label for="Shared a verse" style="color:#000;">Shared a verse</label>	
											</div>
											<div class="form-group">
											
											<input type="checkbox"name="Contacted"   <?php echo @$conArray4["Contacted"] == 1 ? "checked=checked" : ""; ?>   value="1">
											<label for="Contacted" style="color:#000;">Contacted</label>				
											</div>
											<div class="form-group">
											<input type="checkbox"name="Visited"  <?php echo @$conArray4["Visited"] == 1 ? "checked=checked" : ""; ?> value="1">
											<label for="Visited" style="color:#000;">Visited</label>				
											</div>		
										
										
									  </div>

									  </form>
									  <div class="modal-footer" style="margin-top:60px!important; background: #d0d0cc;">
										   
										   <div class="form-group">
											<h3 style="float:left; color:#000;">Refer To</h3>
												
											<form id="form_referto" class="form_referto">
													<input type="hidden" name="accountID" class="form-control" value="<?php echo $id_no;?>">
													<select id="referto" name="referto" class="form-control">
														<?php $cData = 0; ?>
														<?php
															foreach($getRecordsDisplay as $referto){ ?>
															<?php if($referto->Gender ==$Gender && $referto->role ==  $Role && $referto->id_no != $userID || $referto->mentor_id == $userID && $referto->added_as_close_cell == 1) {?>
																<?php $cData++;?>
																	<?php
																		if($cData == 1) { ?>
																			<option value="<?php echo $referto->id_no?>" selected><?php echo $referto->first_name . ' ' . $referto->last_name . "----" .  $referto->role; ?></option>
																		<?php }else{ ?>
																			<option value="<?php echo $referto->id_no?>"><?php echo $referto->first_name . ' ' . $referto->last_name . "----" .  $referto->role; ?></option>
																		<?php } ?>
															
															<?php }?>
														<?php }  ?>
													
													</select>
													<button type="button" class="btn btn-default" data-dismiss="modal"  style="margin-top:20px;">Close</button>
													<input type="submit" value="Refer To" class="btn" style="margin-top:20px; background:#428bca; " >
													
											</form>
											</div>
											
										  </div>
									</div>

				</div>
		</div>
		<?php 
	
}	

?> 
	