<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('user_id')){
			redirect('dashboard');
		}
		$this->load->model('Common_model');
		
	}
	public function index()
	{
		$this->data['title'] = 'Login';
		$this->load->library('form_validation');
		$fieldsValidation[] = array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required');
		$fieldsValidation[] = array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|callback_check_database');
		$this->form_validation->set_error_delimiters('<p class="wrong">', '</p>');
		$this->form_validation->set_rules($fieldsValidation);

		// Run form validation
		if ($this->form_validation->run() === TRUE) 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user_detail = $this->Common_model->get_detail(USER,array('username'=>$username,'password'=>$password))->row(); 
			$set_sess = array('user_id'=>$user_detail->user_id);
			$this->session->set_userdata($set_sess);
			redirect('dashboard');
		}
		$this->load->view('login',$this->data);
	}
	
	function check_database($password){
		$username = $this->input->post('username');
		$check_user = $this->Common_model->check_detail(USER,array('username'=>$username,'password'=>$password));
		if($check_user->num_rows() > 0){
			
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username/password');
			return FALSE;
		}	
	}
}
