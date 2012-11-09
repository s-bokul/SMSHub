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

}