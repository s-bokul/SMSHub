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
	public function create_interface($params){
        $status = false;
        $this->db->set($params);
        if($this->db->insert('smshub_interface'))
		$status = true;
        return $status;
	}
		
	function check_old_password($user_id,$old_password)
	{
		$truefalse;
		$this->db->from('smshub_users');
		$this->db->where('user_id',$user_id);
		$this->db->where('password',$old_password);
		$query = $this->db->get();
		$truefalse=$query->num_rows();
		return $truefalse?true:false;
	}
	function update_password($user_id,$password_data)
	{
		unset($password_data['old_password']);
		unset($password_data['confirm_password']);
		$truefalse;
		$this->db->where('user_id', $user_id);
		if($this->db->update('smshub_users',$password_data))
		{
			$truefalse=TRUE;
		}
		else
		{
			$truefalse=FALSE;
		}
		//$this->db->last_query();
		//exit();
		return $truefalse;
	}
	public function sender_create($params){
        $status = false;
        $this->db->set($params);
        if($this->db->insert('smshub_sender'))
		$status = true;
        return $status;
	}
 function show_senderdata($user_id)
	{		
		$this->db->from('smshub_sender');
		$this->db->where('user_id',$user_id);
		$this->db->order_by("sender_id", "Asc");
		$query = $this->db->get();
		//print_r($query->result());
		//die(0);
		return $query->result();
	}
	
	public function senderdata_delete($sender_id){
        $status = false;
        $this->db->set($sender_id);
        if($this->db->delete('smshub_sender', array('sender_id' => $sender_id)))
		$status = true;
        return $status;
	}
   function senderdata_update($sender_id)
	{   $data = array(
               'sender_status' =>1,
           );
	    $status_old = array(
               'sender_status' =>0,
           );
		$truefalse;
		$sender_status=1;
		$this->db->where('sender_status', $sender_status);
		$this->db->update('smshub_sender',$status_old);
		$this->db->where('sender_id', $sender_id);
		if($this->db->update('smshub_sender',$data))
		{
			$truefalse=TRUE;
		}
		else
		{
			$truefalse=FALSE;
		}
		//$this->db->last_query();
		//exit();
		return $truefalse;
	}
	
}



