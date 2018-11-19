<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia  extends CI_Controller {
	
	public function __construct(){
		
		   parent::__construct();
		   $this->load->model('podcastmodel','',TRUE);
		   $this->load->model('events', '', TRUE);
		  
		
	}

	
	public function WebMaintenance(){

		$this->load->view('headers/MultimediaHeader');
		$this->load->view("multimediaAdmin/Multimedia");
		$this->load->view('footers/MultimediaFooter.php');
	}
	
	
	public function uploadAudio(){

		
		$this->podcastmodel->uploadAudio();
		
	}

	public function UpcomingEvents(){
			
		$data["events_list"] = $this->events->displayEventArray();	
	    $data["birthdays"]	 = $this->events->birthdays();
	    $this->load->view("headers/MultimediaHeader",$data);
		$this->load->view("EventsMultimedia",$data);
		$this->load->view("footers/MultimediaFooter",$data);
	}

	public function Templates(){



		$this->load->view("TemplatesMultimedia");
	}

	public function Schedules(){


		$this->load->view('headers/MultimediaHeader');
		$this->load->view("SchedulesMultimedia");
		$this->load->view('footers/MultimediaFooter.php');
	}

	
	
	
}
