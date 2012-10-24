<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/My_Controller.php');

class Register extends My_Controller {

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
        $title = 'Register';
        $this->template->write_view('content','pages/register',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }

    public function save()
    {
        $data = $this->input->post();
        if($_POST)
        {
            $this->load->model('user_model');
            if($this->user_model->create($data))
            {
                $msg = array(
                    'status' => true,
                    'class' => 'successbox',
                    'msg' => 'Registration complete successfully.'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }
            else
            {
                $msg = array(
                    'status' => false,
                    'class' => 'errormsgbox',
                    'msg' => 'Registration failed please try again.'
                );

                $data = json_encode($msg);

                $this->session->set_flashdata('msg', $data);
            }
        }
        redirect('/register');
    }

    function checkEmailIsUsed($email)
    {
        $status = false;
        $this->load->model('user_model');
        if($this->user_model->checkEmailIsUsed($email))
            $status = true;
        return $status;
    }

    function checkMobileIsUsed($number)
    {
        $status = false;
        $this->load->model('user_model');
        if($this->user_model->checkMobileIsUsed($number))
            $status = true;
        return $status;
    }

}

if(isset($_GET['email']))
{
    $register = new Register();
    $status = $register->checkEmailIsUsed($_GET['email']);
    if($status == true)
        echo 'false';
    else
        echo 'true';
    die();
}

if(isset($_GET['mobile_number']))
{
    $register = new Register();
    $status = $register->checkMobileIsUsed($_GET['mobile_number']);
    if($status == true)
        echo 'false';
    else
        echo 'true';
    die();
}
/* End of file register.php */
/* Location: ./application/controllers/register.php */