	<?php  date_default_timezone_set("Asia/Taipei");  ?>
<div class="container" style="width:90% margin:0 auto;">
	<div class="row">
		<div id="list1" class="col-md-3">
		<h2>First Timer</h2>
		 <table class="table">
			<thead>
			  <tr>
				<th>FullName</th>
				<th>Address</th>
				<th>Invited By:</th>
			  </tr>
			</thead>
			<tbody>
			<?php foreach($visitors as $visitorsRow){ ?>
				<?php if($visitorsRow->ranking == 1 && strtotime( preg_replace("|/|", "-", $visitorsRow->date_visited)) == strtotime(date("j-n-Y"))) { ?>
				<?php $total1++; ?>
				<tr>
				<td><?php echo $visitorsRow->first_name . ' ' . $visitorsRow->maiden_name . ' ' .$visitorsRow->last_name; ?></td>
				<td><?php echo $visitorsRow->address; ?></td>
				  <td><?php echo $visitorsRow->invited_by; ?></td>
			  </tr>
				<?php } ?>
				
			<?php } ?>

			 <tr>	
				<td><h3>Total</h3></td>
				<td></td>
				<td><h3><?php echo $total1; ?></h3></td>
			 
			 </tr>

			</tbody>
		  </table>
		 </div>
		 
		 <div id="list2" class="col-md-3">
		 <h2>Second Timer</h2>
		 <table class="table">
			<thead>
			  <tr>
				<th>FullName</th>
				<th>Address</th>
				<th>Invited By:</th>
			  </tr>
			</thead>
			<tbody>
			<?php foreach($visitors as $visitorsRow){ ?>
				<?php if($visitorsRow->ranking == 2 && strtotime(preg_replace("|/|", "-", $visitorsRow->date_visited)) == strtotime(date("j-n-Y"))) { ?>
				<?php $total2++; ?>
				<tr>
				<td><?php echo $visitorsRow->first_name . ' ' . $visitorsRow->maiden_name . ' ' .$visitorsRow->last_name; ?></td>
				<td><?php echo $visitorsRow->address; ?></td>
				  <td><?php echo $visitorsRow->invited_by; ?></td>
			  </tr>
				<?php } ?>
				
			<?php } ?>
			<tr>	

			 <tr>	
				<td><h3>Total</h3></td>
				<td></td>
				<td><h3><?php echo $total2; ?></h3></td>
			 
			 </tr>
			 
			 
			</tbody>
		  </table>
		 </div>
		 
		 <div id="list3" class="col-md-3">
		 <h2>Third Timer</h2>
		 <table class="table">
			<thead>
			  <tr>
				<th>FullName</th>
				<th>Address</th>
				<th>Invited By:</th>
			  </tr>
			</thead>
			<tbody>
			<?php foreach($visitors as $visitorsRow){ ?>
				<?php if($visitorsRow->ranking == 3 && strtotime( preg_replace("|/|", "-", $visitorsRow->date_visited)) == strtotime(date("j-n-Y"))) { ?>
				<?php $total3++; ?>
				<tr>
				<td><?php echo $visitorsRow->first_name . ' ' . $visitorsRow->maiden_name . ' ' .$visitorsRow->last_name; ?></td>
				<td><?php echo $visitorsRow->address; ?></td>
				  <td><?php echo $visitorsRow->invited_by; ?></td>
			  </tr>
				<?php } ?>
				
			<?php } ?>



			 <tr>	
				<td><h3>Total</h3></td>
				<td></td>
				<td><h3><?php echo $total3; ?></h3></td>
			 
			 </tr>
			 
			</tbody>
		  </table>
		 </div>
		 
		 
		 <div id="list4" class="col-md-3">
		 <h2>Fourth Timer</h2>
		 <table class="table">
			<thead>
			  <tr>
				<th>FullName</th>
				<th>Address</th>
				<th>Invited By:</th>
			  </tr>
			</thead>
			<tbody>
			<?php foreach($visitors as $visitorsRow){ ?>
				<?php if($visitorsRow->ranking == 4 && strtotime( preg_replace("|/|", "-", $visitorsRow->date_visited)) == strtotime(date("j-n-Y"))) { $total4++; ?>
						<tr>
						<td><?php echo $visitorsRow->first_name . ' ' . $visitorsRow->maiden_name . ' ' .$visitorsRow->last_name; ?></td>
						<td><?php echo $visitorsRow->address; ?></td>
						  <td><?php echo $visitorsRow->invited_by; ?></td>
						</tr>
				<?php } ?>
				
			<?php } ?>

			 <tr>	
				<td><h3>Total</h3></td>
				<td></td>
				<td><h3><?php echo $total4; ?></h3></td>
			 
			 </tr>
			 			 
			</tbody>
		  </table>
		  <div>
			
		 </div>
	 </div>
 </div> 
<h2 id="total">Total of visitors: <?php echo $total1+$total2+$total3+$total4;?></h2>  