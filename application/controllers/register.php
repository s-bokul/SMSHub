<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/My_Controller.php');

class Register extends My_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct(){
        parent::__construct();
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
            $result = $this->user_model->create($data);
        }
        die;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */