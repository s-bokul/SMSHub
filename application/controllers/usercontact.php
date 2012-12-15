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
        $title = 'Contact List Add';
		
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
	  $this->load->model('usercontact_model');
	  
	if($this->usercontact_model->contactlist_create($data)){
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
	  $this->load->model('usercontact_model');
	  
	if($this->usercontact_model->customfield_create($data)){
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
	public function addcontact()
    {
        //$this->load->view('welcome_message');
        $this->load->helper('form');
		
        $data = null;
        $error = null;
        $title = 'Contact Add';
	    $user_info = $this->session->userdata('user_info');
	    $user_id=$user_info['user_id'];
		$this->load->model('usercontact_model');
		$data['contact_list']=$this->usercontact_model->show_contactlist($user_id);
		$data['custom_field']=$this->usercontact_model->show_customfiled($user_id);
		$this->template->write_view('content','template/user/pages/addcontact',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }
 public function createcontact()
    {
        //$this->load->view('welcome_message');
  	  $this->load->helper('form');
	  $this->load->helper('date');
	  $error = null;
      $title = 'Contact Add';
      $count=$this->input->post('count_number');
	  $data['group_id']=$this->input->post('group_id');
	  $data['firstname']=$this->input->post('firstname');
	  $data['lastname']=$this->input->post('lastname');
	  $data['number']=$this->input->post('number');
	  for($i=0;$i<=$count; $i++){
	  $data['dynamic_data'][$i] = array(
                        'fieldname' => $this->input->post('customfield'.$i),
                        'value' => $this->input->post('customfield_value'.$i),
                        );
	  }
	 
	
	  $data['dynamic_data']=json_encode($data['dynamic_data']);
	  $user_info = $this->session->userdata('user_info');
	  $data['user_id']=$user_info['user_id'];
	  $datestring = "%Y/%m/%d  %h:%i:%s";
	  $data['date_created'] = mdate($datestring);
	  $this->load->model('usercontact_model');
	  
	if($this->usercontact_model->contact_create($data)){
		   $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Contact   Added successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	  }	
	  else
	  {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Contact    Added Fail.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
       redirect('usercontact/addcontact');
    }
	
	public function importcontact()
    {
        $this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Import Contact';
        $this->template->write_view('content','template/user/pages/importcontact',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

}