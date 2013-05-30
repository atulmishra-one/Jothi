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
                	<input type="text" name="product_name" class="input-xxlarge" />
                </label>
                
     			<hr />
                
                <label>Brand Name </label>
        		
                <label>
                	<select class="input-xxlarge" name="brands">
                    	<option value="0">--None--</option>
                        	<?php foreach($getBrands as $b) : ?>
                            	
                                	<option value="<?=$b->brandsId?>"><?=$b->brandsName?></option>
                                
                            <?php endforeach; ?>
                    </select>
                </label>
                
     			<hr />
                
                
        	<label>Category <sup>*</sup></label>
        		
               
                	<div style="height:140px; overflow-y:scroll; border:1px solid #CCC; width:400px; font-size:11px;">
                  <div style="padding-left:3px;">
                    <?php foreach($categories as $c):?>
                    	<li style="display:block; padding:2px;">
                        <input type="checkbox" name="category_id[]" value="<?=$c['CategoriesId']?>" />
						&nbsp;<?=$c['CategoriesName']?>
                        </li>
                    <?php endforeach;?>
                   
                   </div>
                   
                </div>
                	
                        
                  
               
                
            <hr />
            
            
     <label>Status</label>
     
     <label>
     		<select name="status">
            	<option value="0">Enabled</option>
                <option value="1">Disabled</option>
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
                        	<option>INR</option>
                        </select>
                </label>
                
     <hr />
    
    
      <label>Product Price <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="product_price" class="input-large" />
                </label>
                
     <hr />
     
         <label>Product Weight <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="product_weight" class="input-large"  />
                </label>
                
     <hr />
     
        <label>Weight Class <sup>*</sup></label>
        		
                <label>
                	
                    <select name="weight_class">
                    	<option>Kg</option>
                        <option>Gram</option>
                        <option>Ltr</option>
                        <option>Pound</option>
                        <option>Ounce</option>
                    </select>
                    
                </label>
                
     <hr />
     
     <label>Quantity <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="quantity" class="input-xlarge" />
                </label>
                
     <hr />
     
      <label>Stock Status <sup>*</sup></label>
        		
                <label>
                <select name="stock_status" class="input-xlarge">
                	<option value="0">In Stock</option>
                    <option value="1">Out of Stock</option>
                </select>
                	
                </label>
                
     <hr />
     
      <label>Shipping Charges </label>
        		
                  <label>
                 <select name="shipping" class="input-xlarge">
                	<option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                
     <hr />
     
     
      <label>Discount </label>
        		
                <label>
                	<input type="text" name="discount" class="input-xlarge" />
                </label>
                
     <hr />
     
     </div>
     
     
    </div> <!-- two -->
    
    <div class="tab-pane" id="tab3">
    
    	    <label>Short Description <sup>*</sup></label>
     
     <label>
     		<textarea name="sht_details" class="input-xxlarge" rows="6"></textarea>
     </label>
     
     
     
     <hr />
    
        <label>Description</label>
     
     <label>
     		<textarea name="details" class="input-xxlarge" rows="6"></textarea>
     </label>
     
     
     
     <hr />
    </div> <!-- three -->
    
    <div class="tab-pane" id="tab4">
      
      	<input type="file" name="image[]" />
        <hr />
        <input type="file" name="image[]" />
        <hr />
        <input type="file" name="image[]" />
        <hr />
        <input type="file" name="image[]" />
        <hr />
        <input type="file" name="image[]" />
      		
      
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