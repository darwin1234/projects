<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('modelaction', '',TRUE);
	}
	
	public function Create(){
		if(!empty($_POST)){
		$insert = array(
			'business_name'			=> $this->input->post('business_name'),
			'business_owner'		=> $this->input->post('business_owner'),
			'business_latitude'		=> $this->input->post('business_latitude'),
			'business_longitude'	=> $this->input->post('business_longitude'),
			'business_address'		=> $this->input->post('business_address'),
			'business_category'		=> $this->input->post('business_category'),
			'business_status'		=> $this->input->post('business_status'),
			'business_image'		=> $this->input->post('business_image'),
			'publish_date'			=> $this->input->post('publish_date')
			);
			$this->modelaction->createQuery($insert);
		}
		else{
			 redirect(base_url());		
			}
	}


}