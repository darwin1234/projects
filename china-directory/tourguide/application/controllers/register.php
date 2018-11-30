<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class register extends CI_Controller{
	public function __construct(){
		parent::__construct();
			$this->load->database();
			$this->load->helper('url');	
			$this->load->model('modelaction','',TRUE);
	}
	public function index(){
	$this->load->view('register');
	}
	public function signup(){
   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('register');
   }
   else
   {
     //Go to private area
     $this->modelaction->registerQuery();
   }
	}
 }