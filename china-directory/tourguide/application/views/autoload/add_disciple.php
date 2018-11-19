<label for="Name">Full Name:</label>
	<select name="Name" id="FullName" class="form-control">
		<?php  foreach($list_of_records as $level6deletegates){ ?>
				<?php if($level6deletegates->ranking >=4) {?>
					<?php if($level6deletegates->mentor_id == $userID){ ?>
							<?php if(@$level6deletegates->Gender =="Male") {@$Gender ="Male";}else{@$Gender ="Female";}?>
									<?php if($level6deletegates->added_as_close_cell != 1) {?>
												<option attrID="<?php echo $level6deletegates->id_no; ?>" value="<?php echo $level6deletegates->first_name .' '. $level6deletegates->maiden_name .' '. $level6deletegates->last_name  ;?>"><?php echo $level6deletegates->first_name .' '. $level6deletegates->maiden_name .' '. $level6deletegates->last_name  ;?></option>
									<?php } ?>
							<?php } ?>
															
					<?php } ?>
		<?php } ?>
	</select>
		<?php if(isset($userRole) && !empty($userRole)){?>
					<?php if($userRole == "Pastor"){?>
						<input type="hidden" name="userRole" value="Primary Leader">
					<?php }else if($userRole =="Primary Leader") { ?>
						<input type="hidden" name="userRole" value="144">
					<?php }else if($userRole =="144") {?>
						<input type="hidden" name="userRole" value="1728">
					<?php }else if($userRole =="1728") {?>
						<input type="hidden" name="userRole" value="20736">
					<?php }else if($userRole =="20736") {?>
						<input type="hidden" name="userRole" value="24832">
					<?php } ?>
			<?php }?>	

		<input type="hidden" name="Gender" value="<?php echo @$Gender; ?>"> 