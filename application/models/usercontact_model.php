<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Usercontact_model extends CI_Model{

	protected $errors;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
  public function contactlist_create($params){
        $status = false;
        $this->db->set($params);
        if($this->db->insert('smshub_groups'))
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
 public function show_contactlist($user_id)
    {
        $this->db->from('smshub_groups');
        $this->db->where('user_id', $user_id);
        $this->db->order_by("id", "Asc");
        $query = $this->db->get();
        //print_r($query->result());
        //die(0);
        return $query->result();
    }
  public function show_customfiled($user_id,$row)
    {
        $this->db->from('smshub_customfield');
        $this->db->where('user_id', $user_id);
        $this->db->order_by("customfield_id", "Asc");
		$this->db->limit(5,$row);
        $query = $this->db->get();
        //print_r($query->result());
        //die(0);
        return $query->result();
    }
	 public function contact_create($params){
        $status = false;
        $this->db->set($params);
        if($this->db->insert('smshub_contacts'))
		$status = true;
        return $status;
	}
	 public function delete_customfiled($customfied_id)
    {
      if($this->db->delete('smshub_customfield', array('customfield_id' => $customfied_id)))
	  $status = true;
      return $status;
    }
  public function edit_customfiled($customfield_id)
    {
        $this->db->from('smshub_customfield');
        $this->db->where('customfield_id', $customfield_id);
        $query = $this->db->get();
        return $query->result();
    }
   public function customfield_update($params)
    {
        $status = false;
        $this->db->set($params);

        if ($this->db->update('smshub_customfield', $params, array('customfield_id' => $params['customfield_id']))) ;
        $status = true;
        return $status;
    }

	function countcustomfield($user_id)
	{
		$query=$this->db->query("select count(*) as cnt from smshub_customfield where user_id='".$user_id."'");
		$row = $query->row("cnt");
		return $row;
	}
	
}



