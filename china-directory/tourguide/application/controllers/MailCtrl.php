<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailCtrl extends CI_Controller {
	
	
	 public function __construct() { 
         parent::__construct(); 
         $this->load->library('session'); 
         $this->load->helper('form'); 
     } 
		
     public function index() { 
	
        

     } 
  
	public function questions(){
		 $this->load->helper('form'); 
		 $from_email = $this->input->post('EmailAddress');
         $to_email	 = "launionccc@gmail.com"; //$this->input->post(''); 
		 $FullName 	 = $this->input->post('FullName');
		 $Message	 = $this->input->post('message');
   
         //Load email library 
         $this->load->library('email'); 
		
         $this->email->from($from_email, $FullName); 
         $this->email->to($to_email);
         $this->email->subject('QUESTIONS'); 
         $this->email->message($Message); 
		
         //Send mail 
         if($this->email->send()){ 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
		 echo "<h2 style='color:red;'>Successfully Sent</h2>";
		 }else{
			$this->session->set_flashdata("email_sent","Error in sending Email."); 
			$this->load->view('email_form'); 
			echo "Error Sending Email";
			 
	     } 
     
		
	}

}