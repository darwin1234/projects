<?php

Class User extends CI_Model
{
	 function login($username, $password)
	 {   
	   $query = $this->db->query('SELECT id_no, username, password,role,Gender,mentor_id  FROM records WHERE BINARY username = "' .$username. '" and password= "'. md5($password).'"');

		
	   if($query->num_rows() == 1)
	   { 
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	 }
 


	function changePassword($userID,$pass,$npass,$rpass){
	
			
			if($npass!=$rpass){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('records');
				$this->db->where(('password="'. md5($pass) . '" AND id_no="'.$userID.'"'));
			
				$query = $this->db->get();
				if($query->num_rows()==1){
					$this->db->where('id_no', $userID);
					$this->db->update('records', 
						array(
								   'password' => md5($npass)
							)
					); 
					return "SUCCESS";
				}else{
					return "FAILED";
				}
			}

		
	}
	
	
	
	
	
	
	public function retrieveRecord($email,$base_url,$keycode){
		
		$this->db->select('*');
		$this->db->from('records');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			$from_email = "admin@ccclaunion.com"; 
			//Load email library 
			$this->load->library('email'); 	   
			$this->email->from($from_email, 'Your Name'); 
			$this->email->to($email);
			$this->email->subject('Email Test'); 
			$message = "Please click here to change your password" . "<a href='".$base_url."Login/changepassword/".$keycode."'>Change Password</a>";
			
			$this->email->message($message); 
		   
				 //Send mail 
			if($this->email->send())
			{ 
					$this->session->set_flashdata("email_sent","Email sent successfully."); 
					echo "success";
			}else{ 
					 $this->session->set_flashdata("email_sent","Error in sending Email."); 
					// $this->load->view('email_form'); 
			}
			
		}else{
			
			echo "Sorry that Email is not exist";
			
		}
	}
	
	public function retrivePassword($email){
		
		 $query = $this->db->query('SELECT id_no, username, Email FROM records WHERE EMAIL  = "' .$email. '"');
		  if($query->num_rows() == 1)
		  { 
			  return $query->result();
		}
		else
		{
			return 0;
		}
		
		
	}
	public function checkifusernameexist($username){
				$userID_t	= $this->input->post('userID_t');
				if(isset($userID_t) == true){
					$this->db->select('*');
					$this->db->from('records');
					$this->db->where( ('username="'. $username . '" AND id_no="'.$userID_t.'"'));
					$query = $this->db->get();
					if($query->num_rows()== 1){
						
						return "False";
						
					}else{
						
						return "True";
					}
					
				}else{ 	
					$this->db->select('*');
					$this->db->from('records');
					$this->db->where("username", $username);
					$query = $this->db->get();
					if($query->num_rows()== 1){
						
						return "False";
						
					}else{
						
						return "True";
					}
				}
	}
	
	public function updatebasicinfo(){
		
		$data = $this->session->userdata('logged_in');
			if(!empty($data)){
				$userData  							= $this->session->userdata('logged_in');
				$update = array(
					'first_name'					=> $this->input->post('firstname'),
					'last_name'						=> $this->input->post('lastname'),
					'address'						=> $this->input->post('address'),
					'contact			'			=> $this->input->post('contact'),
					'email			'				=> $this->input->post('email'),
					'contact'						=> $this->input->post('contactno')
				);
				$this->db->where('id_no', $userData['id']);
				$this->db->update('records', $update);
				redirect('account');
			}	
			else{
				redirect('login');
			}	
	}




}