<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_model extends CI_Model{

	protected $errors;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function create($params){
        $status = false;
        $this->db->set($params);
        if($this->db->insert('smshub_users'))
		$status = true;
        return $status;
	}
	
    public function checkEmailIsUsed($email)
    {
        $status = false;
        $query = $this->db->get_where('smshub_users', array('email' => $email));
        if($query->num_rows() > 0)
            $status = true;
        return $status;
    }

}



