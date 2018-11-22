<?php
class modelaction extends CI_Model{
	public function createQuery($data){
		$this->db->insert('businesses',$data);
	}
	
	
	public function deleteQuery($id){
		
	$this->db->where('business_id', $id);
	$this->db->delete('businesses');
	}

	public function deactivateQuery($id){
	$this->db->set('business_status', '0');
	$this->db->where('business_id', $id);
	$this->db->update('businesses');
	}
}
