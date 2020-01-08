<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$arr1 = array('ere'=>'ewe','qas'=>'abc','mop'=>'xyz','wre'=>'grrfg');
		$arr2 = array('qq'=>'1q2','aa'=>'b67','ww'=>'we4');
		$arr3 = array(3,23);
		//$arr  = array_combine($arr1,$arr2);
		//print_r($arr);
		echo '<br>';	
		$arr_mer = array_merge($arr1,$arr2,$arr3);
		print_r($arr_mer);
		//$this->load->view('welcome_message');
	}
	
	public function testing(){
		$a;
		echo $b;
		$this->abc();
	}
	
	public function abc($b){
		echo $b;
	}
}
