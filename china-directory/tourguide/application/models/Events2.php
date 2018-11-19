<?php

class events2 extends CI_Model{
	public $dateToday = [0, 0, 0];
	public $lastMonth = [0, 0];
	public $nextMonths = [[0, 0], [0, 0], [0, 0]];

	public function __construct() {
		date_default_timezone_set('Asia/Manila');
		
		$info = getdate();
		$this->dateToday = [$info['mon'], $info['mday'], $info['year']];
		
		$lYear = $info['year'];
		$lMonth = $info['mon'] - 1;
		if($lMonth == 0) { $lMonth = 12; $lYear = $info['year'] - 1; }
		$this->lastMonth = [$lMonth, $lYear];
		
		$nYear = $info['year'];
		$nMonth = $info['mon'] + 1;
		if($nMonth > 12) { $nMonth = 1; $nYear = $info['year'] + 1; }
		$this->nextMonths[0] = [$nMonth, $nYear];
		
		$nYear = $info['year'];
		$nMonth = $info['mon'] + 2;
		if($nMonth > 12) { $nMonth = 1; $nYear = $info['year'] + 1; }
		$this->nextMonths[1] = [$nMonth, $nYear];
		
		$nYear = $info['year'];
		$nMonth = $info['mon'] + 3;
		if($nMonth > 12) { $nMonth = 2; $nYear = $info['year'] + 1; }
		$this->nextMonths[2] = [$nMonth, $nYear];
	}
	
	public function reAddBirthdayEvent($userID, $title, $month, $day) {
		if(!is_numeric($month)) {
			switch($month) {
				case "Jan": $mm = 1; break;
				case "Feb": $mm = 2; break;
				case "Mar": $mm = 3; break;
				case "Apr": $mm = 4; break;
				case "May": $mm = 5; break;
				case "Jun": $mm = 6; break;
				case "Jul": $mm = 7; break;
				case "Aug": $mm = 8; break;
				case "Sep": $mm = 9; break;
				case "Oct": $mm = 10; break;
				case "Nov": $mm = 11; break;
				case "Dec": $mm = 12; break;
				default: $mm = 0;
			}
			
			$month = $mm;
		}
		
		//remove existing, redundant or other birth date (if edited)
		$this->db->query("DELETE FROM events WHERE Visibility = 'birthday' AND UserID = $userID");
		
		//re add
		if(($this->lastMonth[0] == $month) || ($this->dateToday[0] == $month) || ($this->nextMonths[0][0] == $month) || ($this->nextMonths[1][0] == $month) || ($this->nextMonths[2][0] == $month)) {
			$event = array(
				'UserID'				=> $userID,
				'EventTitle'			=> ucwords(strtolower($title)),
				'EventDate'	 			=> ($month < $this->lastMonth[0] ? ($this->dateToday[2] + 1) . "-$month-$day" : $this->dateToday[2] . "-$month-$day"),
				'Visibility'	 		=> "birthday"
			);
			$this->db->insert('events',$event);
		}
	}
	
