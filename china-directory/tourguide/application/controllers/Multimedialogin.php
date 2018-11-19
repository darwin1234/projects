<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multimedialogin extends CI_Controller {

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
     //Field validation failed.  User redirected to g12login page
     $this->load->view('multimedialogin');
   }
   else
   {
     //Go to private area
     redirect('ushers/multimedia', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->multimedalogin($username, $password);

   if($result)
   {
     $sess_array = array();

     foreach($result as $row)
     {
       $sess_array = array(
         'id' 			=> $row->id_no,
         'username' 	=> $row->username,
		
       );
       $this->session->set_userdata('multimedialogin', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', '<p style="text-align:center;">Invalid username or password</p>');
     return false;
   }
 }
 
	function logout(){
	
		 $this->session->unset_userdata('multimedialogin');
		  redirect(base_url(), 'refresh');
		 
		
	}
}
?>