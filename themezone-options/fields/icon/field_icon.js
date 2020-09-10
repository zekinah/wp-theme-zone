jQuery(document).ready(function($){
	
	$('.zn-icon-select .zn-icon').click(function(){
		
		var field = $(this).closest('.zn-icon-field');
		var input = field.find('.zn-icon-input');
		
		var icon = $(this).attr('data-rel');
		
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		input.val( icon );			
			
	});
	
});