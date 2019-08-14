<?php 

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
}

class Admin_Controller extends MY_Controller 
{
	
	var $permission = array();

	public function __construct() 
	{
		parent::__construct();
        $this->load->model('model_calculations');


        if(empty($this->session->userdata('logged_in'))) {
			$session_data = array('logged_in' => FALSE);
			$this->session->set_userdata($session_data);
		}
		else {
		}
	}

	public function logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == TRUE) {
			redirect('dashboard', 'refresh');
		}
	}

	public function not_logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == FALSE) {
			redirect('login', 'refresh');
		}
	}

	public function render_template($page = null, $data = array())
	{


        $data['fine'] =$this->model_calculations->getFine();

        $this->load->view('sections/header', $data);
        $this->load->view('sections/navbar');
        $this->load->view('sections/sidebar');

        $this->load->view($page);
        $this->load->view('sections/footer');
	}

    public function render_common($page = null, $data = array())
    {

        $this->load->view('sections/header');
        $this->load->view($page, $data);
        $this->load->view('sections/footer');
    }

}