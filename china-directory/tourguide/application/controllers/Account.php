<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct(){
		
		   parent::__construct();
		   $this->load->model('media','',TRUE);
		   $this->load->model('BusinessList','',TRUE);
		   $this->load->model('chart', '', TRUE);

		   $this->load->model('Ushersinput','', TRUE);
		   $this->load->model('user','', TRUE);
		   $this->load->helper('date');
		   $this->load->model('users','',True);
		  
	}			
	function index(){
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
			$userData  							= $this->session->userdata('logged_in');
		
			$disciplesResult 					= $this->BusinessList->records();	
			
			
			
			$username							= $userData['username'];
			$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

			$data['user_name']					= $username;
			$data['list_of_records'] 			= $disciplesResult;
		
			$data['active_account']				= $activeAcount;
			$data['userID'] 					= $userData['id'];

			$data['userRole'] 					= @$userData['Role'];
			$data['total'] 						= 0;
			$data['LeaderName'] 	  			= $userData['MentorID'];
			//$data['addBtn']						= '<button type="button" class="pull-right btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Disciple</button>';
			$data['settings']					= 'display';
			
			$data['username'] 					= $userData['username'];		
			$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
			
			$data['usergender']					= $userData['gender'];
			$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
			//chart 
			
			$chartRecordData= $this->BusinessList->chart();
			
			$data['jsonChartData'] 		= $chartRecordData;
			$data['counthisopencell'] 	= $chartRecordData;
		
		
			$data['progress'] = $this->users->getcounts();
			$data['memberscount'] = $this->users->getmembercounts();
			

			$data["realUserID"] = $userData['id'];
			
			$data['countDisciples'] = 1;
			if($userData == NULL){
				
				redirect(base_url());
				
			}else{
				$this->load->view('headers/adminhead',$data);
				$this->load->view('myaccount',$data);
				$this->load->view('footers/adminfooter',$data);
			}	
		
		}else{
			redirect('login');
			
		}			

	}
	public function updateaccount(){
		$this->user->updatebasicinfo();
	}
	
	public function changepassword(){
			$data = $this->session->userdata('logged_in');
		if(!empty($data)){
			$userData  							= $this->session->userdata('logged_in');
		
			$disciplesResult 					= $this->BusinessList->records();	
			
			
			
			$username							= $userData['username'];
			$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

			$data['user_name']					= $username;
			$data['list_of_records'] 			= $disciplesResult;
		
			$data['active_account']				= $activeAcount;
			$data['userID'] 					= $userData['id'];

			$data['userRole'] 					= @$userData['Role'];
			$data['total'] 						= 0;
			$data['LeaderName'] 	  			= $userData['MentorID'];
			//$data['addBtn']						= '<button type="button" class="pull-right btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Disciple</button>';
			$data['settings']					= 'display';
			
			$data['username'] 					= $userData['username'];		
			$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
			
			$data['usergender']					= $userData['gender'];
			$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
			//chart 
			
			$chartRecordData= $this->BusinessList->chart();
			
			$data['jsonChartData'] 		= $chartRecordData;
			$data['counthisopencell'] 	= $chartRecordData;
		
		
			$data['progress'] = $this->users->getcounts();
			$data['memberscount'] = $this->users->getmembercounts();
			

			$data["realUserID"] = $userData['id'];
			
			$data['countDisciples'] = 1;
			if($userData == NULL){
				
				redirect(base_url());
				
			}else{
				$this->load->view('headers/adminhead',$data);
				$this->load->view('changepasswordform',$data);
				$this->load->view('footers/adminfooter',$data);
			}	
		
		}else{
			redirect('login');
			
		}	
	}
}	