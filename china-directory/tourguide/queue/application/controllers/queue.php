<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Queue extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct(){
		parent::__construct();
		$this->load->model('Actions_m','',true);
        $this->load->library('Ajax_pagination');
        $this->perPage = 1;

	}
	public function index()
	{
		$this->load->view('main');
	}

	public function online_booking(){

		$this->load->view('online_booking');


	}


	public function queue_station(){

		$this->load->view('queue_station');

	}

	public function queue_board(){

		$this->load->view('queue_board');
	}

	public function queue_counter(){

		$this->load->view('queue_counter');

	}

	public function c_1(){
		$theID = '';
		$data = array();

		$dataArr = $this->Actions_m->getRows(array('limit'=>$this->perPage));
        //total rows count
        $totalRec = count($this->Actions_m->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'queue/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
				
	
      	foreach($dataArr as $test){ 
	
				$theID = $test['ID'];
		
			 
		}		
        $config['ID'] = $theID; 
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $dataArr;
        
        //load the view
        $this->load->view('c_1', $data);



	}
	
	public function ajaxPaginationData()
    {	
		$theID = '';
	
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        $dataArr =  $this->Actions_m->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        //total rows count
        $totalRec = count($this->Actions_m->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'queue/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
		
		foreach($dataArr as $test){ 
	
				$theID = $test['ID'];
		
			 
		}		
        $config['ID'] = $theID; 
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $dataArr;
        
        //load the view
        $this->load->view('ajax-pagination-data', $data, false);
    }

	public function with_appointment(){

		$this->load->view('with_appointment');

	}

	public function Without_appointment(){

		$this->load->view('Without_appointment');

	}
	
	public function skip(){
		
		$ID = $this->input->post('ID');
		$this->Actions_m->skip($ID);
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */