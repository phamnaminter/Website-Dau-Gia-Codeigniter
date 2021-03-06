<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<?php $this->load->view('admin/head'); ?>
</head>
<body class="nobg loginPage" style="min-height:100%;">
	<div class="loginWrapper" style="top:45%;">
	
	    <div class="widget" id="admin_login" style="height:auto; margin:auto;">
	        <div class="title"><img src="images/icons/dark/laptop.png" alt="" class="titleIcon" />
	        	<h6>Đăng nhập</h6>
	        </div>
	        
	        <form class="form" id="form" action="" method="post">
	           <fieldset>
	                <div class="formRow">
	                    <label for="param_username">Tên đăng nhập:</label>
	                    <div class="loginInput"><input type="text" name="username" id="param_username" /></div>
	                    <div class="clear"></div>
	                </div>
	                
	                <div class="formRow">
	                    <label for="param_password">Mật khẩu:</label>
	                    <div class="loginInput"><input type="password" name="password" id="param_password" /></div>
	                    <div class="clear"></div>
	                </div>
	                
	                <div class="loginControl">
	                	<?= form_error('login') ?>
	                    <input type='hidden' name="submit" value='1'/>
	                    <input type="submit"  value="Đăng nhập" class="dredB logMeIn" />
	                    <div class="clear"></div>
	                </div>
	            </fieldset>
	        </form>
	    </div>
	    
	</div>    
	
	<!-- Footer line -->
	<div id="footer">
				<div class="wrapper">Bản quyền © 2012-2016 hocphp.info</div>
	</div>
</body >
</html>