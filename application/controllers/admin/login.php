<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		
	}

	public function index()
	{	
		if ($this->input->post()){
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');
			if($this->form_validation->run()){
				$this->session->set_userdata('admin', true );
				redirect(admin_url('/home'),'refresh');
			}
		}
		$this->load->view('admin/login/index');
	}

	function check_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);

		$array = array(
			'username' => $username,
			'password' => $password
		);
		if($this->Admin_model->check_exists($array)){
			return true;
		} else {
			$this->form_validation->set_message(__FUNCTION__, "Không đăng nhập thành công");
			return false;
		}
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */