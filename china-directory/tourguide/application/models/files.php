<?php

class Files extends CI_Model{
	
	
	public function lists($userID){
		$query = $this->db->query("SELECT * FROM media  WHERE id_no='".$userID."' ORDER BY image_id asc");
		return $query->result();	
	}
	

}