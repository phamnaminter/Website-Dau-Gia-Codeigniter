<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class slide extends MY_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('slide_model');
			$this->load->helper('date_helper');
			$this->load->helper('MY_date_helper');

		}

		public function index()
		{
		
		$total_rows = $this->slide_model->get_total();
		$this->data['total_rows'] = $total_rows;


		
		

		
		$message = $this->session->userdata('message');
		$this->data['message'] = $message;
		
		//lay danh muc san pham
		$this->load->model('slide_model');
		$input = array();
		$input["where"] = array("parent_id" => 0);
		
		//lay du lieu hiển thị
		$input =array();
		$input['where'] = array();
	
		

		//end
		
		$list = $this->slide_model->get_list($input);
		$this->data['list'] = $list;
		//pre($list);
		//load view 
		$this->data['temp'] = 'admin/slide/index';
		$this->load->view('admin/main', $this->data);	
		}

		public function add(){
		
		//form 
		$this->load->library('form_validation');
		$this->load->helper('form');

		if ($this->input->post()) {


			$this->form_validation->set_rules('name', 'Tên Slide ', 'required');
			
			
			//lay file anh
			


			
			if($this->form_validation->run()){

				$name = $this->input->post('name');
				
				$this->load->library('upload_library');
			$data_path = "./upload/slide";
			$upload_data = $this->upload_library->upload($data_path, 'image');
			$image_link = "";
			if (isset($upload_data['file_name'])) {

				$image_link = $upload_data['file_name'];
				
			}

				$data = array('name' => $name,	
							'image_link' => $image_link,
							'link' => $this->input->post('link'),
							'info' => $this->input->post('info'),
							'sort_order' => $this->input->post('sort_order')
				
				);

				
				if ($this->slide_model->create($data)){
					
					$array = array(
						'message' => 'Thêm Slide thành công'

					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/slide'),'refresh');
				} 
				
			}
			}	
		//load view
		$this->data['temp'] = 'admin/slide/add';
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
		$slide = $this->slide_model->get_info($id);

		if(!$slide) {
					$array = array(
						'message' => 'Slide này không tồn tại'
					);

					$this->session->set_userdata( $array );
					redirect(admin_url('/slide'),'refresh');
		} 

		$this->data['slide'] = $slide;


		if ($this->input->post()) {

			

			$this->form_validation->set_rules('name', 'Tên Slide', 'required');
			
			//lay file anh
			$this->load->library('upload_library');
			$data_path = "./upload/slide";
			$upload_data = $this->upload_library->upload($data_path, 'image');
			$image_link = "";
			if (isset($upload_data['file_name'])) {

				$image_link = $upload_data['file_name'];
				
			}
			


			
			if($this->form_validation->run()){


				$name = $this->input->post('name');


				$data = array('name' => $name,	
							
							'link' => $this->input->post('link'),
							'info' => $this->input->post('info'),
							'sort_order' => $this->input->post('sort_order')
				
				);


				if($image_link != '') {
					$data['image_link'] = $image_link;
				}

				


				if ($this->slide_model->update($slide->id, $data)) {
					
					$array = array (
						'message' => 'Sửa Slide thành công'
					);

					$this->session->set_userdata( $array );
					
				} else {
					$array = array (
						'message' => 'Không sửa Slide thành công, vui lòng thử lại'
					);
					$this->session->set_userdata( $array );
				}
				redirect(admin_url('/slide'),'refresh'); 
				
			}
			}	
		//load view
		$this->data['temp'] = 'admin/slide/edit';
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
			$slide = $this->slide_model->get_info($id);
			if(!$slide) {
				$array = array (
						'message' => 'Slide không tồn tại'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/slide'),'refresh'); 
				}

				$this->slide_model->delete($id);
				//xoa file ảnh của san
				if(file_exists('./upload/slide'.$slide->image_link)) {
					unlink('./upload/slide'.$slide->image_link);
				}

				
				$array = array (
						'message' => 'Xóa hoàn thành' 
					);
				$this->session->set_userdata( $array );	
					redirect(admin_url('/slide'),'refresh'); 		
		}
	
	}

	
	/* End of file product.php */
	/* Location: ./application/controllers/admin/product.php */