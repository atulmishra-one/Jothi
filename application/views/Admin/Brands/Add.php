<script>
	$(document).ready(function(e) {
        	
			$('#frm').submit(function(e) {
                	
					if( document.frm.brands_name.value == "" ) {
						document.frm.brands_name.focus();
						return false;
					}
					
					$('#loader').show();
            });
			
			$('#frm').ajaxForm(function(data){
					$('#loader').hide();
					
					if(data == "c"){
						$('.res').html('<div class="alert alert-error">Brand Name is Already There!</div>');
					}
					else if(data == "s")
					{
						$('.res').html('<div class="alert alert-success">Brand Name Added!</div>');
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
                <div class="breadcrumb"><img src="<?=site_url('Public/Images/shipping.png')?>" />&nbsp; <strong>Brands</strong>
                
     <input type="submit" name="btn" value="Save" class="pull-right btn btn-primary btn-small" />  
     </div>
     <div class="res"></div>
     <div style="height:500px; overflow-y:scroll">
     
     	
        	<label>Brand name <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="brands_name" class="input-xxlarge" />
                </label>
     <hr />
     
     
     <label>Image</label>
     
     <label>
     		<input type="file" name="image" />
     </label>
     
     <hr />
     
              </div>  
          
          <?=form_close()?>  
              
        </fieldset>
        
        

    
    
</div>