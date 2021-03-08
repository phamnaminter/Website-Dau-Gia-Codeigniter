<?php
	$this->load->view('admin/product/head', $this->data);

?>

<div class="wrapper">
    
	   	<!-- Form -->
		<form class="form" id="form" action="<?= admin_url('/product/add') ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img src="<?= public_url('admin/') ?>images/icons/dark/add.png" class="titleIcon">
						<h6>Thêm mới Sản phẩm</h6>
					</div>
					
				    <ul class="tabs">
		                <li><a href="#tab1">Thông tin chung</a></li>
		                <li><a href="#tab2">SEO Onpage</a></li>
		                <li><a href="#tab3">Bài viết</a></li>
		                
					</ul>
					
					<div class="tab_container">
					     <div id="tab1" class="tab_content pd0">
					         <div class="formRow">
	<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input value="<?=set_value("name") ?>" name="name" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
	<div class="formRight">
		<div class="left"><input type="file" id="image" name="image"></div>
		<div name="image_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Ảnh kèm theo:</label>
	<div class="formRight">
		<div class="left"><input type="file" id="image_list" name="image_list[]" multiple=""></div>
		<div name="image_list_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<!-- Price -->
<div class="formRow">
	<label class="formLeft" for="param_price">
		Giá khởi điểm :
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="price" value="<?=set_value("price")?>" style="width:100px" id="param_price" class="format_number" _autocheck="true" type="text">
			<img class="tipS" title="Giá khởi điểm sử dụng để giao dịch" style="margin-bottom:-8px" src="<?= public_url('admin/') ?>crown/images/icons/notifications/information.png">
		</span>
		<span name="price_autocheck" class="autocheck"></span>
		<div name="price_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<!-- Price -->
<div class="formRow">
	<label class="formLeft" for="param_discount">
		Chênh lệch tối thiểu
		<span></span>:
	</label>
	<div class="formRight">
		<span>
			<input name="discount" value="<?=set_value("discount") ?>" style="width:100px" id="param_discount" class="format_number" type="text">
			<img class="tipS" title="Chênh lệch tối thiểu khi đặt lệnh" style="margin-bottom:-8px" src="<?= public_url('admin/') ?>crown/images/icons/notifications/information.png">
		</span>
		<span name="discount_autocheck" class="autocheck"></span>
		<div name="discount_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
<!-- Thời gian bắt đầu-->
<div class="formRow">
	<label class="formLeft" for="param_discount">
		Thời gian bắt đầu:
		<span></span>:
	</label>
	<div class="formRight">
		<span>
			<input name="timeStart" value="<?=set_value("timeStart") ?>" style="width:300px" id="param_discount"  type="text">
			<img class="tipS" title="Thời gian bắt đầu đấu giá" style="margin-bottom:-8px" src="<?= public_url('admin/') ?>crown/images/icons/notifications/information.png">
		</span>
		<span name="discount_autocheck" class="autocheck"></span>
		<div name="discount_error" class="clear error"><?=form_error("timeStart")?></div>
	</div>
	<p style="color: red">Nhập chính xác định dạng "Năm-Tháng-Ngày Giờ:Phút:Giây" ví dụ: '2012-03-27 18:47:00'</p>
	<div class="clear"></div>
</div>

<!-- Thời gian kết thúc-->
<div class="formRow">
	<label class="formLeft" for="param_discount">
		Thời gian kết thúc đấu giá:
		<span></span>:
	</label>
	<div class="formRight">
		<span>
			<input name="timeEnd" value="<?=set_value("timeEnd") ?>" style="width:300px" id="param_discount"  type="text">
			<img class="tipS" title="Thời gian kết thúc đấu giá" style="margin-bottom:-8px" src="<?= public_url('admin/') ?>crown/images/icons/notifications/information.png">
		</span>
		<span name="discount_autocheck" class="autocheck"></span>
		<div name="discount_error" class="clear error"><?=form_error("timeEnd")?></div>
	</div>
	<p style="color: red">Nhập chính xác định dạng "Năm-Tháng-Ngày Giờ:Phút:Giây" ví dụ: '2012-03-27 18:47:00'</p>
	<div class="clear"></div>
</div>


<div class="formRow">
	<label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
	<div class="formRight">
		<select name="catalog_id" _autocheck="true" id="param_cat" class="left">
			<option value="">Lựa chọn danh mục</option>
						     <?php foreach ($catalogs as $row):?>
										<?php if(count($row->subs) >= 1): ?>
									      					<optgroup label="<?php echo $row->name ?>">
									      					<?php foreach ($row->subs as $sub):  ?>
									      						<option value="<?= $sub->id?>"><?= $sub->name?></option>
									      					<?php endforeach;?>
									    <?php else: ?>
									    			<optgroup label="<?php echo $row->name ?>">			
									    <?php endif ?>
									<?php endforeach;?> 
			       
					</select>
		<span name="cat_autocheck" class="autocheck"></span>
		<div name="cat_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>


<!-- warranty -->
<div class="formRow">
	<label class="formLeft" for="param_warranty">
		Bảo hành :
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="warranty" id="param_warranty" type="text"></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_sale">Tặng quà:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea name="gifts" id="param_sale" rows="4" cols=""></textarea></span>
		<span name="sale_autocheck" class="autocheck"></span>
		<div name="sale_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>					         <div class="formRow hide"></div>
						 </div>
						 
						 <div id="tab2" class="tab_content pd0">
						     			
<div class="formRow">
	<label class="formLeft" for="param_site_title">Title:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea name="site_title" id="param_site_title" _autocheck="true" rows="4" cols=""></textarea></span>
		<span name="site_title_autocheck" class="autocheck"></span>
		<div name="site_title_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_meta_desc">Meta description:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea name="meta_desc" id="param_meta_desc" _autocheck="true" rows="4" cols=""></textarea></span>
		<span name="meta_desc_autocheck" class="autocheck"></span>
		<div name="meta_desc_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_meta_key">Meta keywords:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea name="meta_key" id="param_meta_key" _autocheck="true" rows="4" cols=""></textarea></span>
		<span name="meta_key_autocheck" class="autocheck"></span>
		<div name="meta_key_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
						     <div class="formRow hide"></div>
						 </div>
						 
						 <div id="tab3" class="tab_content pd0">
						      <div class="formRow">
	<label class="formLeft">Nội dung:</label>
	<div class="formRight">
		<textarea name="content" id="param_content" class="editor"></textarea>
		<div name="content_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
						      <div class="formRow hide"></div>
						 </div>
						
						
	        		</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" value="Thêm mới" class="redB">
	           			<input type="reset" value="Hủy bỏ" class="basic">
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
<div class="clear mt30"></div>