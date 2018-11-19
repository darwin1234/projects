<?php 


class Test extends CI_Model{
	
	public function happy(){
		$query = $this->db->query("SELECT * FROM records  ORDER BY first_name asc");
		return $query->result();	
		
	}
	
	
}