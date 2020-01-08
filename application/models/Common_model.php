<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	public function check_detail($table,$where){
		return $this->db->get_where($table,$where);
	}
	
	public function get_detail($table,$where){
		return $this->db->get_where($table,$where);
	}
	
	public function update($table,$update,$where){
		$this->db->where($where);
		$this->db->update($table,$update);
		return;
	}
	
	public function getResult($select='*',$whr='',$table,$join='',$order='',$orderBy='desc'){
		$this->db->select($select);
		
		if(!empty($whr)){
			$this->db->where($whr);
		}
		
		if(!empty($join)){
			foreach($join as $tabl=>$joinOn){
				$this->db->join($tabl,$joinOn);
			}
		}
		
		if(!empty($order)){
			$this->db->order_by($order,$orderBy);
		}
		return $this->db->get($table);
	}
	
	public function insert($table,$insert){
		$this->db->insert($table,$insert);
		return $this->db->insert_id();
	}
}








