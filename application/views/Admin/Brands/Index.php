<div class="">
	
    <fieldset>
    	<div class="breadcrumb"><img src="<?=site_url('Public/Images/shipping.png')?>" />&nbsp; <strong>Brands</strong>
        <?=anchor('admin/brands/add_brands', 'Add New', array('class'=>'btn btn-mini btn-primary pull-right'))?>
        </div>
    	<table class="table table-bordered">
        		<thead class="well">
                	<th>Brand Name</th>
                  
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
          <?php foreach( $brands as $b ) : ?>
                <tr id="bar<?=$b->brandsId?>">
               		<td>
                    
                    <?php  if( !empty ($b->brandsImage) ): ?>
                    
                   	 <img src="<?=site_url('Public/BrandsImages/'.$b->brandsImage)?>" />
					
					<?php endif; ?>
                    
                    <?=$b->brandsName?>
                    	
                    </td>
                    
                    
                    <td>
                    	<?=anchor('admin/brands/edit/'.$b->brandsId, '<i class="icon-edit"></i>')?>
                    </td>
                    	
                    	<td>
                        
                        <?=anchor('admin/brands/delete/'.$b->brandsId, '<i class="icon-remove"></i>', array('class'=>'del', 'id'=>$b->brandsId))?>
                    
                    </td> 
                 </tr>
           <?php endforeach;?>
               </tbody>
        </table>
        
        <?=$pagination?>
    </fieldset>
    
    
</div>