<div class="table">	
<form name="mediaform" method="post" action="">
<?php foreach($listofmedia as $mediaItem){ ?>
	<div class="image" style="background:url('<?php echo $mediaItem->image_path; ?>');">
		<input type="radio" value="" name="file" onclick="radiobtn('<?php echo $mediaItem->image_path; ?>');">
	</div>
				
<?php } ?>
</form>				
</div>
