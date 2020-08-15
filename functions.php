<?php
/**
 * eXePress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eXePress
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/** 
 * 
 * Required Files Array Definition.
 * 
*/
$requireFiles = array(
	'/setup.php',
	'/theme-settings.php',				// Initialize theme default settings.
	'/enqueue.php',						// Enqueue scripts and styles.// Enqueue scripts and styles. 
	'/dynamic-sidebar.php',				// Functions Definitions for Dynamic Sidebars (Widgets)
	'/custom-header.php',				// Initialize Custom header
	'/template-tags.php', 				// Custom template tags for this theme.
	'/template-functions.php',			// Functions definition for Page Templates.
	'/extras.php',                      // Custom functions that act independently of the theme templates.
	'/widgets.php',                      // Custom functions that act independently of the theme templates.
	'/customizer.php', 					// Customizer additions.
	'/jetpack.php',						// Load Jetpack compatibility file.
	'/woocommerce.php',					// Initialize Custom functions/templates for WooCommerce
);

foreach ($requireFiles as $file) {
	require get_template_directory() . '/inc' . $file;
}
