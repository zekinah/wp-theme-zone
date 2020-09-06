<?php
/**
 * themezone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/** 
 * 
 * Required Files Array Definition.
 * 
*/
$requireFiles = array(
	'/theme-settings.php',				// Initialize theme default settings.
	'/setup.php',                       // Theme setup and custom theme supports.
	'/widgets.php',                    	// Custom functions that act independently of the theme templates.
	'/enqueue.php',						// Enqueue scripts and styles.// Enqueue scripts and styles.
	'/template-tags.php', 				// Custom template tags for this theme. 
	'/hooks.php',                       // Custom hooks.
	'/extras.php',                      // Custom functions that act independently of the theme templates.
	'/customizer.php', 					// Customizer additions.
	'/custom-header.php',				// Initialize Custom header
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	//'/woocommerce.php',					// Initialize Custom functions/templates for WooCommerce
);

foreach ($requireFiles as $file) {
	require get_template_directory() . '/inc' . $file;
}
