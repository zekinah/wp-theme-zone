jQuery(document).ready(function($){
	
	jQuery('.zn-radio-img').click(function(e){
		
		var el 			= $(this);
		var fieldset 	= $(this).closest('fieldset');
		
		fieldset.find('.zn-radio-img').removeClass('zn-radio-img-selected');
		el.addClass('zn-radio-img-selected');
		
		el.find('input[type="radio"]').attr('checked','checked');

	});
	
});