<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_model extends CI_Model{

	protected $errors;

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function create($params){
        $status = false;
        $params['password'] = md5($params['password']);
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

    public function checkMobileIsUsed($number)
    {
        $status = false;
        $query = $this->db->get_where('smshub_users', array('mobile_number' => $number));
        if($query->num_rows() > 0)
            $status = true;
        return $status;
    }

    public function login_check($data)
    {
        $status = false;
        $conditional_array = array(
            'mobile_number' => $data['mobile_number'],
            'password' => md5($data['password'])
        );
        $query = $this->db->get_where('smshub_users', $conditional_array);
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            $this->session->set_userdata('user_info', $result[0]);
            $status = true;
        }

        return $status;
    }

    public function create_campaign($params)
    {
        $status = true;
        $this->db->set($params);
        if($this->db->insert('smshub_campaign'))
            $status = $this->db->insert_id();
        return $status;
    }

    public function save_campaign_numbers($numbers, $campaign_id)
    {
        $numbers = explode(',', $numbers);
        //print_r($numbers);
        foreach($numbers as $number)
        {
            if(!empty($number))
            {
                $data = array(
                    'campaign_id' => $campaign_id,
                    'number' => $number
                );
                $this->db->set($data);
                $this->db->insert('smshub_sending_numbers');
                unset($data);
            }
        }
        return true;
    }

}



