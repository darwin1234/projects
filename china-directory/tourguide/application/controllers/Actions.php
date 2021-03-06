<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('modelaction', '',TRUE);
		$this->load->view('addbusiness', '',TRUE);
	}
	public function Create(){
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
				if(!empty($_POST)){
					$userData  							= $this->session->userdata('logged_in');
					$insert = array(
						'business_name'					=> $this->input->post('business_name'),
						'business_owner'				=> $this->input->post('business_owner'),
						'business_latitude'				=> $this->input->post('business_latitude'),
						'business_longitude'			=> $this->input->post('business_longitude'),
						'business_address'				=> $this->input->post('business_address'),
						'business_category'				=> $this->input->post('business_category'),
						'business_status'				=> 1,
						'business_image'				=> $this->input->post('business_image') ,
						'publish_date'					=> $this->input->post('publish_date'),
						'street_number'					=> $this->input->post('street_number'),
						'route'							=> $this->input->post('route'),
						'locality'						=> $this->input->post('locality'),
						'administrative_area_level_1'   => $this->input->post('administrative_area_level_1'),
						'postal_code'					=> $this->input->post('postal_code'),
						'country'						=> $this->input->post('country'),
						'dslat'							=> $this->input->post('dslat'),
						'dslong'						=> $this->input->post('dslong'),
						'business_image'				=> $this->input->post('imagefile'),
						'user_id'						=> $userData['id'] 
						);
						$this->modelaction->createQuery($insert);
						redirect(base_url() . '/administrator/businesslist');
					}
		
		}else{
				 redirect(base_url());		
		}	
	}
	public function Delete($business_id){
		$this->modelaction->deleteQuery($business_id);
		 
		 redirect(base_url() . 'administrator/businesslist');
	}
	public function edit($id){	
        
		
		$this->modelaction->updateQuery($id);
		redirect (base_url() . 'administrator/edit/'.$id);
	}
	
	public function Deactivate($business_id){
		$data = array(
		'business_status' 	=> '0'
		);
		$this->modelaction->deactivateQuery($business_id);
		redirect(base_url() . 'administrator/businesslist');
	}
	
	
 
 public function search(){
	 $output = '';
	  $query = '';
	  	if($this->input->post('query')){
			$query = $this->input->post('query');
		}
	  $data = $this->modelaction->fetchCategory($query);
		  $output .= '
			  <div class="table-responsive" style="background:white;">
				 <table class="table table-bordered table-striped">
				  <tr>
				   <th>Categories</th>
				  </tr>
			  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$row->business_category.'</td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }
}
	
	
  
    
    
    