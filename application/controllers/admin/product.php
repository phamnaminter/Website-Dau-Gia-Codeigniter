<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Product extends MY_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('product_model');
			$this->load->helper('date_helper');
			$this->load->helper('MY_date_helper');

		}

		public function index()
		{
		$this->load->library('pagination');
		
		$total_rows = $this->product_model->get_total();
		$this->data['total_rows'] = $total_rows;

		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = admin_url('/product/index');
		$config['per-page'] = 100;
		$config['uri_segment'] = 4;
		$config['next_link'] = 'Next Page';
		$config['prev_link'] = 'Prev Page';
		$this->pagination->initialize($config);

		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		

		$now = strtotime(date("Y-m-d H:i:s"));
		$this->data['now'] = $now;
		$message = $this->session->userdata('message');
		$this->data['message'] = $message;
		
		//lay danh muc san pham
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
		
		//lay du lieu hiển thị
		$input =array();
		$input['where'] = array();
		//lọc dữ liệu
		$id = $this->input->get('id');
		if (intval($id) > 0) {
			$input['where']['id'] = $id;
		}

		$name = $this->input->get('name');
		if ($name) {
			$input['like'] = array("name" , $name);
		}
		
		$catalog_id = $this->input->get('catalog');
		if (intval($catalog_id) > 0) {
			$input['where']['catalog_id'] = $catalog_id;
		}

		//end
		$input['limit'] = array($config['per-page'], $segment);
		$list = $this->product_model->get_list($input);
		$i =0;
		foreach ($list as $product) {
			if ($product->timeEnd < $now && $product->maxMoney > 0) {
				unset($list[$i]);
			}
			$i = $i+1;
		}
		$this->data['list'] = $list;
		//pre($list);
		//load view 
		$this->data['temp'] = 'admin/product/index';
		$this->load->view('admin/main', $this->data);	
		}

		public function add(){
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

		if ($this->input->post()) {

			$this->form_validation->set_rules('timeStart', 'Thời gian bắt đầu', 'callback_check_time_start');
			$this->form_validation->set_rules('timeEnd', 'Thời gian kết thúc', 'callback_check_time_end');
			$this->form_validation->set_rules('name', 'Tên danh mục', 'required');
			$this->form_validation->set_rules('catalog_id', 'Loại', 'required');
			$this->form_validation->set_rules('price', 'Giá', 'required');
			//lay file anh
			$this->load->library('upload_library');
			$data_path = "./upload/product";
			$upload_data = $this->upload_library->upload($data_path, 'image');
			$image_link = "";
			if (isset($upload_data['file_name'])) {

				$image_link = $upload_data['file_name'];
				
			}
			//upload cac anh kem theo
			$image_list = array();
			$data_path = "./upload/product";
			$image_list = $this->upload_library->upload_file($data_path, 'image_list');
			$image_list = json_encode($image_list);


			
			if($this->form_validation->run()){
				//pre("START ADD");
				$name = $this->input->post('name');
				$catalog = $this->input->post('catalog_id');
				$price = $this->input->post('price');
				$discount = $this->input->post('discount');
				$price = str_replace(",", "", $price);
				$discount = str_replace(",", "", $discount);
				$timeStart = $this->input->post('timeStart');
				$timeEnd = $this->input->post('timeEnd');
				$timeEnd = strtotime($timeEnd);
				$timeStart = strtotime($timeStart);
				

				$data = array('name' => $name,
							'catalog_id' => $catalog, 
							'price' => $price,
							'image_link' => $image_link,
							'image_list' => $image_list,
							'discount' => $discount,
							'warranty' => $this->input->post('warranty'),
							'gifts' => $this->input->post('gifts'),
							'site_title' => $this->input->post('site_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_key' => $this->input->post('meta_key'),
							'content' => $this->input->post('content'),
							'timeStart' => $timeStart,
							'timeEnd' => $timeEnd,
							'created' => now()
				
				);

				if ($this->product_model->create($data)){
					
					$array = array(
						'message' => 'Thêm danh mục thành công'

					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/product'),'refresh');
				} 
				pre("BBB");
			}
			}	
		//load view
		$this->data['temp'] = 'admin/product/add';
		$this->load->view('admin/main', $this->data);

		}
		//funcion check form
		function check_time_start(){
		$timeStart = $this->input->post('timeStart');
		if(strtotime($timeStart) && strtotime($timeStart) >= strtotime(date("Y-m-d H:i:s")))
		{
			return true;
		}
		else if (strtotime($timeStart) && strtotime($timeStart) <= strtotime(date("Y-m-d H:i:s"))) {
			$this->form_validation->set_message(__FUNCTION__, "Thời gian bắt đầu đấu giá đã nhỏ hơn thời gian hiện tại");
			return false;
		} else {
			$this->form_validation->set_message(__FUNCTION__, "Thời gian không hợp lệ, vui lòng điền đúng định dạng");
			return false;
		}
	}
		function check_time_end(){
		$timeStart = $this->input->post('timeStart');
		$timeEnd = $this->input->post('timeEnd');
		if(strtotime($timeEnd) && strtotime($timeStart) < strtotime($timeEnd))
		{
			return true;
		}
		else if (strtotime($timeEnd) && strtotime($timeStart) >= strtotime($timeEnd)) {
			$this->form_validation->set_message(__FUNCTION__, "Thời gian kết thúc đấu giá phải lớn hơn thời gian bắt đầu");
			return false;
		} else {
			$this->form_validation->set_message(__FUNCTION__, "Thời gian không hợp lệ, vui lòng điền đúng định dạng");
			return false;
		}
	}
		//sửa mặt hàng
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
					redirect(admin_url('/product'),'refresh');
		} 
		//neu san pham dang dau gia thi khong the edit
		$now = strtotime(date("Y-m-d H:i:s"));
		if ($now >= $product->timeStart && $now <= $product->timeEnd) {
			$array = array(
						'message' => 'Chỉ có thể chỉnh sửa sản phẩm ngoài thời gian đấu giá'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/product'),'refresh');
		}

		if ($now > $product->timeEnd && $product->maxMoney > 0) {
			$array = array(
						'message' => 'Sản phẩm này đã có người chiến thắng vui lòng kiểm tra qua phần đơn hàng'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/product'),'refresh');
		}
		$this->data['product'] = $product;


		if ($this->input->post()) {
			

			$this->form_validation->set_rules('name', 'Tên danh mục', 'required');
			$this->form_validation->set_rules('catalog_id', 'Loại', 'required');
			$this->form_validation->set_rules('price', 'Giá', 'required');
			//lay file anh
			$this->load->library('upload_library');
			$data_path = "./upload/product";
			$upload_data = $this->upload_library->upload($data_path, 'image');
			$image_link = "";
			if (isset($upload_data['file_name'])) {

				$image_link = $upload_data['file_name'];
				
			}
			//upload cac anh kem theo
			$image_list = array();
			$data_path = "./upload/product";
			$image_list = $this->upload_library->upload_file($data_path, 'image_list');
			$image_list_json = json_encode($image_list);


			
			if($this->form_validation->run()){

				$name = $this->input->post('name');
				$catalog = $this->input->post('catalog_id');
				$price = $this->input->post('price');
				$price = str_replace(",", "", $price);
				$discount = $this->input->post('discount');
				$discount = str_replace(",", "", $discount);
				$timeStart = $this->input->post('timeStart');
				$timeEnd = $this->input->post('timeEnd');
				$timeEnd = strtotime($timeEnd);
				$timeStart = strtotime($timeStart);


				$data = array('name' => $name,
							'catalog_id' => $catalog, 
							'price' => $price,
							'discount' => $discount,
							'warranty' => $this->input->post('warranty'),
							'gifts' => $this->input->post('gifts'),
							'site_title' => $this->input->post('site_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_key' => $this->input->post('meta_key'),
							'timeStart' => $timeStart,
							'timeEnd' => $timeEnd,
							'content' => $this->input->post('content')
				
				);

				if($image_link != '') {
					$data['image_link'] = $image_link;
				}

				if(!empty($image_list)) {
					$data['image_list'] = $image_list_json;
				}


				if ($this->product_model->update($product->id, $data)) {
					
					$array = array (
						'message' => 'Sửa danh mục thành công'
					);

					$this->session->set_userdata( $array );
					
				} else {
					$array = array (
						'message' => 'Không sửa danh mục thành công, vui lòng thử lại'
					);
					$this->session->set_userdata( $array );
				}
				redirect(admin_url('/product'),'refresh'); 
				
			}
			}	
		//load view
		$this->data['temp'] = 'admin/product/edit';
		$this->load->view('admin/main', $this->data);

		}

		//ham xoa
		public function delete(){
			$id = $this->uri->rsegment(3);
			$this->data['id'] = $id;
			$product = $this->product_model->get_info($id);
			if(!$product) {
					$array = array(
						'message' => 'Sản phẩm không tồn tại'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/product'),'refresh');
		} 
			//neu san pham dang dau gia thi khong the edit
			$now = strtotime(date("Y-m-d H:i:s"));
			if ($now >= $product->timeStart && $now <= $product->timeEnd) {
					$array = array(
						'message' => 'Chỉ có thể xóa sản phẩm ngoài thời gian đấu giá'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/product'),'refresh');
		}
			if ($now > $product->timeEnd && $product->maxMoney > 0) {
			$array = array(
						'message' => 'Sản phẩm này đã có người chiến thắng vui lòng kiểm tra qua phần đơn hàng'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/product'),'refresh');
			}	
			
			$this->_delete($id);
		}

		public function delete_all ()
		{
			//$ids = $this->input->post('ids');
			//pre($ids);
			//foreach ($ids as $id) {
			//	$this->_delete($id);
			//}

		}

		private function _delete($id)
		{
			$product = $this->product_model->get_info($id);
			if(!$product) {
				$array = array (
						'message' => 'Sản phẩm không tồn tại'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/product'),'refresh'); 
				}

				$this->product_model->delete($id);
				//xoa file ảnh của san
				if(file_exists('./upload/product'.$product->image_link)) {
					unlink('./upload/product'.$product->image_link);
				}

				$image_list = json_decode($product->image_list);
				if (is_array($image_list)) {
					foreach ($image_list as $img) {
						if(file_exists('./upload/product'.$product->img)) 
						{

						unlink('./upload/product'.$product->img);
						}
					}
				}	
				$array = array (
						'message' => 'Xóa hoàn thành' 
					);
				$this->session->set_userdata( $array );	
					redirect(admin_url('/product'),'refresh'); 		
		}
	
	}

	
	/* End of file product.php */
	/* Location: ./application/controllers/admin/product.php */