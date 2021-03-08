			       			       <!-- lay slide -->
<script src="royalslider/jquery.royalslider.min.js"></script>
<link type="text/css" href="royalslider/royalslider.css" rel="stylesheet">
<link type="text/css" href="royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">
<style type="text/css">
  table td {
    padding: 10px;
    border: 1px solid #f0f0f0;
  }
</style>
<!-- lay san pham moi nhat -->
<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Thông tin thành viên</h2>
		      </div>
		      <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Thông tin thành viên</h1>
              <table>
                <tr>
                  <td>Họ tên: </td>
                  <td><?= $user->name ?></td>
                 </tr>
                <tr>
                  <td>Email: </td>
                  <td><?= $user->email ?></td>
                </tr>
                <tr>
                  <td>Số điện thoại: : </td>
                  <td><?= $user->phone ?></td>
                </tr>
                <tr> 
                  <td>Địa chỉ: </td>
                  <td><?= $user->address ?></td>
                </tr>
                <tr> 
                  <td>Số dư tài khoản: </td>
                  <td><?= number_format($user->money) ?></td>
                </tr>
                <tr> 
                  <td>Số tiền bạn đã tham gia đấu giá: </td>
                  <td><?= number_format($user->avaiableMoney) ?></td>
                </tr>
                
              </table>
            
            <label class="form-label">&nbsp;</label>
            <div class="form-item">
                  <a href="<?= site_url('user/edit') ?>"><input type="submit" name="submit" value="Chỉnh sửa thông tin" class="button" style='height:30px !important;line-height:30px !important;padding:0px 10px !important'>
                   </a>
                   <a href="<?= site_url('user/addMoney') ?>"><input type="submit" name="submit" value="Nạp tiền" class="button" style='height:30px !important;line-height:30px !important;padding:0px 10px !important'>
                   </a>
                   <a href="<?= site_url('user/cart') ?>"><input type="submit" name="submit" value="XEM SẢN PHẨM" class="button" style='height:30px !important;line-height:30px !important;padding:0px 10px !important; color: red  '>
                   </a>
                   

            </div>
           
         </div>
</div>	<!-- End box-center product-->	    