<?php

	@$cpimt = 1;
	function disciplecount($test,$id_no){
								
			foreach($test as $discipleCount){
					if($discipleCount->mentor_id == $id_no && $discipleCount->added_as_close_cell == 1 && $discipleCount->active == 0){@$cpimt++;}
										
			}
			
			return @$cpimt;
	}
						
	
						
?>
   
<?php 

	function getRecordWithParentId($id, $records) {
    $records_under_parent = [];
	    foreach ($records as $record) {
	        if ($record->mentor_id == $id) {
	            $records_under_parent[] = $record;
	            $records_under_parent = array_merge($records_under_parent, getRecordOfSubRecordWithParenId($record->id_no, $records));
			}
		}
		return count($records_under_parent);
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


?>
		<tr style="display: none">
			<td>
				<style>

					.search-transfer-result-item-name {
						font-size: 14px;
						border-width: 0px;
					}
					
					.search-transfer-result-bar {
						width: 100%;
						display: block;
					}
					
					#listofrecords .table a, .table th .a2{color:white!important;}
					#listofrecords .table a, .table th .a2:hover {color:#2B86EC!important;}

				</style>
				
				<script src="<?php echo base_url(); ?>Welcome/scripts/ajax.js"></script>
				
				<script>
					
					var transferMentorID = 0;
					
					function setTransfer(elem, id, id2) {
						transferMentorID = id2;
						document.getElementById('transfer-search-results'+id).innerHTML = "";
						document.getElementById('search-transfer-'+id).value = elem.innerHTML.toUpperCase();
						document.getElementById('transferto-image'+id).src = "";
						document.getElementById('transferto-image'+id).src = "<?php echo base_url(); ?>Welcome/userimage2/"+id2;
						document.getElementById('transfer-load-image'+id).style.display = "";
						document.getElementById('transfer-button-'+id).style.display = "";
					}  
				
					function doTransfer(id) {
						
						//alert(transferMentorID + " " + id);
						//return;
						
						if(transferMentorID) {
							var a = new ajax('<?php echo base_url(); ?>Welcome/transferto2');
							a.params = {'id':id, 'mentor':transferMentorID};
							a.success = function(){
								if(a.responseText == "DONE") { window.location.reload(); }
								else { alert(a.responseText); } 
							};
							a.send();
							document.getElementById('transfer_'+id).click();
						}
						
					}
					
					function doDelete(id) {
						if(confirm("This action will delete the disciple's account/information permanently.\nContinue?")) {
							var a = new ajax('<?php echo base_url(); ?>Welcome/deleteaccount');
							a.params = {'id':id};
							a.success = function(r){
								if(r == "") { location.reload(); }
								else { alert(r); }
							};
							a.send();
						}
					}
				
				</script>
				
			</td>
		</tr>

		<?php  foreach(@$list_of_records as $records){  ?>
			
				
					<tr>
					<th class="title">
						<img id="user-image-thumb<?php echo $records->business_id; ?>" src="<?php echo $records->business_image; ?>" style="float:left; width:40px; height:40px; margin:0; margin-right:10px; padding:0; border-radius:20px; display:block; border:2px solid #2B86EC;">
						<a href="<?php echo base_url();?>Welcome/edit/<?php echo $records->business_id; ?>" style="margin-left:10px; margin-top:14px; font-size:12px; display:block;"><?php echo strtoupper($records->business_name); ?></a></th>
				
					</th>
					<th class="address">
						
					<?php echo strtoupper($records->administrative_area_level_1).' '.$records->postal_code; ?>
				
					</th>
					<th class="address">
						
					<?php echo strtoupper($records->business_category); ?>
				
					</th>
					<th class="address">
						
						
				
					</th>
					</tr>
					
					
			
					
		<?php }  ?>	
		