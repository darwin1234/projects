<?php

class users extends CI_Model {

	public function __construct() {
		$this->load->database(); 
	}
	
	//********************************************************************************************************
	// extras -- for array operations 
	
	private function sortAndFilter($arr, $level, $name, $gender, $excludeID) {
		
		$arr = array_filter($arr, function($ui) use ($level, $name, $gender, $excludeID) {			
			if($excludeID == $ui->id_no){ return false; }
		
			if( strtolower($level) != "all" ) {
				if($level > 0) { $doSearch = ($ui->ranking == $level); }
				else { $doSearch = (($ui->ranking >= 1) && ($ui->ranking <= 4)); }
			} else {
				$doSearch = true;
			}
			
			if( $doSearch ) {
				if($gender != "*") {
					$doSearch = ($ui->Gender == $gender);
				}
			}
			
			if($doSearch) {
				if(empty($name)) { return true; }
				else { return (stripos($ui->full_name, $name) !== false); }
			}
			
			return false;
		});

		usort($arr, function($ui1, $ui2){ return (strtotime($ui1->DATEVISITED) < strtotime($ui2->DATEVISITED)); });
		return $arr;
	}
	
	private function appendArray(&$arr1, &$arr2) { // performance wise, array_merge is slow
		foreach($arr2 as $arr) { $arr1[] = $arr; }
	}

	
	//********************************************************************************************************
	// retrieving records 
	
	private function getRecordWithParentId($id, $records) {
		$records_under_parent = [];
		foreach ($records as $record) {
			if ($record->mentor_id == $id) {
				$records_under_parent[] = $record;
				$records_under_parent = array_merge($records_under_parent, $this->getRecordOfSubRecordWithParenId($record->id_no, $records));
			}
		}
		return $records_under_parent;
	}

	private function getRecordOfSubRecordWithParenId($id, $records) {
		$records_under_parent = [];
		foreach ($records as $record) {
			if ($record->mentor_id == $id) {
				$records_under_parent[] = $record;
				$records_under_parent = array_merge($records_under_parent, $this->getRecordOfSubRecordWithParenId($record->id_no, $records));
			}
		}
		return $records_under_parent;
	}
	
	private function getUsersUnderMentor($id, $includeWithoutAccounts) {
		$users = $this->db->query("SELECT rec.id_no, rec.username, DATE_FORMAT(STR_TO_DATE(rec.date_visited, '%d/%m/%Y'),'%d %b %y') AS DATEVISITED, UPPER(CONCAT(rec.first_name, ' ', IF(rec.maiden_name = '', '', CONCAT(rec.maiden_name, ' ')), rec.last_name)) AS full_name, rec.ranking, rec.mentor_id, rec.Gender, (SELECT records.first_name FROM records WHERE rec.mentor_id = records.id_no) AS leader, (SELECT UPPER(CONCAT(records.first_name, ' ', records.last_name)) FROM records WHERE rec.mentor_id = records.id_no) AS leader_full_name, rec.contact, rec.email, rec.enrolled, rec.active, rec.added_as_close_cell FROM (SELECT* FROM records) AS rec " . (!$includeWithoutAccounts ? " WHERE active = 0 AND added_as_close_cell IS NOT NULL ORDER BY STR_TO_DATE(rec.date_visited,'%d/%m/%Y')" : "ORDER BY STR_TO_DATE(rec.date_visited,'%d/%m/%Y')"))->result();
		//$users = $this->db->query("SELECT rec.id_no, UPPER(CONCAT(rec.first_name, ' ', IF(rec.maiden_name = '', '', CONCAT(rec.maiden_name, ' ')), rec.last_name)) AS full_name, rec.ranking, rec.mentor_id, rec.Gender, (SELECT records.first_name FROM records WHERE rec.mentor_id = records.id_no) AS leader FROM (SELECT* FROM records) AS rec " . (!$includeWithoutAccounts ? " WHERE active = 0 AND added_as_close_cell IS NOT NULL" : ""))->result();
		//$users = $this->db->query("SELECT rec.*, UPPER(CONCAT(rec.first_name, ' ', IF(rec.maiden_name = '', '', CONCAT(rec.maiden_name, ' ')), rec.last_name)) AS full_name, (SELECT records.first_name FROM records WHERE rec.mentor_id = records.id_no) AS leader, (SELECT UPPER(CONCAT(records.first_name, ' ', records.last_name)) FROM records WHERE rec.mentor_id = records.id_no) AS leader_full_name FROM (SELECT* FROM records) AS rec " . (!$includeWithoutAccounts ? " WHERE active = 0 AND added_as_close_cell IS NOT NULL" : ""))->result();
		//$users = $this->db->query("SELECT id_no, CONCAT(last_name, ', ', first_name, ' ', maiden_name) AS full_name, ranking, mentor_id FROM records")->result();
		//$users = $this->db->query("SELECT id_no, CONCAT(last_name, ', ', first_name, ' ', maiden_name) AS full_name, ranking, mentor_id, (SELECT subRec.last_name FROM subRec WHERE subRec.id_no = records.id_no) AS leader FROM records subRec")->result();
		return $this->getRecordWithParentId($id, $users);
	}
	
	
	//********************************************************************************************************
	// main methods
	 
