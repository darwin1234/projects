<?php 

class Actions_m extends CI_Model{


	public function addRecord(){
		$Enter_NRIC_or_FIN = $this->input->post('Enter_NRIC_or_FIN');


		$data = array(
			'Status' 			=>'Upcomming',
			'Enter_NRIC_or_FIN' => $Enter_NRIC_or_FIN,

		);
		$this->db->insert('queue_table',$data);

		return $this->db->insert_id();
	}


	public function queueboardload(){
		$this->db->select('*');
		$this->db->from('queue_table');
		$query = $this->db->get();
		return $query->result();	

	}

	 function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('queue_table');
		$this->db->where('status','upcomming');
        $this->db->order_by('ID','ASC');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

		
	public function skip($ID){
		
		
						$records = array(
							'status'		=>	'SKIPPED'
							
						);
						$this->db->where('ID', $ID);
						$this->db->update('queue_table',$records);
		
	}

}