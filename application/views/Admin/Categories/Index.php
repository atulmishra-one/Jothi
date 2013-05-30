<div class="">
	
    <fieldset>
    	<div class="breadcrumb"><img src="<?=site_url('Public/Images/category.png')?>" />&nbsp; <strong>Category</strong>
        <?=anchor('admin/categories/add_categories', 'Add New', array('class'=>'btn btn-mini btn-primary pull-right'))?>
        </div>
    	<table class="table table-bordered">
        		<thead class="well">
                	<th>Category Name</th>
                  
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
          <?php foreach( $categories as $c ) : ?>
                <tr id="bar<?=$c['CategoriesId']?>">
               		<td>
                    
                    <?php  if( !empty ($c['CategoriesImage']) ): ?>
                    
                   	 <img src="<?=site_url('Public/CategoriesImages/'.$c['CategoriesImage'])?>" />
					
					<?php endif; ?>
                    
                    <?=$c['CategoriesName']?>
                    	
                    </td>
                    
                    
                    <td>
                    	<?=anchor('admin/categories/edit/'.$c['CategoriesId'], '<i class="icon-edit"></i>')?>
                    </td>
                    	
                    	<td>
                        
                        <?=anchor('admin/categories/delete/'.$c['CategoriesId'], '<i class="icon-remove"></i>', array('class'=>'del', 'id'=>$c['CategoriesId']))?>
                    
                    </td> 
                 </tr>
           <?php endforeach;?>
               </tbody>
        </table>
        
        <?=$pagination?>
    </fieldset>
    
    
</div>