	public function search($name, $mentor, $level, $includeWithoutAccounts = 1, $gender = "*", $excludeID = 0, $searchAll = 0, $role = "") {
	
		$userID  = $this->session->userdata('logged_in')['id'];
	
		if($searchAll){ return $this->db->query("SELECT id_no, username, UPPER(CONCAT(first_name, ' ', IF(maiden_name = '', '', CONCAT(maiden_name, ' ')), last_name)) AS full_name, ranking, mentor_id, Gender FROM records WHERE (first_name LIKE '%$name%' OR maiden_name LIKE '%$name%' OR last_name LIKE '%$name%')" . 
				 		(!$includeWithoutAccounts ? " AND (active = 0 AND added_as_close_cell IS NOT NULL)" : "") .
						($level != "all" ? " AND (ranking = $level)" : "") .
						($gender != "*" ? " AND (Gender LIKE '$gender')" : "") .
						($excludeID ? " AND (id_no != $excludeID)" : "") .
						//" AND (id_no != $userID)" .
						" ORDER BY full_name ASC")->result(); }
						 
		return $this->sortAndFilter($this->getUsersUnderMentor($mentor, $includeWithoutAccounts), $level, $name, $gender, $excludeID);
	}
	
	public function info($id) {
		return $this->db->query("SELECT * FROM records WHERE id_no = " . $id)->result()[0];
	}
	
	public function transferto($id, $mentorID) {
		$r = $this->db->query("SELECT id_no FROM records WHERE (id_no = $mentorID AND active = 0) AND added_as_close_cell IS NOT NULL")->result();
		if($r) {
			//check if he's a pleader			
			$mRole = $this->getrole($this->getpastor($mentorID), $id);
			
			$doTransfer = true;
			if($mRole == "Primary Leader") {
				if($this->getplead($mentorID) == $id) {
					echo "Transfer failed. Unable to transfer to his/her own network.";
					$doTransfer = false;
				}
			}
			
			if($doTransfer) {
				$this->db->query("UPDATE records SET mentor_id = $mentorID WHERE id_no = $id");
				echo "DONE";
			}
		}
		else {
			echo "Transfer failed. Target mentor is not active nor added on a cell group.";
		}
	}
	
	public function getprimaryleader($id) {
		$mentorID = $id;
		$prev = "";

		do {
			$mentor = $this->db->query("SELECT id_no, mentor_id, role, ranking, profile_pic , CONCAT(first_name, ' ', last_name) AS full_name FROM records WHERE id_no = $mentorID")->result()[0];
			if( ($mentor->ranking == 100) || (strtolower($mentor->role) == "pastor") ) { return $prev; }
			
			
			$prev = "<img src='".base_url()."Welcome/userimage2/".$mentor->id_no."' style='margin:0; padding:0; margin-right:10px; background:#fff; border: 1px solid #ccc; width:30px; border-radius:30px; height:30px;'>";
		
			
			$prev .=  $mentor->full_name ;
		
			$mentorID = $mentor->mentor_id;
		} while(true);
		
	}
	
	public function getpastor($id) {
		$mentorID = $id;

		do {
			$mentor = $this->db->query("SELECT id_no, mentor_id, role, ranking, CONCAT(first_name, ' ', last_name) AS full_name FROM records WHERE id_no = $mentorID")->result()[0];
			if( ($mentor->ranking == 100) || (strtolower($mentor->role) == "pastor") ) { return $mentor->id_no; }
			$mentorID = $mentor->mentor_id;
		} while(true);
		
	}
	
	public function getplead($id) {
		$mentorID = $id;
		$prev = $id;

		do {
			$mentor = $this->db->query("SELECT id_no, mentor_id, role, ranking, CONCAT(first_name, ' ', last_name) AS full_name FROM records WHERE id_no = $mentorID")->result()[0];
			if( ($mentor->ranking == 100) || (strtolower($mentor->role) == "pastor") ) { return $prev; }
			$prev = $mentorID;
			$mentorID = $mentor->mentor_id;
		} while(true);
		
	}
	
