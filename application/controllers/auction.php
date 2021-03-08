<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auction extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('product_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		//load view
		//$this->data['temp'] = 'site/auction/index';
		//$this->load->view('site/layout', $this->data);
	}

	public function new()
	{
		$price = $this->input->post('price');
		$price = intval($price);
		$id = $this->uri->rsegment(3);
		$product = $this->product_model->get_info($id);
		//kiem tra san pham co ton tai
		if (!$product)
		{
			redirect();
		}
		//kiem tra xem user da dang nhap chua
		if (!$this->session->userdata('user_id'))
		{
			redirect();
		}
		$user_id = $this->session->userdata('user_id');
		$user = $this->User_model->get_info($user_id);
		if (!$product) {
			//redirect(site_url('product/view/'.$product->id),'refresh');
			redirect();
		}
		$moneyUser = $user->money;
		$avaiableMoney = $user->avaiableMoney;
		$max = $product->price;
		$discount = $product->discount;
		$timeStart = $product->timeStart;
		$timeEnd = $product->timeEnd;
		$maxMoney = $product->maxMoney;
		$now = strtotime(date("Y-m-d H:i:s"));
			
		//Kiem tra xem mon hang co dang dau gia
		if ($now < $timeStart || $now > $timeEnd) {
			$array = array(
						'message' => 'Sản phẩm không trong thời gian đấu giá, vui lòng kiểm tra lại '
					);
			$this->session->set_userdata( $array );
			redirect(site_url('product/view/'.$product->id),'refresh');
		} else if ($moneyUser < $price ) {
			$array = array(
						'message' => 'Số dư của bạn không đủ vui lòng kiểm tra lại tài khoản '
					);
			$this->session->set_userdata( $array );
			redirect(site_url('product/view/'.$product->id),'refresh');
		} else if ($maxMoney == 0 && $price < $max) {
			$array = array(
						'message' => 'Giá bạn đặt thấp hơn giá khởi điểm vui lòng kiểm tra lại '
					);
			$this->session->set_userdata( $array );
			redirect(site_url('product/view/'.$product->id),'refresh');
		} else if ($maxMoney > 0 && $price < $maxMoney + $discount  ) {
			$array = array(
						'message' => 'Giá bạn đặt phải cao hơn giá cao nhất hiện tại tối thiểu '.$discount
					);
			$this->session->set_userdata( $array );
			redirect(site_url('product/view/'.$product->id),'refresh');
		} else {
			//cap nhat so du moi
			$newMoneyUser = $moneyUser - $price;
			$newAvaiableMoney = $avaiableMoney + $price;
			$data = array(
				'money' => $newMoneyUser,
				'avaiableMoney' => $newAvaiableMoney
				);
			if ($this->User_model->update($user_id, $data)) {
				//kiem tra xem hien tai co ai dau gia chua
				if ($maxMoney != 0) {
					$currentOwnerId = $product->owner_id;
					$currentMaxMoney = $maxMoney;
					//tra tien cho nguoi truoc do
					$currentUser = $this->User_model->get_info($currentOwnerId);
					$newCurrentMoneyUser = $currentUser->money + $currentMaxMoney;
					$newCurrentAvaiableMoney = $currentUser->avaiableMoney - $currentMaxMoney;
					$data = array(
							'money' => $newCurrentMoneyUser,
							'avaiableMoney' => $newCurrentAvaiableMoney
							);
					if ($this->User_model->update($currentOwnerId, $data)) {
							//PASS
						}

					
				} 
				$data = array(
						'maxMoney' => $price,
						'owner_id' => $user_id
					);
					if ($this->product_model->update($id, $data)) {
						$array = array(
						'message' => 'ĐẶT GIÁ THÀNH CÔNG '
						);
					//Cộng thêm 5p cho thời gian đấu giá
					if ($timeEnd - $now <= 300) {
						$timeEnd = $timeEnd + 300;
						$data =array('timeEnd' => $timeEnd);
						$this->product_model->update($product->id, $data);
					}
					$this->session->set_userdata( $array );
					redirect(site_url('product/view/'.$product->id),'refresh');
					}
			}
		}
		
		//load view
		$array = array(
						'message' => 'Có lỗi xảy ra '
					);
			$this->session->set_userdata( $array );
		redirect(site_url('product/view/'.$product->id),'refresh');
	}

}

/* End of file auction.php */
/* Location: ./application/controllers/auction.php */