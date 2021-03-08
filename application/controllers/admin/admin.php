<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		
	}

	public function index()
	{	
			$input = array();
			$list_admin = $this->Admin_model->get_list($input);	
			$count_admin = $this->Admin_model->get_total();		
			$this->data['temp'] = 'admin/admin/index';
			$this->data['total'] = $count_admin;
			$this->data['list'] = $list_admin;
			$this->load->view('admin/main', $this->data); 	
	}	

	function check_username_exist(){
		$username = $this->input->post('username');
		$where = array('username' => $username);

		if($this->Admin_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
			return false;
		} else {
			return true;
		}
	}

	public function add(){
		$this->load->library('form_validation');
		$this->load->helper('form');

		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Your name', 'trim|required|min_length[6]|max_length[40]');
			$this->form_validation->set_rules('username', 'Your username', 'trim|required|min_length[6]|max_length[30]|callback_check_username_exist');	
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[16]');	
			$this->form_validation->set_rules('re_password', 'Repassword', 'matches[password]');
			
			if( $this->form_validation->run() ) {
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data = array('name' => $name,
							'username' => $username, 
							'password' => md5($password)
				);
				if ($this->Admin_model->create($data)){
					$array = array(
						'message' => 'Thêm quản trị viên thành công'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/admin'),'refresh');
				} 
			}
			}	

		$this->data['temp'] = 'admin/admin/add';
		$this->load->view('admin/main',$this->data);
	

}
	function edit(){
		$id = $this->uri->segment(4);
		$id = intval($id);

		$info = $this->Admin_model->get_info($id);
		
		if(!$info){
			$array = array(
				'message' => 'Không tồn tại quản trị viên này'
			);
			
			$this->session->set_userdata( $array );
			redirect(admin_url('/admin'));
		}

		$this->load->library('form_validation');
		$this->load->helper('form');


		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Your name', 'trim|required|min_length[6]|max_length[40]');
			$this->form_validation->set_rules('username', 'Your username','trim|required|min_length[6]|max_length[30]');
			
			if($this->input->post('password')){	
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[16]');	
			$this->form_validation->set_rules('re_password', 'Repassword', 'matches[password]');
			}

			if( $this->form_validation->run() ) {
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				
				$data = array('name' => $name,
							'username' => $username,
				);
				if($this->input->post('password')){
					$data['password'] = md5($this->input->post('password'));
				}
				if ($this->Admin_model->update($id, $data)){
					$this->session->set_userdata( 'message', 'Cập nhật dử liệu thành công' );
				} else {
					$this->session->set_userdata( 'message', 'Cập nhật dử liệu thất bại, xin hãy thử lại' );
				}
				redirect(admin_url('/admin'),'refresh'); 
			}
			}	

		$this->data['info'] = $info;
		$this->data['temp'] = 'admin/admin/edit';
		$this->load->view('admin/main',$this->data);


	}
		function delete(){
			$id = $this->uri->segment(4);
			$id = intval($id);
			if(!$this->Admin_model->get_info($id)){
				$this->session->set_userdata('message', 'Không tìm thấy thông tin quản trị viên này');
			} else {
				if($this->Admin_model->delete($id)){
					$this->session->set_userdata('message', 'Xóa thành công');
				} else {
					$this->session->set_userdata('message', 'Có lỗi xảy ra, vui lòng thử lại');
				}
			}
			redirect(admin_url('/admin'),'refresh');
		}

		function logout(){
			$this->session->unset_userdata('admin');
			redirect(admin_url('/login'),'refresh');
		}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */