<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
		public function __construct(){
		
		   parent::__construct();
		   $this->load->model('desciples','',TRUE);
		   $this->load->model('user','', TRUE);
		}
		
		public function profile(){
			$userData  							= $this->session->userdata('logged_in');
			$userID								= $userData['id'];
			$activeAcount						= $this->desciples->useraccount($userID); // user profile table
			$data['active_account']				= $activeAcount;
			$this->load->view('profile',$data);
		
		
		}
		
		
		public function discipleslist(){
			$userData  							= $this->session->userdata('logged_in');
			
			$disciplesResult 					= $this->desciples->records();	// disciples records
			$username							= $userData['username'];
			$activeAcount						= $this->desciples->useraccount($username); // user profile table
	
			$data['user_name']					= $username;
			$data['list_of_records'] 			= $disciplesResult;
			$data['userID'] 					= $userData['id'];
			
			
			$this->load->view('discipleslist',$data);
			
			
			 
			
		}   
		
		
		public function deactivatelist(){
			$userData  							= $this->session->userdata('logged_in');
			
			$disciplesResult 					= $this->desciples->records();	// disciples records
			$username							= $userData['username'];
			$activeAcount						= $this->desciples->useraccount($username); // user profile table
	
			$data['user_name']					= $username;
			$data['list_of_records'] 			= $disciplesResult;
			$data['userID'] 					= $userData['id'];
			
			
			$this->load->view('deactivatelist',$data);
			
			 
			
			
		}
		
		public function aboutInfo(){
			
			$userData  							= $this->session->userdata('logged_in');
			
			$disciplesResult 					= $this->desciples->records();	// disciples records
			$username							= $userData['username'];
			$activeAcount						= $this->desciples->useraccount($username); // user profile table
	
			$data['user_name']					= $username;
			$data['list_of_records'] 			= $disciplesResult;
			$data['userID'] 					= $userData['id'];
			
			
			$this->load->view('about',$data);
			
		}
		
		public function listofnameaddedasclose(){
			$userData  							= $this->session->userdata('logged_in');			
			$disciplesResult 					= $this->desciples->records();	// disciples records
			$data['userID'] 					= $userData['id'];
			$data['userRole'] 					= @$userData['Role'];
			$data['list_of_records'] 			= $disciplesResult;
			$this->load->view('autoload/add_disciple',$data);
		}
		
	
		
		public function level(){
			
				$userData  					= $this->session->userdata('logged_in');
				$data['username'] 			= $userData['username'];
				$data['userID'] 			= $userData['id'];			
				$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
				$this->load->view('autoload/level',$data);
		}
		
		public function primary_search(){
			if(strlen($this->input->post('primary_search'))!=0){	
				$search = $this->input->post('primary_search');
			}else{
				
				$search = $this->input->post('pastor_search');
				
			}
			
			$userData  							= $this->session->userdata('logged_in');
			$data['userRole'] 					= @$userData['Role'];
			$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay($search);
			$this->load->view('autoload/level',$data);
		
		}
		 
		
	 
}