<?php  foreach(@$list_of_records as $records){  ?>
			
				
					<tr>
					<th class="title">
						<img id="user-image-thumb<?php echo $records->business_id; ?>" src="<?php echo $records->business_image; ?>" style="float:left; width:40px; height:40px; margin:0; margin-right:10px; padding:0; border-radius:20px; display:block; border:2px solid #2B86EC;">
						<a href="<?php echo base_url();?>administrator/edit/<?php echo $records->business_id; ?>" style="margin-left:10px; margin-top:14px; font-size:12px; display:block;"><?php echo strtoupper($records->business_name); ?></a></th>
				
					</th>
					<th class="address">
						
					<?php echo strtoupper($records->administrative_area_level_1).' '.$records->postal_code; ?>
				
					</th>
					<th class="address">
						
					<?php echo strtoupper($records->business_category); ?>
				
					</th>
					<th class="address1">
						<center>
						<a href="<?php echo base_url(). 'actions/delete/' . $records->business_id; ?>"> Delete </a>	|					
						<a href="<?php echo base_url(). 'administrator/edit/' . $records->business_id; ?>"> Edit </a> |				
						<a href="<?php echo base_url(). 'actions/deactivate/' . $records->business_id; ?>"> Deactivate </a>				
						</center>
					</th>
					
					</tr>
					
					
			
					
		<?php }  ?>	
		