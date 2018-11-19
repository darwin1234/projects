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
 
	function usherlogin($username, $password)
	{
	   $this->db->select('id_no, username, password,MentorName');
	   $this->db->from('usher_account');
	   $this->db->where('username', $username);
	   $this->db->where('password', MD5($password));
	   $this->db->limit(1);
	 
	   $query = $this->db->get();
	 
	   if($query->num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	}
	
	
	public function changedpassword($userID,$newPassword){
		
		$this->db->where('id_no', $userID);
					$this->db->update('records', array(
								   'password' => md5($newPassword)
							)
		); 
		return "Password Saved";
	}
	
	function pep_account($username, $password){
		
		$this->db->select('id_no, username, password,MentorName');
		$this->db->from('pep_account');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);
	 
	   $query = $this->db->get();
	 
	   if($query->num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
		
	}
	function sol_account($username, $password){
		
			
		$this->db->select('id_no, username, password,MentorName');
		$this->db->from('sol_account');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);
	 
	   $query = $this->db->get();
	 
	   if($query->num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
		
	}
	
	function multimedalogin($username, $password)
	{
	   $this->db->select('id_no, username, password');
	   $this->db->from('multimedia_account');
	   $this->db->where('username', $username);
	   $this->db->where('password', MD5($password));
	   $this->db->limit(1);
	 
	   $query = $this->db->get();
	 
	   if($query->num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	}
	
	
	public function peplogin($username, $password){
	

		$this->db->select('id_no, username, password');
	    $this->db->from('pep_account');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);
	 
	   $query = $this->db->get();
	 
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
	
	public function changeusername($userID,$old_username,$newusername,$re_newusername){
		
			
			if($newusername!=$re_newusername){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('records');
				$this->db->where(('username="'. $old_username . '" AND id_no="'.$userID.'"'));
			
				$query = $this->db->get();
				if($query->num_rows()==1){
					$this->db->where('id_no', $userID);
					$this->db->update('records', 
						array(
								   'username' => $newusername
							)
					); 
					return "Changed Saved";
				}else{
					return "FAILED";
				}
			}

		
	}
	
	public function changeMultimediaPassword($old_password,$newpassword,$confirmpassword,$userID ){
		
		
		if($newpassword!=$confirmpassword){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('multimedia_account');
				$this->db->where(('username="'. $old_password . '" AND id_no="'.$userID.'"'));
			
				$query = $this->db->get();
				if($query->num_rows()==1){
					$this->db->where('id_no', $userID);
					$this->db->update('multimedia_account', 
						array(
								   'username' => $newpassword
							)
					); 
					return "Changed Saved";
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
	
	public function changePasswordMultimedia($userID,$oldPassword,$newPassword,$confirmPassword){
		
			if($newPassword!=$confirmPassword){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('multimedia_account');
				$this->db->where(array('password="'. $oldPassword . '" AND id_no="'.$userID.'"'));
			
				$query = $this->db->get();
				
				echo $query->num_rows();
				if($query->num_rows()==1){
					$this->db->where('id_no', $userID);
					$this->db->update('multimedia_account', 
						array(
								   'password' => md5($newPassword)
							)
					); 
					return "Changed Saved";
				}else{
					return "Old Password not match";
				}
			}
		
	}
	
	public function change_password_ushers($userID,$OldPassword,$newPassword,$confirmPassword){
		
			if($newPassword!=$confirmPassword){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('usher_account');
				$this->db->where(array('password="'. $OldPassword . '" AND id_no="'.$userID.'"'));
			
				$query = $this->db->get();
				
				
				if($query->num_rows()==1){
					$this->db->where('id_no', $userID);
					$this->db->update('usher_account', 
						array(
								   'password' => md5($newPassword)
							)
					); 
					return "Changed Saved";
				}else{
					return "Old Password not match";
				}
			}
		
		
	}
	
	public function change_password_pep($userID,$OldPassword,$newPassword,$confirmPassword){
		
		
		if($newPassword!=$confirmPassword){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('pep_account');
				$this->db->where(array('password="'. $OldPassword . '" AND id_no="'.$userID.'"'));
			
				$query = $this->db->get();
				
				
				if($query->num_rows()==1){
					$this->db->where('id_no', $userID);
					$this->db->update('pep_account', 
						array(
								   'password' => md5($newPassword)
							)
					); 
					return "Changed Saved";
				}else{
					return "Old Password not match";
				}
			}
	}
	
	public function change_password_Sol($userID,$OldPassword,$newPassword,$confirmPassword){
		
		if($newPassword!=$confirmPassword){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('sol_account');
				$this->db->where(array('password="'. $OldPassword . '" AND id_no="'.$userID.'"'));
			
				$query = $this->db->get();
				
				
				if($query->num_rows()==1){
					$this->db->where('id_no', $userID);
					$this->db->update('sol_account', 
						array(
								   'password' => md5($newPassword)
							)
					); 
					return "Changed Saved";
				}else{
					return "Old Password not match";
				}
			}
	}
	
	
	public function moveVIP($ID){
	
	
		//error_reporting(-1);
		//$result = $this->db->query('update records set ranking =  CASE WHEN ranking = 1 THEN ranking = 2 ELSE ranking = 2 THEN ranking = 3 ELSE ranking = 3 THEN ranking = 4 END, where id_no ="'.$ID.'"');
		
		
		 //$this->db->query('update records set ranking = CASE WHEN ranking = 1 THEN 2 WHEN ranking = 2 THEN 3 WHEN raking 3 THEN 4 END where id_no =705');
		
		
		$query = $this->db->query("SELECT id_no, ranking FROM `records` where id_no='". $ID ."'");
		foreach ($query->result() as $row){
			if($row->ranking == 1){$ranking = 2;}
			if($row->ranking == 2){$ranking = 3;}
			if($row->ranking == 3){$ranking = 4;}
			if($row->ranking == 4){$ranking = 4;}
		
			
			 
			$this->db->where('id_no', $ID);
			$this->db->update('records', 
						array(
								   'ranking' => $ranking,
								   'date_visited' => date("j/n/Y")
							)
			);
			
			echo "success";
		}
		
	
	}



}