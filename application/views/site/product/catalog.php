			       			       <!-- lay slide -->
<script src="royalslider/jquery.royalslider.min.js"></script>
<link type="text/css" href="royalslider/royalslider.css" rel="stylesheet">
<link type="text/css" href="royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">
<!-- lay san pham moi nhat -->
<div class="box-center"><!-- The box-center product-->
             <div class="tittle-box-center">
		        <h2><?= $catalog->name ?></h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
                  <?php foreach ($product_list as $product): ?>
		              <div class='product_item'>
                       <h3>
                         <a  href="" title="Sản phẩm">
                         <?= $product->name ?>	                     </a>
	                   </h3>
                       <div class='product_img'>
                             <a  href="san-pham-Tivi-LG-520/9.html" title="Sản phẩm">
                                <img src="<?= base_url()?>/upload/product/<?= $product->image_link ?>" alt=''/>
                            </a>
                       </div>
                       <p class='price'>
                        <?php if (intval($product->discount) > 0): ?>
                        <?php $new = intval($product->price) - intval($product->discount) ?>
                         <?= intval($new)?> <span class='price_old'><?= intval($product->price) ?>  đ</span>
                      
                        
                        <?php else: ?> 
                       
                        <?= intval($product->price) ?> 
                        <?php endif; ?> 
		                    </p>
                        <center>
                          <div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
                        </center>
                       <div class='action'>
                           <p style='float:left;margin-left:10px'>Lượt xem: <b> <?= $product->view ?> </b></p>
	                       <a class='button' href="them-vao-gio-9.html" title='Mua ngay'>Mua ngay</a>
	                       <div class='clear'></div>
                       </div>
                  </div>
                  <?php endforeach; ?>            
                             
               
		            <div class='clear'></div>
		      </div><!-- End box-content-center -->
</div>	<!-- End box-center product-->	    