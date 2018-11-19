<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
self.results = [
<?php

$infoDelim = false;
foreach($results as $user) {
	
	echo $infoDelim ? ",{" : "{";
	
	$infoDelim = false;
	foreach($user as $key => $info) {
		echo ($infoDelim ? "," : "") . $key . ":'" . addslashes($info) . "'";
		$infoDelim = true;
	}
	
	echo "}";
	
	$infoDelim = true;
}
?>
 ];
 