	public function reCreateBirthdayEvents($force = false) {
		//check last update date // every first day of the month
		$updateID = 0;
		$bUpdate = $this->db->query("SELECT * FROM events WHERE EventTitle = 'BIRTHDAY EVENT UPDATE' AND Visibility = 'SPECIAL' AND UserID = 0");
		if($bUpdate->num_rows() == 1) { $updateDate = explode("-", $bUpdate->result()[0]->EventDate); $updateID = $bUpdate->result()[0]->EventID; }
		else { $updateDate = ["0000", "00", "00"]; }
		
		$m = ($updateDate[1] * 1);
		$y = ($updateDate[0] * 1);
		if(($this->dateToday[0] != $m) || ($this->dateToday[2] != $y) || $force) {
			$months = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			
			//remove all birthdays
			$this->db->query("DELETE FROM events WHERE Visibility = 'birthday'");
			
			//re add
			$birthdays = $this->db->query("SELECT id_no, CONCAT(first_name, ' ', IF(maiden_name = '', '', CONCAT(maiden_name, ' ')), last_name) AS full_name, STR_TO_DATE(CONCAT(birthmonth, '-', birthdate), '%M-%d') AS birthday FROM records WHERE (birthmonth = '{$months[$this->lastMonth[0]]}') OR (birthmonth = '{$months[$this->dateToday[0]]}') OR (birthmonth = '{$months[$this->nextMonths[0][0]]}') OR (birthmonth = '{$months[$this->nextMonths[1][0]]}') OR (birthmonth = '{$months[$this->nextMonths[2][0]]}')")->result();
			foreach($birthdays as $b) {
				$bdayArr = explode("-", $b->birthday);
				$bdayMonth = $bdayArr[1];
				$bdayDay = $bdayArr[2];
				$bdayYear = $this->dateToday[2];
				
				if($this->dateToday[0] == $bdayMonth) { }
				else {
					$nm = ($this->dateToday[0] + 1) > 12 ? 1 : $this->dateToday[0] + 1;
					if($nm == $bdayMonth ) {
						if($nm == 1) { $bdayYear++; }
					} else {
						$nm = ($this->dateToday[0] + 2) > 12 ? ($this->dateToday[0] + 2) - 12 : $this->dateToday[0] + 2;
						if($nm == $bdayMonth ) {
							if($nm < $this->dateToday[0]) { $bdayYear++; }
						} else {
							$nm = ($this->dateToday[0] + 3) > 12 ? ($this->dateToday[0] + 3) - 12 : $this->dateToday[0] + 3;
							if($nm == $bdayMonth ) {
								if($nm < $this->dateToday[0]) { $bdayYear++; }
							} else {
								$nm = ($this->dateToday[0] - 1) == 0 ? 12 : $this->dateToday[0] - 1;
								if($nm == 12 ) { $bdayYear--; }
							}
						}
					}
				}
				
				$event = array(
					'UserID'				=> $b->id_no,
					'EventTitle'			=> ucwords(strtolower($b->full_name)),
					'EventDate'	 			=> "$bdayYear-" . ($bdayMonth < 10 ? "0$bdayMonth" : $bdayMonth) . "-" . ($bdayDay < 10 ? "0$bdayDay" : $bdayDay),
					'Visibility'	 		=> "birthday"
				);
				
				/*
				$event = array(
					'UserID'				=> $b->id_no,
					'EventTitle'			=> ucwords(strtolower($b->full_name)),
					'EventDate'	 			=> (($bdayArr[1] * 1) < $this->lastMonth[0] ? ($this->dateToday[2] + 1) . "-$bdayMonth-$bdayDay" : $this->dateToday[2] . "-$bdayMonth-$bdayDay"),
					'Visibility'	 		=> "birthday"
				);
				*/
				
				$this->db->insert('events',$event);
			}
			
			//done create --update date
			$m = ($this->dateToday[0] < 10 ? "0" . $this->dateToday[0] : $this->dateToday[0]);
			$y = ($this->dateToday[2] < 10 ? "0" . $this->dateToday[3] : $this->dateToday[2]);

			if($updateID == 0) { $this->db->query("INSERT INTO events(EventTitle, EventDate, Visibility, UserID) VALUES('BIRTHDAY EVENT UPDATE', '$y-$m-01', 'SPECIAL', 0)"); }
			else { $this->db->query("UPDATE events SET EventDate = '$y-$m-01' WHERE EventID = $updateID"); }
		}
	}
	
	public function addEvent($userID, $date, $title, $venue, $time, $days, $visibility) {
		if($title == "") { return "Event Title is required"; }
		if($venue == "") { return "Event Venue is required"; }
		if($days == "") { return "Invalid days"; }
		
		if(!is_numeric($days)) { return "Invalid days"; }
		if($time != "") { if(strtotime($time) == false) { return "Invalid time"; } }
		
		if($time == "") { $time = "12:00 AM"; }
		$time = date("H:i:s", strtotime($time));
		
		for($i = 0; $i < $days; $i++) {			
			$event = array(
				'UserID'				=> $userID,
				'EventTitle'			=> $title,
				'EventVenue'	 		=> $venue,
				'EventDate'	 			=> $date,
				'EventTime'	 			=> $time,
				'Visibility'	 		=> $visibility
			);
			
			$this->db->insert('events',$event);
			
			$date1 = str_replace('-', '/', $date);
			$date = date('Y-m-d',strtotime($date1 . "+1 days"));
		}	
	}
	
