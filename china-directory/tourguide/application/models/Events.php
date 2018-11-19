<?php 


class Events extends CI_Model{
	
	public function insertEvent($data){
	
			$this->db->insert('ccc_event_list',$data); 
			
			
			
			
	}
	
	
	public function displayEventArray(){
		
		$this->db->select('*');
		$this->db->from('ccc_event_list');
		$query = $this->db->get();
		$eventInfo =  $query->result();
		
		return $eventInfo;
	} 
	
	
	public function birthdays(){
		
		$this->db->select('*');
		$this->db->from('records');
		$query = $this->db->get();
		$birthdays =  $query->result();
		
		return $birthdays;
		
		
	}
	public function displayEvent($userID){
		
		$this->db->select('*');
		$this->db->from('ccc_event_list');
		$this->db->where('account_id',$userID);
		$query = $this->db->get();
		$eventInfo =  $query->result();
		$e = array();
		$events = array();
		echo json_encode($eventInfo);
	
		
	}
	
	public function dragEventAndresizeEvent(){
		$id 	= $this->input->post('id');
		$title	= $this->input->post('title');
		$start	= $this->input->post('start');
		$end	= $this->input->post('end');
		
		
		$events = array(
			'id'			=> $id,
			'title'			=> $title,
			'start'	 		=> $start,
			'end'	 		=> $end
		);
		
		
		$this->db->where('id', $id);
		$this->db->update('ccc_event_list',$events);
						
		
	}
	
	public function deleteEvent(){
		$id = $this->input->post('id');
		
		
		
		
		$this->db->where('id', $id);
		$this->db->delete('ccc_event_list');
	
		echo "success!" ;
	}
	
	
	public function resizeEvent(){
		
		
		
	}
	
	public function updateEvent(){
		$id = $this->input->post('id');
		
		$events = array(
			'id'			=>  $this->input->post('id'),
			'title'			=>  $this->input->post('title'),
			'time_start'	=> 	$this->input->post('time_start_edit'),
			'time_end'		=>  $this->input->post('time_end_edit')
		);
		
		
		$this->db->where('id',$id);
		$this->db->update('ccc_event_list',$events);
		
	}
	
	public function eventVisitorsReactions(){
		
		$event_title  = $this->input->post('event_title');
		$eventid 	  = $this->input->post('eventid');
		$status	  	  = $this->input->post('status');
		$userid	  	  = $this->input->post('userid');
		echo $eventid;
				$this->db->select('*');
				$this->db->from('guests');
				$this->db->where(('eventid="'. $eventid . '" AND userid="'.$userid.'"'));
			
				$query = $this->db->get();
				if($query->num_rows()==1){
					$this->db->where(('userid="'. $userid .'" AND eventid="'.$eventid.'"'));
					$this->db->update('guests', 
						array(
								   'status' => $status
							)
					); 
					echo  "Changed Saved";
				}else{
						
						
						$data = array(
							'event_title' => $this->input->post('event_title'),
							'eventid'	  => $this->input->post('eventid'),
							'status'	  => $this->input->post('status'),
							'userid'	  => $this->input->post('userid')
						);
						
						$this->db->insert('guests',$data); 
						echo "success";	

				
				}
			
	
		
		
		
		
	}
	
	public function countInterested(){
		
		$this->db->select('*');
		$this->db->from('guests');
		$query = $this->db->get();
		$eventInfo =  $query->result();
		
		return $eventInfo;
		
		
	}
	
		
	

	
	
	
}