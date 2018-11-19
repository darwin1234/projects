<?php
$birthday = strtotime("1977-10-03");
$now = time();
$datediff = $now - $birthday;
$daysRemaining = floor($datediff/(60*60*24));
echo $daysRemaining;