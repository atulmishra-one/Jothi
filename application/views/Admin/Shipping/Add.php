<script>
	$(document).ready(function(e) {
        	
			$('#frm').submit(function(e) {
                
					$('#loader').show();
            });
			
			$('#frm').ajaxForm(function(data){
					$('#loader').hide();
					
					if(data == "s")
					{
						$('.res').html('<div class="alert alert-success">Success !</div>');
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
                <div class="breadcrumb"><img src="<?=site_url('Public/Images/shipping.png')?>" />&nbsp; <strong>Shipping</strong>
                
     <input type="submit" name="btn" value="Save" class="pull-right btn btn-primary btn-small" />  
     </div>
     <div class="res"></div>
     <div>
     
     
     	
        	<label>Shipping rate <sup>*</sup></label>
        		
                <label>
                	<input type="text" name="shipping_rate" class="input-xxlarge" value="<?=$v[0]['shipping_rate']?>" />
                </label>
     <hr />
     
     
     	    	<label>Status <sup>*</sup></label>
        		
                <label>
                	<select name="status" class="input-xxlarge">
                   		 <option value="0">Disabled</option>
                    	<option value="1" <?=($v[0]['shipping_status'] == 1)? 'selected': ''?>>Enabled</option>
                        
                    </select>
                </label>
     <hr />
     
    
     
  
     
              </div>  
          
          <?=form_close()?>  
              
        </fieldset>
        
        

    
    
</div>


	








