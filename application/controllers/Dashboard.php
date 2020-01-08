<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->data['title'] = 'Dashboard';
		$this->load->view('dashboard',$this->data);
	}
	
	public function jobList(){
		$this->data['title'] = 'Job list';
		$join = array(USER=>USER.'.user_id='.JOB.'.user_id');
		$this->data['jobList'] = $this->Common_model->getResult('job.job_id,job.job_title,job.job_create_date,user.user_id,user.username',$whr='',JOB,$join,JOB.'.job_create_date',$orderBy='desc');
		$this->load->view('job_list',$this->data);
	}
	
	public function inbox(){
		$this->data['title'] = 'Inbox';
		$jobId = base64_decode(base64_decode($this->uri->segment(2)));
		$myId 	= $this->session->userdata('user_id');
		if(isset($jobId) and !empty($jobId)){
			$jobInfo = $this->Common_model->get_detail(JOB,array('job_id'=>$jobId));
			if($jobInfo->num_rows() > 0){
				$this->data['job_detail'] = $jobInfo->row();
				$join = array(USER=>USER.'.user_id=jd.jd_msg_from');
				$this->data['job_aplicatin'] = $this->Common_model->getResult('DISTINCT(jd.jd_msg_from) as applied_by,user.username',array('jd.jd_msg_to' => $myId,'jd.jd_job_id'=> $jobId),JOB_DISCUSS.' jd',$join);
				$this->load->view('inbox',$this->data);
			}else{
				$this->session->set_flashdata('message','Invalid job info.');
				redirect('jobList');
			}
		}else{
			$this->session->set_flashdata('message','Invalid job info.');
			redirect('jobList');
		}
	}
	
	public function inbox_list(){
		$this->data['title'] = 'Disucssion';
		$jobId 		= base64_decode(base64_decode($this->uri->segment(2)));
		$appliedBy 	= base64_decode(base64_decode($this->uri->segment(3)));
		$myId 		= $this->session->userdata('user_id');
		
		if(isset($jobId) && !empty($jobId) && isset($appliedBy) and !empty($appliedBy)){
			$jobInfo 	= $this->Common_model->get_detail(JOB,array('job_id'=>$jobId));
			$userInfo 	= $this->Common_model->get_detail(USER,array('user_id'=>$appliedBy));
			
			if($jobInfo->num_rows() > 0 && $userInfo->num_rows() > 0){
				$this->data['job_detail'] = $jobInfo->row();
				$this->data['ab'] = $appliedBy;
				$join = array(USER=>USER.'.user_id=jd.jd_msg_from');	
				$this->data['discussion'] = $this->Common_model->getResult('user.username,jd.jd_id,jd.jd_message,jd.jd_time',array('jd.jd_msg_to' => $myId,'jd.jd_msg_from'=>$appliedBy,'jd.jd_job_id'=> $jobId),JOB_DISCUSS.' jd',$join,'jd.jd_time','ASC');
				$this->data['replies'] = $this->Common_model->getResult('user.username,jd.jd_id,jd.jd_message,jd.jd_time',array('jd.jd_msg_to' =>$appliedBy,'jd.jd_msg_from'=>$myId,'jd.jd_job_id'=> $jobId),JOB_DISCUSS.' jd',$join,'jd.jd_time','ASC');
				$this->load->view('discussion',$this->data);
			}else{
				$this->session->set_flashdata('message','Invalid job info.');
				redirect('jobList');
			}
		}else{
			$this->session->set_flashdata('message','Invalid job info.');
			redirect('jobList');
		}
		
	}
	
	public function contact(){
		$this->data['title'] = 'Contact';
		$jobId = base64_decode(base64_decode($this->uri->segment(2)));
		if(isset($jobId) && !empty($jobId)){
			$jobInfo = $this->Common_model->get_detail(JOB,array('job_id'=>$jobId));
			if($jobInfo->num_rows() > 0){
				$this->data['job_detail'] = $jobInfo->row();
				$contact_to = $this->data['job_detail']->user_id;
				$contact_from 	= $this->session->userdata('user_id');
				
				$join = array(USER=>USER.'.user_id=jd.jd_msg_to');	
				$this->data['contacts'] = $this->Common_model->getResult('user.username,jd.jd_id,jd.jd_message,jd.jd_time',array('jd.jd_msg_to' => $contact_to,'jd.jd_msg_from'=>$contact_from,'jd.jd_job_id'=> $jobId),JOB_DISCUSS.' jd',$join,'jd.jd_time','ASC');
				$this->load->view('contact',$this->data);
			}else{
				$this->session->set_flashdata('message','Invalid job info.');
				redirect('jobList');
			}
		}else{
			$this->session->set_flashdata('message','Invalid job info.');
			redirect('jobList');
		}
	}
	
	public function save_contact(){
		$msg_to 	= $this->input->post('u');
		$msg 		= $this->input->post('contact_msg');
		$msg_from 	= $this->session->userdata('user_id');
		$jobId 		= $this->input->post('j');
		
		date_default_timezone_get('Asia/Calcutta');
		$today_date = date('Y-m-d H:i:s');
		
		$insert_data = array('jd_msg_from'=>$msg_from,
							'jd_msg_to'=>$msg_to,
							'jd_job_id'=>$jobId,
							'jd_message'=>$msg,
							'jd_time'=>$today_date);
		
		$contact_id = $this->Common_model->insert(JOB_DISCUSS,$insert_data);
		echo 1;
		die;
	}
	
	public function save_replay(){
		$msg_to 	= $this->input->post('ab');
		$msg 		= $this->input->post('replay_msg');
		$msg_from 	= $this->session->userdata('user_id');
		$jobId 		= $this->input->post('j');
		
		date_default_timezone_get('Asia/Calcutta');
		$today_date = date('Y-m-d H:i:s');
		
		$insert_data = array('jd_msg_from'=>$msg_from,
							'jd_msg_to'=>$msg_to,
							'jd_job_id'=>$jobId,
							'jd_message'=>$msg,
							'jd_time'=>$today_date);
		
		$discuss_id = $this->Common_model->insert(JOB_DISCUSS,$insert_data);
		
		echo 1;
		die;
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
	
	
	
}