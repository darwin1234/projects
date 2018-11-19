<?php

class Ushersinput extends CI_Model{
	

	public function insertRecord($data){
	
		$this->db->insert('records',$data); 
	
		
		
	}
	
	public function getRecord(){
		
		$this->db->select('*');
		$this->db->from('records');	
		$query = $this->db->get();
		return $query->result();
		
	}
	
		
	public function updateVisitorStatus(){
	
		$visitorID 		=  $this->input->post("visitorID");
		$visited   		=  $this->input->post("visited");
		$datevisited	=  $this->input->post("datevisited");
		
		$data = array(
			'ranking'		=> $visited,	
			'date_visited'  => $datevisited
		
			
		);
		
		$this->db->where('id_no', $visitorID);
		$this->db->update('records',$data);
		
	
		
	}
	
	public function searchname(){
		
		$searchName = $this->input->post('searchName');
		$visited	= $this->input->post('visited');
		$dataArray = array();
		
		$this->db->select('*');
		$this->db->from('records');
		$this->db->like("first_name",$searchName);
		$query = $this->db->get();
		$results = $query->result();
		if(count($results) == 0){
			echo "No Result Found";
			
		}else{
			if(!empty($searchName)){
				echo "<ul id='listofData'>";
			
			
				
				foreach($results as $fieldsData){
				
						 if($fieldsData->ranking == 1){
							
							if($visited == 2){
							?>
								<li><a href="javascript:void()" id="searchNamedata" RecordsIDAttr="<?php echo $fieldsData->id_no; ?>" FullnameAttr="<?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?>" onclick="searchNamedata('<?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?>','<?php echo $fieldsData->id_no; ?>');"><?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?> was <?php if($fieldsData->ranking == 1) { echo "first timer";} if($fieldsData->ranking == 2) {echo "second timer";} if($fieldsData->ranking == 3) {echo "third timer";} if($fieldsData->ranking == 4) {echo "fourth timer";}?> </a></li>
								
						
							<?php 
							}
						
							 
						 }else if($fieldsData->ranking == 2){
							
							if($visited == 3){
							?>
								<li><a href="javascript:void();"  RecordsIDAttr="<?php echo $fieldsData->id_no; ?>" FullnameAttr="<?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?>" onclick="searchNamedata('<?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?>','<?php echo $fieldsData->id_no; ?>');"><?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?> was <?php if($fieldsData->ranking == 1) { echo "first timer";} if($fieldsData->ranking == 2) {echo "second timer";} if($fieldsData->ranking == 3) {echo "third timer";} if($fieldsData->ranking == 4) {echo "fourth timer";}?> </a></li>
								
							<?php 
							}
						
							 
						 }else if($fieldsData->ranking == 3){
							
							if($visited == 4){
							?>
								<li><a href="javascript:void();"  RecordsIDAttr="<?php echo $fieldsData->id_no; ?>" FullnameAttr="<?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?>" onclick="searchNamedata('<?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?>','<?php echo $fieldsData->id_no; ?>');"><?php echo $fieldsData->first_name . ' ' . $fieldsData->maiden_name . ' ' . $fieldsData->last_name ; ?> was <?php if($fieldsData->ranking == 1) { echo "first timer";} if($fieldsData->ranking == 2) {echo "second timer";} if($fieldsData->ranking == 3) {echo "third timer";} if($fieldsData->ranking == 4) {echo "fourth timer";}?> </a></li>
								
							<?php 
							}
						
							 
						 }else{
							/* ?>
								<li><span>No Search Found!</span></li>
							 
							 <?php */
							 
						 } 
						 
						
						
					
					
					
					
				
				}
				echo "</ul>";
				
				
			}else {
				
				echo  "";
			}
			
			
		}
	
		
	}
	
