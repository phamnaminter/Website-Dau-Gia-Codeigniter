			       			       <!-- lay slide -->
<script src="royalslider/jquery.royalslider.min.js"></script>
<link type="text/css" href="royalslider/royalslider.css" rel="stylesheet">
<link type="text/css" href="royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">
<!-- lay san pham moi nhat -->
<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Đăng nhập thành viên</h2>
		      </div>
		      <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Đăng nhập thành viên</h1>
            <form enctype="multipart/form-data" action="<?=site_url('user/login')?>" method="post" class="t-form form_action">
                  <div class="form-row">
            <label class="form-label" for="param_email">Email:<span class="req">*</span></label>
            <div class="form-item">
              <input type="text" value="<?=set_value("email")?>" name="email" id="email" class="input">
              <div class="clear"></div>
              <div id="email_error" class="error"><?= form_error('email') ?></div>
            </div>
            <div class="clear"></div>
          </div>
          
          <div class="form-row">
            <label class="form-label" for="param_password">Mật khẩu:<span class="req">*</span></label>
            <div class="form-item">
              <input type="password" name="password" id="password" class="input">
              <div class="clear"></div>
              <div id="password_error" class="error"><?= form_error('password') ?></div>
            </div>
            <div class="clear"></div>
          </div>
          
          
          
         
          
          <div class="form-row">
            <label class="form-label">&nbsp;</label>
            <div class="form-item">
                    <input type="submit" name="submit" value="Đăng nhập" class="button">
            </div>
           </div>
            </form>
         </div>
</div>	<!-- End box-center product-->	    