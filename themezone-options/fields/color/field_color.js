/**
 * wp-color-picker-alpha
 *
 * Overwrite Automattic Iris for enabled Alpha Channel in wpColorPicker
 * Only run in input and is defined data alpha in true
 *
 * Version: 2.1.3
 * https://github.com/kallookoo/wp-color-picker-alpha
 * Licensed under the GPLv2 license.
 */

jQuery( document ).ready( function($){

	// Add Color Picker to all inputs that have 'color-field' class

    $( 'input.has-colorpicker' ).wpColorPicker({
    	mode	: 'hsl',
    	width	: 275
    });

});
