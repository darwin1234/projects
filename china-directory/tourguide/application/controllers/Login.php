<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
 	{
   		parent::__construct();
		$this->load->model('user','',TRUE);
		 $this->load->library('session'); 
         $this->load->helper('form'); 
		
	}
 
	public function index()
 	{
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
			redirect('Welcome');
		}else{
			$this->load->helper(array('form'));
			$this->load->view('Login');
		}
 	}

 

	public function retrievepassword(){
		
		$this->load->view('retrievepassword');
		
		
	}
	
	
	public function verifyemail(){
		$email 		= $this->input->post('email');
		$base_url	= $this->input->post('base_url');
		$keycode	= $this->input->post('keycode');
		$this->load->helper('form'); 
		$this->user->retrieveRecord($email,$base_url,$keycode);
		
		
	}
	
	public function changepassword($matchsessionverification){
		
		$data['matchsessionverification'] = $matchsessionverification;
		$this->load->view("changepasswordform",$data);
		
		
		
	}

	

}
