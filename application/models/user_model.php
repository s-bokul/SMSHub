<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_model extends CI_Model{

	protected $errors;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function create($params){

        $this->db->set($params);
        $this->db->insert('smshub_users');
		return true;
	}
	


}



