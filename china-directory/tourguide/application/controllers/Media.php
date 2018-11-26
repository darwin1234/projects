<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Media extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		 $this->load->model('media','',TRUE);
	}
	
	function loadMedia(){
		//$data 						= array();
		//$userData  					= $this->session->userdata('logged_in');
		//$data['loadmedia'] 			= $this->media->records($userData['id']);
		//$this->load->view('media/media',$data);
		
	}	
}