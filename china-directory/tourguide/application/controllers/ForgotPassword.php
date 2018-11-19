<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller{
	
	public function __construct(){
			parent::__construct();
			$this->load->model('User','',true);
			$this->load->helper('form');
	}
	
	public function index(){
		
		
		
		//echo "This Page is under construction";
		$data = [];
		
	
		
	
	
		if($this->input->post('Retrieve')){ 
			$useremail					= $this->input->post('useremail');
			$response 					= $this->User->retrivePassword($useremail);
			
			
			if($response == 0){
				$data['response']  ="Email not Found";
			}else{
				
				$random = md5(time());
				$data['hash'] 		= $random;
				
				$_SESSION['hash_data'] 		= $random;
				$_SESSION['id_no'] 			= $response[0]->id_no;
				$username					= $response[0]->username;
				
				$from_email  = "bridgeit@ccclaunion.com";
				$to_email	 = $useremail;  //$this->input->post(''); 
				$company 	 = base_url() . " Retrive Password";
				$Message	  = "Username: " . $username;
				$Message 	 .= "\n Click the link to retrieve password"; 
				$Message	 .=  base_url() ."ForgotPassword/changePassword?hash=" .$random;
				//Load email library 
				$this->load->library('email'); 
				$this->email->from($from_email, $company); 
				$this->email->to($to_email);
				$this->email->subject($company . ' Password Retriever'); 
				$this->email->message($Message);
				$this->email->send();
				$data['response'] = "<h3>Email has been sent.</h3> <p>When you recieve your sign in information, follow the directions in the email to reset your password.</p>";
				
			}
			
			
	
		
			
		}
	
		$this->load->view('ForgotPassword',$data);
	}
	
	public function changePassword(){
		$data = [];
		$data['hash_data']	 =  $_SESSION['hash_data'];
		$ID 				 =  $_SESSION['id_no']; 
		$new_password		 =  $this->input->post('new_password');
		$retype_password	 =  $this->input->post('retype_password');
		
		if($this->input->post('submit')){
			
				if($new_password != $retype_password){
			
					$data['response'] = "Password Not Match";

				}else{
			
					$this->User->changedpassword($ID,$new_password);
					$data['response'] = "Successfully Changed.";
					redirect("Login/g12Login");
				}
			
			
		}
	
	
		$this->load->view('retrievepassword',$data);
		
	}
	
	
	
	
}
