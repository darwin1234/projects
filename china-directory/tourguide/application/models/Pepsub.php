<?php
class Pepsub extends CI_Model{
	
	public function insertSubject(){
		
		$userID = $this->input->post('userID');
		$subj	= $this->input->post('subj');
		$data = array(
				"userID"	=> $userID,
				"subj"		=> $subj,
					
		);

		$this->db->insert('subjecttaken',$data); 
		
	}
	
	public function looptakenSub($userID){
		$query = $this->db->query("SELECT * FROM subjecttaken WHERE userID='".$userID."'");
		return $query->result();	
		
	}
		
		
}		