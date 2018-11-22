<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('modelaction', '',TRUE);
		$this->load->view('addbusiness', '',TRUE);
	}
	public function Create(){
		if(!empty($_POST)){
		$insert = array(
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
			$this->modelaction->createQuery($insert);
			redirect(base_url() . '/welcome/businesslist');
		}
		else{
			 redirect(base_url());		
			}
	}
	public function Delete($business_id){
		$this->modelaction->deleteQuery($business_id);
		 
		 redirect(base_url() . 'welcome/businesslist');
	}
	public function Update($business_id){
		
	}
	
	public function Deactivate($business_id){
		$data = array(
		'business_status' 	=> '0'
		);
		$this->modelaction->deactivateQuery($business_id);
		redirect(base_url() . 'welcome/businesslist');
	}
	
	
}