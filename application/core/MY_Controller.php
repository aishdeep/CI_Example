<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user_id')){
			redirect('');
		}
		$userId = $this->session->userdata('user_id');
		$this->load->model('Common_model');
		$this->data['uDetail'] = $this->Common_model->get_detail(USER,array('user_id'=>$userId))->row();
		
	}
}
?>