<?php 


Class Podcastmodel extends CI_Model
{
	
	public function podcastDatabase(){
		
		 $this->db->select('*');
		 $this->db->from('ccc_pod_cast');
		 $query = $this->db->get();
		 return $query->result();	
		
		
	}
	
	
	public function uploadAudio(){
		$tmp_file 					= @$_FILES['url']['tmp_name'];
		$filename 					= @$_FILES['url']['name'];
		
		$config['upload_path'] 		= './podcast';
		$config['allowed_types']	= 'mp3|wav|wab';
		$this->load->library('upload', $config);
	
		
		
					if($this->upload->do_upload('url')){
					
						$user_name				= $this->input->post('username_name');
							$ccc_pod_cast = array(
								'name'				=> $this->input->post('name'),
								'artist'			=> $this->input->post('artist'),
								'album'				=> $this->input->post('album'),
								'url'				=> $this->input->post('url'),
								'live'				=> $this->input->post('live'),
								'cover_art_url'		=> $this->input->post('cover_art_url')
						);
						
						$this->db->insert('ccc_pod_cast',$ccc_pod_cast);
						
					}
		
				
		
				
					
						
					
		
	}
	
}