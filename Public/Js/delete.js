// JavaScript Document

$(document).ready(function(e) {
    


$('.del').click(function(e) {
    
	if(confirm('Are you sure you want to delete this item?'))
	{
		var delitem = $(this).attr('id');
		
		var page = $(this).attr('href');
		
		$('#bar'+delitem).fadeOut("slow");
		$.post(page,{},function(){
			
		});
	}
	e.preventDefault();
	return false;
});

});