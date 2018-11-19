<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<style>
body{background:#ECF0F1;}
.subject{padding:0; margin:0; margin-right:20px;}
</style>
<script type="text/javascript">
$(function(){
		
	var checkbox = {
			
			subject: function(userID,subj){
				$('.subject').each(function(){
					
					$(this).on("click",function(){
						
						$.ajax({
							url:"<?php echo base_url(); ?>Pep/ticksubj",
							type:"POST",
							data:{"userID": <?php echo $userID;?>,"subj": $(this).val()},
							success: function(e){
								
								//location.reload();
								alert(e);
								
							},
							error: function(){
								
								alert("Error!");
								
							}
						});
						
						
					});
					
					
				});
				
			}
		
		
	}
	checkbox.subject();
	
});
</script>


<?php function takenSub($subjtaken,$uid,$subtaken) {
	$subtakenResult = '';
	foreach($subjtaken as $subjecktaken){
		if($subjecktaken->userID == $uid && $subjecktaken->subj == $subtaken){
			
			$subtakenResult = "checked=checked";
		}
		
		
	}
	return $subtakenResult;
}
	function showbtn($subjtaken,$uid){
		$btndisplay  = 0;
		foreach($subjtaken as $subjeckBtn){
			$btndisplay++;
			
		}
		return $btndisplay;
	}

?>



<div style="width: 700px; padding: 10px; margin:100px auto;overflow: auto; background:#fff;">
	<?php foreach($photoDisplay as $pic){
		 
		$photo = $pic->profile_pic;
		$name  = $pic->first_name . " " . $pic->last_name;
	
	}?>

	<div style="float:left; width:30%;">
	<img src="<?php echo strlen(@$photo)!= 0 ? base_url() .'images/' . $photo : 'http://massconline.com/memberpages/images/portrait_placeholder.jpg'; ?>" style="width:200px;">
	<h3 style="margin:0; text-align:left; padding:0; color:#3C5165;"><?php echo $name;?></h3>
	</div>
	<div style="float:right; width:70%;">
		
		<div style="float:left; width:100%;">
		<h3>Session 1</h3>
		<?php if( takenSub($subjtaken,$userID,1) == "checked=checked"){ ?>
			<p><img src="http://findicons.com/files/icons/2428/woocons/32/checkbox_full.png" style="margin-right:20px; width:14px; height:14px;"> Four Wonderful Opportunities</p>
		<?php } else{ ?>
		<p><input type="checkbox" class="subject" name="subject_1" value="1" userID='<? echo $userID ?>'>Four Wonderful Opportunities</p>
		<?php } ?>

		<?php if( takenSub($subjtaken,$userID,2) == "checked=checked"){ ?>
			<p><img src="http://findicons.com/files/icons/2428/woocons/32/checkbox_full.png" style="margin-right:20px; width:14px; height:14px;"> The Benefits of the Cross</p>
		<?php } else{ ?>
		<p><input type="checkbox" class="subject" name="subject_2" value="2" userID='<? echo $userID ?>'>The Benefits of the Cross</p>
		<?php } ?>

		<?php if(takenSub($subjtaken,$userID,3) == "checked=checked" ) {  ?>
			<p><img src="http://findicons.com/files/icons/2428/woocons/32/checkbox_full.png" style="margin-right:20px; width:14px; height:14px;">The New Birth</p>
		<?php }else{ ?>
		<p><input type="checkbox" class="subject" name="subject_3" value="3" userID='<? echo $userID ?>'>The New Birth</p>
		<?php }?>
		</div>
		<div style="float:left; width:100%;">
		<h3>Session 2</h3>
		<?php if(takenSub($subjtaken,$userID,4) == "checked=checked") { ?>
			<p><img src="http://findicons.com/files/icons/2428/woocons/32/checkbox_full.png" style="margin-right:20px; width:14px; height:14px;"> The New Birth and How to Grow Spiritually</p>	
		<?php } else{?>
			<p><input type="checkbox" class="subject" name="subject_4" value="4" userID='<? echo $userID ?>'>The New Birth and How to Grow Spiritually</p>
		<?php } ?>


		<?php if(takenSub($subjtaken,$userID,5) =="checked=checked"){ ?>
			<p><img src="http://findicons.com/files/icons/2428/woocons/32/checkbox_full.png" style="margin-right:20px; width:14px; height:14px;"> The New Birth and Life in the Spirit</p>
		<?php } else{?>
			<p><input type="checkbox" class="subject" name="subject_5" value="5" userID='<? echo $userID ?>'  >The New Birth and Life in the Spirit</p>
		<?php } ?>
		<?php if(takenSub($subjtaken,$userID,6)=="checked=checked"){ ?>
			<p><img src="http://findicons.com/files/icons/2428/woocons/32/checkbox_full.png" style="margin-right:20px; width:14px; height:14px;"> Understanding Our Enemy</p>

		<?php } else{?>
			<p><input type="checkbox" class="subject" name="subject_6" value="6" userID='<? echo $userID ?>'>Understanding Our Enemy</p>
		<?php } ?>
		<?php if( takenSub($subjtaken,$userID,7) =="checked=checked") { ?>
			<p><img src="http://findicons.com/files/icons/2428/woocons/32/checkbox_full.png" style="margin-right:20px; width:14px; height:14px;">  What You Need to Know About An Encounter</p>
		<?php } else{?>
			<p><input type="checkbox" class="subject" name="subject_7" value="7" userID='<? echo $userID ?>'>What You Need to Know About An Encounter</p>
		<?php } ?>
		</div>
		<?php if(showbtn($subjtaken,$userID) == 7){ ?>
			<input type="button" value="Done" style="float:right; background:#6BD4BF; border:0; color:#fff; padding:10px; display:block; font-size:18px; border-radius:10px;">
		<?php } ?>
	</div>	 
</div>