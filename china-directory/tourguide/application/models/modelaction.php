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
			'business_image'				=> $this->input->post('imagefile') ,
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
	/*public function fetch_data($query){
	  $this->db->select("*");
	  $this->db->from("businesses");
  if($query != ''){
   $this->db->like('business_name', $query);
   $this->db->or_like('business_owner', $query);
   $this->db->or_like('business_address', $query);
   $this->db->or_like('business_category', $query);
   $this->db->or_like('route', $query);
   $this->db->or_like('locality', $query);
   $this->db->or_like('administrative_area_level_1', $query);
   $this->db->or_like('postal_code', $query);
   $this->db->or_like('country', $query);
  }
  $this->db->order_by('business_id', 'DESC');
  return $this->db->get();
 }*/
 public function fetchCategory($query){
	 $this->db->select("*");
	 $this->db->from("category");
		if($query != ''){
			$this->db->like('business_category', $query);
 }
	 $this->db->order_by('category_id','DESC');
	 return $this->db->get();
}
 public function registerQuery($data){
	$this->db->insert('records',$data);
}
}
