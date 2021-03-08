<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('catalog_model');
	}

	public function index()
	{
		//lay danh sach cac san pham 
		$list = $this->catalog_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->userdata('message');
		$this->data['message'] = $message;

		//load view 
		$this->data['temp'] = 'admin/catalog/index';
		$this->load->view('admin/main', $this->data);
	}

		public function add(){
		//load cac thu vein va helper
		$this->load->library('form_validation');
		$this->load->helper('form');

		if ($this->input->post()) {

			$this->form_validation->set_rules('name', 'Tên danh mục', 'trim|required');
			
			
			if( $this->form_validation->run() ) {
				$name = $this->input->post('name');
				$sort_order = $this->input->post('sort_order');
				$parent_id = $this->input->post('parent_id');
				$data = array('name' => $name,
							'sort_order' => $sort_order, 
							'parent_id' => $parent_id
				);
				if ($this->catalog_model->create($data)){
					$array = array(
						'message' => 'Thêm danh mục thành công'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/catalog'),'refresh');
				} 
			}
			}	
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['temp'] = 'admin/catalog/add';
		$this->load->view('admin/main',$this->data);
	

}

		public function edit(){
		//load cac thu vein va helper
		$this->load->library('form_validation');
		$this->load->helper('form');

		$id = $this->uri->segment(4);
		$info = $this->catalog_model->get_info($id);
		
		if(!$info){
			$array = array(
						'message' => 'ID không tồn tại'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/catalog'),'refresh');
		}

		$this->data['info'] = $info;

		if ($this->input->post()) {

			$this->form_validation->set_rules('name', 'Tên danh mục', 'trim|required');
			
			
			if($this->form_validation->run()) {
				
				$name = $this->input->post('name');
				$sort_order = $this->input->post('sort_order');
				$parent_id = $this->input->post('parent_id');
				$data = array('name' => $name,
							'sort_order' => $sort_order, 
							'parent_id' => $parent_id
				);
				if ($this->catalog_model->update($id, $data)){
					$array = array(
						'message' => 'Cập nhật danh mục thành công'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/catalog'),'refresh');
				} 
			}
			}	
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['temp'] = 'admin/catalog/edit';
		$this->load->view('admin/main',$this->data);
	

}
		function delete(){
		$id = $this->uri->segment(4);
		$info = $this->catalog_model->get_info($id);
		
		if(!$info){
			$array = array(
						'message' => 'ID không tồn tại'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/catalog'),'refresh');
		}

		if($this->catalog_model->delete($id)){

		}	
			$array = array(
						'message' => 'Xóa thành công'
					);
					$this->session->set_userdata( $array );
					redirect(admin_url('/catalog'),'refresh');
		}

}

/* End of file Catalog.php */
/* Location: ./application/controllers/Catalog.php */