<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->helper('date_helper');
		$this->load->helper('MY_date_helper');
		$this->load->model('User_model');

	}

	public function index()
	{

		$now = date("Y-m-d H:i:s");
		$now = strtotime($now);
		$input = array();
		echo($now); 
		$input['where'] = array(
			'timeEnd <' => $now,
			'maxMoney >' => 0 
		 );
		//$input['where'] = array('maxMoney >' => 0 );

		$list = $this->product_model->get_list($input);
		//pre($list);
		foreach ($list as $product) {
			$user = $this->User_model->get_info($product->owner_id);
			//pre($user);
			$product->owner_name = $user->name;
		}
		
		$this->data['list'] = $list;
				
		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/main', $this->data);

		
	}

		public function edit(){

		//lấy dữ liệu danh mục
		$this->load->model('catalog_model');
		$input = array();
		$input["where"] = array("parent_id" => 0);
		$catalogs = $this->catalog_model->get_list($input); 
		foreach ($catalogs as $row) {
			$input = array();
			$input["where"] = array("parent_id" => $row->id);
			$sub = $this->catalog_model->get_list($input);
			$row->subs =  $sub;
		}
		$this->data["catalogs"] = $catalogs;
		//form 
		$this->load->library('form_validation');
		$this->load->helper('form');
		//lay id sản phẩm muốn edit
		$id = $this->uri->rsegment(3);
		$this->data['id'] = $id;
		$product = $this->product_model->get_info($id);
		if(!$product) {
					$array = array(
						'message' => 'Sản phẩm không tồn tại'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/home'),'refresh');
		} 
		//kiem tra don hang
		$now = strtotime(date("Y-m-d H:i:s"));
		if ($now <= $product->timeEnd || $product->maxMoney <= 0) {
			$array = array(
						'message' => 'Đơn hàng không hợp lệ'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/home'),'refresh');
		}
		$user = $this->User_model->get_info($product->owner_id);
		$this->data['user'] = $user;
		//pre($user);
		$this->data['product'] = $product;

		//load view
		$this->data['temp'] = 'admin/home/edit';
		$this->load->view('admin/main', $this->data);

		}

		public function changeStatus() {
		$id = $this->uri->rsegment(3);
		$this->data['id'] = $id;
		$product = $this->product_model->get_info($id);
		if(!$product) {
					$array = array(
						'message' => 'Sản phẩm không tồn tại'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/home'),'refresh');
		} 
		//kiem tra don hang
		$now = strtotime(date("Y-m-d H:i:s"));
		if ($now <= $product->timeEnd || $product->maxMoney <= 0) {
			$array = array(
						'message' => 'Đơn hàng không hợp lệ'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/home'),'refresh');
		}
		$product = $this->product_model->get_info($id);
		if ($product->status == 0) {
			$new = 1;
		} else {
			$new =0;
		}
		$data  = array('status' => $new);
		if($this->product_model->update($id, $data)) {
			$array = array(
						'message' => 'Thay đổi trạng thái giao hàng thành công'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/home'),'refresh');
			}
		}
	public function upgrade() {
		//load view
		$this->data['temp'] = 'admin/home/upgrade';
		$this->load->view('admin/main', $this->data);
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */