<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class News extends MY_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('news_model');
			$this->load->helper('date_helper');
			$this->load->helper('MY_date_helper');

		}

		public function index()
		{
		$this->load->library('pagination');
		
		$total_rows = $this->news_model->get_total();
		$this->data['total_rows'] = $total_rows;

		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = admin_url('news/index');
		$config['per-page'] = 100;
		$config['uri_segment'] = 4;
		$config['next_link'] = 'Next Page';
		$config['prev_link'] = 'Prev Page';
		$this->pagination->initialize($config);

		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		

		
		$message = $this->session->userdata('message');
		$this->data['message'] = $message;
		
		//lay danh muc san pham
		$this->load->model('news_model');
		$input = array();
		$input["where"] = array("parent_id" => 0);
		
		//lay du lieu hiển thị
		$input =array();
		$input['where'] = array();
		//lọc dữ liệu
		$id = $this->input->get('id');
		if (intval($id) > 0) {
			$input['where']['id'] = $id;
		}

		$name = $this->input->get('title');
		if ($name) {
			$input['like'] = array("title" , $name);
		}

		

		//end
		$input['limit'] = array($config['per-page'], $segment);
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;
		//pre($list);
		//load view 
		$this->data['temp'] = 'admin/news/index';
		$this->load->view('admin/main', $this->data);	
		}

		public function add(){
		
		//form 
		$this->load->library('form_validation');
		$this->load->helper('form');

		if ($this->input->post()) {


			$this->form_validation->set_rules('title', 'Tên tiêu đề', 'required');
			$this->form_validation->set_rules('content', 'Nội dung ', 'required');
			
			//lay file anh
			


			
			if($this->form_validation->run()){

				$title = $this->input->post('title');
				
				$this->load->library('upload_library');
			$data_path = "./upload/news";
			$upload_data = $this->upload_library->upload($data_path, 'image');
			$image_link = "";
			if (isset($upload_data['file_name'])) {

				$image_link = $upload_data['file_name'];
				
			}

				$data = array('title' => $title,	
							'image_link' => $image_link,
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_key' => $this->input->post('meta_key'),
							'content' => $this->input->post('content'),
							'created' => now()
				
				);

				
				if ($this->news_model->create($data)){
					
					$array = array(
						'message' => 'Thêm danh mục thành công'

					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/news'),'refresh');
				} 
				pre("BBB");
			}
			}	
		//load view
		$this->data['temp'] = 'admin/news/add';
		$this->load->view('admin/main', $this->data);

		}

		//sửa mặt hàng
		public function edit(){
		
		//form 
		$this->load->library('form_validation');
		$this->load->helper('form');
		//lay id sản phẩm muốn edit
		$id = $this->uri->rsegment(3);
		$this->data['id'] = $id;
		$news = $this->news_model->get_info($id);

		if(!$news) {
					$array = array(
						'message' => 'Tin tức này không tồn tại'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/product'),'refresh');
		} 

		$this->data['news'] = $news;


		if ($this->input->post()) {

			

			$this->form_validation->set_rules('title', 'Tên tiêu đề', 'required');
			$this->form_validation->set_rules('content', 'Nội dung ', 'required');
			//lay file anh
			$this->load->library('upload_library');
			$data_path = "./upload/news";
			$upload_data = $this->upload_library->upload($data_path, 'image');
			$image_link = "";
			if (isset($upload_data['file_name'])) {

				$image_link = $upload_data['file_name'];
				
			}
			


			
			if($this->form_validation->run()){


				$title = $this->input->post('title');


				$data = array('title' => $title,	
							'image_link' => $image_link,
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_key' => $this->input->post('meta_key'),
							'content' => $this->input->post('content'),
							'created' => now()
				
				);

				if($image_link != '') {
					$data['image_link'] = $image_link;
				}

				


				if ($this->news_model->update($news->id, $data)) {
					
					$array = array (
						'message' => 'Sửa tin tức thành công'
					);

					$this->session->set_userdata( $array );
					
				} else {
					$array = array (
						'message' => 'Không sửa tin tức thành công, vui lòng thử lại'
					);
					$this->session->set_userdata( $array );
				}
				redirect(admin_url('/news'),'refresh'); 
				
			}
			}	
		//load view
		$this->data['temp'] = 'admin/news/edit';
		$this->load->view('admin/main', $this->data);

		}

		//ham xoa
		public function delete(){
			$id = $this->uri->rsegment(3);
			$this->_delete($id);
		}

		public function delete_all ()
		{
			$ids = $this->input->post('ids');
			pre($ids);
			foreach ($ids as $id) {
				$this->_delete($id);
			}

		}

		private function _delete($id)
		{
			$news = $this->news_model->get_info($id);
			if(!$news) {
				$array = array (
						'message' => 'Tin tức không tồn tại'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/news'),'refresh'); 
				}

				$this->news_model->delete($id);
				//xoa file ảnh của san
				if(file_exists('./upload/news'.$news->image_link)) {
					unlink('./upload/news'.$news->image_link);
				}

				
				$array = array (
						'message' => 'Xóa hoàn thành' 
					);
				$this->session->set_userdata( $array );	
					redirect(admin_url('/news'),'refresh'); 		
		}
	
	}

	
	/* End of file product.php */
	/* Location: ./application/controllers/admin/product.php */