<?php
	$this->load->view('admin/slide/head', $this->data);

?>

<div class="wrapper">
    
	   	<!-- Form -->
		<form class="form" id="form" action="<?= admin_url('/slide/edit/'.$slide->id) ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img src="<?= public_url('admin/') ?>images/icons/dark/add.png" class="titleIcon">
						<h6>Chỉnh sửa Slide</h6>
					</div>
					
				    <ul class="tabs">
		                <li><a href="#tab1">Thông tin chung</a></li>
		                
		                
					</ul>
					
					<div class="tab_container">
					    
					         <div class="formRow">
	<label class="formLeft" for="param_name">Tên Slide:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input value="<?= $slide->name ?>" name="name" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
	<div class="formRight">
		<div class="left">
			<input type="file" id="image" name="image">
			<img src="<?= base_url()?>/upload/slide/<?= $slide->image_link ?>" style="width: 100px; height: 70px">
		</div>
		<div name="image_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

		         <div class="formRow hide"></div>
						
						 
						 <div id="tab2" class="tab_content pd0">
						     			


   <div class="formRow">
	<label class="formLeft" for="param_name">Mô tả:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input value="<?= $slide->info ?>" name="info" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

   <div class="formRow">
	<label class="formLeft" for="param_name">Thứ tự hiển thị:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input value="<?= $slide->sort_order?>" name="sort_order" id="param_name" _autocheck="true" type="text"></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
						     <div class="formRow hide"></div>
						 </div>
						
	        		</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" value="Chỉnh sửa" class="redB">
	           			<input type="reset" value="Hủy bỏ" class="basic">
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
<div class="clear mt30"></div>