<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/User_Controller.php');

class Usercontact extends User_Controller {

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
        $title = 'Find Contact';
        $this->template->write_view('content','template/user/pages/findcontact',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

   public function contactlist()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Find Contact';
        $this->template->write_view('content','template/user/pages/contactlist',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }
	
	public function createlist()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
		
        $data = null;
        $error = null;
        $title = 'Contact Add';
		
		$this->template->write_view('content','template/user/pages/createlist',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }
	
	public function addlist()
    {
        //$this->load->view('welcome_message');
  	  $this->load->helper('form');
	  $this->load->helper('date');
	  $error = null;
      $title = 'Interface Add';
      $data = $this->input->post();
	 
	  $user_info = $this->session->userdata('user_info');
	  $data['user_id']=$user_info['user_id'];
	  $datestring = "%Y/%m/%d  %h:%i:%s";
	  $data['date_created'] = mdate($datestring);
	  $this->load->model('user_contactmodel');
	  
	if($this->user_contactmodel->contactlist_create($data)){
		   $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Contact List  Added successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	  }	
	  else
	  {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'ontact List   Added Fail.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
       redirect('usercontact/createlist');
    }
	public function addcustomfield()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Custom Field Create';
        $this->template->write_view('content','template/user/pages/addcustomfield',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }
	public function createcustomfield()
    {
        //$this->load->view('welcome_message');
  	  $this->load->helper('form');
	  $this->load->helper('date');
	  $error = null;
      $title = 'Create custom field Add';
      $data = $this->input->post();
	  $user_info = $this->session->userdata('user_info');
	  $data['user_id']=$user_info['user_id'];
	  $datestring = "%Y/%m/%d  %h:%i:%s";
	  $data['date_created'] = mdate($datestring);
	  $this->load->model('user_contactmodel');
	  
	if($this->user_contactmodel->customfield_create($data)){
		   $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Custom Field Added successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	  }	
	  else
	  {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Custom Field   Added Fail.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
       redirect('usercontact/addcustomfield');
    }

}