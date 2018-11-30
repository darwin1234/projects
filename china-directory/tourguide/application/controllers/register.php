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
		if(!empty($_POST)){
		$insert = array(
		'first_name'	=>	$this->input->post('first_name'),
		'last_name'		=>	$this->input->post('last_name'),
		'email'			=>	$this->input->post('email'),
		'username'		=>	$this->input->post('username'),
		'password'		=> md5($this->input->post('password'))
		);
		$this->modelaction->registerQuery($insert);
		}
	
	}
 }