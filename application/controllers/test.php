	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Test extends MY_Controller {
		
	function get_date ($time, $full_time=true) {

		$format = "%d-%m-%Y";

		if($full_time) 
		{
			$format = $format." %H:%i:%s";
		}

		$date = mdate($format, $time);
		return $date;
	}

	public function index()
		{
			//date_default_timezone_set("Asia/Ho_Chi_Minh");
			//echo(date("Y-m-d H:i:s"));
			$str = strtotime('2012-03-27 18:47:0');
			$str2 = strtotime('2012-03-27 18:48:00');
			echo $str;
			echo '<br>';
			echo $str2;
			if ($str2) {
				echo 'true';
			} else {
				echo 'false';
			}
		}
	
	}
	
	/* End of file test.php */
	/* Location: ./application/controllers/test.php */


<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Sản phẩm chuẩn bị đấu giá</h2></div>
            <div class="box-content-center product"><!-- The box-content-center -->
                  <?php foreach ($product_start as $product): ?>
                  <div class='product_item'>
                       <h3>
                         <a  href="<?= base_url('product/view/'.$product->id) ?>" title="Sản phẩm">
                         <?= $product->name ?>                       </a>
                     </h3>
                       <div class='product_img'>
                             <a  href="<?= base_url('product/view/'.$product->id) ?>" title="Sản phẩm">
                                <img src="<?= base_url()?>/upload/product/<?= $product->image_link ?>" alt=''/>
                            </a>
                       </div>
                       <p class='price'>
                       
                        <?= intval($product->price) ?>  
                      
                        </p>
                        <center>
                          <div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
                        </center>
                       <div class='action'>
                           <p style='float:left;margin-left:10px'>Lượt xem: <b> <?= $product->view ?> </b></p>
                         <a class='button' href="<?= base_url('product/view/'.$product->id) ?>" title='Mua ngay'>Mua ngay</a>
                         <div class='clear'></div>
                       </div>
                  </div>
                  <?php endforeach; ?>            
                             
               
                <div class='clear'></div>
          </div><!-- End box-content-center -->
</div>  <!-- End box-center product-->      