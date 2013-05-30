<script language="javascript" type="text/javascript" src="<?=base_url()?>Public/tinymce/tiny_mce.js"></script>
<script type="text/javascript">	
$(document).ready(function(e) {
        	$('#frm').submit(function(e) {
                	
					if( document.frm.product_name.value == "" ) {
						document.frm.product_name.focus();
						return false;
					}
					
					$('#loader').show();
            });
			
    });
    </script>


<div>


	
<fieldset>
        
        <?=form_open_multipart('', array('id'=>'frm', 'name'=>'frm'))?>
                <div class="breadcrumb"><img src="<?=site_url('Public/Images/product.png')?>" />&nbsp; <strong>Products</strong>
                
     <input type="submit" name="btn" value="Save" class="pull-right btn btn-primary btn-small" />  
     </div>
   <?=$this->session->flashdata('msg')?>
     
     <div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">General</a></li>
    <li><a href="#tab2" data-toggle="tab">Data</a></li>
    <li><a href="#tab3" data-toggle="tab">Description</a></li>
    <li><a href="#tab4" data-toggle="tab">Images</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
     
     		<div>
            	<label>Product Name <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="product_name" class="input-xxlarge" value="<?=$v[0]['products_name']?>" />
                </label>
                
     			<hr />
                
                     <label>Brand Name <sup>*</sup></label>
        		
                <label>
                	<select class="input-xxlarge" name="brands">
                    	<option value="0">--None--</option>
                        	<?php foreach($getBrands as $b) : ?>
                            	
                             <option value="<?=$b->brandsId?>" <?=($b->brandsId == $v[0]['brand'])? 'selected':''?>><?=$b->brandsName?></option>
                                
                            <?php endforeach; ?>
                    </select>
                </label>
                
     			<hr />
                
                
        	<label>Category </label>
        		
               
                	<div style="height:140px; overflow-y:scroll; border:1px solid #CCC; width:400px; font-size:11px;">
                  <div style="padding-left:3px;">
                    <?php foreach($categories as $c):
							$sel = '';
								foreach( $getProCategories as $pc ) :
									if( $c['CategoriesId'] == $pc->cid ) {
											
											$sel = 'checked';
									}
								endforeach;
					?>
                    	<li style="display:block; padding:2px;">
                        <input type="checkbox" name="category_id[]" value="<?=$c['CategoriesId']?>" <?=$sel?> />
						&nbsp;<?=$c['CategoriesName']?>
                        </li>
                    <?php  endforeach;?>
                   
                   </div>
                   
                </div>
                	
                        
                  
               
                
            <hr />
            
            
     <label>Status</label>
     
     <label>
     		<select name="status">
            	<option value="0">Enabled</option>
                <option value="1" <?=($v[0]['products_status'] == 1) ? 'selected':''?>>Disabled</option>
            </select>
     </label>
            
          </div>
     
    </div> <!-- one -->
    
    <div class="tab-pane" id="tab2">
    	<div style="height:400px; overflow-y:scroll;">
    	  <label>Product Currency <sup>*</sup></label>
        		
                <label>
                		<select name="currency">
                        	<option>USD</option>
                        	<option <?=($v[0]['products_currency'] == 'INR') ? 'selected':''?>>INR</option>
                        </select>
                </label>
                
     <hr />
    
    
      <label>Product Price <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="product_price" class="input-large" value="<?=$v[0]['products_price']?>" />
                </label>
                
     <hr />
     
      <label>Product Weight <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="product_weight" class="input-large" value="<?=$v[0]['product_weight']?>" />
                </label>
                
     <hr />
     
        <label>Weight Class <sup>*</sup></label>
        		
                <label>
                	
                    <select name="weight_class">
                    	<option>Kg</option>
                        <option <?=($v[0]['weight_class'] == 'Gram') ? 'selected':''?>>Gram</option>
                        <option <?=($v[0]['weight_class'] == 'Ltr') ? 'selected':''?>>Ltr</option>
                        <option <?=($v[0]['weight_class'] == 'Pound') ? 'selected':''?>>Pound</option>
                        <option <?=($v[0]['weight_class'] == 'Ounce') ? 'selected':''?>>Ounce</option>
                    </select>
                    
                </label>
                
     <hr />
     
     <label>Quantity <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="quantity" class="input-xlarge" value="<?=$v[0]['products_qty']?>" />
                </label>
                
     <hr />
     
      <label>Stock Status <sup>*</sup></label>
        		
                <label>
                <select name="stock_status" class="input-xlarge">
                	<option value="0">In Stock</option>
                    <option value="1" <?=($v[0]['stock_status'] == '1') ? 'selected':''?>>Out of Stock</option>
                </select>
                	
                </label>
                
     <hr />
     
      <label>Shipping </label>
        		
                <label>
                 <select name="shipping" class="input-xlarge">
                	<option value="0">No</option>
                    <option value="1" <?=($v[0]['shipping_charges'] == '1') ? 'selected':''?>>Yes</option>
                </select>
                	
                </label>
                
     <hr />
     
     
      <label>Discount </label>
        		
                <label>
                	<input type="text" name="discount" class="input-xlarge" value="<?=$v[0]['discount']?>" />
                </label>
                
     <hr />
     
     </div>
     
     
    </div> <!-- two -->
    
    <div class="tab-pane" id="tab3">
    
        <label>Short Description <sup>*</sup></label>
     
     <label>
     		<textarea name="sht_details" class="input-xxlarge" rows="6"><?=$v[0]['products_sht_des']?></textarea>
     </label>
     
     
     
     <hr />
        <label>Description</label>
     
     <label>
     		<textarea name="details" class="input-xxlarge" rows="6"><?=$v[0]['products_description']?></textarea>
     </label>
     
     
     
     <hr />
    </div> <!-- three -->
    
    <div class="tab-pane" id="tab4">
    
    <?php $i = array();
	 foreach( $images as $img ) :
    			$i[] = $img;
     endforeach?>
      
      	<input type="file" name="image[]" />
        	
                <?php if( !empty($i[0]->image) and file_exists('./Public/ProductImages/'.$i[0]->image) ): ?>
			<!--   <input type="hidden" name="product_image[]" value="<?php echo $i[0]->image; ?>"  />-->
	<img src="<?=base_url()?>/Public/ProductImages/<?=$i[0]->image?>" style="height:70px; width:70px;" />
                   
				   <?php  //else:  ?>
				   
				   <?php  endif; ?>
        <hr />
        <input type="file" name="image[]" />
        	   <?php if( !empty($i[1]->image) and file_exists('./Public/ProductImages/'.$i[1]->image) ): ?>
				
	<img src="<?=base_url()?>/Public/ProductImages/<?=$i[1]->image?>" style="height:70px; width:70px;" />
                   
				   <?php endif; ?>
        <hr />
        <input type="file" name="image[]" />
        	   <?php if( !empty($i[2]->image) and file_exists('./Public/ProductImages/'.$i[2]->image) ): ?>
				   
	<img src="<?=base_url()?>/Public/ProductImages/<?=$i[2]->image?>" style="height:70px; width:70px;" />
                   
				   <?php endif; ?>
        <hr />
        <input type="file" name="image[]" />
        
        	   <?php if( !empty($i[3]->image) and file_exists('./Public/ProductImages/'.$i[3]->image) ): ?>
				   
	<img src="<?=base_url()?>/Public/ProductImages/<?=$i[3]->image?>" style="height:70px; width:70px;" />
                   
				   <?php endif; ?>
        	
        <hr />
        <input type="file" name="image[]" />
        
           <?php if( !empty($i[4]->image) and file_exists('./Public/ProductImages/'.$i[4]->image) ): ?>
				   
	<img src="<?=base_url()?>/Public/ProductImages/<?=$i[4]->image?>" style="height:70px; width:70px;" />
                   
				   <?php endif; ?>
      		
      
    </div> <!-- four -->
    
    
  </div>
  
</div> <!-- close tabbable-->
     
  
          
          <?=form_close()?>  
              
        </fieldset>
        
</div>

 <script language="javascript" type="text/javascript">
  	tinyMCE.init({
    theme : "advanced",
    mode: "exact",
    elements : "details",
    plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
    height:"400px",
    width:"90%"
});
</script>