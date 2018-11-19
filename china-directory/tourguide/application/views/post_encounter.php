<script>
$(function(){
	CCCSystem.listofdata(6);
	CCCSystem.primary_search(6);
});	
</script>

<div class="container" style="width:90% margin:0 auto; background:#fff;">
	<div class="row">
			<?php  date_default_timezone_set("Asia/Taipei");  ?>
			<header class="form_head" style="background: #b404a4; padding: 30px 20px; color: white; font-size: 1.2em; font-weight: 600;
  										border-radius: 10px 10px 0 0; overflow:auto; margin-top: 30px; border-bottom: 4px solid #9ea7af;">		
			<h2 style="float:left"> Post-Encounter Delegates </h2>
			<h3 style="float:right"><?php echo date('F jS l') ;?></h3>
			<?php 
				if($userRole =="Primary Leader"){
					
					echo "<input type='text' id='primary_search' name='primary_search' placeholder='Search' style='float:right; clear:both;color:#000;'>";
			
					
				}
			
			?>					
					
		</header>
		
		<div id="listofrecordsdatainfo">
		 
		</div>
	</div>
</div>	