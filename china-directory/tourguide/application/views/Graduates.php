<div class="container" style="width:90% margin:0 auto; background:#fff;">
	<div class="inner_pages row">
			<?php  date_default_timezone_set("Asia/Taipei");  ?>
			<header class="form_head" style="background: #a100f1; padding: 30px 20px; color: white; font-size: 1.2em; font-weight: 600;
  										border-radius: 10px 10px 0 0; overflow:auto; margin-top: 30px; border-bottom: 4px solid #9ea7af;">		
			<h2 style="float:left">GRADUATES</h2>
			<h3 style="float:right"><?php echo date('F jS l') ;?></h3>	
					
		</header>
		
		
		 <table class="table">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Email</th>

			  </tr>
			</thead>
			<tbody>
			<?php $counter = 0;?>
				<?php foreach($getRecordsDisplay as $getRecordsDisplayfields){ ?>
					<?php if($getRecordsDisplayfields->ranking ==11 && $getRecordsDisplayfields->active !=1) { ?>
							<?php  if($getRecordsDisplayfields->mentor_id == @$userID) { ?>
								<?php $counter++; ?>
									<tr>
										<td><?php echo "<a href='".base_url()."Welcome/disciples/". $getRecordsDisplayfields->id_no ." '> ". $getRecordsDisplayfields->first_name .' '. $getRecordsDisplayfields->maiden_name. ' ' .$getRecordsDisplayfields->last_name . "</a>"; ?></td>
										<td><?php echo $getRecordsDisplayfields->address;?></td>
										<td><?php echo $getRecordsDisplayfields->contact; ?></td>
										<td><?php echo $getRecordsDisplayfields->email; ?></td>
							
									</tr>
								<?php } ?>
							<?php }	 ?>
				<?php } ?>
		  </table>	
	 	<h2>Total Graduates: <?php echo $counter;?></h2>
	</div>
</div>	
	  
