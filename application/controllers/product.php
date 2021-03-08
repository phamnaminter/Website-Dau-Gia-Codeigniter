<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
	}

	public function catalog(){
		$id = $this->uri->segment(3);
		$id = intval($id);
		$this->load->model('catalog_model');
		$catalog = $this->catalog_model->get_info($id);
		//gui catalog sang view
		$this->data['catalog'] = $catalog;
		if (!$catalog) 
			{
				redirect();
			}
		//lay san pham theo catalog
		$input = array();
		$input['where']  = array('catalog_id' => $id ); 
		$product_list = $this->product_model->get_list($input);
		$this->data['product_list'] = $product_list;
		$this->data['temp'] = 'site/product/catalog';
		$this->load->view('site/layout', $this->data);
	}

	public function view() {
		$id = $this->uri->segment(3);
		$id = intval($id);
		$product = $this->product_model->get_info($id);
		if (!$product) 
			{
				redirect();
			}
		$user_id = $this->session->userdata('user_id');
		$this->data['user_id'] = $user_id;
		$this->data['product'] = $product;
		//load catalog
		$this->load->model('catalog_model');
		$catalog = $this->catalog_model->get_info($product->catalog_id);
		$this->data['catalog'] = $catalog;
		//cập nhật lượt xem
		$data = array();
		$data['view'] = $product->view + 1;
		$this->product_model->update($product->id,$data); 
		//load view
		$this->data['temp'] = 'site/product/view';
		$this->load->view('site/layout', $this->data);
	}
	public function index()
	{
		pre("HELLO");
	}

	/*
	* Tìm kiếm sản phẩm
	*/
	public function search()
	{
		$data = array();
		$key = $this->input->get('key-search');
		
		$data['like'] = array('name', $key);
		$list = $this->product_model->get_list($data);
		//gán giá trị
		$this->data['list'] = $list;
		$this->data['key'] = $key;
		
		//load view
		$this->data['temp'] = 'site/product/search';
		$this->load->view('site/layout', $this->data);
	}

	/*
	* Tìm kiếm theo khoảng giá
	*/
	public function search_price()
	{
		$price_from = intval($this->input->post('price_from'));
		$price_to = intval($this->input->post('price_to'));
		$data['where'] = array('price >=' => $price_from, 'price <=' => $price_to);
		$list = $this->product_model->get_list($data);
		$this->data['list'] = $list;
		//load view
		
		$this->data['temp'] = 'site/product/search_price';
		$this->load->view('site/layout', $this->data);

	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */