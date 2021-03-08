<?php $this->load->view('admin/catalog/head'); ?>
<div class="line"></div>
<fieldset>
<div class="wrapper">
<div class="widget">
					<form action="" id="form" class="form" method="post">
					<div class="title">
						<img src="<?= public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
						<h6>Thêm mới tin tứ</h6>
					</div>

					<div class="formRow">
						<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value="<?= set_value('name') ?>"></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?= form_error('name') ?></div>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="formRow">
						<label class="formLeft" for="param_name">Thứ tự hiển thị:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo">
								<input name="sort_order" id="param_sort_order" _autocheck="true" type="text" value="<?= set_value('sort_order') ?>">
							</span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?= form_error('sort_order') ?></div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="formRow">
						<label class="formLeft" for="param_name">Danh mục cha:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo">
								<select name="parent_id" id="param_parent_id" _autocheck="true">
									<option value="0">Là danh mục cha</option>
									<?php foreach ($list as $row):   ?>
										<option value="<?= $row->id ?>"><?= $row->name ?></option>
									<?php endforeach; ?>
								</select>
							</span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?= form_error('name') ?></div>
						</div>
						<div class="clear"></div>
					</div>

						 

					<div class="formSubmit">
	           			<input type="submit" value="Thêm mới" class="redB">
	  
	           		</div>
					</form>
</div>
</div>
</fieldset>