<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class PodCast extends CI_Controller{
	
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('Podcastmodel','',TRUE);
		  
	
	}	
	
	
	public function index(){
	
		$podcast = $this->Podcastmodel->podcastDatabase();
		
		$data['podcastdatas'] =  $podcast;
		
		$this->load->view("podcast",$data);
	
		
	}
	 
	
	
}