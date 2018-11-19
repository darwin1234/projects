
		<?php function counthistopencell($counthisopencell,$id_no,$ranking,$typeofchart){
				@$countOC = 0;
				/*if(!$userIDinsight == null){

					$id_no =  $userIDinsight; 

				}else{


					$id_no = $userIDinsight;

				}*/
				
				$id_no = $id_no;


				foreach($counthisopencell as $countopencell){
					if($countopencell->mentor_id == $id_no && $countopencell->ranking <=$ranking){
						
						$parts = explode('/', $countopencell->date_visited);
						$date_visited = date('d/m/Y', strtotime($countopencell->date_visited));;
							
							//$startCountDays = date('d/m/Y',strtotime($date_visited));
							
							if($typeofchart == 1){
								
								
										@$countOC++;
								
							}
							
							if($typeofchart == 2){
								$previousSunday	 = strtotime( "previous sunday" );
								$previousSunday = date('d/m/Y',strtotime($previousSunday));
								$previousSaturday	 = strtotime( "previous saturday" );
								$previousSaturday = date('d/m/Y',strtotime($previousSaturday));
								
								if($date_visited  == $previousSunday || $date_visited == $previousSaturday)
								{
										@$countOC++;
								}
							}
						
									
						 
					}
				
				}
				
			return @$countOC; 
			
		}?>
		
		
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
		  
		  function countNetwork($id,$counthisopencell,$t){
			  
			  
			   @$counterNetWork = 0;
				
			  foreach(getRecordWithParentId($id, $counthisopencell) as $countNetworkFields){
					if($t == "VIP") {
						
						 if($countNetworkFields->ranking <= 4){
					   
							@$counterNetWork++;
					   
						}
						
					} 

					if($t == "preEncounter") {
						
						 if($countNetworkFields->ranking == 4){
					   
							@$counterNetWork++;
					   
						}
						
					}

					if($t == "encounter"){
						
						
						 if($countNetworkFields->ranking == 5){
					   
							@$counterNetWork++;
					   
						}
						
					}


						
					if($t == "postencounter"){
						
						
						 if($countNetworkFields->ranking == 6){
					   
							@$counterNetWork++;
					   
						}
						
					}

					if($t == "sol1"){
						
						
						 if($countNetworkFields->ranking == 7){
					   
							@$counterNetWork++;
					   
						}
						
					}


					if($t == "sol2"){
						
						
						 if($countNetworkFields->ranking ==8){
					   
							@$counterNetWork++;
					   
						}
						
					}

					if($t == "re_encounter"){
						
						 if($countNetworkFields->ranking ==9){
					   
							@$counterNetWork++;
					   
						}
					}
					
					if($t == "sol3"){
						
						if($countNetworkFields->ranking ==10){
					   
							@$counterNetWork++;
					   
						}
					}
					
					if($t =="graduates"){
						if($countNetworkFields->ranking ==11){
					   
							@$counterNetWork++;
					   
						}
						
						
					}

								
				  
			   }
				   
				   
				   
			  return @$counterNetWork;
			  
		  }
								
			
			
			

	
	
	?>
		
		


<div class="container" style="margin-top:100px;">

		
			<div class="row">
			<h2 style="margin-bottom: 20px;"><?php echo ucwords(strtolower($activename)); ?>'s Network Insights</h2>
			
			<!-- FROM MULTIMEDIA -->
			
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
			
			
			
			
			
			
				<div id="Discipleseffortforvip" style="height: 400px; width: 100%;  margin-bottom: 50px;"></div>
				<div id="preecounternetworkdelegates" style="height: 400px; width: 100%;  margin-bottom: 50px;"></div>
				<div id="ecounternetworkdelegates" style="height: 400px; width: 100%;  margin-bottom: 50px;"></div>
				<div id="postecounternetworkdelegates" style="height: 400px; width: 100%;  margin-bottom: 50px;" ></div>
				<div id="sol1networkdelegates"  style="height: 400px; width: 100%;  margin-bottom: 50px;"></div>
				<div id="sol2networkdelegates"  style="height: 400px; width: 100%;  margin-bottom: 50px;"></div>
				<div id="reecounternetworkdelegates"  style="height: 400px; width: 100%;  margin-bottom: 50px;"></div>
				<div id="sol3networkdelegates"  style="height: 400px; width: 100%;  margin-bottom: 50px;"></div>
				<div id="graduatenetworkdelegates"  style="height: 400px; width: 100%;  margin-bottom: 50px;"></div>
				<div id="chartContainer" style="height: 400px; width: 100%;  margin-bottom: 50px; display:none;"></div>
				<div id="piechart" style="height: 400px; width: 100%; margin-top:50px;  margin-bottom: 50px;"></div>
				<div id="VIP" style="height: 400px; width: 100%; margin-top:50px; display:none;"></div>
			</div>

</div>

