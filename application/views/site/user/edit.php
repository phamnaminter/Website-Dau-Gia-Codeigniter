                         <!-- lay slide -->
<script src="royalslider/jquery.royalslider.min.js"></script>
<link type="text/css" href="royalslider/royalslider.css" rel="stylesheet">
<link type="text/css" href="royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">
<!-- lay san pham moi nhat -->
<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
            <h2>Chỉnh sửa thông tin thành viên</h2>
          </div>
          <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Chỉnh sửa thông tin</h1>
            <form enctype="multipart/form-data" action="<?=site_url('user/edit')?>" method="post" class="t-form form_action">
                  <div class="form-row">
            <label class="form-label" for="param_email">Email:<span class="req">*</span></label>
            <div class="form-item">
              <input type="text" value="<?= $user->email ?>" name="email" id="email" class="input">
              <div class="clear"></div>
              <div id="email_error" class="error"><?= form_error('email') ?></div>
            </div>
            <div class="clear"></div>
          </div>
          
          <div class="form-row">
            <label class="form-label" for="param_password">Mật khẩu:<span class="req">*</span></label>
            <div class="form-item">
              <p style="color: red; font-style: italic;">Nếu đổi mật khẩu thì nhập thông tin, nếu không bỏ trống</p>
              <input type="password" name="password" id="password" class="input">
              <div class="clear"></div>
              <div id="password_error" class="error"><?= form_error('password') ?></div>
            </div>
            <div class="clear"></div>
          </div>
          
          <div class="form-row">
            <label class="form-label" for="param_re_password">Gõ lại mật khẩu:<span class="req">*</span></label>
            <div class="form-item">
              <input type="password" name="re_password" id="re_password" class="input">
              <div class="clear"></div>
              <div id="re_password_error" class="error"><?= form_error('re_password') ?></div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="form-row">
            <label class="form-label" for="param_name">Họ và tên:<span class="req">*</span></label>
            <div class="form-item">
              <input type="text" value="<?=$user->name?>" name="name" id="name" class="input">
              <div class="clear"></div>
              <div id="name_error" class="error"><?= form_error('name') ?></div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="form-row">
            <label class="form-label" for="param_phone">Số điện thoại:<span class="req">*</span></label>
            <div class="form-item">
              <input type="text" value="<?= $user->phone?>" name="phone" id="phone" class="input">
              <div class="clear"></div>
              <div id="phone_error" class="error"><?= form_error('phone') ?></div>
            </div>
            <div class="clear"></div>
          </div>
          
          <div class="form-row">
            <label class="form-label" for="param_address">Địa chỉ:<span class="req">*</span></label>
            <div class="form-item">
              <textarea value="<?=$user->address ?>" name="address" id="address" class="input"><?=$user->address ?></textarea>
              <div class="clear"></div>
              <div id="address_error" class="error"><?= form_error('address') ?></div>
            </div>
            <div class="clear"></div>
          </div>
         
          
          <div class="form-row">
            <label class="form-label">&nbsp;</label>
            <div class="form-item">
                    <input type="submit" name="submit" value="Cập nhật thông tin" class="button">
            </div>
           </div>
            </form>
         </div>
</div>  <!-- End box-center product-->      