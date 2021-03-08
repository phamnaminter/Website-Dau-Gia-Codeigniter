<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}

	//kiem tra email
	function check_email_exist(){
		$username = $this->input->post('email');
		$where = array('email' => $username);

		if($this->User_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
			return false;
		} else {
			return true;
		}
	}

	function index() {
		/*
		* Thông tin của thành viên
		*/
		if (!$this->session->userdata('user_id'))
		{
			redirect();
		}
		$user_id = $this->session->userdata('user_id');
		$user = $this->User_model->get_info($user_id);
		if (!$user) {
			redirect();
		}
		$this->data['user'] = $user;
		//load view
		$this->data['temp'] = 'site/user/index';
		$this->load->view('site/layout', $this->data);

	}

	function edit() {
		/*
		* Chỉnh sửa thông tin thành viên
		*/
		if (!$this->session->userdata('user_id'))
		{
			redirect();
		}
		$user_id = $this->session->userdata('user_id');
		$user = $this->User_model->get_info($user_id);
		if (!$user) {
			redirect();
		}
		$this->data['user'] = $user;
		//chỉnh sửa thông tin
		$this->load->library('form_validation');
		$this->load->helper('form');

		//$this->input->post  = $this->security->xss_clean($this->input->post());
		if ($this->input->post()) {
			//pre($this->input->post);
			$this->form_validation->set_rules('name', 'Your name', 'trim|required|min_length[6]|max_length[40]');
			$this->form_validation->set_rules('email', 'Your email', 'trim|valid_email|required|min_length[6]|max_length[30]');	
			$this->form_validation->set_rules('phone', 'Your phone', 'required');
			$this->form_validation->set_rules('address', 'Your address', 'required');
			if ($this->input->post("password")) {
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[16]');	
				$this->form_validation->set_rules('re_password', 'Repassword', 'matches[password]');
			}
			


			if( $this->form_validation->run() ) {
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				

				$data = array('name' => $name,
							'email' => $this->input->post('email'), 
							'phone' => $this->input->post('phone'),
							'address' => $this->input->post('address'),
							
				);
				if($this->input->post("password")) {
					$data['password'] = md5($this->input->post("password"));
				}

				if ($this->User_model->update($user_id, $data)){
					$this->data['message'] = "Cập nhật thông tin thành công";
					redirect(base_url('/user'),'refresh');
				} 
			}
			}	
			//CODING HERE

		//load view
		$this->data['temp'] = 'site/user/edit';
		$this->load->view('site/layout', $this->data);

	}
	//Xem thông tin giỏ hàng
	public function cart() {
		/*
		* Xem các sản phẩm của thành viên
		*/
		if (!$this->session->userdata('user_id'))
		{
			redirect();
		}
		$user_id = $this->session->userdata('user_id');
		$user = $this->User_model->get_info($user_id);
		if (!$user) {
			redirect();
		}
		$this->data['user'] = $user;
		//lay danh sách slide
		$this->load->model('slide_model');
		$this->data['slide_list'] = $this->slide_model->get_list();
		//lay danh sách sản phẩm đã sở hữu
		$this->load->model('product_model');
		$now = date("Y-m-d H:i:s");
		$now = strtotime($now);

		$input = array();
		$input['where'] = array('timeEnd <' => $now, 'owner_id =' => $user_id );
		$product_new = $this->product_model->get_list($input);
		$this->data['product_new'] = $product_new;
		//lấy danh sách các sản phẩm đang đấu giá
		$input2 = array();
		$input2['where'] = array('timeStart <' => $now, 'timeEnd >' => $now, 'owner_id =' => $user_id );
		$product_start = $this->product_model->get_list($input2);
		$this->data['product_start'] = $product_start;
		//load view
		$this->data['temp'] = 'site/user/cart';
		$this->load->view('site/layout', $this->data);
	}

	//dang ki thanh vien
	public function register() 
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Your name', 'trim|required|min_length[6]|max_length[40]');
			$this->form_validation->set_rules('email', 'Your email', 'trim|valid_email|required|min_length[6]|max_length[30]|callback_check_email_exist');	
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[16]');	
			$this->form_validation->set_rules('re_password', 'Repassword', 'matches[password]');
			$this->form_validation->set_rules('phone', 'Your phone', 'required');
			$this->form_validation->set_rules('address', 'Your address', 'required');
			


			if( $this->form_validation->run() ) {
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$data = array('name' => $name,
							'email' => $this->input->post('email'), 
							'phone' => $this->input->post('phone'),
							'address' => $this->input->post('address'),
							'password' => md5($password)
				);
				if ($this->User_model->create($data)){
					$this->data['message'] = "Dang ki thanh cong, xin moi dang nhap";
					$this->data['temp'] = 'site/user/login';
					$this->load->view('site/layout', $this->data);
				} 
			}
			}	
		//load view
		$this->data['temp'] = 'site/user/register';
		$this->load->view('site/layout', $this->data);
	}
	//dang nhập 
	public function login() 
	{
		//load support
		$this->load->library('form_validation');
		$this->load->helper('form');
		//xử lí đăng nhập
		if ($this->input->post()){
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');
			if($this->form_validation->run()){
				$user_id = $this->_get_user_id();
				$this->session->set_userdata('user_id', $user_id);
				redirect();
				
			} else {
				//neu dang nhap that baoi
			}
		}
		//load view
		$this->data['temp'] = 'site/user/login';
		$this->load->view('site/layout', $this->data);
	}

	public function addMoney() {
		if (!$this->session->userdata('user_id'))
		{
			redirect();
		}
		$user_id = $this->session->userdata('user_id');
				$user = $this->User_model->get_info($user_id);
				if (!$user) {
					redirect();
				}
		//load support
		$this->load->library('form_validation');
		$this->load->helper('form');
		if ($this->input->post()){
			$this->form_validation->set_rules('money', 'Số dư ', 'required');
			if($this->form_validation->run()){
				
				$money = $user->money + intval($this->input->post('money'));
				$data = array('money' => $money);
				if ($this->User_model->update($user_id, $data)){
					$this->data['message'] = "Cập nhật số dư thành công";
					redirect(site_url('user/'));
				} 


			} else {
				//neu that bai
			}
		}
		//load view
		$this->data['temp'] = 'site/user/addMoney';
		$this->load->view('site/layout', $this->data);
	}

	function check_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);

		$array = array(
			'email' => $email,
			'password' => $password
		);
		if($this->User_model->check_exists($array)){
			return true;
		} else {
			$this->form_validation->set_message(__FUNCTION__, "Không đăng nhập thành công");
			return false;
		}
	}

	function logout() 
	{
		$this->session->unset_userdata('user_id');
		redirect();
		
	}

	private function _get_user_id()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);

		$array = array(
			'email' => $email,
			'password' => $password
		);

		$user = $this->User_model->get_info_rule($array);
		return $user->id;
	}


}
?>