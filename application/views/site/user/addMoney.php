                         <!-- lay slide -->
<script src="royalslider/jquery.royalslider.min.js"></script>
<link type="text/css" href="royalslider/royalslider.css" rel="stylesheet">
<link type="text/css" href="royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">
<!-- lay san pham moi nhat -->
<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
            <h2>Nạp tiền</h2>
          </div>
          <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Nạp tiền</h1>
            <form enctype="multipart/form-data" action="<?=site_url('user/addMoney')?>" method="post" class="t-form form_action">
                  <div class="form-row">
            <label class="form-label" for="param_email">Số tiền:<span class="req">*</span></label>
            <div class="form-item">
              <input type="text" value="" name="money" id="email" class="input">
              <div class="clear"></div>
              <div id="email_error" class="error"><?= form_error('money') ?></div>
            </div>
            <div class="clear"></div>
          </div>          
       
          <div class="form-row">
            <label class="form-label">&nbsp;</label>
            <div class="form-item">
                    <input type="submit" name="submit" value="Nạp ngay" class="button">
            </div>
           </div>
            </form>
         </div>
</div>  <!-- End box-center product-->      