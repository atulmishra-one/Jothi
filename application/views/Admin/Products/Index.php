<div class="">
	
    <fieldset>
    	<div class="breadcrumb"><img src="<?=site_url('Public/Images/product.png')?>" />&nbsp; <strong>Products</strong>
        <?=anchor('admin/products/add_products', 'Add New', array('class'=>'btn btn-mini btn-primary pull-right'))?>
        </div>
      
      <form method="get">
        	
    	<table class="table table-bordered">
        		<thead class="well">
                	<th>Image</th>
                  	<th>Product name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Stock</th>
                    <th>Action</th>
                </thead>
                <thead class="alert alert-success">
                	<th></th>
                  	<th><input type="text" name="p" class="span4" /></th>
                    <th><input type="text" name="q" class="span3" /></th>
                    <th><select class="span5" name="s">
                    	<option></option>
                        <option value="0">Enabled</option>
                         <option value="1">Disabled</option>
                    </select></th>
                    <th><select class="span5" name="stk">
                    	<option></option>
                        <option value="0">InStock</option>
                         <option value="1">Out Of Stock</option>
                    </select></th>
                    <th>
                    	<input type="submit" value="Filter" class="btn btn-small btn-primary" />
                    </th>
                </thead>
                <tbody>
          <?php foreach($products as $p ) : ?>
                <tr id="bar<?=$p['products_id']?>">
               		<td>
                    
                   <?php if( !empty($p['image']) and file_exists('./Public/ProductImages/'.$p['image']) ): ?>
				   
	<img src="<?=base_url()?>/Public/ProductImages/<?=$p['image']?>" style="height:60px; width:70px;" />
                   
				   <?php else: ?>
				   
    <img src="<?=base_url()?>/Public/Images/no_image-40x40.jpg" title="Image Not Aviable" />             	
				   
				   <?php endif;?>
                   
                    	
                    </td>
                    
                    	
                    
                    <td>
                    	<?=$p['products_name']?>
                    </td>
                    	
                    	
                     <td>
                        
                     <?=$p['products_qty']?>  
                    
                    
                    </td> 
                    
                    <td>
                    	<?=($p['products_status'] == 0)? 'Enabled':'Disabled'?>
                    </td>	
                    
                    <td>
                    	<?=($p['stock_status'] == 0)? 'In Stock':'Out of Stock'?>
                    </td>
                    
                    <td>
                    	<?=anchor('admin/products/edit/'.$p['products_id'], '<i class="icon-edit"></i>')?>
                        &nbsp;
                        <?=anchor('admin/products/delete/'.$p['products_id'], '<i class="icon-remove"></i>', array(
						'class'=>'del',
						'id'=> $p['products_id']
						))?>
                    </td>
                 </tr>
          <?php endforeach; ?> 
               </tbody>
        </table>
       </form>
        
        <?=$pagination?>
    </fieldset>
    
    
</div>