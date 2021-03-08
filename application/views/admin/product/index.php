<?php
	$this->load->view('admin/product/head', $this->data);

?>
<center><h2 style="color: red"><?= isset($_SESSION['message'])?$_SESSION['message'] : "" ?></h2></center>
<?php unset($_SESSION['message']) ?>
<div class="line"></div>
<div class="wrapper" id="main_product">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"></span>
			<h6>
				Danh sách sản phẩm			</h6>
		 	<div class="num f12">Số lượng: <b>0</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="6">
				<form class="list_filter form" action="<?= admin_url("/product") ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item">
							<input name="id" value="" id="filter_id" type="text" style="width:55px;"></td>
							
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;"><input name="name" value="" id="filter_iname" type="text" style="width:155px;"></td>
							
							<td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
							<td class="item">
								<select name="catalog">
									<option value=""></option>
									<!-- kiem tra danh muc co danh muc con hay khong -->
									<?php foreach ($catalogs as $row):?>
										<?php if(count($row->subs) >= 1): ?>
									      					<optgroup label="<?php echo $row->name ?>">
									      					<?php foreach ($row->subs as $sub):  ?>
									      						<option value="<?= $sub->id?>"><?= $sub->name?></option>
									      					<?php endforeach;?>
									    <?php else: ?>
									    			<option value="<?= $row->name?>"><?= $sub->name?></option>			
									    <?php endif ?>
									<?php endforeach;?>
									               		
									       
																		     
									      			
							</select>
							</td>
							
							<td style="width:150px">
							<input type="submit" class="button blueB" value="Lọc">
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?= admin_url('/product') ?>'; ">
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?=public_url('admin')?>/images/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td>Tên</td>
					<td>Giá</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url("/product/delete_all") ?>">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
							
					      <div class="pagination">
			              	<?php echo $this->pagination->create_links() ?>;	
			              </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
			      	<?php foreach($list as $row): ?>
			      	<tr class="row_9">
					<td><input type="checkbox" name="id[]" value=""></td>
					
					<td class="textC"><?php echo $row->id ?></td>
					
					<td>
					<div class="image_thumb">
						<img src="<?= base_url()?>/upload/product/<?php echo $row->image_link ?>" height="50">
						<div class="clear"></div>
					</div>
					
					<a href="product/view/9.html" class="tipS" title="" target="_blank">
					<b><?php echo $row->name ?></b>
					</a>
					
					<div class="f11">
					  <span style="color: red">
					  	<?php  
					  	$now = date("Y-m-d H:i:s");
						$now = strtotime($now);
					  	if ($now < $row->timeStart) {
					  		echo("CHƯA ĐẤU GIÁ");
					  	} else if ($now <= $row->timeEnd && $now >= $row->timeStart) {
					  		echo 'ĐANG ĐẤU GIÁ';
					  	} else {
					  		echo("ĐÃ KẾT THÚC");
					  	}
					  ?>

					  </span>
					  				  | Giá cao nhất hiện tại: <?php echo number_format($row->maxMoney) ?>					</div>
						
					</td>
					
					<td class="textR">
					<?php if (intval($row->discount) > 0): ?>
					<?php $new =intval($row->discount) ?>
							<p>Khoảng giãn tối thiểu: 	<span class="format_number" style="color:red"> <?=$new?> </span></p>
							<p>Giá khởi điểm:	 <span class="format_number" ><?php echo intval($row->price) ?></span></p>
					<?php else: ?> 
							<p>Khoảng giãn tối thiểu:	 <span class="format_number" style="color:red"> 0 </span></p>
							<p>Giá khởi điểm: 	<span class="format_number" ><?php echo intval($row->price) ?></span></p>
					<?php endif; ?> 
                           				
					</td>

					
					<td class="textC"><?php echo get_date($row->created) ?></td>
					
					<td class="option textC">
											   						<a href="" title="Gán là nhạc tiêu biểu" class="tipE">
							<img src="<?=public_url('admin')?>/images/icons/color/star.png">
						</a>
												<a href="product/view/9.html" target="_blank" class="tipS" title="Xem chi tiết sản phẩm">
								<img src="<?=public_url('admin')?>/images/icons/color/view.png">
						 </a>
						 <a href="<?= admin_url("/product/edit/".$row->id) ?>" title="Chỉnh sửa" class="tipS">
							<img src="<?=public_url('admin')?>/images/icons/color/edit.png">
						</a>
						
						<a href="<?= admin_url("/product/delete/".$row->id) ?>" title="Xóa" class="tipS verify_action">
						    <img src="<?=public_url('admin')?>/images/icons/color/delete.png">
						</a>
					</td>
				</tr>
			<?php endforeach?>
		        			       
		        			</tbody>
			
		</table>
	</div>
	
</div>