	public function editEvent($eventID, $title, $venue, $time, $visibility) {
		
		if($time == "") { $time = "12:00 AM"; }
		$time = date("H:i:s", strtotime($time));
		
		$data = array(
			'EventTitle'	=> $title,	 
			'EventVenue'	=> $venue,
			'EventTime'		=> $time, 
			'Visibility'	=> $visibility
		);
		
		$this->db->where('EventID', $eventID);
		$this->db->update('events',$data);
	}
	
	public function deleteEvent($eventID) {
		$this->db->query("DELETE FROM events WHERE EventID = $eventID");
		$this->db->query("DELETE FROM eventpart WHERE EventID = $eventID");
	}
	
	private function getnetworkpos($eventCreator, $UserID) {
		$mentorID = $this->db->query("SELECT id_no, mentor_id FROM records WHERE id_no = $UserID")->result()[0]->id_no;
		$stepCount = 0;
		
		do {
			$mentor = $this->db->query("SELECT id_no, mentor_id, role, ranking FROM records WHERE id_no = $mentorID")->result()[0];
			if($eventCreator == $mentor->id_no) {
				switch($stepCount) {
					case 0: return "SELF";
					case 1: return "PRIMARY";
					case 2: return "144";
					case 3: return "1728";
					default: return "20736";
				}
			} else if( ($mentor->ranking == 100) || (strtolower($mentor->role) == "pastor") ) { return "OUTSIDE"; }
			$mentorID = $mentor->mentor_id;
			
			$stepCount++;
		} while(true);
	}
	
	public function event($userID, $m, $d, $y, $dtString = "") {
		if($dtString != "") {
			$events = $this->db->query("SELECT *, EventDate AS from_date, EventID AS from_id FROM events WHERE EventDate LIKE '$dtString' ORDER BY EventTime ASC");
		} else {
			$m = ($m < 10 ? "0$m" : $m);
			$d = ($d < 10 ? "0$d" : $d);
			$events = $this->db->query("SELECT *, EventDate AS from_date, EventID AS from_id FROM events WHERE EventDate LIKE '$y-$m-$d' ORDER BY EventTime ASC");
		}
		
		$arr = [];
		$arr[0] = 0;
		$arr[1] = null;
		$arr[2] = null;
		
		$i = 1;
		foreach($events->result() as $e) {
			$doAdd = false;
			if(($e->Visibility == "all") || ($e->Visibility == "birthday")) { $doAdd = true; }
			else if( $e->UserID == $userID ) { $doAdd = true; }
			else {
				$pos = "," . strtolower($this->getnetworkpos($e->UserID, $userID));
				if(strpos($e->Visibility, $pos) !== false) { $doAdd = true; }
			}
			
			if($doAdd) {
				$arr[$i] = $e;
				$arr[0]++;
				$i++;
			}
		}
		
		return $arr;
	}
	
	public function getEvent($id) {
		$event = $this->db->query("SELECT * FROM events WHERE EventID = $id")->result();
		
		echo "var EventTitle = '" . $event[0]->EventTitle . "'; ";
		echo "var EventVenue = '" . $event[0]->EventVenue . "'; ";
		echo "var EventTime = '" . $event[0]->EventTime . "'; ";
		echo "var Visibility = '" . $event[0]->Visibility . "'; ";
	}
	
