function znUpload(){
	(function($) {

		jQuery( 'img[src=""]' ).attr( 'src', zn_upload.url );

		jQuery( '.zn-opts-upload' ).click( function( event ) {   
        	event.preventDefault();
        	
        	var activeFileUploadContext = jQuery( this ).parent();
        	var type = jQuery( 'input', activeFileUploadContext ).attr( 'class' );
        	
        	custom_file_frame = null;

            // Create the media frame.
            custom_file_frame = wp.media.frames.customHeader = wp.media({
            	title: jQuery(this).data( 'choose' ),
            	library: {
            		type: type
            	},
                button: {
                    text: jQuery(this).data( 'update' )
                }
            });

            custom_file_frame.on( "select", function() {
            	var attachment = custom_file_frame.state().get( "selection" ).first();

                // Update value of the targetfield input with the attachment url.
                jQuery( '.zn-opts-screenshot', activeFileUploadContext ).attr( 'src', attachment.attributes.url );
                jQuery( 'input', activeFileUploadContext )
            		.val( attachment.attributes.url )
            		.trigger( 'change' );

                jQuery( '.zn-opts-upload', activeFileUploadContext ).hide();
                jQuery( '.zn-opts-screenshot', activeFileUploadContext ).show();
                jQuery( '.zn-opts-upload-remove', activeFileUploadContext ).show();
            });

            custom_file_frame.open();
        });

	    jQuery( '.zn-opts-upload-remove' ).click( function( event ) {
	    	event.preventDefault();
	    	
	        var activeFileUploadContext = jQuery( this ).parent();
	
	        jQuery( 'input', activeFileUploadContext ).val('');
	        jQuery( this ).prev().fadeIn( 'slow' );
	        jQuery( '.zn-opts-screenshot', activeFileUploadContext ).fadeOut( 'slow' );
	        jQuery( this ).fadeOut( 'slow' );
	    });

	})(jQuery);
}
	
jQuery(document).ready(function($){
	var zn_upload = new znUpload();
});
