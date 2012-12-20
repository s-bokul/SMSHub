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
	  $this->load->library('form_validation');
	  $this->load->helper('date');
	  $error = null;
      $title = 'Create custom field Add';
      $data = $this->input->post();
	  if($data){
	   $this->form_validation->set_rules('customfield_name', 'customfield_name', 'trim|required');
       $this->form_validation->set_rules('customfield_description', 'customfield_description', 'required');
	   if ($this->form_validation->run() == FALSE)
            {
                $data = null;
                $error = validation_errors();
                $title = 'Custom Field Create';
                $this->template->write_view('content','template/user/pages/addcustomfield',array('data'=>$data,'error'=>$error,'title'=>$title));
                $this->template->render();
            }
	 else{		
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
	  }
       redirect('usercontact/addcustomfield');
	     }
    }
	public function addcontact($row=0)
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
		$data['custom_field']=$this->usercontact_model->show_customfiled($user_id,$row);
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
   
   public function do_upload()
    {
  	
    	$config['upload_path'] = './uploads/';
		//$config['allowed_types'] = 'gif|jpg|png';
		$config['allowed_types'] = 'csv|xls|xlsx';
		$config['file_name'] = 'phone';
		$config['max_size']	= '20000';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

	  $this->load->library('upload', $config);
	 if($this->upload->do_upload()){
		   $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Import successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	  }	
	  else
	  {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Import Fail.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
		
		
		$f_row = $this->input->post('first_row');
		$this->excel_reader($f_row['header']);
		
		
		//var_dump($f_row['header']);
		
		
       redirect('usercontact/importcontact');
	}
	
	public function excel_reader($is_header)
	{
		//file read
		
		$this->load->helper('file');
		$file_name = get_filenames('./uploads/');
		//echo $file_name[0];
		
		$this->load->library('excel');
		$inputFileName = './uploads/'.$file_name[0];
		if (strpos($inputFileName,'.csv') !== false) {
			$objReader = new PHPExcel_Reader_CSV();
		}else{
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		}
		
		$objPHPExcel = $objReader->load($inputFileName);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		//var_dump($sheetData);
		$this->load->model('usercontact_model');
		foreach($sheetData as $array){
			//echo "array list:";
			
			if($is_header=="1")
			{
				$is_header="0";
				continue;
			}
			//var_dump($array);
			$a=$array["A"];
			
			$phone = 0;
			if(is_numeric($a))
			{
				if(substr($a,0,1)=="4" && strlen($a)==9)
					//TODO:$a value save into database
					//echo $a;
					$phone = "61".$a;
				else if(substr($a,0,2)=="04" && strlen($a)==10)
				{
					$var = ltrim($a, '0');
					$phone = "61".$var;
				}
				else if(substr($a,0,3)=="614" && strlen($a)==11)
					$phone = $a;
			}
			else
			{
				$msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Import Fail, May be imported file contain first row as a header. Please check mark the (First Row is Header) checkbox'
                    );

				$data = json_encode($msg);
				$this->session->set_flashdata('msg', $data);
				break;
			}
			if($phone!=0)
			{
				$this->usercontact_model->insert_phone_number($phone);
				
			}
		}
		delete_files('./uploads/');
	}
	  
	  
    public function customfield($row=0)
    {
        $this->load->helper('form');
		$this->load->library('pagination');
        $data = null;
        $error = null;
        $title = 'Custom fields';
		$user_info = $this->session->userdata('user_info');
	    $user_id=$user_info['user_id'];
		$this->load->model('usercontact_model');
		$config['base_url']=base_url()."/index.php/usercontact/customfield";
		$config['total_rows'] = $this->usercontact_model->countcustomfield($user_id);
		$config['per_page'] = 5;
		$config['next_link'] = 'Next >>';
		$config['prev_link'] = '<< Prev';
		$this->pagination->initialize($config); 
		$data['custom_field']=$this->usercontact_model->show_customfiled($user_id,$row);
		$data['links']=$this->pagination->create_links();
        $this->template->write_view('content','template/user/pages/customfields',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
     }
   	public function customfield_delete($customfied_id)
    {
        $this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Custom fields';
	    $this->load->model('usercontact_model');
	  if($this->usercontact_model->delete_customfiled($customfied_id)){
		   $msg = array(
                        'status' => true,
                        'class' => 'successbox',
                        'msg' => 'Field delete successfully.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
	    }	
	  else
	   {
        $msg = array(
                        'status' => false,
                        'class' => 'errormsgbox',
                        'msg' => 'Fail to delete field.'
                    );

        $data = json_encode($msg);
        $this->session->set_flashdata('msg', $data);
        }
		redirect('usercontact/customfield');
     }
	public function customfield_edit($customfield_id)
    {
        $this->load->helper('form');
        $data = null;
        $error = null;
        $title = 'Custom fields';
	    $this->load->model('usercontact_model');
	    $data['custom_field']=$this->usercontact_model->edit_customfiled($customfield_id);
		$this->template->write_view('content','template/user/pages/editcustomfield',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
			
     }
	  public function updatecustomfield()
    {
        $this->load->helper('form');
        $error = null;
        $title = 'Account Details Update';
        $data = $this->input->post();
        $this->load->model('usercontact_model');
        if ($this->usercontact_model->customfield_update($data)) {
            $msg = array(
                'status' => true,
                'class' => 'successbox',
                'msg' => 'Update Successfully.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }
        else
        {
            $msg = array(
                'status' => false,
                'class' => 'errormsgbox',
                'msg' => 'Update Failed please try again.'
            );

            $data = json_encode($msg);

            $this->session->set_flashdata('msg', $data);
        }

        redirect('usercontact/customfield');

    }
	
    }