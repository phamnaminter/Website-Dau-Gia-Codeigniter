<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('common');
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$this -> data = array();
		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin':
				$this->load->helper('admin');
				$this->check_login();
				break;
			
			default:
				// truy cap vao site
				//kiem tra dang nhập user
				if ($this->session->userdata('user_id'))
				{
					$user_id = $this->session->userdata('user_id');
					$this->load->model('User_model');
					$this->data['user_info'] = $this->User_model->get_info($user_id);
					//pre($this->User_model->get_info($user_id));

				}
				//lay danh mục sản phẩm
				$this->load->model('catalog_model');
				$input = array();
				$input['where'] = array('parent_id' => 0);
				$catalog_list = $this->catalog_model->get_list($input);
				$this->data['catalog_list'] = $catalog_list;
				foreach ($catalog_list as $item) {
					$input = array();
					$input['where'] = array('parent_id' => $item->id);
					$sub = $this->catalog_model->get_list($input);
					$item->subs = $sub; 
				}
				$this->data['catalog_list'] = $catalog_list;
				//lấy danh mục bài viết
				$this->load->model('news_model');
				$input =array();
				//$input['limit'] = array(0,5); ERROR
				$news_list = $this->news_model->get_list($input);
				$this->data['news_list'] = $news_list;
				break;
		}
		
	}

	private function check_login(){
		$controller = $this->uri->segment(2);
		$controller = strtolower($controller);
		$login = $this->session->userdata('admin');

		if(!$login && $controller != 'login'){
			redirect(admin_url('/login'),'refresh');
		} 

		if($login && $controller == 'login' ){
			redirect(admin_url('/home'),'refresh');
		}
	}
}

/* End of file MY_Common_Controller.php */
/* Location: ./application/controllers/MY_Common_Controller.php */