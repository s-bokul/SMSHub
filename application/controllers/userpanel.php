<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/User_Controller.php');

class Userpanel extends User_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Campaign';
        $this->template->write_view('content','template/user/pages/campaign',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function account_details()
    {
        $this->load->helper('form');
        //$data = null;
        $error = null;
        $title = 'Account Details';
        $user_info = $this->session->userdata('user_info');
		$user_id=$user_info['user_id'];
		$this->load->model('user_panelmodel');
		$data=$this->user_panelmodel->user_data($user_id);
		$this->template->write_view('content','template/user/pages/account_details',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        $this->output->enable_profiler(TRUE);
    }
	public function update_details()
	{
	  $this->load->helper('form');
	  $error = null;
      $title = 'Account Details Update';
      $data = $this->input->post();
	  $this->load->model('user_panelmodel');
     if($this->user_panelmodel->user_update($data))
	{
		   $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Account Details Update Successfully.'
                    );

                    $data = json_encode($msg);

                    $this->session->set_flashdata('msg', $data);
	}
	 else
                {
                    $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Account Details Update Failed please try again.'
                    );

                    $data = json_encode($msg);

                    $this->session->set_flashdata('msg', $data);
				}
	
	 redirect('userpanel/account_details');
	  
	 
	}
	 public function setting_interface()
    {
        $this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Setting Interface';
         $this->template->write_view('content','template/user/pages/settinginterface',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
        $this->output->enable_profiler(TRUE);
    }
	
	
	public function add_interface()
	{
	  $this->load->helper('form');
	  $error = null;
      $title = 'Interface Add';
      $data = $this->input->post();
	  $user_info = $this->session->userdata('user_info');
	  $data['user_id']=$user_info['user_id'];
	  $this->load->model('user_panelmodel');
	  if($this->user_panelmodel->create_interface($data))
	  { 
	   $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Interface  Added successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	  }	
	  else
	  {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Interface  Added Fail.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
       redirect('userpanel/setting_interface');
	  
	}
	
	  public function changepassword() {
		$this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Change Password';
        $this->template->write_view('content','template/user/pages/changepassword',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
	  
	  }
	  
	  function changepass()
	{   
		$this->data=$_POST;
		
		$password_data = array(
		'old_password'=>md5($this->input->post('old_password')),
		'password'=>md5($this->input->post('password')),
		'confirm_password'=>md5($this->input->post('confirm_password'))
		);
		
		$old_password=$password_data["old_password"];
		$user_password=$password_data["password"];
		$confirm_password=$password_data["confirm_password"];
		
		$userinfo=$this->session->userdata('user_info');
		$user_id=$userinfo['user_id'];
		$this->load->model('user_panelmodel');
	
		if($this->input->post('password') || $this->input->post('old_password')){
		if($this->user_panelmodel->check_old_password($user_id,$old_password))
		{   
			
			if($user_password==$confirm_password)
			{
				if($this->user_panelmodel->update_password($user_id,$password_data))
				{
					
					$msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Password Changed Successfully.'
                    );
                   $data = json_encode($msg);
                   $this->session->set_flashdata('msg', $data);
				}
				else
				{
					$msg = array(
                        'status' => true,
                        'class' => 'errormsgbox',
                        'msg' => 'There was some problem please try again.'
                    );
                   $data = json_encode($msg);
                   $this->session->set_flashdata('msg', $data);
					
				}
				
			}
			
			
			else
			{
				
				$msg = array(
                        'status' => true,
                        'class' => 'errormsgbox',
                        'msg' => 'Please Type Same Password!'
                    );
                   $data = json_encode($msg);
                   $this->session->set_flashdata('msg', $data);
			}
		}
		else
		{
			$msg = array(
                        'status' => true,
                        'class' => 'errormsgbox',
                        'msg' => 'Wrong Old Password!'
                    );
                   $data = json_encode($msg);
                   $this->session->set_flashdata('msg', $data);
		}
		}
		else{
			$msg = array(
                        'status' => true,
                        'class' => 'errormsgbox',
                        'msg' => 'Please Type  Password!'
                    );
                   $data = json_encode($msg);
                   $this->session->set_flashdata('msg', $data);
		
		}
		redirect('userpanel/changepassword');
	}
	public function sender() {
		$this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Sender Add';
	    $user_info = $this->session->userdata('user_info');
	    $user_id=$user_info['user_id'];
	    $this->load->model('user_panelmodel');
		$sender_data=$this->user_panelmodel->show_senderdata($user_id);
        $this->template->write_view('content','template/user/pages/sender',array('sender_data'=>$sender_data,'error'=>$error,'title'=>$title));
        $this->template->render();
	  
	  }

	public function senderadd()
	{
	  $this->load->helper('form');
	  $error = null;
      $title = 'Interface Add';
      $data = $this->input->post();
	  $user_info = $this->session->userdata('user_info');
	  $data['user_id']=$user_info['user_id'];
	  $this->load->model('user_panelmodel');
	  
	if($this->user_panelmodel->sender_create($data)){
		   $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Sender Id Added successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	  }	
	  else
	  {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Sender Id  Added Fail.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
       redirect('userpanel/sender');
	
	
	  
	}
	
	 public function senderdelete($sender_id) {
		$this->load->helper('form');
        //$user_info = $this->session->userdata('user_info');
	    //$user_id=$user_info['user_id'];
	    $this->load->model('user_panelmodel');
		
	   if($this->user_panelmodel->senderdata_delete($sender_id)){
		      $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Sender Data Deleted successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	}
	 else
	  {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Sender data  Deleted Fail.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
        redirect('userpanel/sender');
	  }
	  public function setdefault($sender_id) {
		$this->load->helper('form');
        //$user_info = $this->session->userdata('user_info');
	    //$user_id=$user_info['user_id'];
	    $this->load->model('user_panelmodel');
		
	   if($this->user_panelmodel->senderdata_update($sender_id)){
		      $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Sender Data Update successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	}
	 else
	  {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Sender data  Update Fail.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
        redirect('userpanel/sender');
	  }
}