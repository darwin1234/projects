<?php 

defined("BASEPATH") or die("No direct script access allowed");

class Pep extends CI_Controller {
	
	public function __construct(){
		
			parent::__construct();
			$this->load->model('desciples','',TRUE);
			$this->load->model('Ushersinput','', TRUE);
			$this->load->model('user','',TRUE);
			$this->load->model('Pepsub','',TRUE);
			
	}
	
	
	public function index(){
		$userData  							= $this->session->userdata('logged_in');
		
		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
		$result2 							= $this->Ushersinput->getRecord();
		$data['visitors'] 					= $result2;
		$data['counter'] 					= 0;
		$data['userID']						= $userData['id'];
		
		$this->load->view('headers/PepHeader',$data);
		$this->load->view('PreEncounterUsher',$data);
		$this->load->view('footers/PepFooter',$data);
		
		
	}
	
	
	public function pre_encounter(){

		
	}
	
	public function encounter(){
		$userData  							= $this->session->userdata('logged_in');
		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
		$result2 							= $this->Ushersinput->getRecord();
		$data['visitors'] 					= $result2;
		$data['counter'] 					= 0;
		$data['userID']						= $userData['id'];

		$this->load->view('headers/PepHeader',$data);
		$this->load->view("encounterUsher",$data);
		$this->load->view('footers/PepFooter',$data);
	}
	
	public function post_encounter(){
		$userData  							= $this->session->userdata('logged_in');

		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
		$result2 							= $this->Ushersinput->getRecord();
		$data['visitors'] 					= $result2;
		$data['counter'] 					= 0;
		$data['userID']						= $userData['id'];
		$this->load->view('headers/PepHeader',$data);
		$this->load->view("Post_EncounterUsher",$data);
		$this->load->view('footers/PepFooter',$data);
	}

	public function change_password_pep(){
		$userID 			= $this->input->post('userID');
		$OldPassword		= $this->input->post('OldPassword');
		$newPassword		= $this->input->post('newPassword');
		$confirmPassword	= $this->input->post('confirmPassword');
		echo $this->user->change_password_pep($userID,$OldPassword,$newPassword,$confirmPassword);
		
	}
	
	public function pepsubjecttaken($userID){
		
			$data['userID'] 		= $userID;
			$data['subjtaken'] 		= $this->Pepsub->looptakenSub($userID);
			$data['photoDisplay']	= $this->desciples->useraccount($userID);
			$this->load->view('pepsubjecttaken',$data);
		
	}
	
	public function ticksubj(){
		
		$this->Pepsub->insertSubject();
		
		
	}
	
	
}