	public function getEvents($userID, $date) {
		$today = strtotime($this->dateToday[2] . "-" . ($this->dateToday[0] < 10 ? "0" . $this->dateToday[0] : $this->dateToday[0]) . "-" . ($this->dateToday[1] < 10 ? "0" . $this->dateToday[1] : $this->dateToday[1]));
		$dd = strtotime($date);
		
		$m = date('m', $dd) * 1;
		$d = date('d', $dd) * 1;
		$y = date('Y', $dd) * 1;
		
		$events = $this->event($userID, $m, $d, $y);
		$i = 0;
		$eString = "";
		while($i < $events[0]) {
			$e = $events[$i + 1];
			
			$isBirthday = ($e->Visibility == "birthday");
			$prefix = ($isBirthday ? "<span class=\"birthdaySpan\">BIRTHDAY</span>" : "<span class=\"eventSpan\">EVENT</span>");
			
			if($dd < $today) {
				if($isBirthday) { $eString .= "<tr style=\"white-space: normal\"><td style=\"width:35%\">&nbsp;&nbsp;$prefix" . $e->EventTitle . "</td><td style=\"width:35%\">&nbsp;</td><td style=\"width:20%\">&nbsp;</td><td style=\"font-size: 16px; width: 10%;\">&nbsp;</td></tr>"; }
				else { $eString .= "<tr style=\"white-space: normal\"><td style=\"width:35%\">&nbsp;&nbsp;$prefix" . $e->EventTitle . "</td><td style=\"width:35%\">" . $e->EventVenue . "</td><td style=\"width:20%\">" . date("h:i A", strtotime($e->EventTime)) . "</td><td style=\"font-size: 16px; width: 10%;\">&nbsp;</td></tr>"; }
			} else {
				if($isBirthday) { $eString .= "<tr style=\"white-space: normal\"><td style=\"width:35%\">&nbsp;&nbsp;$prefix" . $e->EventTitle . "</td><td style=\"width:35%\">&nbsp;</td><td style=\"width:20%\">&nbsp;</td><td style=\"font-size: 16px; width: 10%;\">&nbsp;</td></tr>"; }
				else {
					if($e->UserID == $userID) { $eString .= "<tr style=\"white-space: normal\"><td style=\"width:35%\">&nbsp;&nbsp;$prefix" . $e->EventTitle . "</td><td style=\"width:35%\">" . $e->EventVenue . "</td><td style=\"width:20%\">" . date("h:i A", strtotime($e->EventTime)) . "</td><td style=\"font-size: 16px; width: 10%;\"><a href=\"javascript:openEditEvent('" . $e->EventID . "')\"><span class=\"fa fa-pencil-square-o\"></span></a>&nbsp;&nbsp;<a href=\"javascript:deleteEvent('" . $e->EventID . "', '" . $e->EventTitle . "')\"><span style=\"font-family: FontAwesome;\"></span></a></td></tr>"; }
					else { $eString .= "<tr style=\"white-space: normal\"><td style=\"width:35%\">&nbsp;&nbsp;$prefix" . $e->EventTitle . "</td><td style=\"width:35%\">" . $e->EventVenue . "</td><td style=\"width:20%\">" . date("h:i A", strtotime($e->EventTime)) . "</td><td style=\"font-size: 16px; width: 10%;\">&nbsp;</td></tr>"; }
				}
			}
			
			$i++;
		}
		
		echo $eString;
	}
	
	private $eventQueue = [];
	private function eventQueuePush($source) {
		$count = count($this->eventQueue);
		if($count > 0) {
			for($i = 0; $i < $count; $i++) {
				if(($this->eventQueue[$i]->EventTitle == $source->EventTitle) && ($this->eventQueue[$i]->EventVenue == $source->EventVenue) && ($this->eventQueue[$i]->EventTime == $source->EventTime)) {
					if(date("Y-m-d", strtotime($this->eventQueue[$i]->EventDate . " +1 days")) == $source->EventDate) {
						$fromID = $this->eventQueue[$i]->from_id;
						$fromDate = $this->eventQueue[$i]->from_date;
						$this->eventQueue[$i] = $source;
						$this->eventQueue[$i]->from_id = $fromID;
						$this->eventQueue[$i]->from_date = $fromDate;
						return;
					}
				}
			}
		}
		$this->eventQueue[$count] = $source;
	}
	
	public function upcomingevents($userID) {
		$fromDate = strtotime($this->dateToday[2] . "-" . ($this->dateToday[0] < 10 ? "0" . $this->dateToday[0] : $this->dateToday[0]) . "-" . ($this->dateToday[1] < 10 ? "0" . $this->dateToday[1] : $this->dateToday[1]));
		$toDate = strtotime(date("Y-m-d", $fromDate) . " +3 months");

		while($fromDate <= $toDate) {
			$event = $this->event($userID, null, null, null, date("Y-m-d", $fromDate));
			
			if($event[0] > 0) {
				for($i = 1; $i <= $event[0]; $i++) {
					if($event[$i]->Visibility == "birthday") { continue; }
					$this->eventQueuePush($event[$i]);
				}
			}

			$fromDate = strtotime(date("Y-m-d", $fromDate) . " +1 days");
		}
		
		
		$str = "var upcomingevents = [ ";
		$first = true;
		foreach($this->eventQueue as $event) {
			
			if(!$first) { $str .= ", "; }
			$str .= "{'id':'" . $event->from_id . "', 'title':'" . str_replace("'", "\\'", $event->EventTitle) . "', 'venue':'" . str_replace("'", "\\'", $event->EventVenue) . "', 'date':'" . date("F j, Y", strtotime($event->from_date)) . "', 'toDate':'" . date("F j, Y", strtotime($event->EventDate)) . "', 'time':'" . date("g:i A", strtotime($event->EventTime)) . "'}";
			
			$first = false;
		}
		
		$str .= " ];";
		return $str;
	}
	
