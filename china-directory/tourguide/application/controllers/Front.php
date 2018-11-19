<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller{
	
	public function history(){
		$this->load->view('headers/frontheader');
		$this->load->view('history');
		$this->load->view('footers/frontfooter');
		
		
		
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