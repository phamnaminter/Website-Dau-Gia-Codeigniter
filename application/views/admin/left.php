	<div id="leftSide" style="padding-top:30px;">
		
		    <!-- Account panel -->
			
<div class="sideProfile">
	<a href="#" title="" class="profileFace"><img width="40" src="<?= public_url('admin/') ?>images/user.png" /></a>
	<span>Xin chào: <strong>admin!</strong></span>
	<span>QUẢN TRỊ VIÊN</span>
	<div class="clear"></div>
</div>
<div class="sidebarSep"></div>		    
		    <!-- Left navigation -->
			
<ul id="menu" class="nav">

			<li class="home">
		
			<a href="<?= admin_url('/admin')?>" class="active" id="current">
				<span>Bảng điều khiển</span>
				<strong></strong>
			</a>
			
						
		</li>
			<li class="tran">
		
			<a href="admin/tran.html" class=" exp" >
				<span>Quản lý bán hàng</span>
				<strong>1</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="<?= admin_url('/home')?>">
								Đơn hàng sản phẩm							</a>
						</li>
											
									</ul>
						
		</li>
			<li class="product">
		
			<a href="" class=" exp" >
				<span>Sản phẩm</span>
				<strong>2</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="<?= admin_url('/product')?>">
								Sản phẩm							</a>
						</li>
											<li >
							<a href="<?= admin_url('/catalog') ?>">
								Danh mục							</a>
						</li>
											
									</ul>
						
		</li>
			<li class="account">
		
			<a href="<?= admin_url('admin')?>/admin" class=" exp" >
				<span>Tài khoản</span>
				<strong>1</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="<?= admin_url('/admin')?>">
								Ban quản trị							</a>
						</li>
											
									</ul>
						
		</li>
			<li class="support">
		
			<a href="admin/support.html" class=" exp" >
				<span>Hỗ trợ và liên hệ</span>
				<strong>2</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="<?= admin_url('/home/upgrade')?>">
								Hỗ trợ							</a>
						</li>
											<li >
							<a href="<?= admin_url('/home/upgrade')?>">
								Liên hệ							</a>
						</li>
									</ul>
						
		</li>
			<li class="content">
		
			<a href="admin/content.html" class=" exp" >
				<span>Nội dung</span>
				<strong>2</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="<?= admin_url("/slide") ?>">
								Slide							</a>
						</li>
											<li >
							<a href="<?= admin_url("/news") ?>">
								Tin tức							</a>
						</li>
											
									</ul>
						
		</li>
	
</ul>
			
		</div>
		<div class="clear"></div>