<script type="text/javascript">
		window.onload = function () {
			var Discipleseffortforvip  = new CanvasJS.Chart("Discipleseffortforvip", {
				theme: "theme2",
				title: {
					text: "Networks effort for VIP"
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"VIP"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			Discipleseffortforvip.render();
			
			
				var preecounternetworkdelegates  = new CanvasJS.Chart("preecounternetworkdelegates", {
				theme: "theme2",
				title: {
					text: "Pre encounter Delegates Per Network  "
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"preEncounter"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			preecounternetworkdelegates.render();
			
			var ecounternetworkdelegates  = new CanvasJS.Chart("ecounternetworkdelegates", {
				theme: "theme2",
				title: {
					text: "Encounter Delegates Per Network  "
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"encounter"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			
			ecounternetworkdelegates.render();
			
			
			 var postecounternetworkdelegates  = new CanvasJS.Chart("postecounternetworkdelegates", {
				theme: "theme2",
				title: {
					text: "Post Encounter Delegates Per Network  "
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"postencounter"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			
			postecounternetworkdelegates.render();
			
			
			
			ecounternetworkdelegates.render();
			
			
			 var sol1networkdelegates  = new CanvasJS.Chart("sol1networkdelegates", {
				theme: "theme2",
				title: {
					text: "SOL1 Delegates Per Network  "
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"sol1"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			
			sol1networkdelegates.render();
			
			
			
			var sol2networkdelegates  = new CanvasJS.Chart("sol2networkdelegates", {
				theme: "theme2",
				title: {
					text: "SOL2 Delegates Per Network  "
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"sol2"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			
			sol2networkdelegates.render();
			
			var reecounternetworkdelegates  = new CanvasJS.Chart("reecounternetworkdelegates", {
				theme: "theme2",
				title: {
					text: "Re Encounter Delegates Per Network  "
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"re_encounter"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			
			reecounternetworkdelegates.render();
			
			var sol3networkdelegates = new CanvasJS.Chart("sol3networkdelegates", {
				theme: "theme2",
				title: {
					text: "SOL 3 Delegates Per Network  "
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"sol3"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			
			
			sol3networkdelegates.render();
			
			var graduatenetworkdelegates = new CanvasJS.Chart("graduatenetworkdelegates", {
				theme: "theme2",
				title: {
					text: "Graduates"
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
							
								if($chartrecorddata->mentor_id == $userID){
									if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
										
										$chartJs['y'] =  countNetwork($chartrecorddata->id_no,$counthisopencell,"graduates"); 
										$chartJs['label'] = $chartrecorddata->first_name;
										echo json_encode($chartJs) . ',';	
										
									} 
								}
											 		
							
						}?>
					]
				}]
			});
			
			
			graduatenetworkdelegates.render();
			var chart = new CanvasJS.Chart("chartContainer", {
				theme: "theme2",
				title: {
					text: "Saturday and Sunday VIP's"
				},
				data: [{
					type: "column",
					dataPoints: [
						<?php 
						//http://stackoverflow.com/questions/19430809/sql-output-to-get-only-last-7-days-output-while-using-convert-on-date
						@$countasd  = 0;
						@$counthistopencell =0;
						foreach($jsonChartData as $chartrecorddata){
						@$countasd++;
						if($chartrecorddata->mentor_id == $userID){
							if($chartrecorddata->added_as_close_cell == 1 && $chartrecorddata->ranking >=4){
								
								$chartJs['y'] = counthistopencell($counthisopencell,$chartrecorddata->id_no,4,2);
								$chartJs['label'] = $chartrecorddata->first_name;
								echo json_encode($chartJs) . ',';	
								
							}
												
						}
					}?>
					]
				}]
			});
			chart.render(); 
			
			var chartpie = new CanvasJS.Chart("piechart",
				{
					theme: "theme2",
					title:{
						text: "Church Population"
					},
					data: [
					{
						type: "pie",
						showInLegend: true,
						toolTipContent: "{y} - #percent %",
						yValueFormatString: "",
						legendText: "{indexLabel}",
						dataPoints: [
						
							<?php function ageGroud($test,$agegroup){
								@$countPopulation = 0;
								foreach($test as $age){
									if($agegroup == "Children"){
										if($age->age_group == 1 && $age->added_as_close_cell == 1){
											@$countPopulation++;
										}	
									}
									if($agegroup == "Youth"){
										if($age->age_group == 2 || $age->age_group == 3 || $age->age_group == 4 && $age->added_as_close_cell == 1){
											@$countPopulation++;
										}	
									}
									if($agegroup == "Young Adult"){
										if($age->age_group == 5 || $age->age_group == 6 && $age->added_as_close_cell == 1){
											@$countPopulation++;
										}	
									}
									
									if($agegroup == "Adult" && $age->added_as_close_cell == 1){
										
										if($age->age_group == 7){
											@$countPopulation++;
										}	
										
									}
								}
								return @$countPopulation;
							}?>
							{  y:  <?php echo ageGroud($counthisopencell,'Children')?>, indexLabel: "Children" },
							{  y:  <?php echo ageGroud($counthisopencell,'Youth')?>, indexLabel: "Youth" },
							{  y:  <?php echo ageGroud($counthisopencell,'Young Adult')?>, indexLabel: "Young Adult" },
							{  y:  <?php echo ageGroud($counthisopencell,'Adult')?>, indexLabel: "Adult"},

						]
					}
					]
				});
		chartpie.render();
			
			

	var VIP = new CanvasJS.Chart("VIP", {
				title: {
					text: "VIP per month",
					fontSize: 30
				},
				animationEnabled: true,
				axisX: {
					gridColor: "Silver",
					tickColor: "silver",
					valueFormatString: "DD/MMM"
				},
				toolTip: {
					shared: true
				},
				theme: "theme2",
				axisY: {
					gridColor: "Silver",
					tickColor: "silver"
				},
				legend: {
					verticalAlign: "center",
					horizontalAlign: "right"
				},
				data: [
				{
					type: "line",
					showInLegend: true,
					lineThickness: 2,
					name: "Firstimer",
					markerType: "square",
					color: "#F08080",
					dataPoints: [
					{ x: new Date(2010, 0, 3), y: 100 },
					{ x: new Date(2010, 0, 5), y: 200 },
					{ x: new Date(2010, 0, 7), y: 300 },
					{ x: new Date(2010, 0, 9), y: 150 },
					{ x: new Date(2010, 0, 11), y: 200 },
					{ x: new Date(2010, 0, 13), y: 204 },
					{ x: new Date(2010, 0, 15), y: 320 },
					{ x: new Date(2010, 0, 17), y: 460 },
					{ x: new Date(2010, 0, 19), y: 210 },
					{ x: new Date(2010, 0, 21), y: 100 },
					{ x: new Date(2010, 0, 23), y: 50 }
					]
				},
				{
					type: "line",
					showInLegend: true,
					name: "Second Timer",
					color: "#20B2AA",
					lineThickness: 2,

					dataPoints: [
					{ x: new Date(2010, 0, 3), y: 110 },
					{ x: new Date(2010, 0, 5), y: 60 },
					{ x: new Date(2010, 0, 7), y: 20 },
					{ x: new Date(2010, 0, 9), y: 450 },
					{ x: new Date(2010, 0, 11), y: 250 },
					{ x: new Date(2010, 0, 13), y: 130 },
					{ x: new Date(2010, 0, 15), y: 210 },
					{ x: new Date(2010, 0, 17), y: 120 },
					{ x: new Date(2010, 0, 19), y: 120 },
					{ x: new Date(2010, 0, 21), y: 234 },
					{ x: new Date(2010, 0, 23), y: 212 }
					]
				},
				{
					type: "line",
					showInLegend: true,
					name: "Third Timer",
					color: "green",
					lineThickness: 2,

					dataPoints: [
					{ x: new Date(2010, 0, 3), y: 123 },
					{ x: new Date(2010, 0, 5), y: 234 },
					{ x: new Date(2010, 0, 7), y: 32 },
					{ x: new Date(2010, 0, 9), y: 32 },
					{ x: new Date(2010, 0, 11), y: 123 },
					{ x: new Date(2010, 0, 13), y: 245 },
					{ x: new Date(2010, 0, 15), y: 145 },
					{ x: new Date(2010, 0, 17), y: 152 },
					{ x: new Date(2010, 0, 19), y: 231 },
					{ x: new Date(2010, 0, 21), y: 231 },
					{ x: new Date(2010, 0, 23), y: 132 }
					]
				},
				{
					type: "line",
					showInLegend: true,
					name: "Fourth Timer",
					color: "orange",
					lineThickness: 2,

					dataPoints: [
					{ x: new Date(2010, 0, 3), y: 230 },
					{ x: new Date(2010, 0, 5), y: 560 },
					{ x: new Date(2010, 0, 7), y: 540 },
					{ x: new Date(2010, 0, 9), y: 558 },
					{ x: new Date(2010, 0, 11), y: 544 },
					{ x: new Date(2010, 0, 13), y: 693 },
					{ x: new Date(2010, 0, 15), y: 657 },
					{ x: new Date(2010, 0, 17), y: 663 },
					{ x: new Date(2010, 0, 19), y: 639 },
					{ x: new Date(2010, 0, 21), y: 673 },
					{ x: new Date(2010, 0, 23), y: 660 }
					]
				},
				],
				legend: {
					cursor: "pointer",
					itemclick: function (e) {
						if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
							e.dataSeries.visible = false;
						}
						else {
							e.dataSeries.visible = true;
						}
						chart.render();
					}
				}
			});
		VIP.render();
	
		}
		</script>