	public function pre_encounter_start(){
		$level_up	= $this->input->post("level_up");
		$delegatesID			= $this->input->post("delegatesID");
		
		$data = array(
			'ranking'				=> $level_up + 1			
		);
		
		$this->db->where('id_no', $delegatesID);
	    $this->db->update('records',$data);
		
	}
	public function pre_encounter_end(){
		/*
		$pre_encounter_end	= $this->input->post("Pre_Encounter_End");
		$delegatesID			= $this->input->post("delegatesID");
		$data = array(
			'pre_encounter_end'		=> $pre_encounter_end,	
			
		);
		
		$this->db->where('ID', $delegatesID);
	    $this->db->update('ccc_records_list',$data);
		*/
	}
	
	public function networkLeader($id){
		
		$Arr =[];
		$query = $this->db->query("SELECT * FROM records WHERE id_no='".$id."'");
		$row = $query->row();
	
		if($row->role == "Pastor"){
			$Arr['result'] = 1;
			$Arr['id_no'] = $row->id_no;
			$query->free_result(); 
		}else{
			 $Arr['result'] = $row->mentor_id;
			 $Arr['id_no'] = $row->id_no;
		}
		
		return $Arr;
			
	}
	
    public function gathered(){
		$this->load->model('users','',True);
		
		$level_in_post				= @$this->input->post('level_in_post')  | @$this->input->get('level_in_post');
		$lesson_level				= @$this->input->post('lesson_level') 	| @$this->input->get('lesson_level');
		$searchdelegate				= @$this->input->post('searchdelegate');
	
		
		  // $query  = $this->db->query("SELECT * FROM records WHERE enrolled ='".$lesson_level."' AND ranking = '".$level_in_post."'");
		   
		   $enroll = 0;
		   switch($level_in_post){
			   case 4: $enroll = 1; break;
			   case 5: $enroll = 3; break;
			   case 6: $enroll = 5; break;
			   case 7: $enroll = 7; break;
			   case 8: $enroll = 9; break;
			   case 9: $enroll = 11; break;
			   case 10: $enroll = 13;
		   }
		   
		 //$query = $this->db->query("SELECT * FROM records WHERE CONCAT(`first_name`, ' ', `last_name`) LIKE '%{$searchdelegate}%' AND  enrolled = $lesson_level AND ranking = '$level_in_post' AND Gender " . ( !empty(@$this->input->get('gender')) ? " = '" . @$this->input->get('gender') . "'" : (!empty(@$this->input->post('gender')) ? " = '" . @$this->input->post('gender') . "'" : " != ''" )));
		$query = $this->db->query("SELECT * FROM records WHERE CONCAT(`first_name`, ' ', `last_name`) LIKE '%{$searchdelegate}%' AND  enrolled = $enroll AND ranking = '$level_in_post' AND Gender " . ( !empty(@$this->input->get('gender')) ? " = '" . @$this->input->get('gender') . "'" : (!empty(@$this->input->post('gender')) ? " = '" . @$this->input->post('gender') . "'" : " != ''" )));
		  
		
		$displayData = $query->result();
		
					echo '<table class="table">';
					echo '<thead>';
					echo '<tr>';
					echo '<th>Delegate</th>';
					echo '<th>Network Leader</th>';
					echo '<th>Cell Leader</th>';
					echo '<th>Contact</th>';
					echo '<th>Came</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					$x = 0;
					$arrayAlph = [];
					foreach($displayData as $displayDatafields){
									
									$x++;
										  		 
											
												
													$alphabetical = strip_tags($this->users->getprimaryleader($displayDatafields->id_no));
										
														?>
															<tr>
																<td>
																
																<img src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo @$displayDatafields->id_no; ?>" style="margin:0; padding:0; margin-right:10px; background:#fff; border: 1px solid #ccc; width:30px; border-radius:30px; height:30px;"><?php echo $displayDatafields->first_name . ' '. $displayDatafields->maiden_name . ' '. $displayDatafields->last_name;?>
																
																<?php
																if(false) {
																	?>
																	<?php if(!empty($displayDatafields->image_pic)) {?>
																		<img src="<?php echo base_url(); ?>Welcome/userimage/<?php echo @$displayDatafields->id_no; ?>" style="margin:0; padding:0; margin-right:10px; background:#fff; border: 1px solid #ccc; width:30px; border-radius:30px; height:30px;"><?php echo $displayDatafields->first_name . ' '. $displayDatafields->maiden_name . ' '. $displayDatafields->last_name;?>
																	<?php }else {?>
																		<img src="<?php echo strlen(@$displayDatafields->profile_pic)!= 0 ? base_url() .'images/' . $displayDatafields->profile_pic :  base_url() .'images/' . 'icon-user-default.png';?>" style="margin:0; padding:0; margin-right:10px; background:#fff; border: 1px solid #ccc; width:30px; border-radius:30px; height:30px;"><?php echo $displayDatafields->first_name . ' '. $displayDatafields->maiden_name . ' '. $displayDatafields->last_name;?>
																	<?php }?>
																	<?php
																}
																?>
																
																</td>
																<td><?php echo $this->users->getprimaryleader($displayDatafields->id_no); ?></td>
																<td><?php echo $this->leaders($this->getRecord(), $displayDatafields->mentor_id);?></td>
																<td><?php echo $displayDatafields->contact; ?></td>
																<td><input type="button" class='btn btn-default' value="Done" name="Start" style="color:#000; font-size:12px; width:auto; margin:auto; display:block; "  id="Start_<?php echo $displayDatafields->id_no; ?>" onclick="TickButton('<?php echo $displayDatafields->id_no; ?>','<?php echo $displayDatafields->ranking; ?>','<?php echo $displayDatafields->enrolled;?>')" value="Done Pre-Encounter Start"></td>
															</tr>
														<?php 
													
													
												
											
										
										
 
						
							
					}	
					echo '</tbody>';
					echo'</table>';
			
			
		
	
	}
	


