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
        
      
                <div class="breadcrumb"><img src="<?=site_url('Public/Images/shipping.png')?>" />&nbsp; <strong>Shipping</strong>
                
    
     </div>
    
       
          
          
              
        </fieldset>
        
        <table class="table table-bordered table-hover">
    	<thead>
        	<th>Shipping Method</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        
        <tbody>
        <?php foreach($shipping as $ship ) : ?>	
            	<tr>
                	<td>
                    	<?=($ship['shipping_type'] == 0) ? 'Flat Shipping': ' Per Items' ?>
                    </td>
                    <td>
                    	<?=($ship['shipping_status'] == 1) ? 'Enabled': ' Disabled' ?>
                    </td>
                    <td>
                    	<?=anchor('admin/shipping/edit/'.$ship['shipping_id'], '<i class="icon-edit"></i>')?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        
        
    </table>

    
    
</div>


	








