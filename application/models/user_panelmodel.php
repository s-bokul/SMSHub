<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_panelmodel extends CI_Model{

	protected $errors;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function user_update($params){
		$status = false;
        $this->db->set($params); 
		
		if($this->db->update('smshub_users', $params, array('user_id' => $params['user_id'])));
		$status = true;
        return $status;
	}
	public function  user_data($user_id){
		$query = $this->db->get_where('smshub_users', array('user_id' => $user_id));
		$user_info=$query->row_array();
		return $user_info;
	}
	
}



