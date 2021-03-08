<style>
	#cart-contents {
		font-size: 15px;
		text-align: center;
	}
	#cart-contents td {
		padding: 10px;
		border: 1px solid #ccc
	}
	#cart-contents thead {
		
	}
</style>

<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Thông tin giỏ hàng (Có <?= $total_items ?> sản phẩm)</h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
		      	<?php if($total_items > 0): ?>
		      	<form method="post" action="<?= base_url('cart/update')?>">
                    	<table id="cart-contents">
                    		<thead>
	                    		<th>Sản phẩm</th>
	                    		<th>Giá bán</th>
	                    		<th>Số lượng</th>
	                    		<th>Tổng số</th>
	                    		<th>Xóa</th>
                    		</thead>
                    		<tbody>
                    			<?php $total_price = 0 ?>
                    			<?php foreach ($carts as $row):?>
                    				<?php $total_price += ($row['price'] * $row['qty'] ) ?>
                    				<tr>
                    				<td> <?= $row['name'] ?> </td>
                    				<td> <?= number_format($row['price']) ?> </td>
                    				<td> <input type="text" name="qty_<?= $row['id'] ?>" value="<?= $row['qty'] ?>"></td>
                    				<td> <?= number_format($row['subtotal']) ?> </td>
                    				<td> <a href="<?= base_url('cart/del/'.$row['id'])?>">Xóa</a></td>
                    				</tr>
                    			<?php endforeach;?>
                    			<tr>
                    				<td colspan="5">Tổng số tiền cần thanh toán là: <b style="color:red"><?= number_format($total_price) ?></b>
                                    - <a href="<?= base_url('cart/del/0')?>" style="color: blue"> <i>Xóa toàn bộ </i> </a>
                                </td>	
                    			</tr>
                    			<tr></tr>
                    			<tr><td colspan="5"><button type="submit">Cập nhật</button></td></tr>
                    		</tbody>
						</table>
				</form>
				<?php else: ?>
					<h3>Không có sản phẩm nào trong giỏ hàng</h3>
				<?php endif; ?>
                             
               
		            <div class='clear'></div>
		      </div><!-- End box-content-center -->
</div>	<!-- End box-center product-->	