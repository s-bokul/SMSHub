<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'libraries/My_Controller.php');

class Pages extends My_Controller {

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

    function _remap( $method )
    {
        // $method contains the second segment of your URI
        switch( $method )
        {
            case 'index':
                $this->index();
                break;

            case 'about-me':
                $this->about_me();
                break;

            case 'successful':
                $this->display_successful_message();
                break;

            default:
                $this->page_not_found();
                break;
        }
    }

	public function index()
	{
		//$this->load->view('welcome_message');
        $data = null;
        $error = null;
        $title = 'Home';
        $this->template->write_view('content','pages/home',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
	}

    public function page_not_found()
    {
        $data = null;
        $error = null;
        $title = '404 Not Found';
        $this->template->write_view('content','pages/not_found',array('data'=>$data,'error'=>$error,'title'=>$title));
        $this->template->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */