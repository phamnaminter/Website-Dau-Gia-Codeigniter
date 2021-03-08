<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		//lay danh sách slide
		$this->load->model('slide_model');
		$this->data['slide_list'] = $this->slide_model->get_list();
		//lay danh sách sản phẩm mới (3 sản phẩm)
		$this->load->model('product_model');
		
		$input = array();
		//$input['limit'] = array(7, 0); 
		$product_new = $this->product_model->get_list($input);
		$this->data['product_new'] = $product_new;

		$now = date("Y-m-d H:i:s");
		$now = strtotime($now);
		$input2 = array();
		$input2['where'] = array('timeStart >' => $now );
		$product_start = $this->product_model->get_list($input2);
		$this->data['product_start'] = $product_start;

		//master layout
		$this->data['temp'] = 'site/home/index';
		//load view
		$this->load->view('site/layout', $this->data);
	}

}

/* End of file Home */
/* Location: ./application/controllers/Home */
?>