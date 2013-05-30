<script>
	$(document).ready(function(e) {
        	
			$('#frm').submit(function(e) {
                	
					if( document.frm.category_name.value == "" ) {
						document.frm.category_name.focus();
						return false;
					}
					
					$('#loader').show();
            });
			
			$('#frm').ajaxForm(function(data){
					$('#loader').hide();
					
					if(data == "s")
					{
						$('.res').html('<div class="alert alert-success">Category Updated!</div>');
					}
					else{
						alert(data);
					}
			});
    });
</script>
<div>
	
<fieldset>
       
        <?=form_open_multipart('', array('id'=>'frm', 'name'=>'frm'))?>
                <div class="breadcrumb"><img src="<?=site_url('Public/Images/category.png')?>" />&nbsp; <strong>Category</strong>
                
     <input type="submit" name="btn" value="Save" class="pull-right btn btn-primary btn-small" />  
     </div>
     <div class="res"></div>
     <div style="height:500px; overflow-y:scroll">
     
     	
        	<label>Category name <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="category_name" class="input-xxlarge" value="<?=$v[0]['CategoriesName']?>" />
                </label>
     <hr />
     
     
        	<label>Parent Category </label>
        		
                <label>
                	<select name="parent_id" class="input-xxlarge">
                    	<option value="0">None</option>
                        	<?php foreach($categories as $c):?>
                   <option value="<?=$c['CategoriesId']?>" <?=($c['CategoriesId'] == $v[0]['ParentId'])? 'selected': ''?>><?=$c['CategoriesName']?></option>
                           <?php endforeach;?>
                           
                    </select>
                </label>
                
                <hr />
     
     <label>Description</label>
     
     <label>
     		<textarea name="details" class="input-xxlarge" rows="6"><?=$v[0]['CategoriesDetails']?></textarea>
     </label>
     
     <?=anchor('admin/Editor/TinyMce', 'Use Editor', array('class'=>'fancybox fancybox.iframe btn btn-mini btn-info'))?>
     
     <hr />
     
     <label>Image</label>
     
     <label>
     		<input type="file" name="image" />
             <?php  if( !empty ($v[0]['CategoriesImage']) ): ?>
                    
                   	 <img src="<?=site_url('Public/CategoriesImages/'.$v[0]['CategoriesImage'])?>" />
					
					<?php endif; ?>
     </label>
     
     <hr />
     <label>Status</label>
     
     <label>
     		<select name="status">
            	<option value="0">Enabled</option>
                <option value="1" <?=($v[0]['status'] == 1)? 'selected': ''?>>Disabled</option>
            </select>
     </label>
              </div>  
          
          <?=form_close()?>  
              
        </fieldset>
        
        <link href="<?=config_item('BootStrap')?>" rel="stylesheet">

    
    
</div>