	public function eventpart($userID, $eventID, $statusCode) {
		$stat = 0;
		
		$currPart = $this->db->query("SELECT * FROM eventpart WHERE UserID = $userID AND EventID = $eventID");
		if($currPart->num_rows() == 1) {
			$res = $currPart->result()[0];
			$eventPartID = $res->EventPartID;
			$stat = $res->Status;
			if(($statusCode >= 0) && ($statusCode <= 4)) {
				$this->db->query("UPDATE eventpart SET Status = $statusCode WHERE EventPartID = $eventPartID");
				$stat = $statusCode;
			}
		} else {
			if(($statusCode >= 0) && ($statusCode <= 4)) {
				$this->db->query("INSERT INTO eventpart(EventID, UserID, Status) VALUES ($eventID, $userID, $statusCode)");
				$stat = $statusCode;
			}
		}
		
		$int = $this->db->query("SELECT EventPartID FROM eventpart WHERE EventID = $eventID AND Status = 1")->num_rows();
		$goi = $this->db->query("SELECT EventPartID FROM eventpart WHERE EventID = $eventID AND Status = 2")->num_rows();
		$may = $this->db->query("SELECT EventPartID FROM eventpart WHERE EventID = $eventID AND Status = 3")->num_rows();
		$not = $this->db->query("SELECT EventPartID FROM eventpart WHERE EventID = $eventID AND Status = 4")->num_rows();
		
		$s = '<a' . ($stat == 1 ? ' class="eventpart-selected"' : '') . ' href="#" onclick="setEventPart(' . $eventID . ', 1); return false;">Interested&nbsp;(' . $int . ')</a>';		
		$s .= '<a' . ($stat == 2 ? ' class="eventpart-selected"' : '') . ' href="#" onclick="setEventPart(' . $eventID . ', 2); return false;">Going&nbsp;(' . $goi . ')</a>';		
		$s .= '<a' . ($stat == 3 ? ' class="eventpart-selected"' : '') . ' href="#" onclick="setEventPart(' . $eventID . ', 3); return false;">Maybe&nbsp;(' . $may . ')</a>';		
		$s .= '<a' . ($stat == 4 ? ' class="eventpart-selected"' : '') . ' href="#" onclick="setEventPart(' . $eventID . ', 4); return false;">Not&nbsp;Going&nbsp;(' . $not . ')</a>';
		
		return $s;
	}
	
