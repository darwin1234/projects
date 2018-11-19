<?php 
defined("BASEPATH") or die("No direct script access allowed");


class Ushers extends CI_Controller{
	public function __construct(){
			parent::__construct();
			$this->load->model('Ushersinput','', TRUE);
			$this->load->model('desciples','',TRUE);
			$this->load->model('events','', TRUE);
			$this->load->model('user','', TRUE);
	}
	
	public function index(){
		
		$userData  							= $this->session->userdata('usherslogin');
		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
		$data['userID'] 					= $userData['id'];
		$result2 							= $this->Ushersinput->getRecord();
		$data['visitors'] 					= $result2;
		$data['counter'] 					= 0;
		$this->load->view('headers/HeaderUsher',$data);
		$this->load->view("backtracking",$data);
		$this->load->view('footers/FooterUsher.php',$data);
	}
	
	
	public function vipform(){
			$userData  					= $this->session->userdata('usherslogin');
			$data['userID']				= $userData['id'];		
			$this->load->view('headers/HeaderUsher',$data);
			$this->load->view("backtracking",$data);
			$this->load->view('footers/FooterUsher.php',$data);

	}

	public function backtracking(){
			$userData  					= $this->session->userdata('usherslogin');
			$data['userID']				= $userData['id'];		
			$this->load->view('headers/HeaderUsher',$data);
			$this->load->view("backtracking",$data);
			$this->load->view('footers/FooterUsher.php',$data);

	}

	public function UpcomingEvents(){
			
		$data["events_list"] = $this->events->displayEventArray();	
	    $data["birthdays"]	 = $this->events->birthdays();

		$this->load->view("EventsMultimedia",$data);
	}

	public function pre_encounter(){

		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
		$result2 							= $this->Ushersinput->getRecord();
		$data['visitors'] 					= $result2;
		$data['counter'] 					= 0;
		
		$this->load->view('headers/HeaderUsher');
		$this->load->view("PreEncounterUsher");
		$this->load->view('footers/FooterUsher.php');
	}
	
	public function encounter(){
		$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
		$result2 							= $this->Ushersinput->getRecord();
		$data['visitors'] 					= $result2;
		$data['counter'] 					= 0;
	

		$this->load->view('headers/HeaderUsher');
		$this->load->view("encounterUsher",$data);
		$this->load->view('footers/FooterUsher.php');
	}

	public function post_encounter(){

			$result1 							= $this->desciples->records();
		$data['list_of_records'] 			= $result1;	
		$result2 							= $this->Ushersinput->getRecord();
		$data['visitors'] 					= $result2;
		$data['counter'] 					= 0;
	
		$this->load->view('headers/HeaderUsher');
		$this->load->view("Post_EncounterUsher");
		$this->load->view('footers/FooterUsher');
	}

	public function sol1(){ 


		$this->load->view('headers/HeaderUsher');
		$this->load->view("SOL1Usher");
		$this->load->view('footers/FooterUsher');
	}

	public function sol2(){


		$this->load->view('headers/HeaderUsher');
		$this->load->view("SOL2Usher");
		$this->load->view('footers/FooterUsher');
	}

	public function re_encounter(){
 
			
		$this->load->view('headers/HeaderUsher');
		$this->load->view("Re_EncounterUsher");
		$this->load->view('footers/FooterUsher');
	}

	public function sol3(){

 
		$this->load->view('headers/HeaderUsher');
		$this->load->view("SOL3Usher");
		$this->load->view('footers/FooterUsher');
	}



	public function multimedia(){
		
		$userData  							= $this->session->userdata('multimedialogin');
		$result = $this->Ushersinput->getRecord();
		$data['visitors'] = $result;
		$data['total1'] = 0;
		$data['total2'] = 0;
		$data['total3'] = 0;
		$data['total4'] = 0;
		$data['userID'] = $userData['id'];
		$this->load->view('headers/MultimediaHeader',$data);
		$this->load->view("visitors",$data);
		$this->load->view('footers/MultimediaFooter.php',$data);

	}
	