	public function getrole($fromMentorID, $toID) { //basis-user logged in
		$user = $this->info($toID);
		if(($user->ranking == 100) || (strtolower($user->role) == "pastor")) { return "Pastor"; }

		$primary = $this->db->query("SELECT id_no FROM records WHERE mentor_id = " . $this->getpastor($toID))->result();
		
		$depth = 1;
		$maxDepth = 4; // 1 up to 12, 2 up to 144, 3 up to 1728, 4 up to 20736, ... n up to 12^n
		
		$disciples = $primary;
		while($depth <= $maxDepth) {
			$newList = null;
			foreach($disciples as $disciple) {
				if($disciple->id_no == $toID) { 
					$role = pow(12, $depth);
					return ($role == 12) ? "Primary Leader" : $role;
				}
				$result = $this->db->query("SELECT id_no FROM records WHERE mentor_id = " . $disciple->id_no)->result();
				$newList = (!$newList) ? $result : array_merge($newList, $result);
			}
			
			$disciples = $newList;
			$depth++;
		}
	
		return pow(12, $maxDepth) . "+";
	}
	
	public function getFirstGender($g) {
		return $this->db->query("SELECT id_no FROM records WHERE Gender LIKE '$g'")->result()[0]->id_no;
	}
	
	public function getcounts() {
		$ids = [$this->getpastor($this->getFirstGender("Male")), $this->getpastor($this->getFirstGender("Female"))];

		$for1728 = null;
		
		$c144 = 0;
		foreach($ids as $id) {
			$primary = $this->db->query("SELECT id_no FROM records WHERE added_as_close_cell = 1 AND active = 0 AND mentor_id = " . $id)->result();
			foreach($primary as $d) {
				$r = $this->db->query("SELECT id_no FROM records WHERE added_as_close_cell = 1 AND active = 0 AND mentor_id = " . $d->id_no);
				$c144 += $r->num_rows();
				
				$for1728 = (empty($for1728) ? $r->result() :  array_merge($for1728, $r->result()));
			}
		}
		
		$c1728 = 0;
		foreach($for1728 as $disciple) {
			$c1728 += $this->db->query("SELECT id_no FROM records WHERE added_as_close_cell = 1 AND active = 0 AND mentor_id = " . $disciple->id_no)->num_rows();
		}
		
		return [$c144, $c1728];
	}
	
	public function getcounts2() {
		$ids = [$this->getpastor($this->getFirstGender("Male")), $this->getpastor($this->getFirstGender("Female"))];

		$for1728 = null;
		
		$c144 = 0;
		foreach($ids as $id) {
			$primary = $this->db->query("SELECT id_no FROM records WHERE added_as_close_cell = 1 AND active = 0 AND mentor_id = " . $id)->result();
			foreach($primary as $d) {
				$r = $this->db->query("SELECT id_no FROM records WHERE added_as_close_cell = 1 AND active = 0 AND mentor_id = " . $d->id_no);
				$c144 += $r->num_rows();
				
				$for1728 = (empty($for1728) ? $r->result() :  array_merge($for1728, $r->result()));
			}
		}
		
		$c1728 = 0;
		foreach($for1728 as $disciple) {
			$c1728 += $this->db->query("SELECT id_no FROM records WHERE added_as_close_cell = 1 AND active = 0 AND mentor_id = " . $disciple->id_no)->num_rows();
		}
		
		echo $c144 . "\n";
		
		echo $c1728;
		
		//return [0,0];
	}
	
	public function getmembercounts() {
		$members = [];
		$members['all'] = $this->db->query("SELECT id_no FROM records WHERE active = 0")->num_rows();
		$members['cell'] = $this->db->query("SELECT id_no FROM records WHERE active = 0 AND added_as_close_cell = 1")->num_rows();
		$members['male'] = $this->db->query("SELECT id_no FROM records WHERE active = 0 AND added_as_close_cell = 1 AND Gender = 'Male'")->num_rows();
		$members['female'] = $this->db->query("SELECT id_no FROM records WHERE active = 0 AND added_as_close_cell = 1 AND Gender = 'Female'")->num_rows();
		$members['single'] = $this->db->query("SELECT id_no FROM records WHERE active = 0 AND added_as_close_cell = 1 AND civil_status = 'Single'")->num_rows();
		$members['married'] = $this->db->query("SELECT id_no FROM records WHERE active = 0 AND added_as_close_cell = 1 AND civil_status = 'Married'")->num_rows();
		return $members;
	}
	
	
	public function getMyPrimaryCount($id) {
		return $this->db->query("SELECT id_no FROM records WHERE added_as_close_cell = 1 AND active = 0 AND mentor_id = " . $id)->num_rows();
	}
	
