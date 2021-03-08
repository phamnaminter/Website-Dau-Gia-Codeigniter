<div class="line"></div>

<hr>
<hr>
<hr>
<div class="wrapper">
	
	<div class="widgets">
	     <!-- Stats -->
		



<!-- User -->


		<div class="clear"></div>
		
		<!-- Giao dich thanh cong gan day nhat -->
		<div class="line"></div>
	
	<div class="widget">
		<div class="title">
			<center><h4 style="color: blue"><?= isset($_SESSION['message'])?$_SESSION['message'] : "" ?></h4></center>
<?php unset($_SESSION['message']) ?>	
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách Giao dịch</h6>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?=public_url('admin/')?>images/icons/tableArrows.png" /></td>
					<td style="width:60px;">Mã số</td>
					<td style="width:75px;">Thành viên</td>
					<td style="width:90px;">Số tiền</td>
					<td>Tên sản phẩm</td>
					<td style="width:100px;">Giao dịch</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:55px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?=public_url('admin/')?>admin/tran/del_all.html">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
					
				<?php foreach ($list as $product): ?>
					<tr>
					<td><input type="checkbox" name="id[]" value="12" /></td>
					
					<td class="textC"><?= $product->id ?></td>
					
					<td>
						<?= $product->owner_name ?>				</td>
					
					<td class="textR red"><?= $product->maxMoney ?></td>
					
					<td>
					<?= $product->name ?>					</td>
					
					
					<td class="status textC">
						<span class="completed">
						<?= $product->status == 0 ? "<span style='color:red'>Chưa giao hàng</span>" : "Đã giao hàng"  ?> 					</span>
					</td>
					
					<td class="textC"><?= date("Y-m-d H:i:s",$product->timeEnd) ?></td>
					
					<td class="textC">
							<a href="<?= admin_url("/home/edit/".$product->id) ?>" title="Chi tiết đơn hàng" class=" tipS ">
								<img src="<?=public_url('admin/')?>images/icons/color/view.png" />
							</a>
							
						   <a href="<?= admin_url("/home/delete/".$product->id) ?>" title="Xóa" class="tipS " >
						    <img src="<?=public_url('admin/')?>images/icons/color/delete.png" />
						   </a>
					</td>
				</tr>
			<?php endforeach ?>
				

						</tbody>
			
		</table>
	</div>

        	</div>
	
</div>
		<div class="clear mt30"></div>