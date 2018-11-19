<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>


LOAD DEFAULT PAGE
<form action="<?php echo $baseURL; ?>Welcome/search2" method="post">

<input type="text" name="name" id="name">
<input type="text" name="id" value="<?php echo $id; ?>" id="id">
<input type="text" name="level" value="0" id="level">

<input type="submit" value="SEARCH">
</form>
<script src="<?php echo $baseURL; ?>Welcome/scripts/ajax.js"></script>
<script src="<?php echo $baseURL; ?>Welcome/scripts/search.js"></script>

<button type="button" onclick="sss.search(document.getElementById('name').value, document.getElementById('id').value, document.getElementById('level').value)">DO SEARCH</button>

<script>
	var sss = new search('<?php echo $baseURL; ?>Welcome/search2');
	sss.recordTemplate = '<a href="#" onclick="alert(<#id_no#>)"><#full_name#></a><br>';
	sss.success = function(){
		while(r = sss.fetchRecord()) {
			document.getElementById('sampleDiv').appendChild(r);
		}
	};
</script>

<div id="sampleDiv">

</div>