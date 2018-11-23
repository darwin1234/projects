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
	
	public function updateQuery($id){
			
		$update = array(
			'business_name'					=> $this->input->post('business_name'),
			'business_owner'				=> $this->input->post('business_owner'),
			'business_latitude'				=> $this->input->post('business_latitude'),
			'business_longitude'			=> $this->input->post('business_longitude'),
			'business_address'				=> $this->input->post('business_address'),
			'business_category'				=> $this->input->post('business_category'),
			'business_status'				=> $this->input->post('business_status'),
			'business_image'				=> $this->input->post('business_image') ,
			'publish_date'					=> $this->input->post('publish_date'),
			'street_number'					=> $this->input->post('street_number'),
			'route'							=> $this->input->post('route'),
			'locality'						=> $this->input->post('locality'),
			'administrative_area_level_1'   => $this->input->post('administrative_area_level_1'),
			'postal_code'					=> $this->input->post('postal_code'),
			'country'						=> $this->input->post('country'),
			'dslat'							=> $this->input->post('dslat'),
			'dslong'						=> $this->input->post('dslong')
			);
		$this->db->where('business_id', $id);
		$this->db->update('businesses', $update);
	}
}
