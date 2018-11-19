<script type="text/javascript">
 $(function(){
	 
	
	  usher.gatheredRecord(8,5);	 
	 
 });
 
   $(function(){
		
	$("#sort").on("change", function(){
		var gender = $(this).val();
		$("#gender").val(gender);
		$("#gatheredRecord").html("<img src='<?php echo base_url();?>avatars/imageloading.gif' style='margin:20px auto; display:block; width:auto;'>");
		$("#gatheredRecord").load("<?php echo base_url(); ?>Ushers/gathered/?gender=" + gender + "&level_in_post=8&lesson_level=5" );
	});

 });

 </script> 
 
  <style>
 
  #icon_status{list-style:none;}
 #icon_status li{float:left; padding:5px;}
 #icon_status li img{width:40px; margin:0;}
 #icon_status li span{font-size:15px;}
  #icon_status li a{text-decoration:none; color:#fff;}
 #datatoday{text-align:right; display:block;}
 
</style>
 <?php 

function listofEnrolled($enrolled,$status,$tesLevl,$ranking,$civilStatus,$gender){
		@$countEnrolled = 0;
		foreach($enrolled as $listOfEnrolledRow){
				if($status == "Married Woman"){
					
					if($listOfEnrolledRow->enrolled ==$tesLevl && $listOfEnrolledRow->ranking == $ranking && $listOfEnrolledRow->civil_status == $civilStatus && $listOfEnrolledRow->Gender == $gender){
						
						@$countEnrolled++;
					}
						
				}
				
				if($status == "Married Men"){
					
					if($listOfEnrolledRow->enrolled ==$tesLevl && $listOfEnrolledRow->ranking == $ranking && $listOfEnrolledRow->civil_status == $civilStatus && $listOfEnrolledRow->Gender == $gender){
						
						@$countEnrolled++;
					}
						
				}
				
				
				if($status == "Single Men"){
					
					if($listOfEnrolledRow->enrolled ==$tesLevl && $listOfEnrolledRow->ranking == $ranking && $listOfEnrolledRow->civil_status == $civilStatus && $listOfEnrolledRow->Gender == $gender){
						
						@$countEnrolled++;
					}
						
				}
				if($status == "Single Ladies"){
					
					if($listOfEnrolledRow->enrolled ==$tesLevl && $listOfEnrolledRow->ranking == $ranking && $listOfEnrolledRow->civil_status == $civilStatus && $listOfEnrolledRow->Gender == $gender){
						
						@$countEnrolled++;
					}
						
				}
			
			
		}
	
	return @$countEnrolled;
}?> 
 <!-- Pre SOL 2 Form -->
<div id="EVENT_CONTAINER" class="container" style="padding:0px; background:white;">
			<?php  date_default_timezone_set("Asia/Taipei");  ?>
            <header id="form_head4">		
			<span style="float:left; width:450px;"> 
				<h2>School of Leaders 2</h2>
				<select id="sort" style="color:#000; font-size:18px; font-weight:15px; width:50%; height:35px; border:1px #ccc solid;">
					<option selected value="">All</option>
					<option value="Male">Men</option>
					<option value="Female">Ladies</option>
				</select>
			</span>
			<h3 style="float:right">
			
							<span id="datatoday" style="display:none;"><?php echo date('F jS l') ;?></span> 
				<ul id="icon_status">	
					<li>
					<div class='btn btn-default' style="font-size:12px;">Married Woman<span style="position: relative; background: rgb(255, 117, 25); padding: 2px 6px; color: rgb(255, 255, 255); font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px ; line-height: normal; font-family: Tahoma, Arial, Helvetica; border-radius: 3px; margin:5px;"><?php echo listofEnrolled($list_of_records,"Married Woman",9,8,"Married","Female"); ?></span></div>
					</li>
					<li>
					<div class='btn btn-default' style="font-size:12px;">Married Men<span style="position: relative; background: rgb(255, 117, 25); padding: 2px 6px; color: rgb(255, 255, 255); font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px ; line-height: normal; font-family: Tahoma, Arial, Helvetica; border-radius: 3px; margin:5px;"><?php echo listofEnrolled($list_of_records,"Married Men",9,8,"Married","Male"); ?></span></div>
					</li>
					<li>
					<div class='btn btn-default' style="font-size:12px;">Single Men<span style="position: relative; background: rgb(255, 117, 25); padding: 2px 6px; color: rgb(255, 255, 255); font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px ; line-height: normal; font-family: Tahoma, Arial, Helvetica; border-radius: 3px; margin:5px;"><?php echo listofEnrolled($list_of_records,"Single Men",9,8,"Single","Male"); ?></span></div>
					 						
					</li>
					
					<li>
					<div class='btn btn-default' style="font-size:12px;">Single Ladies<span style="position: relative; background: rgb(255, 117, 25); padding: 2px 6px; color: rgb(255, 255, 255); font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px ; line-height: normal; font-family: Tahoma, Arial, Helvetica; border-radius: 3px; margin:5px;"><?php echo listofEnrolled($list_of_records,"Single Ladies",9,8,"Single","Female"); ?></span></div>
					</li>
				</ul>	
			</h3>	
					
		</header>
		<form id="search">
			<div class="form-group">
			<input type="text" name="searchdelegate" id="searchdelegate" value="" placeholder="Search Delegate" class="form-control"/> 
			<input type="hidden" name="gender" id="gender" value="">
			</div>
		</form>
		
		<div id="gatheredRecord">
		<img src="<?php echo base_url(); ?>avatars/imageloading.gif" style="width:auto; margin:30px auto; display:block;">	
	
		
		</div>		
	</div>
</div>