	public function eventCalendar($userID, $m, $y) {
		$today = strtotime($this->dateToday[2] . "-" . ($this->dateToday[0] < 10 ? "0" . $this->dateToday[0] : $this->dateToday[0]) . "-" . ($this->dateToday[1] < 10 ? "0" . $this->dateToday[1] : $this->dateToday[1]));
		$prevWday = 0;
		$isFirst = true;
		$calHTML = "";
		
		$calHTML = "<table cellpadding=\"0\" cellspacing=\"0\" class=\"eventCalendar\">\n";
		
		$wdaynames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		$calHTML .= "<tr class=\"weekHeader\">\n";
		foreach ($wdaynames as $wday) { $calHTML .= "<td>$wday</td>\n"; }
			
		$calHTML .= "</tr>\n";
		
		for($d = 1; $d <= 31; $d++) {
			if(checkdate($m, $d, $y)) {
				$wday = date("w", strtotime("$y-$m-$d"));
				$dateString = date("l, F j, Y", strtotime("$y-$m-$d"));
				
				if(($wday == 0) || $isFirst) { $calHTML .= "<tr>\n"; }
				
				if($isFirst) {
					for($i = 0; $i < $wday; $i++) { $calHTML .= "<td class=\"noDay\">&nbsp;</td>\n"; }
					$isFirst = false;
				}
				
				$evString = "";
				$event = $this->event($userID, $m, $d, $y);
				for($i = 1; $i < 3; $i++) {
					if($event[$i] != null) {
						if($event[$i]->Visibility == "birthday") { $evString .= "<div class=\"eventDiv\"><span class=\"birthdaySpan\">BIRTHDAY</span>" . $event[$i]->EventTitle . "</div>"; }
						else { $evString .= "<div class=\"eventDiv\"><span class=\"eventSpan\">EVENT</span>" . $event[$i]->EventTitle . "</div>"; }
					}
				}
				if($evString == "") { $evString = "<div class=\"noEventDiv\">&nbsp;</div><div class=\"noEventDiv\">&nbsp;</div>"; }
				
				$moreEvent = ($event[0] > 2) ? "<br>See all (" . $event[0] . ")" : "<br>&nbsp;";
				$hasEvent = ($event[0] > 0) ? "WithEvents" : "";
				$eventDone = (strtotime("$y-$m-$d") < $today)  ? "class=\"eventDone\"" : "";
				$todayClass = (strtotime("$y-$m-$d") == $today)  ? " today" : "";
				
				$calHTML .= "\t<td valign=\"top\" onclick=\"openEvent('$y-". ($m < 10 ? "0$m" : $m) . "-". ($d < 10 ? "0$d" : $d) . "', '$dateString', this)\" class=\"withDay$hasEvent$todayClass\">" .
								"<table $eventDone cellpadding=\"0\" width=\"100%\" height=\"100%\" cellspacing=\"0\">\n" .
									"<tr style=\"height: 1px;\"><td style=\"text-align:left\">$d</td></tr>" .
									"<tr><td valign=\"top\" align=\"left\">$evString</td></tr>" .
									"<tr style=\"height: 1px;\"><td style=\"text-align: center; font-size: 12px !important; font-weight: normal !important;\">$moreEvent</td></tr>" .
								"</table>" .
							"</td>\n";
				
				if($wday == 6) { $calHTML .= "\n</tr>\n"; }
				$prevWday = $wday;
			}
		}
		
		for($i = $wday; $i < 6; $i++) { $calHTML .= "\t<td class=\"noDay\">&nbsp;</td>\n"; }
		$calHTML .= "\n</tr>\n</table>\n";
		
		$styles = <<< STYLES
		
		<style>
			.eventCalendar {
				width: 100%;
				height: 100%;
				border-collapse: collapse;
			}
			
			.eventCalendar .weekHeader {
				height: 35px;
			}
			
			.eventCalendar .weekHeader td {
				background-color: #372D50;
				text-align: center;
				color: #FFFFFF;
				padding: 10px !important;
				width: 14.28%;
			}
			
			.withDay {
				border: 1px #EDEDED solid;
				padding: 5px;
				background-color: #FAFAFA !important;
				cursor: pointer;
			}
			
			.withDayWithEvents {
				font-weight: bold;
				border: 2px #EDEDED solid;
				padding: 5px;
				background-color: #FFFFFF !important;
				cursor: pointer;
			}
			
			.noDay {
				background-color: #EEEEEE !important;
			}
			
			.eventDiv, .noEventDiv {
				padding-left: 5px;
				padding-right: 5px;
				font-weight: normal;
				font-size: 12px;
				vertical-align: middle;
			}

			.eventSpan, .birthdaySpan {
				padding: 2px;
				padding-left: 5px;
				padding-right: 5px;
				font-weight: bold;
				font-size: 10px !important;
				background-color: #4CAF50 !important;
				color: #FFFFFF !important;
				border-radius: 5px;
				vertical-align: middle;
				margin-right: 5px;
			}
			
			.birthdaySpan {
				background-color: #cd5a5a !important;
			}
			
			.eventDone {
				opacity: 0.35;
			}
			
			.today {
				color: #FFFFFF !important;
				background-color: #467CC8 !important;
			}
			
			.withDay:hover {
				border: 1px #EDEDED solid;
				padding: 5px;
				background-color: rgba(70, 124, 200, 0.15) !important;
			}
			
			.withDayWithEvents:hover {
				font-weight: bold;
				border: 2px #EDEDED solid;
				padding: 5px;
				background-color: rgba(70, 124, 200, 0.5) !important;
			}
			
		</style>
		
STYLES;
	
	return $calHTML . "\n" . $styles;
	}
};

?>