	public function addrecord(){
		$visited = $this->input->post('visited');

		$data	= array(
		  'first_name'  	=> $this->input->post('first_name'), 
		  'maiden_name'	  	=> $this->input->post('maiden_name'),
		  'last_name'		=> $this->input->post('last_name'),
		  'Gender' 			=> $this->input->post('Gender'),
		  'age_group' 		=> $this->input->post('AgeGroup'),
		  'address' 		=> $this->input->post('Address'),
		  'contact' 		=> $this->input->post('contact'),
		  'email' 			=> $this->input->post('Email'),
		  'civil_status' 	=> $this->input->post('civilstatus'),
		  'wedding_date' 	=> !empty($this->input->post('WeddingDate'))  ? $this->input->post('WeddingDate') : '',
		  'wedding_month'	=> !empty($this->input->post('WeddingMonth')) ? $this->input->post('WeddingMonth') : '',
		  'wedding_year'	=> !empty($this->input->post('WeddingYear'))  ? $this->input->post('WeddingYear') : '',
		  'children'  		=> $this->input->post('children'),
		  'invited_by' 		=> $this->input->post('invitation'),
		  'ranking' 		=> $visited,
		  'mentor_id'		=> $this->input->post('foreign_key'),
		  'children'		=> $this->input->post('Children'),
		  'date_visited'	=> $this->input->post('datevisited'),
	
		  
		);
		
		
		$this->Ushersinput->insertRecord($data);
		
		
		
	}
	
	
	public function logout(){
	
		 $this->session->unset_userdata("usherslogin");
		  redirect(base_url(), 'refresh');
		 
		
	}
	
	public function searchname(){
		
		$this->Ushersinput->searchname();
		
		
	}
	
	public function pre_encounter_start(){
		
		$this->Ushersinput->pre_encounter_start();
		
	}
	
	public function pre_encounter_end(){
		
		$this->Ushersinput->pre_encounter_end();
		
	}
	
	public function gathered(){
		
		echo $this->Ushersinput->gathered();
	}
	
	public function updateRecordData(){
	
		$this->Ushersinput->updateVisitorStatus();
		
		
		
	}
	
	public function searchPrimary(){
		$val 		= $this->Ushersinput->searchPrimary();		
		$Gender		= $this->input->post('Gender');

		echo "<ul id='listofData'>";
		foreach($val as $valfields){
			
			if($valfields->role =="Primary Leader" || $valfields->role =="144" ){
				if($valfields->Gender == $Gender){
					?>
						<li><a href="javascript:void();" onclick="PrimaryLeader('<?php echo $valfields->first_name . ' ' . $valfields->maiden_name . ' ' . $valfields->last_name; ?>','<?php echo $valfields->id_no; ?>');" FullnameAttr="<?php echo $valfields->first_name . ' ' . $valfields->maiden_name . ' ' . $valfields->last_name; ?>" usernameAttr="<?php echo $valfields->id_no; ?>"><?php echo $valfields->first_name . ' ' . $valfields->maiden_name . ' ' . $valfields->last_name; ?></a></li>
					<?php 
				}
			
			}
			
		}
		echo "</ul>";
	}
	
	public function settings(){
		$userData  				= $this->session->userdata('usherLogin');
		$data['userID']			= $userData['id'];
		$this->load->view("ushersettings",$data);
		
		
		
	}
	
	
	public function changeUsherPassword(){
		
		$userID  = $this->input->post('mentorID');
		$pass	 = $this->input->post('old_password');
		$npass 	 = $this->input->post('new_password');
		$rpass   = $this->input->post('retype_password');

		echo $this->Ushersinput->changeUsherPassword($userID,$pass,$npass,$rpass);
	}
	
	public function change_password_ushers(){
		$userID				= $this->input->post('userID');
		$OldPassword 		= $this->input->post('OldPassword');
		$OldPassword 		= $this->input->post('OldPassword');
		$newPassword		= $this->input->post('newPassword');
		$confirmPassword	= $this->input->post('confirmPassword');
		echo $this->user->change_password_ushers($userID,$OldPassword,$newPassword,$confirmPassword);
	}
	
	public function levelplus1(){
		$DataID		 = $this->input->post("DataID");
		$level  	 = $this->input->post("level");
		$enrolled 	 = $this->input->post("enrolledLevel") + 1; 
		
		$data = array(
			'ranking'				=> $level + 1,
			'enrolled'				=> $enrolled ,
			
		);
		
		$this->db->where('id_no', $DataID); 
	    $this->db->update('records',$data);
		
		
	}
	
	public function processDone() {
		$id = $this->input->post("id_no");
		
		$ranking = $this->db->query("SELECT ranking FROM records WHERE id_no = $id")->result()[0]->ranking;
		$ranking++;
		
		$enroll = 0; //promote
		switch($ranking) {
			case 5: $enroll = 2; break;
			case 6: $enroll = 4; break;
			case 7: $enroll = 6; break;
			case 8: $enroll = 8; break;
			case 9: $enroll = 10; break;
			case 10: $enroll = 12; break;
			case 11: $enroll = 14; break;
		}
		
		$enroll += (empty($this->input->post("enroll")) ? 0 : 1);
		$this->db->query("UPDATE records SET ranking = $ranking, enrolled = $enroll WHERE id_no = $id");
	}
	
}

