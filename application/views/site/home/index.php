			       			       <!-- lay slide -->
<script src="royalslider/jquery.royalslider.min.js"></script>
<link type="text/css" href="royalslider/royalslider.css" rel="stylesheet">
<link type="text/css" href="royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">


<script type="text/javascript">
(function($)
{
	$(document).ready(function()
	{
		$("#HomeSlide").royalSlider({
			arrowsNav:true,
			loop:false,
			keyboardNavEnabled:true,
			controlsInside:false,
			imageScaleMode:"fill",
			arrowsNavAutoHide:false,
			autoScaleSlider:true,
			autoScaleSliderWidth:580,//chiều rộng slide
			autoScaleSliderHeight:205,//chiều cao slide
			controlNavigation:"bullets",
			thumbsFitInViewport:false,
			navigateByClick:true,
			startSlideId:0,
			autoPlay:{enabled:true, stopAtAction:false, pauseOnHover:true, delay:5000},
			transitionType:"move",
			slideshowEnabled:true,
			slideshowDelay:5000,
			slideshowPauseOnHover:true,
			slideshowAutoStart:true,
			globalCaption:false
		});
	});
})(jQuery);
</script>


<style>
#HomeSlide.royalSlider {
	width: 580px;	
	height: 205px;
    overflow:hidden;
}
</style>

<div id='slide'>
	<div id="img-slide" class="sliderContainer" style='width:580px'>
		<div id="HomeSlide" class="royalSlider rsMinW">
		      		     <?php foreach ($slide_list as $slide): ?>

                    <a href="<?= $slide->link ?>" target='_blank'><img src="<?=public_url('upload/slide/')?><?= $slide->image_link ?>" /> </a>
                     
                     
                    

                    <?php endforeach; ?>
		      		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="clear pb20"></div>  
	
        
	

<!-- lay san pham moi nhat -->
<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Sản phẩm chuẩn bị đấu giá</h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
                  <?php foreach ($product_start as $product): ?>
		              <div class='product_item'>
                       <h3>
                         <a  href="<?= base_url('product/view/'.$product->id) ?>" title="Sản phẩm">
                         <?= $product->name ?>	                     </a>
	                   </h3>
                       <div class='product_img'>
                             <a  href="<?= base_url('product/view/'.$product->id) ?>" title="Sản phẩm">
                                <img src="<?= base_url()?>/upload/product/<?= $product->image_link ?>" alt=''/>
                            </a>
                       </div>
                       <p class='price'>
                        <?php if (intval($product->discount) > 0): ?>
                        <?php $new = intval($product->price) ?>
                         <?= number_format(intval($new))?> 
                      
                        
                        <?php else: ?> 
                       
                        <?= number_format(intval($product->price)) ?> 
                        <?php endif; ?> 
		                    </p>
                        <center>
                          <div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
                        </center>
                       <div class='action'>
                           <p style='float:left;margin-left:10px'>Lượt xem: <b> <?= $product->view ?> </b></p>
	                       <a class='button' href="<?= base_url('product/view/'.$product->id) ?>" title='Mua ngay'>Mua ngay</a>
	                       <div class='clear'></div>
                       </div>
                  </div>
                  <?php endforeach; ?>            
                             
               
		            <div class='clear'></div>
		      </div><!-- End box-content-center -->
</div>	<!-- End box-center product-->	    
<!-- lay san pham dang giam gia -->
<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2>Tất cả sản phẩm</h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
                  <?php foreach ($product_new as $product): ?>
                  <div class='product_item'>
                       <h3>
                         <a  href="<?= base_url('product/view/'.$product->id) ?>" title="Sản phẩm">
                         <?= $product->name ?>                       </a>
                     </h3>
                       <div class='product_img'>
                             <a  href="<?= base_url('product/view/'.$product->id) ?>" title="Sản phẩm">
                                <img src="<?= base_url()?>/upload/product/<?= $product->image_link ?>" alt=''/>
                            </a>
                       </div>
                       <p class='price'>
                       
                        <?= number_format(intval($product->price)) ?>  
                      
                        </p>
                        <center>
                          <div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
                        </center>
                       <div class='action'>
                           <p style='float:left;margin-left:10px'>Lượt xem: <b> <?= $product->view ?> </b></p>
                         <a class='button' href="<?= base_url('product/view/'.$product->id) ?>" title='Mua ngay'>Mua ngay</a>
                         <div class='clear'></div>
                       </div>
                  </div>
                  <?php endforeach; ?>            
                             
               
                <div class='clear'></div>
          </div><!-- End box-content-center -->
</div>	<!-- End box-center product-->	   

