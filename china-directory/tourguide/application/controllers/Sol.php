<?php 
defined("BASEPATH") or die("No direct script access allowed");

class Sol extends CI_COntroller{
	
	
	public function __construct(){
		
			parent::__construct();
			$this->load->model('desciples','',TRUE);
			$this->load->model('Ushersinput','', TRUE);
			$this->load->model('user','',TRUE);
	}
	
	public function index(){
		$userData  			= $this->session->userdata('sol_account');
		$data['userID']		= $userData['id'];
		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
		$this->load->view('headers/SolHeader',$data);
		$this->load->view("SOL1Usher",$data);
		$this->load->view('footers/Solfooter',$data);
		
		
	}
	
	
	public function sol2(){
		$userData  							 = $this->session->userdata('sol_account');	
		$data['userID']						 = $userData['id'];
		$result1 							 = $this->desciples->records();
		$data['list_of_records'] 			 = $result1;	

		$this->load->view('headers/SolHeader',$data);
		$this->load->view("SOL2Usher",$data);
		$this->load->view('footers/Solfooter',$data);
	}
	
	
	public function sol3(){
		$userData  							= $this->session->userdata('sol_account');	
		$data['userID'] 					= $userData['id'];
		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
 
		$this->load->view('headers/SolHeader',$data);
		$this->load->view("SOL3Usher",$data);
		$this->load->view('footers/Solfooter',$data);
	}
	
	public function re_encounter(){
		$userData  							= $this->session->userdata('sol_account');	
		$data['userID'] 					= $userData['id'];
		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
			
		$this->load->view('headers/SolHeader',$data);
		$this->load->view("Re_EncounterUsher",$data);
		$this->load->view('footers/Solfooter',$data);
	}
	
	
	public function change_password_Sol(){
		$userID 			= $this->input->post('userID');
		$OldPassword		= $this->input->post('OldPassword');
		$newPassword		= $this->input->post('newPassword');
		$confirmPassword	= $this->input->post('confirmPassword');
		
		echo $this->user->change_password_Sol($userID,$OldPassword,$newPassword,$confirmPassword);
		
	}
	
	
}