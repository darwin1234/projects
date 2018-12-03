<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	
	public function __construct(){
		
		   parent::__construct();
		   $this->load->model('media','',TRUE);
		   $this->load->model('BusinessList','',TRUE);
		   $this->load->model('chart', '', TRUE);
		   $this->load->model('Ushersinput','', TRUE);
		   $this->load->model('user','', TRUE);
		   $this->load->helper('date');
		   $this->load->model('users','',True);
		  
	}	
	 
	

	public function index()
	{
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
			$userData  							= $this->session->userdata('logged_in');
		
			$disciplesResult 					= $this->BusinessList->records();	
			
			
			
			$username							= $userData['username'];
			$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

			$data['user_name']					= $username;
			$data['list_of_records'] 			= $disciplesResult;
		
			$data['active_account']				= $activeAcount;
			$data['userID'] 					= $userData['id'];

			$data['userRole'] 					= @$userData['Role'];
			$data['total'] 						= 0;
			$data['LeaderName'] 	  			= $userData['MentorID'];
			//$data['addBtn']						= '<button type="button" class="pull-right btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Disciple</button>';
			$data['settings']					= 'display';
			
			$data['username'] 					= $userData['username'];		
			$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
			
			$data['usergender']					= $userData['gender'];
			$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
			//chart 
			
			$chartRecordData= $this->BusinessList->chart();
			
			$data['jsonChartData'] 		= $chartRecordData;
			$data['counthisopencell'] 	= $chartRecordData;
		
		
			$data['progress'] = $this->users->getcounts();
			$data['memberscount'] = $this->users->getmembercounts();
			

			$data["realUserID"] = $userData['id'];
			
			$data['countDisciples'] = 1;
			if($userData == NULL){
				
				redirect(base_url());
				
			}else{
				$this->load->view('headers/adminhead',$data);
				$this->load->view('sidebar');
				$this->load->view('admin',$data);
				$this->load->view('footers/adminfooter',$data);
				
			}
		}else{
			redirect('login');
			
		}	
	
	}
	
	
	public function listofevents(){
		$displayEvent 						= $this->events->displayEventArray();
		$data['displayEvent']				= $displayEvent;
		$userData  							= $this->session->userdata('logged_in');
		$data['reactions'] = $this->events->countInterested();
	    $data['userID'] 					= $userData['id'];
		$this->load->view('autoload/events', $data);
		
		
	}
	
	public function edit($id){
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
				$userData  							= $this->session->userdata('logged_in');
				$singleItem 					= $this->BusinessList->records($id);	// disciples records
				$username							= $userData['username'];
				$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

				$data['user_name']					= $username;
				$data['list_of_records'] 			= $singleItem;
			
				$data['active_account']				= $activeAcount;
				$data['userID'] 					= $userData['id'];

				$data['userRole'] 					= @$userData['Role'];
				$data['total'] 						= 0;
				$data['LeaderName'] 	  			= $userData['MentorID'];
				//$data['addBtn']						= '<button type="button" class="pull-right btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Disciple</button>';
				$data['settings']					= 'display';
			
				$data['username'] 					= $userData['username'];		
				$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
			
				
				$data['usergender']					= $userData['gender'];
				$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
				//chart 
				
				$chartRecordData= $this->BusinessList->chart();
				
				$data['jsonChartData'] 		= $chartRecordData;
				$data['counthisopencell'] 	= $chartRecordData;
			
		
				
				$data['progress'] = $this->users->getcounts();
				$data['memberscount'] = $this->users->getmembercounts();
				
			
				$data["realUserID"] = $userData['id'];
				
				$data['countDisciples'] = 1;
				if($userData == NULL){
					
					redirect(base_url());
					
				}else{
					$this->load->view('headers/adminhead',$data);
					$this->load->view('sidebar');
					$this->load->view('edit',$data);
					$this->load->view('footers/adminfooter',$data);
					
				}
	
		}else{
			redirect('login');
		}	
		
		
		
		
	}
	
	public function addbusiness(){
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
		
				$userData  							= $this->session->userdata('logged_in');
			
				$disciplesResult 					= $this->BusinessList->records();	// disciples records
				
				
				$username							= $userData['username'];
				$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

				$data['user_name']					= $username;
				$data['list_of_records'] 			= $disciplesResult;
			
				$data['active_account']				= $activeAcount;
				$data['userID'] 					= $userData['id'];

				$data['userRole'] 					= @$userData['Role'];
				$data['total'] 						= 0;
				$data['LeaderName'] 	  			= $userData['MentorID'];
				$data['settings']					= 'display';
			
				$data['username'] 					= $userData['username'];		
				$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
				
				
				$data['usergender']					= $userData['gender'];
				$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
				//chart 
				
				$chartRecordData= $this->BusinessList->chart();
				
				$data['jsonChartData'] 		= $chartRecordData;
				$data['counthisopencell'] 	= $chartRecordData;
			
				//$data['getrole']			= $this->users->getrole($userData['id'],);
				
				
				
				//for my custom scripts and styles
				//$data['baseURL'] = $this->baseURL;
				
				$data['progress'] = $this->users->getcounts();
				$data['memberscount'] = $this->users->getmembercounts();
				

				$data["realUserID"] = $userData['id'];
				
				$data['countDisciples'] = 1;
				if($userData == NULL){
					
					redirect(base_url());
					
				}else{
					$this->load->view('headers/adminhead',$data);
					$this->load->view('sidebar');
					$this->load->view('addBusiness',$data);
					$this->load->view('footers/adminfooter',$data);
					
				}
		}else{
			redirect('login');
		}
	}
	

	
	
	public function personalInformation(){
			
			if(!empty($_POST)){
				$data = array(
					'FullName' 					=> $this->input->post('FullName'),
					'EmailAddress'			 	=> $this->input->post('EmailAddress'),
					'CellNumber' 				=> $this->input->post('CellNumber'),
					'CivilStatus'				=> $this->input->post('CivilStatus'),
					'Work'						=> $this->input->post('Work'),
					'Education' 				=> $this->input->post('Education'),
					'ProfesionalSkills' 		=> $this->input->post('ProfesionalSkills'),
					'Address' 					=> $this->input->post('Address')
					
				);
			
				$this->desciples->updatepersonal($data);
			}else{
				
					redirect(base_url());
				
			}	  
			
		
	}
	
	
	public function newEvent(){
			$userData  							= $this->session->userdata('logged_in');
			$data['userID']						= $userData['id'];
			$this->load->view('event',$data);
			
		
	}

	public function vipform(){
			$userData  							= $this->session->userdata('logged_in');
			$data['userID']						= $userData['id'];
			$this->load->view('vipform',$data);

			$this->load->view('headers/vipformheader',$data);
			$this->load->view('footers/FooterUsher',$data);
				
		
	}
	 
	public function getEventDisplay(){
			$userData  			= $this->session->userdata('logged_in');
			$userID				= $userData['id'];
			$this->events->displayEvent($userID);
	 
	
	} 
	
	public function addEvent(){
		
		$events = array(
				'title'			=>  $this->input->post('title'),
				'start'	 		=>  $this->input->post('start'),
				'end'	 		=>  $this->input->post('end'),
				'time_start'	=>  $this->input->post('time_start'),
				'time_end'		=>  $this->input->post('time_end'),
				'event_for'		=>	$this->input->post('event_for'),
				'account_id'	=>  $this->input->post('account_id')
			);
		$this->events->insertEvent($events);
		
	}
	
	public function dragEvent(){

		
		$this->events->dragEvent();
		
		 

	}
	
	public function resizeEvent(){
		
		
		$this->events->dragEventAndresizeEvent();
		
	}
	
	
	public function deleteEvent(){
		
		$this->events->deleteEvent();
	
	}
	public function updateEvent(){
	
	
	
		$this->events->updateEvent();
		
	}
	
	
	public function updatemyaccount(){
	
		$userData  	= $this->session->userdata('logged_in');
		$this->desciples->updatepersonal($userData['id']);

	} 
	
	public function logout(){
	
		 $this->session->unset_userdata('logged_in');
		  redirect(base_url(), 'refresh');
		 
		
	}
	

	
	public function opencell($userID = null){		
			$userData  					= $this->session->userdata('logged_in');

			if(!empty($userID)){
				$data['userID']				= $userID;			
			}else{
				$data['userID'] 			= $userData['id'];
			}
			$data['userRole'] 			= @$userData['Role'];	
			$data['Gender'] 			= $userData['gender'];			
			$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
			
			
					
			$this->load->view('headers/g12Networkheader',$data);
			$this->load->view('opencell',$data);
			$this->load->view('footers/g12Networkfooter',$data);
			
	}
	
	
	public function pre_encounter(){
		$userData  					= $this->session->userdata('logged_in');
		$data['username'] 			= $userData['username'];
		$data['userID'] 			= $userData['id'];
	    $data['userRole'] 			= @$userData['Role'];		
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('pre_encounter',$data);
		$this->load->view('footers/g12Networkfooter',$data);
		
		
		
		
	}
	
	public function encounter(){
		$userData  					= $this->session->userdata('logged_in');
		$data['username'] 			= $userData['username'];		
		$data['userID'] 			= $userData['id'];
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		$data['userRole'] 			= @$userData['Role'];	
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('encounter',$data);
		$this->load->view('footers/g12Networkfooter',$data);
		
		
	}

	public function post_encounter(){
		$userData  					= $this->session->userdata('logged_in');
		$data['userID'] 			= $userData['id'];		
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		$data['userRole'] 			= @$userData['Role'];	
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('post_encounter',$data);
		$this->load->view('footers/g12Networkfooter',$data);
		
		
	}

	public function sol1(){
		$userData  					= $this->session->userdata('logged_in');
		$data['userID'] 			= $userData['id'];		
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		$data['userRole'] 			= @$userData['Role'];	
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('SOL1',$data);
		$this->load->view('footers/g12Networkfooter',$data);
	}

	public function sol2(){
		$userData  					= $this->session->userdata('logged_in');
		$data['userID'] 			= $userData['id'];		
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		$data['userRole'] 			= @$userData['Role'];	
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('SOL2',$data);
		$this->load->view('footers/g12Networkfooter',$data);
		
		
	}
	
	public function re_encounter(){
		$userData  					= $this->session->userdata('logged_in');
		$data['userID'] 			= $userData['id'];		
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		$data['userRole'] 			= @$userData['Role'];	
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('re_encounter',$data);
		$this->load->view('footers/g12Networkfooter',$data);
		
		
	}
	
	public function sol3(){
		$userData  					= $this->session->userdata('logged_in');
		$data['userID'] 			= $userData['id'];		
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		$data['userRole'] 			= @$userData['Role'];	
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('sol3',$data);
		$this->load->view('footers/g12Networkfooter',$data);
	}

	public function graduates(){
		$userData  					= $this->session->userdata('logged_in');
		$data['userID'] 			= $userData['id'];		
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('Graduates',$data);
		$this->load->view('footers/g12Networkfooter',$data);
		
	}
	
	public function Consolidate(){

		$Prayed				= $this->input->post('Prayed');
		$Shared_a_verse		= $this->input->post('Shared_a_verse');
		$Contacted			= $this->input->post('Contacted');
		$Visited			= $this->input->post('Visited');
		$visitorID			= $this->input->post('visitorID');
		
		$openCellCompletion = array(
			'Prayed'				=>  $Prayed,
			'Shared_a_verse'		=>  $Shared_a_verse,
			'Contacted'				=>  $Contacted,
			'Visited'			  	=>  $Visited
			
		
		);
		
		
		
		$this->desciples->Consolidate($openCellCompletion,$visitorID);
		echo "Success!";
		//echo json_encode($openCellCompletion);
			
		
	}

	//FrontPage
	public function Podcast(){



		$this->load->view("podcast");
	}

	public function Gallery(){



		$this->load->view("gallery");
	}

	//Multimedia
	
	public function changePassword(){
		
		$userID		 	= $this->input->post('menthorID');
		$pass		 	= $this->input->post('old_password');
		$npass		 	= $this->input->post('newpassword');
		$rpass			= $this->input->post('re_password');
		echo $this->user->changePassword($userID,$pass,$npass,$rpass);
		
		
	}
	
	public function changeusername(){
		
		$userID		 			= $this->input->post('menthorID');
		$old_username		 	= $this->input->post('old_username');
		$newusername		 	= $this->input->post('newusername');
		$re_newusername			= $this->input->post('re_newusername');
		echo $this->user->changeusername($userID,$old_username,$newusername,$re_newusername);
	
		
		
	}
	
	
	public function form_referto(){
			$accountID = $this->input->post('accountID');
			$referto   = $this->input->post('referto');
			$this->db->where('id_no',$accountID);
			$this->db->update('records',
				array(
					'mentor_id' => $referto
					
				)
			);
			echo "success!";
		 
	}
	
	public function chart(){
		
		$chartRecordData= $this->desciples->chart();
		$chartJs = array();
		foreach($chartRecordData as $chartrecorddata){
			$chartJs['y'] = 40;
			$chartJs['label'] = $chartrecorddata->first_name;
			$testData =  json_encode($chartJs);
			
		}
	
		
	}
	
	public function searchForm(){
		
		$this->desciples->searchForm();
		
		
		
	}
	
	public function search(){
		$this->load->view('headers/g12Networkheader');
		$this->load->view('search');
		$this->load->view('footers/g12Networkfooter');
	}
	
	public function changePasswordMultimedia(){
		
		$OldPassword 			= 	$this->input->post('OldPassword');
		$newPassword			=	$this->input->post('newPassword');
		$confirmPassword 		=	$this->input->post('confirmPassword');
		$userID					=	$this->input->post('userID');
		
		echo $this->user->changePasswordMultimedia($userID,$OldPassword,$newPassword,$confirmPassword);

		//echo $OldPassword . ' ' . $newPassword . ' ' .$confirmPassword;
	}
	
	public function enroll(){
		
		
		$this->desciples->enroll();
		
	}
	public function unenroll(){
	
		
		$this->desciples->unenroll();
		
	}
	
	public function chat(){
		
		
		
	}
	
	public function eventVisitorsReactions(){
		
		$this->events->eventVisitorsReactions();
		
	}
	
	public function countInterested(){
		
	    
		
		
	}
	
	public function checkifusernameismatch(){
		$discipleUsername	= $this->input->post('discipleUsername');
		echo $this->user->checkifusernameexist($discipleUsername);
		 
	}
	 

    public function active_action(){
		$userID 			= $this->input->post('userID');
		$activestatuschance	= $this->input->post('activestatuschance');
		
		if($this->users->getMyPrimaryCount($userID) == 0) {
			$this->desciples->active_action($userID,$activestatuschance);
		} else {
			echo "Deactivate Account Failed. Please transfer all his/her disciples first.";
		}
	}	
	
	
	public function Deactivated_Accounts(){
		
		$userData  							= $this->session->userdata('logged_in');
	
		$disciplesResult 					= $this->desciples->records();	// disciples records
		
		
		
		$username							= $userData['username'];
		$activeAcount						= $this->desciples->useraccount($userData['id']); // user profile table

		$data['user_name']					= $username;
		$data['list_of_records'] 			= $disciplesResult;
	
		$data['active_account']				= $activeAcount;
		$data['userID'] 					= $userData['id'];
		$data['userRole'] 					= @$userData['Role'];
		$data['total'] 						= 0;
		$data['LeaderName'] 	  			= $userData['MentorID'];
		$data['settings']					= 'display';
		$displayEvent 						= $this->events->displayEventArray();
		$data['username'] 					= $userData['username'];		
		$data['getRecordsDisplay']			= $this->desciples->getRecordsDisplay(NULL);
		$displayEvent 						= $this->events->displayEventArray();
		$data['displayEvent']				= $displayEvent;
		
		$data['usergender']					= $userData['gender'];
		
		//chart 
		
		$chartRecordData= $this->desciples->chart();
		
		$data['jsonChartData'] = $chartRecordData;
		$data['counthisopencell'] = $chartRecordData;
		
		
		
		 
		  
	 
		
		$data['countDisciples'] = 1;
		//$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('deactivatelist',$data);
		//$this->load->view('footers/g12Networkfooter',$data);

	}
	 	 
		 
	public function checkifoldusernameexist(){
		
		$oldusername = strip_tags($_POST['oldusername']);
		
	}	


	public function transfer_to(){
		
		$this->desciples->transfer_to();
			
	}
	
	public function display_record_for_attendance(){
		$userData  								= $this->session->userdata('logged_in');
		$userID 								= $userData['id'];
		$data['attendance_for_attendance'] 		= $this->desciples->display_record_for_attendance($userID);
		$this->load->view('autoload/attendance',$data);
		
		
	}
	
	public function attend(){
		
		echo $this->desciples->attend();
		
		
	}
	
	public function unattend(){
		
		echo $this->desciples->unattend();
		
		
	}

	public function tickattendance(){
		$userData  							= $this->session->userdata('logged_in');
		$data['userID'] 					= $userData['id'];
		$data['list_of_attendance']			= $this->desciples->tickattendance();
		$this->load->view('autoload/tickattendance',$data);
		//$this->load->view('autoload/attendance',$data);
		
	}
	
	public function transferto(){
		/*$iduser 	= $this->input->post('data0');
		$his_id		= $this->input->post('data1');
		$userRole	= $this->input->post('data2');*/
	
		echo $this->desciples->transferto($iduser,$his_id,$userRole);
		
	}
	
	public function insights($id = null){
		
		$userData  							= $this->session->userdata('logged_in');
	
		$disciplesResult 					= $this->desciples->records();	// disciples records
		
		
		
		$username							= $userData['username'];
		$activeAcount						= $this->desciples->useraccount($userData['id']); // user profile table

		$data['user_name']					= $username;
		$data['list_of_records'] 			= $disciplesResult;
	
		$data['active_account']				= $activeAcount;
		$data['userID'] 					= (!empty($id) ? $id : $userData['id']);
		$data['userRole'] 					= @$userData['Role'];
		$data['total'] 						= 0;
		$data['LeaderName'] 	  			= $userData['MentorID'];
		
		$displayEvent 						= $this->events->displayEventArray();
		$data['username'] 					= $userData['username'];		
		$data['getRecordsDisplay']			= $this->desciples->getRecordsDisplay(NULL);
		$displayEvent 						= $this->events->displayEventArray();
		$data['displayEvent']				= $displayEvent;
		
		$data['usergender']					= $userData['gender'];
		
		//chart 
		
		$chartRecordData= $this->desciples->chart();
		
		$data['jsonChartData'] = $chartRecordData;
		$data['counthisopencell'] = $chartRecordData;
		
		
		$info = $this->users->info($data['userID']);
		$data['activename'] = $info->first_name . " " . $info->last_name;
		
		
		//for insights from multimedia
		$result = $this->Ushersinput->getRecord();
		$data['visitors'] = $result;
		$data['total1'] = 0;
		$data['total2'] = 0;
		$data['total3'] = 0;
		$data['total4'] = 0;

		$data['countDisciples'] = 1;
		if($userData == NULL){
			
			redirect(base_url());
			
		}else{
			$this->load->view('headers/g12Networkheader',$data);
			$this->load->view('insights',$data);
			$this->load->view('footers/g12Networkfooter',$data);
			
		}
	}
	
	public function changeprofilepic($id = null){
		$imageContent 	= file_get_contents($_FILES["myimageFile"]["tmp_name"]);
	
		$userData  		= $this->session->userdata('logged_in');
		$data['userID'] = (!empty($id) ? $id : $userData['id']);
		echo $this->desciples->changeprofilepic($data['userID'],$imageContent);
	}
	
	public function changeprofilepicuser(){
		$imageContent 	= file_get_contents($_FILES["myimageFile"]["tmp_name"]);
	
		$userData  		= $this->session->userdata('logged_in');
		$data['userID'] = $userData['id'];
		echo $this->desciples->changeprofilepic($data['userID'],$imageContent);
		
		
	}
	
	public function userimage($userID){
		$userData  		= $this->session->userdata('logged_in');
		
		if(!empty($userID)){
			
			$userID = $userID;
			
		}else{
			$userID = $userData['id'];
			
		}
		$image = $this->desciples->image_x($userID);
		
		
		foreach($image as $imagefields ){
			if(!empty($imagefields->image_pic)){
				
				$img = $imagefields->image_pic;	
			}else{
				$img = 0;
				
			}
			
		}
		if(!$img == 0){
			header("content-type: image/jpg");
			$imageFile =  $img;
		}else{
			$imageFile = "http://massconline.com/memberpages/images/portrait_placeholder.jpg";
		}
		
		
		echo  $imageFile;
		
		
		
		
	}


	public function level($level,$userID){
		$userData  					= $this->session->userdata('logged_in');
		$data['username'] 			= $userData['username'];
		if(!empty($userID)){
		$data['userID']				= $userID;			
		}else{
		$data['userID'] 			= $userData['id'];
	    }
		$data['userRole'] 			= @$userData['Role'];		
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		
		$data['level'] = $level;
		$data['Gender'] 			= $this->users->info( $data['userID'] )->Gender;
				
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view('level',$data);
		$this->load->view('footers/g12Networkfooter',$data);
		
	}
	
	public function livecounts($userID = null){
		$userData  					= $this->session->userdata('logged_in');
		
		if(!empty($userID)){
				
		$data['userID']	= $userID;
			
		}else{
		$data['userID'] 			= $userData['id'];
		}
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(Null);
		
		$this->load->view('livecounts',$data);
		
	}
		
	public function EditAccountInformation(){
		$first_name			= $this->input->post('first_name');
		$maiden_name		= $this->input->post('maiden_name');
		$last_name			= $this->input->post('last_name');
		$EmailAddress		= $this->input->post('EmailAddress');
		$CellNumber			= $this->input->post('CellNumber');
		$ProfesionalSkills	= $this->input->post('ProfesionalSkills');
		$Address			= $this->input->post('Address');
		$delegatesID		= $this->input->post('delegatesID');
		
		$this->desciples->EditAccountInformation($delegatesID,$first_name,$maiden_name,$last_name,$EmailAddress,$CellNumber,$ProfesionalSkills,$Address);
		
}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//********************************************************************************************************
	//********************************************************************************************************
	//********************************************************************************************************
	//********************************************************************************************************
	//********************************************************************************************************
	//********************************************************************************************************
	//********************************************************************************************************
	//********************************************************************************************************
	// variables and initialization
	
	private $initDone = false;
	private $baseURL = "";
	
	private function init() { 
		if( !$this->initDone ) {			
			$path = "htdocs"; // wamp www / xamp htdocs
			$this->baseURL = "http://" . $_SERVER['SERVER_NAME'] . str_replace("\\", "/", substr(FCPATH, stripos(FCPATH, $path) + strlen($path))) . "";
			$this->baseRequestURI = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);
			
			$this->load->model("users");
		}
		$this->initDone = true;
	}
	
	//********************************************************************************************************
	// dummy file and directories
	
	public function scripts($file) { echo file_get_contents(FCPATH . "application/views/scripts/$file"); }
	
	public function styles($file) { echo file_get_contents(FCPATH . "application/views/styles/$file"); }
	
	public function images($file) { 
		$file_extension = strtolower(substr(strrchr($file, "."),1));

		switch( $file_extension ) {
			case "gif": header("Content-type: image/gif"); break;
			case "png": header("Content-type: image/png"); break;
			case "jpeg":
			case "jpg": header("Content-type: image/jpeg"); break;
		}
	
		echo file_get_contents(FCPATH . "application/views/images/$file");
	}
	
	
	//********************************************************************************************************
	// main pages
	
	public function vip($id) { //default should be -1, so that it wont return any user list
		$this->init();
		
		
		$userData  					= $this->session->userdata('logged_in');

		if(!empty($id)){
			$data['userID']			= $id;			
		}else{
			$data['userID'] 		= $userData['id'];
		}
		$data['leadersID']			= $userData['id'];
		$data['userRole'] 			= @$userData['Role'];	
		$data['Gender'] 			= $userData['gender'];			
		$data['getRecordsDisplay']	= $this->desciples->getRecordsDisplay(NULL);
		
		
		$data['id'] = $data['userID']; // change to session userid
		$data['vip1'] = $this->users->search(null, $id, 1); //param - name, mentor_id, level
		$data['vip2'] = $this->users->search(null, $id, 2);
		$data['vip3'] = $this->users->search(null, $id, 3);
		$data['vip4'] = $this->users->search(null, $id, 4);
		
		$data['baseURL'] = $this->baseURL;
		$this->load->view('headers/g12Networkheader',$data);
		$this->load->view("vip", $data);
		$this->load->view('footers/g12Networkfooter',$data);
	}
	
	public function search2() {
		$this->init();
		
		if($this->input->post("dontStore") == 0) {
			$_SESSION['LEVEL_SEARCH_NAME'] = $this->input->post("name");
		}
		
		$data['results'] = $this->users->search($this->input->post("name"), $this->input->post("id"), $this->input->post("level"), $this->input->post("includeWithoutAccounts"), $this->input->post("gender"), $this->input->post("excludeID"), $this->input->post("all"));
		
		$data['baseURL'] = $this->baseURL;
		$this->load->view("search2", $data);
		
	}
	
	public function transferto2() {
		$this->init();
		
		$id = $this->input->post('id');
		$mentor = $this->input->post('mentor');
		
		$data['baseURL'] = $this->baseURL;
		$this->users->transferto($id, $mentor);
	}
	
	public function getrole($fromMentorID = 0, $toID = 0) {
		$this->init();
				
		$data['baseURL'] = $this->baseURL;
		$this->users->getrole($fromMentorID, $toID);
	}
	
	public function userimage2($id) {
		$img = $this->users->info($id)->image_pic;
		
		if( empty($img) && !empty($this->users->info($id)->profile_pic) ) {
			if(file_exists(FCPATH . "images/" . $this->users->info($id)->profile_pic)) {
				$img = file_get_contents(FCPATH . "images/" . $this->users->info($id)->profile_pic);
			}
		}
		
		if(empty($img)) { $img = file_get_contents(FCPATH . "application/views/images/icon-user-default.png"); }

		header("content-type: image/png");
		echo $img;
	}
	
	public function pleader($id) {
		echo $this->users->getPrimaryLeader($id);
	}
	
	public function discipleslist2($id) {
		$data['getRecordsDisplay'] = $this->desciples->getRecordsDisplay(Null);
		$data['userID'] = $id;
		$this->load->view('discipleslist2.php', $data);
	}
	
	public function userinfojs($id) {
		$p = "";
		$infoDelim = false;
		foreach($this->users->info($id) as $key => $info) {
			switch($key) {
				case "first_name":
				case "maiden_name":
				case "last_name":
				case "birthmonth":
				case "birthdate":
				case "birthyear":
				case "spouse_name":
				case "email":
				case "civil_status":
				case "contact":
				case "address":
					$p .= ($infoDelim ? ", " : "") . $key . ":'" . addslashes($info) . "'";
					$infoDelim = true;
					break;
			}
			
		}
		
		echo "var info = { $p }; ";
	}
	
	function deleteaccount() {
		$this->users->delete($this->input->post('id'));
	}
	
	
	
	
	
	

	

	public function viplistcsv($from, $to) {
		if(empty($from) || empty($to)) { $this->users->viplistdownloadCSV('2016-01-01', '2116-01-01'); }
		else{ $this->users->viplistdownloadCSV($from, $to); }
	}
	
	public function viplistexcel($from, $to) {
		if(empty($from) || empty($to)) { $this->users->viplistdownloadEXCEL('2016-01-01', '2116-01-01'); }
		else{ $this->users->viplistdownloadEXCEL($from, $to); }
	}
	
	public function yessss($iddd){
		$this->user->moveVIP($iddd);
		//echo $iddd . "eeeeeeeeeeeeeeeeeeeeeeeeeeeeeee";
	}
	
	public function businesslist(){
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
			$userData  							= $this->session->userdata('logged_in');
		
			$disciplesResult 					= $this->BusinessList->records($userData['id']);	// disciples records
			
			
			
			$username							= $userData['username'];
			$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

			$data['user_name']					= $username;
			$data['list_of_records'] 			= $disciplesResult;
		
			$data['active_account']				= $activeAcount;
			$data['userID'] 					= $userData['id'];

			$data['userRole'] 					= @$userData['Role'];
			$data['total'] 						= 0;
			$data['LeaderName'] 	  			= $userData['MentorID'];
			//$data['addBtn']						= '<button type="button" class="pull-right btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Disciple</button>';
			$data['settings']					= 'display';
		
			$data['username'] 					= $userData['username'];		
			$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
		
			
			$data['usergender']					= $userData['gender'];
			$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
			//chart 
			
			$chartRecordData= $this->BusinessList->chart();
			
			$data['jsonChartData'] 		= $chartRecordData;
			$data['counthisopencell'] 	= $chartRecordData;
		
			//$data['getrole']			= $this->users->getrole($userData['id'],);
			
			
			
			//for my custom scripts and styles
			//$data['baseURL'] = $this->baseURL;
			
			$data['progress'] = $this->users->getcounts();
			$data['memberscount'] = $this->users->getmembercounts();
			
		
			$data["realUserID"] = $userData['id'];
			
			$data['countDisciples'] = 1;
			if($userData == NULL){
				
				redirect(base_url());
				
			}else{
				$this->load->view('headers/adminhead',$data);
				$this->load->view('sidebar');
				$this->load->view('businesslists',$data);
				$this->load->view('footers/adminfooter',$data);
				
			}
		}else{
			redirect('login');
			
		}
	}
	public function upload(){
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
			$userData  							= $this->session->userdata('logged_in');
		
			$disciplesResult 					= $this->BusinessList->records();	
			
			
			
			$username							= $userData['username'];
			$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

			$data['user_name']					= $username;
			$data['list_of_records'] 			= $disciplesResult;
		
			$data['active_account']				= $activeAcount;
			$data['userID'] 					= $userData['id'];

			$data['userRole'] 					= @$userData['Role'];
			$data['total'] 						= 0;
			$data['LeaderName'] 	  			= $userData['MentorID'];
			//$data['addBtn']						= '<button type="button" class="pull-right btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Disciple</button>';
			$data['settings']					= 'display';
			
			$data['username'] 					= $userData['username'];		
			$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
			
			$data['usergender']					= $userData['gender'];
			$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
			//chart 
			
			$chartRecordData= $this->BusinessList->chart();
			
			$data['jsonChartData'] 		= $chartRecordData;
			$data['counthisopencell'] 	= $chartRecordData;
		
		
			$data['progress'] = $this->users->getcounts();
			$data['memberscount'] = $this->users->getmembercounts();
			

			$data["realUserID"] = $userData['id'];
			
			$data['countDisciples'] = 1;
			if($userData == NULL){
				
				redirect(base_url());
				
			}else{
				$this->load->view('headers/adminhead',$data);
				$this->load->view('upload',$data);
				$this->load->view('footers/adminfooter',$data);
				
			}
		}else{
			redirect('login');
			
		}	
	
		
	}
	public function Media(){
		$userData  							= $this->session->userdata('logged_in');
	
		$media 								= $this->media->records($userData['id']);	// disciples records
		
		
		
		$username							= $userData['username'];
		$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

		$data['user_name']					= $username;
		$data['listofmedia'] 				= $media;
	
		$data['active_account']				= $activeAcount;
		$data['userID'] 					= $userData['id'];

		$data['userRole'] 					= @$userData['Role'];
		$data['total'] 						= 0;
		$data['LeaderName'] 	  			= $userData['MentorID'];
		//$data['addBtn']						= '<button type="button" class="pull-right btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Disciple</button>';
		$data['settings']					= 'display';
	
		$data['username'] 					= $userData['username'];		
		$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
		
		$data['usergender']					= $userData['gender'];
		$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
		//chart 
		
		$chartRecordData= $this->BusinessList->chart();
		
		$data['jsonChartData'] 		= $chartRecordData;
		$data['counthisopencell'] 	= $chartRecordData;
	
		//$data['getrole']			= $this->users->getrole($userData['id'],);
		
		
		
		//for my custom scripts and styles
		//$data['baseURL'] = $this->baseURL;
		
		$data['progress'] = $this->users->getcounts();
		$data['memberscount'] = $this->users->getmembercounts();
		
	
		$data["realUserID"] = $userData['id'];
		
		$data['countDisciples'] = 1;
		if($userData == NULL){
			
			redirect(base_url());
			
		}else{
			$this->load->view('headers/adminhead',$data);
			$this->load->view('sidebar');
			$this->load->view('media',$data);
			$this->load->view('footers/adminfooter',$data);
			
		}
	}
	
	public function package(){
		$userData  							= $this->session->userdata('logged_in');
	
		$media 								= $this->media->records($userData['id']);	// disciples records
		
		
		
		$username							= $userData['username'];
		$activeAcount						= $this->BusinessList->useraccount($userData['id']); // user profile table

		$data['user_name']					= $username;
		$data['listofmedia'] 				= $media;
	
		$data['active_account']				= $activeAcount;
		$data['userID'] 					= $userData['id'];

		$data['userRole'] 					= @$userData['Role'];
		$data['total'] 						= 0;
		$data['LeaderName'] 	  			= $userData['MentorID'];
		//$data['addBtn']						= '<button type="button" class="pull-right btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Disciple</button>';
		$data['settings']					= 'display';
	
		$data['username'] 					= $userData['username'];		
		$data['getRecordsDisplay']			= $this->BusinessList->getRecordsDisplay(Null);
		
		$data['usergender']					= $userData['gender'];
		$data['getRole'] 	= $this->users->getrole( $this->users->getpastor($userData['id']) ,$userData['id']);
		//chart 
		
		$chartRecordData= $this->BusinessList->chart();
		
		$data['jsonChartData'] 		= $chartRecordData;
		$data['counthisopencell'] 	= $chartRecordData;
	
		//$data['getrole']			= $this->users->getrole($userData['id'],);
		
		
		
		//for my custom scripts and styles
		//$data['baseURL'] = $this->baseURL;
		
		$data['progress'] = $this->users->getcounts();
		$data['memberscount'] = $this->users->getmembercounts();
		
	
		$data["realUserID"] = $userData['id'];
		
		$data['countDisciples'] = 1;
		if($userData == NULL){
			
			redirect(base_url());
			
		}else{
			$this->load->view('headers/adminhead',$data);
			$this->load->view('sidebar');
			$this->load->view('package',$data);
			$this->load->view('footers/adminfooter',$data);
			
		}
	}
	
	public function files(){
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
			$userData  							= $this->session->userdata('logged_in');
			echo json_encode($this->media->records($userData['id']));
		}
	}
	
}
