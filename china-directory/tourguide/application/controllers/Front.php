<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller{
	
	function __construct(){
		 parent::__construct();
		 $this->load->model('BusinessList','',TRUE);
		
	}
	function index(){
		$data = array();
		$data['businesslist']		= 	$this->BusinessList->records();
		$this->load->view('frontpage',$data);
		
	}
	public function history(){
		
		
		
		
	}
	
	
	
	public function messageSend(){
		
		$Fullname 		= $this->input->post('Fullname');
		$EmailAddress	= $this->input->post('EmailAddress');
		$message		= $this->input->post('message');
		$sendmessage    = $this->input->post('sendmessage');
		if(isset($sendmessage)){
			echo "SENT!!!";
		
			
			
		}
		
		
		//echo "SENT!!!";
		
		
		
	}
	
	
}