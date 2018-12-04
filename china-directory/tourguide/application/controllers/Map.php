<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	function __construct(){
		 parent::__construct();
		 $this->load->model('BusinessList','',TRUE);
	}

	function index(){
		
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		//echo "<pre>";
		echo json_encode($this->BusinessList->rdata());
		//echo "</pre>";
		//echo "HELLO WORLD!";	
	}
}