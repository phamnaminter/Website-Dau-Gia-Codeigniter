<?php
	$this->load->view('admin/slide/head', $this->data);

?>

<div class="line"></div>
<div class="wrapper" id="main_slide">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"></span>
			<h6>
				Danh sách Slide			</h6>
		 	<div class="num f12"> Số lượng: <b> <?= $total_rows ?> </b> </div>

		</div>
		
		<table cellpadding="0" width="100%" class="sTable mTable myTable" id="checkAll" >
			
			<thead class="filter"> 
				<tr> 
				<td colspan="6">
				
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?=public_url('admin')?>/images/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td style="width:60px;">Tiêu đề</td>
					<td style="width:75px;">Thứ tự</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url("/slide/delete_all") ?>">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
							
					      <div class="pagination">
			              	
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
						<img src="<?= base_url()?>upload/slide/<?php echo $row->image_link ?>" height="50">
						<div class="clear"></div>
					</div>
					
					<a href="slide/view/9.html" class="tipS" title="" target="_blank">
					<b><?php echo $row->name ?></b>
					</a>
					
					<div class="f11">
								</div>
						
					</td>
					
					

					
					<td><?= $row->sort_order ?></td>
					
					<td class="option textC">
											   						
												<a href="<?= $row->link ?>" target="_blank" class="tipS" title="Xem chi tiết link">
								<img src="<?=public_url('admin')?>/images/icons/color/view.png">
						 </a>
						 <a href="<?= admin_url("/slide/edit/".$row->id) ?>" title="Chỉnh sửa" class="tipS">
							<img src="<?=public_url('admin')?>/images/icons/color/edit.png">
						</a>
						
						<a href="<?= admin_url("/slide/delete/".$row->id) ?>" title="Xóa" class="tipS verify_action">
						    <img src="<?=public_url('admin')?>/images/icons/color/delete.png">
						</a>
					</td>
				</tr>
			<?php endforeach?>
		        			       
		        			</tbody>
			
		</table>
	</div>
	
</div>