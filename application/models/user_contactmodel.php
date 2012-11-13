<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_contactmodel extends CI_Model{

	protected $errors;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
  public function contactlist_create($params){
        $status = false;
        $this->db->set($params);
        if($this->db->insert('smshub_contactlist'))
		$status = true;
        return $status;
	}
  public function customfield_create($params){
        $status = false;
        $this->db->set($params);
        if($this->db->insert('smshub_customfield'))
		$status = true;
        return $status;
	}
	
	
}



