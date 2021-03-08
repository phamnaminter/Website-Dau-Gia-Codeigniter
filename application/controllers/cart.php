<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}

	public function add()
	{
		//load model
		$this->load->model('product_model');
		//get info
		$id = $this->uri->rsegment(3);
		$product = $this->product_model->get_info($id);
		if (!$product)
		{
			redirect();
		}
		//tong so san pham
		$qty = 1;
		//kiem tra gia khuyen mai
		$price = $product->price;
		if ($product->discount)
		{
			$price = $price - $product->discount;
		}
		//thong tin san pham
		$data = array();
		$data ['id'] = $id;
		$data['qty'] = $qty;
		$data['image_link'] = $product->image_link;
		$data['name'] = $product->name;
		$data['price'] = $price;
		//insert
		$this->cart->insert($data);
		// chuyen ve trang danh sach
		redirect(base_url('cart'));
	}

	function index() 
	{
		// lay thong tin co trong gio hang
		$carts = $this->cart->contents();
		$total_items = $this->cart->total_items();
		//gán dữ liệu
		$this->data['carts'] = $carts;
		$this->data['total_items'] = $total_items;
		//load view
		$this->data['temp'] = 'site/cart/index';
		$this->load->view('site/layout', $this->data);
	}

	/*
	* Update giỏ hàng	
	*/
	function update() 
	{
		$carts = $this->cart->contents();
		foreach ($carts as $key => $row) {
			$total_qty = $this->input->post('qty_'.$row['id']);
			$data['rowid'] = $key;
			$data['qty'] = $total_qty;
			$this->cart->update($data);
			// chuyen ve trang danh sach
			redirect(base_url('cart'));
		}
	}


	/*
	* Cập nhật giỏ hàng
	*/
	function del() 
	{
		$carts = $this->cart->contents();
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		if ($id > 0)
		{
			foreach ($carts as $key=> $row) {
				if ($id = $row['id'])
				{
					$data['rowid'] = $key;
					$data['qty'] = 0;
					$this->cart->update($data);
				}
			}
			} else 
			{
					$this->cart->destroy();
			}
			redirect(base_url('cart'));
		}
	

/* End of file Home */
/* Location: ./application/controllers/Home */
}

?>