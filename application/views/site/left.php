			       <div class="box-left">
         <div class="title tittle-box-left">
			  <h2> Tìm kiếm theo giá </h2>
		</div>
		<div class="content-box" ><!-- The content-box -->
	           <form class="t-form form_action" method="post" style='padding:10px' action="<?=base_url('product/search_price')?>"  >
                  
                  <div class="form-row">
						<label for="param_price_from" class="form-label" style='width:70px'>Giá từ:<span class="req">*</span></label>
						<div class="form-item"  style='width:90px'>
							<select  class="input" id="price_from" name="price_from" >
								<?php for($i = 0; $i <= 40000000; $i = $i + 500000): ?>
							    <option value="<?=$i?>">
							           <?=number_format($i)?>
							    </option>
								<?php endfor; ?>

							</select>
							<div class="clear"></div>
							<div class="error" id="price_from_error"></div>
						</div>
						<div class="clear"></div>
				  </div>
				  <div class="form-row">
						<label for="param_price_from" class="form-label" style='width:70px'>Giá tới:<span class="req">*</span></label>
						<div class="form-item"  style='width:90px'>
							<select  class="input" id="price_to" name="price_to" >
							     <?php for($i = 0; $i <= 40000000; $i = $i + 500000): ?>
							    <option value="<?=$i?>">
							           <?=number_format($i)?>
							    </option>
								<?php endfor; ?>							          
							     							           
						    </select>
							<div class="clear"></div>
							<div class="error" id="price_from_error"></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				  <div class="form-row">
						<label class="form-label">&nbsp;</label>
						<div class="form-item">
				           	<input type="submit" class="button"  name='search' value="Tìm kiềm" style='height:30px !important;line-height:30px !important;padding:0px 10px !important'>
						</div>
						<div class="clear"></div>
				   </div>
            </form>
	    </div><!-- End content-box -->
</div>


<div class="box-left">
         <div class="title tittle-box-left">
			  <h2> Danh mục sản phẩm </h2>
		</div>
		<div class="content-box"><!-- The content-box -->
			<?php foreach ($catalog_list as $item): ?>
	          <ul class="catalog-main">
                           <li>
                     		    <span><a href="#" title="<?= $item->name ?>"><?= $item->name ?></a></span>
                     <!-- lay danh sach danh muc con -->
                     <?php if (!empty($item->subs)): ?>
             	 	 <ul class="catalog-sub"> 
             	 	        <?php foreach ($item->subs as $sub): ?>   					                    
                            <li>
                            <a href="<?= base_url('product/catalog/'.$sub->id) ?>" title="<?= $sub->name ?>"> 
                            <?= $sub->name ?></a>
                            </li>		
                    		<?php endforeach; ?>
                            			                    
                     </ul>
                 <?php endif; ?>
                     	            </li>
	                     
	                      
	        </ul>
	        	<?php endforeach; ?>
	        	    </div><!-- End content-box -->
</div>