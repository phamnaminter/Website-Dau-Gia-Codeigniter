
<div class="clear"></div>
<div class="wrapper">
    
	   	<!-- Form -->
		<form class="form" id="form" action=""method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img src="<?= public_url('admin/') ?>images/icons/dark/add.png" class="titleIcon">
						<h6>Thông Tin Đơn hàng</h6>
					</div>
					
				    <ul class="tabs">
		                <li><a href="#tab1">Thông tin chung</a></li>
		                
		                
					</ul>
					
					<div class="tab_container">
					     <div id="tab1" class="tab_content pd0">
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="name" value="<?= $product->name ?>" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_name">Họ và tên khách hàng chiến thắng:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="name" value="<?= $user->name ?>" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_name">Email khách hàng:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="name" value="<?= $user->email ?>" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_name">SDT khách hàng :<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="name" value="<?= $user->phone ?>" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_name">Địa chỉ khách hàng:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="name" value="<?= $user->address ?>" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
	<div class="formRight">
		<div class="left">
			
			<img src="<?= base_url()?>/upload/product/<?= $product->image_link ?>" style="width: 100px; height: 70px">
		<div name="image_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>



<!-- Price -->
<div class="formRow">
	<label class="formLeft" for="param_price">
		Giá khởi điểm:
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="price" value="<?= $product->price ?> style="width:100px" id="param_price" class="format_number" _autocheck="true" type="text">
			<img class="tipS" title="Giá khởi điểm sử dụng để giao dịch" style="margin-bottom:-8px" src="<?= public_url('admin/') ?>crown/images/icons/notifications/information.png">
		</span>
		<span name="price_autocheck" class="autocheck"></span>
		<div name="price_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_price">
		Giá đặt của người chiến thắng:
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="price" value="<?= $product->maxMoney ?> style="width:100px" id="param_price" class="format_number" _autocheck="true" type="text">
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
		Chênh lệch tối thiểu: 
		<span></span>:
	</label>
	<div class="formRight">
		<span>
			<input name="discount" value="<?= $product->discount ?> style="width:100px" id="param_discount" class="format_number" type="text">
			<img class="tipS" title="Chênh lệch khi đặt lệnh mới" style="margin-bottom:-8px" src="<?= public_url('admin/') ?>crown/images/icons/notifications/information.png">
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
			<input name="timeStart" value="<?= date("Y-m-d H:i:s",$product->timeStart) ?>" style="width:300px" id="param_discount"  type="text">
			<img class="tipS" title="Thời gian bắt đầu đấu giá" style="margin-bottom:-8px" src="<?= public_url('admin/') ?>crown/images/icons/notifications/information.png">
		</span>
		<span name="discount_autocheck" class="autocheck"></span>
		<div name="discount_error" class="clear error"><?=form_error("timeStart")?></div>
	</div>
	
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
			<input name="timeEnd" value="<?= date("Y-m-d H:i:s", $product->timeEnd) ?>" style="width:300px" id="param_discount"  type="text">
			<img class="tipS" title="Thời gian kết thúc đấu giá" style="margin-bottom:-8px" src="<?= public_url('admin/') ?>crown/images/icons/notifications/information.png">
		</span>
		<span name="discount_autocheck" class="autocheck"></span>
		<div name="discount_error" class="clear error"><?=form_error("timeEnd")?></div>
	</div>
	
	<div class="clear"></div>
</div>


<div class="formRow">
	<label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
	<div class="formRight">
		<select name="catalog_id" _autocheck="true" id="param_cat" class="left">
			<option value="">Lựa chọn danh mục</option>
						     <?php foreach ($catalogs as $row):?>
										<?php if(count($row->subs) > 1): ?>
									      					<optgroup label="<?php echo $row->name ?>">
									      					<?php foreach ($row->subs as $sub):  ?>
									      						<option value="<?= $sub->id?>" <?php if($sub->id == $product->catalog_id) {echo("selected");} ?>><?= $sub->name?></option>
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
		<span class="oneFour"><input name="warranty" value="<?= $product->warranty ?>" id="param_warranty" type="text"></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft" for="param_sale">Tặng quà:</label>
	<div class="formRight">
		<span class="oneTwo">
			<textarea name="gifts" value="<?= $product->gifts ?>" id="param_sale" rows="1" cols=""></textarea></span>
		<span name="sale_autocheck" class="autocheck"></span>
		<div name="sale_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>					         <div class="formRow hide"></div>
						 </div>
						 
						 <div id="tab2" class="tab_content pd0">
						     			


						     <div class="formRow hide"></div>
						 </div>
						 
						 <div id="tab3" class="tab_content pd0">
						      
						      <div class="formRow hide"></div>
						 </div>
						
						
	        		</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	        			<a href="<?= admin_url("/home/changeStatus/".$product->id) ?>">
	        			<button type="button" class="redB"> <?= $product->status == 0 ? 'Đánh dấu là đã giao hàng' : 'Đánh dấu là chưa giao hàng' ?> </button>
	           			</a>
	           			
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
<div class="clear mt30"></div>