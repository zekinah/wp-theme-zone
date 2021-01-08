(function( $ ) {
	'use strict';
	$ = jQuery.noConflict();

	function themezoneoptions(){

		// syntax highlighter
		var editor = ['css','javascript'];
		var editorEl, editorInstance;
	
		$.each( editor, function( index, value ){
	
		  editorEl = $( '.custom-'+ value +' textarea' );
	
		  if ( typeof zn_cm === 'undefined' ) {
			return true;
		  }
	
		  if( ! editorEl.length ){
			return true;
		  }
	
		  if( wp.codeEditor === undefined ){
			return true;
		  }
	
		  editorEl.attr( 'id', 'custom-'+ value );
	
		  wp.codeEditor.defaultSettings.codemirror.mode = 'text/'+ value;
	
		  editorInstance = wp.codeEditor.initialize( 'custom-'+ value, zn_cm[value] );
		  editorInstance.codemirror.setOption( 'lint', true );
		  editorInstance.codemirror.refresh();
		});
			
		// show 1st at start	
		if( $('#last_tab').val() == 0 ){
			this.tabid = $('.zn-submenu-a:first').attr('data-rel');
		} else {
			this.tabid = $('#last_tab').val();
		}
	
		$('#'+this.tabid+'-zn-section').show();
		$('#'+this.tabid+'-zn-submenu-li').addClass('active').parent('ul').show().parent('li').addClass('active');
		
		// parent manu click - show childrens and select 1st
		$('.zn-menu-a').click(function(){
			
			if( ! $(this).parent().hasClass('active') ) {
				
				$('.zn-menu-li').removeClass('active');
				$('.zn-submenu').slideUp('fast');
				
				$(this).next('ul').stop().slideDown('fast');
				$(this).parent('li').addClass('active');
				
				$('.zn-submenu-li').removeClass('active');
				$('.zn-section').hide();
				
				this.tabid = $(this).next('ul').children('li:first').addClass('active').children('a').attr('data-rel');
				$('#'+this.tabid+'-zn-section').stop().fadeIn(1200);
				$('#last_tab').val(this.tabid);
			}
			
		});
		
		// submenu click
		$('.zn-submenu-a').click(function(){
			
			if( ! $(this).parent().hasClass('active') ) {
	
				$('.zn-submenu-li').removeClass('active');
				$(this).parent('li').addClass('active');
				
				$('.zn-section').hide();
				
				this.tabid = $(this).attr('data-rel');
				$('#'+this.tabid+'-zn-section').stop().fadeIn(1200);
				$('#last_tab').val(this.tabid);
			}
			
		});
		
		// last w menu
		$('.zn-submenu .zn-submenu-li:last-child').addClass('last');
	
		
		// reset
		$( '.reset-pre-confirm' ).click( function(){
			$( this ).closest( '.step-1' ).hide().next().fadeIn( 200 );
		});
		
		$( '.zn-popup-reset' ).click(function(){
			
			if( $( '.reset-security-code' ).val() != 'r3s3t' ){
				alert( 'Please insert correct security code: r3s3t' );
				return false;
			}
			
			if( confirm( "Are you sure?\n\nClicking this button will reset all custom values across your entire Theme Options panel" ) ){
				$( this ).val( 'Resetting...' );
				return true;
			} else {
				return false;
			}
		});
		
		
		// import code button
		$('.zn-import-imp-code-btn').click(function(){
			$('.zn-import-imp-link-wrapper').hide();
			$('.zn-import-imp-code-wrapper').stop().fadeIn(500);
		});
		
		// import link button
		$('.zn-import-imp-link-btn').click(function(){
			$('.zn-import-imp-code-wrapper').hide();
			$('.zn-import-imp-link-wrapper').stop().fadeIn(500);
		});
		
		// export code button
		$('.zn-import-exp-code-btn').click(function(){
			$('.zn-import-exp-link').hide();
			$('.zn-import-exp-code').stop().fadeIn(500);
		});
		
		// export link button
		$('.zn-import-exp-link-btn').click(function(){
			$('.zn-import-exp-code').hide();
			$('.zn-import-exp-link').stop().fadeIn(500);
		});
		
	}
		
	$(document).ready(function(){
		new themezoneoptions();
	});

})( jQuery );
