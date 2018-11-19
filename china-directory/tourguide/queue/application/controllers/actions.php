<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actions extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Actions_m','',true);
        $this->load->library('Ajax_pagination');
        $this->perPage = 1;

	}

	public function addRecord(){

		echo '<h3>Thank You!</h3><h4>Your Queue Number is ' . sprintf('%06d', $this->Actions_m->addRecord()) . ' Please Wait at MOMSC Hall B</h4><p>To see the queue status in real time on your mobile device, please go to <span class="station-link">http://qno.me/mom</span> to keep yourself updated.</p><p><a href="'.base_url().'queue/with_appointment" id="exit1" class="btn btn-danger btnqboard aligncenter">Exit</a></p></div>'; 
  
	}


	public function upcomming(){

		$data['queueboardArray'] = $this->Actions_m->queueboardload();

		$this->load->view('ajaxload/upcomming',$data);
	}	 


	public function skipped(){

		$data['queueboardArray'] = $this->Actions_m->queueboardload();

		$this->load->view('ajaxload/skipped',$data);
	}


	public function upcomming_c1(){

		$data['queueboardArray'] = $this->Actions_m->queueboardload();

		$this->load->view('ajaxload/upcomming_c1',$data);

	}
	


}