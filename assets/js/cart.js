// JavaScript Document
$(document).ready(function(e) {
    
	$('.addToCart').click(function(e) {
    	
			var page = $(this).attr('href');
			
			$(this).html('Loading..');
			
			$.post(page,{},function(data){
				
					$('.addToCart').html('add to cart');
					if(data == 's')
					{
						if(confirm("Successfully Added! \nWould you like view Cart?  ") )
						{
							window.location = './cart';
						}
						else{
							return false;
						}
					}
					else{
						alert(data);
					}
			});
			
			return false;
		    e.preventDefault();
    });
	
});