	public function delete($id = 0) {
		if($this->getMyPrimaryCount($id) == 0) {
			$this->db->query("DELETE FROM records WHERE id_no = " . $id);
		} else {
			echo "Delete Failed. Please transfer all his/her disciples first.";
		}
	}
	
	public function viplistdownloadCSV($from, $to) {
		header('Content-type: text/csv');
		header('Content-Disposition: attachment; filename="viplist.csv"');
	
		$vips = $this->db->query("SELECT CONCAT(last_name, ', ', first_name, ' ', maiden_name) AS full_name, contact, address, ranking, mentor_id, date_visited FROM records WHERE (ranking >= 1 AND ranking <= 4) AND (DATE_FORMAT(STR_TO_DATE(date_visited, '%d/%m/%Y'), '%Y-%m-%d') >= '$from' AND DATE_FORMAT(STR_TO_DATE(date_visited, '%d/%m/%Y'), '%Y-%m-%d') <= '$to') ORDER BY CONCAT(last_name, ', ', first_name, ' ', maiden_name) ASC")->result();
		
		echo '"Times Attended","Full Name","Contact Number","Address","Cell Leader","Visited"' . "\n\n";
		
		foreach($vips as $vip) {
			echo "\"{$vip->ranking}\"";
			echo ",\"{$vip->full_name}\"";
			echo ",\"{$vip->contact}\"";
			echo ",\"{$vip->address}\"";
			
			if(!empty($vip->mentor_id)) {
				$r = $this->db->query("SELECT CONCAT(last_name, ', ', first_name, ' ', maiden_name) AS full_name FROM records WHERE id_no = " . $vip->mentor_id);
				if($r->num_rows() > 0) {
					$cell_leader = $r->result()[0]->full_name;
				} else {
					$cell_leader = "";
				}
			} else {
				$cell_leader = "";
			}
			
			echo ",\"$cell_leader\"";
			
			$d = explode("/", $vip->date_visited);
			echo ",\"" . date("F j, Y", strtotime($d[2] . "-" . ($d[1] < 10 ? "0" . $d[1] : $d[1]) . "-" . ($d[0] < 10 ? "0" . $d[0] : $d[0]) )) . "\"\n";
		}
	}
	
	public function viplistdownloadEXCEL($from, $to) {
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="viplist.xls"');
	
		$vips = $this->db->query("SELECT CONCAT(last_name, ', ', first_name, ' ', maiden_name) AS full_name, contact, address, ranking, mentor_id, date_visited FROM records WHERE (ranking >= 1 AND ranking <= 4) AND (DATE_FORMAT(STR_TO_DATE(date_visited, '%d/%m/%Y'), '%Y-%m-%d') >= '$from' AND DATE_FORMAT(STR_TO_DATE(date_visited, '%d/%m/%Y'), '%Y-%m-%d') <= '$to') ORDER BY CONCAT(last_name, ', ', first_name, ' ', maiden_name) ASC")->result();

		?>
		<table width="100%" border="1">
				<tr>
					<td><b>Times Attended</b></td>
					<td><b>Full Name</b></td>
					<td><b>Contact Number</b></td>
					<td><b>Address</b></td>
					<td><b>Cell Leader</b></td>
					<td><b>Visited</b></td>
				</tr>
		<?php

		foreach($vips as $vip) {			
			?>
				<tr>
					<td><?php echo $vip->ranking; ?></td>
					<td><?php echo $vip->full_name; ?></td>
					<td><?php echo $vip->contact; ?></td>
					<td><?php echo $vip->address; ?></td>
					<td><?php						
						if(!empty($vip->mentor_id)) {
							$r = $this->db->query("SELECT CONCAT(last_name, ', ', first_name, ' ', maiden_name) AS full_name FROM records WHERE id_no = " . $vip->mentor_id);
							if($r->num_rows() > 0) {
								$cell_leader = $r->result()[0]->full_name;
							} else {
								$cell_leader = "";
							}
						} else {
							$cell_leader = "";
						}
						
						echo $cell_leader;
					?></td>
					<td><?php
						$d = explode("/", $vip->date_visited);
						echo date("F j, Y", strtotime($d[2] . "-" . ($d[1] < 10 ? "0" . $d[1] : $d[1]) . "-" . ($d[0] < 10 ? "0" . $d[0] : $d[0]) ));
					?></td>
				</tr>
			<?php
		}
		?>
		</table>
		<?php
	}
}

?>