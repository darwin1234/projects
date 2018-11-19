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
	
	function leaders($leaders,$leadersID){
		
		foreach($leaders as $leadersfields){
			if($leadersfields->id_no == $leadersID){
				
				@$leaderData =  "<a href='".base_url()."Welcome/disciples/" . $leadersfields->id_no  . "'style=' color:#333333; '>" . $leadersfields->first_name . "</a>";
				
			}
			
		}
		
		return @$leaderData;
		
	}
	
	$lvl = [];
	$vip = 0;
	$vipDone = false;
	$c = 0;
	for($l = 4; $l <= 11; $l++) {
		$c = 0;
		foreach(getRecordWithParentId($userID, @$getRecordsDisplay) as $pepsollevelfields){			
			//if($pepsollevelfields->ranking == $l && $pepsollevelfields->added_as_close_cell == 1 && $pepsollevelfields->active == 0){
			if($pepsollevelfields->ranking == $l && $pepsollevelfields->active == 0){
				$c++;
			}
			
			if(!$vipDone) {
				if($pepsollevelfields->ranking <= 4) {
					$vip++;
				}
			}
		}
		$vipDone = true;
		$lvl[$l] = $c;
	}
	
	
		
	echo $vip . "-" . join($lvl, "-");
?>