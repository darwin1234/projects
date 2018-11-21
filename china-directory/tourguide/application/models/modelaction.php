<?php
class modelaction extends CI_Model{
	public function createQuery($data){
		$this->db->insert('businesses',$data);
	}
}

?>