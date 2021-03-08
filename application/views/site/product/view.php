 <div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Chi tiết sản phẩm</h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
		           <div class='product_view_img'>
		                <a href="<?= base_url('upload/product/'.$product->image_link) ?>" class="jqzoom" rel='gal1'  title="triumph" >
				            <img  src="<?= base_url('upload/product/'.$product->image_link) ?>" alt='Tivi LG 520' style="width:280px !important">
				        </a>
				         <div class='clear' style='height:10px'></div>
				         <div class="clearfix" >
							<ul id="thumblist" >
							    <li>
							    <a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?= base_url('upload/product/'.$product->image_link) ?>',largeimage: '<?= base_url('upload/product/'.$product->image_link) ?>'}">
							    
							    </a>
							    </li>
							    							</ul>
						</div>
		           </div>
		           
		           <div class='product_view_content'>
		               <h1><?= $product->name ?></h1>
		               
		               <p class='option '>
		                  Giá khởi điểm: <b><?= number_format(intval($product->price)) ?></b> 
		               </p>
		               <p class='option '>
		                  Chênh lệch tối thiểu mỗi lần đặt lệnh: <b><?= number_format(intval($product->discount)) ?></b> 
		               </p>
		               
		                <p class='option'>
		                  Danh mục: 
		                  <a href="http://localhost/webphp/danh-muc-LG/15.html" title="LG">
		                     <b><?= $catalog->name ?></b>    
		                  </a>
		               </p>
		               
		               <p class='option'>
		                  Lượt xem: <b><?= $product->view ?></b> 
		               </p>
		               		               <p class='option'>
		                  Bảo hành: <b><?= $product->warranty ? $product->warranty : "Không bảo hành" ?></b> 
		               </p>
		               		               		               <p class='option'>
		                  Tặng quà: <b><?= $product->gifts ? $product->gifts : "Không có quà tặng" ?></b> 
		               </p>

		                <p class='option'>
		                  Thời gian bắt đầu đấu giá: <b><?=  date("Y-m-d H:i:s",$product->timeStart) ?></b> 
		               </p>
		               <p class='option'>
		                  Thời gian kết thúc đấu giá: <b><?=  date("Y-m-d H:i:s",$product->timeEnd) ?></b> 
		               </p>
		                <p class='option'>
		                  Giá cao nhất hiện tại : <b><?= number_format($product->maxMoney) ? '<center><h2 style = "color: blue">'.number_format($product->maxMoney).'</h2></center>' : "Chưa có ai tham gia đấu giá sản phẩm này" ?></b> 
		               </p>
		                <p class='option'>
		                  <p style="color: red">Chú ý: Trong thời gian 5 phút cuối đấu giá nếu có thành viên đặt giá, thời gian đấu giá sẽ tự động cộng thêm 5 phút. Không giới hạn số lần cộng cho đến khi tìm được người chiến thắng</p> 
		               </p>
		                <p class='option'>
		                  <p style="color: blue; font-size: 16px">
		                	<?= isset($_SESSION['message']) ? $_SESSION['message'] : "" ?>
		                	<?php unset($_SESSION['message']) ?>
		                  </p> 
		               </p>
		               	<?php 
		               		$now = date("Y-m-d H:i:s");
							$now = strtotime($now);
		               	?>

		               	<?php if ($now >= $product->timeStart && $now <= $product->timeEnd):?>
		               		<form method="post" action="<?=site_url('auction/new/'.$product->id)?>">
		               			<div class='action'>
				            <input type="" name="price" class='button' placeholder="Nhập giá " style='float:left;padding:8px 15px;font-size:16px' >
				            <div class='clear'></div>
			            </div>	               
		            
		               <div class='action'>
				            <input type="submit" name="" class='button' style='float:left;padding:8px 15px;font-size:16px ; background-color:red; width: 260px' href="<?= base_url('cart/add/'.$product->id) ?>" title='Mua ngay' value ="<?php if (!$user_id || $product->owner_id == 0) {
				            		echo("ĐẤU GIÁ NGAY");
				            	} else {
				            		echo($product->owner_id == $user_id ? 'BẠN ĐANG ĐẶT GIÁ CAO NHẤT' : 'ĐẤU GIÁ NGAY');
				            	}
				            	?>
				             " >
				            <div class='clear'></div>
			            </div>
		               		</form>
			            <?php elseif ($now < $product->timeStart): ?>
			             	<div class='action'>
				            <a class='button' style='float:left;padding:8px 15px;font-size:16px ' href="" title='Mua ngay'>ĐẤU GIÁ CHƯA BẮT ĐẦU</a>
				            <div class='clear'></div>
			            </div>
			            <?php else: ?>
			            	<div class='action'>
				            <a class='' style='float:left;padding:8px 15px;font-size:16px;background-color: red' href="" title='Mua ngay'>ĐẤU GIÁ ĐÃ KẾT THÚC <?= $product->maxMoney > 0 ? "với mức giá: ".number_format($product->maxMoney) : "mà không ai đặt hàng" ?></a>
				            <div class='clear'></div>
			            </div>
			        <?php endif ?>

			           
		            
		           </div>
		           <div class='clear' style='height:15px'></div>
		           <center>
  <!-- AddThis Button BEGIN -->

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<span class='st_facebook_hcount' displayText='Facebook'></span>
<span class='st_fblike_hcount' displayText='Facebook Like'></span>
<span class='st_googleplus_hcount' displayText='Google +'></span>
<span class='st_twitter_hcount' displayText='Tweet'></span>
<!-- AddThis Button END -->
</center>  
		            <div class='clear' style='height:10px'></div>
		            <table width="100%" cellspacing="0" cellpadding="3" border="0" class="tbsicons">
					           <tbody>
					           <tr>
					                    <td width="25%"><img alt="Phục vụ chu đáo" src="<?= public_url('site/')?>images/icon-services.png"> <div>Phục vụ chu đáo</div></td>
					                    <td width="25%"><img alt="Giao hàng đúng hẹn" src="<?= public_url('site/')?>images/icon-shipping.png"><div>Giao hàng đúng hẹn</div></td>
					                    <td width="25%"><img alt="Đổi hàng trong 24h" src="<?= public_url('site/')?>images/icon-delivery.png"> <div>Đổi hàng trong 24h</div></td>
					           </tr>
					          </tbody>
					</table>
		      </div>
</div>