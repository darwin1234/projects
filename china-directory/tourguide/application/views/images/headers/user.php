<?php

Class User extends CI_Model
{
 function login($username, $password)
 {
   $this->db->select('id_no, username, password,role,Gender,mentor_id');
   $this->db->from('records');
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
	
	function changePassword($userID,$pass,$npass,$rpass){
	
			
			if($npass!=$rpass){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('records');
				$this->db->where(('password="'. md5($pass) . '" AND id_no="'.$userID.'"'));
			
				$query = $this->db->get();
				if($query->num_rows()==1){
					$data = 
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


}