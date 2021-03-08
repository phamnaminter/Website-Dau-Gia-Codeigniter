<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('site/head'); ?>
</head>
<body>
	 <a href="#" id="back_to_top">
		   <img src="<?= public_url()?>site/images/top.png" />
	 </a>
	  <!-- the wraper -->
      <div class="wraper">
          <!-- the header -->
	      <div class='header'>
	           <!-- The box-header-->
	           <?php  $this->load->view('site/header'); ?>
	      </div>
	      <div id="container">
	      <div class="left">
	      	<?php $this->load->view('site/left', $this->data); ?>
	      </div>
	      <div class="content">
	      	<h2 style="color: red"><?= isset($this->data['message']) ? $this->data['message'] : "" ?></h2>
	      	<?php $this->load->view($temp, $this->data); ?>
	      </div>
	      <div class="right">
	      	<?php $this->load->view('site/right', $this->data); ?>
	      </div>
	      <div class="clear"> </div>
	      </div>
	      <center>
	      	<img src="<?= public_url() ?>site/images/bank.png" /> 
	      </center>
	      <div class="footer">
	      	<?php $this->load->view('site/footer'); ?>
	      </div>
	  </div>
</body>
</html>