	public function leaders($leaders,$leadersID){
									
									foreach($leaders as $leadersfields){
										if($leadersfields->id_no == $leadersID){
											
											
											//@$leaderData = "<img src='".base_url()."Welcome/userimage/".$leadersID."' style='margin:0; padding:0; margin-right:10px; background:#fff; border: 1px solid #ccc; width:30px; border-radius:30px; height:30px;'>" .  $leadersfields->first_name . ' '. $leadersfields->maiden_name . ' '. $leadersfields->last_name;
											@$leaderData = "<img src='".base_url()."Welcome/userimage2/".$leadersID."' style='margin:0; padding:0; margin-right:10px; background:#fff; border: 1px solid #ccc; width:30px; border-radius:30px; height:30px;'>" .  $leadersfields->first_name . ' '. $leadersfields->maiden_name . ' '. $leadersfields->last_name;
										
											
										}
										
									}
									
									return @$leaderData;
									
	}

	public function searchPrimary(){

		$searchPrimary	= $this->input->post('searchPrimary');
		$this->db->select('*');
		$this->db->from('records');
		$this->db->like("first_name",$searchPrimary);
		$query = $this->db->get();
		return $query->result();
	
	}
	
	public function changeUsherPassword($userID,$pass,$npass,$rpass){
		
		/*
		
			if($npass!=$rpass){
				return "Password not Match";
			}else{
				$this->db->select('*');
				$this->db->from('ccc_usher_account');
				$this->db->where(('password="'. md5($pass) . '" AND ID="'.$userID.'"'));
			
				$query = $this->db->get();
				if($query->num_rows()==1){
					$data = 
					$this->db->where('ID', $userID);
					$this->db->update('ccc_usher_account', 
						array(
								   'password' => md5($npass)
							)
					); 
					return "SUCCESS";
				}else{
					return "FAILED";
				}
			}
			*/
		
	}
	
	
}