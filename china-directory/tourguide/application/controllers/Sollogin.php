<?php 


class Sollogin extends CI_Controller{
	
	
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('user','',TRUE);
	 }

	 function index()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('username', 'Username', 'trim|required');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 $this->load->view('Sollogin');
	   }
	   else
	   {
		 //Go to private area
		 redirect('Sol', 'refresh');
	   }

	 }

	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');

	   //query the database
	   $result = $this->user->sol_account($username, $password);

	   if($result)
	   {
		 $sess_array = array();

		 foreach($result as $row)
		 {
		   $sess_array = array(
			    'id' 			=> $row->id_no,
				'username' 	=> $row->username,
				'MentorName'	=> $row->MentorName,
		   );
		   $this->session->set_userdata('sol_account', $sess_array);
		 }
		 return TRUE;
	   }
	   else
	   {
		 $this->form_validation->set_message('check_database', '<p style="text-align:center">Invalid username or password</p>');
		 return false;
	   }
	 }
		
	
}