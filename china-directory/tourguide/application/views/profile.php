<?php 

	
	foreach(@$active_account as $activeAccountFields) { 
		@$profile_pic 				= $activeAccountFields->profile_pic;
		
	
	}
	
		
?>

<img src="<?php echo strlen(@$profile_pic)!= 0 ? base_url() .'images/' . $profile_pic : 'http://massconline.com/memberpages/images/portrait_placeholder.jpg'; ?>" style="width:100%;">
		