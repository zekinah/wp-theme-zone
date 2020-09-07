<?php
/**
 * themezone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themezone
 */
/**
 * Exit if accessed directly.
 */ 
defined( 'ABSPATH' ) || exit;

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );


// Get the theme data.
$the_theme     = wp_get_theme();
$theme_name    = $the_theme->get( 'Name' );
$theme_version = $the_theme->get( 'Version' );

/**
 * Currently theme name and version.
 */
define( 'THEME_NAME', $theme_name );
define( 'THEME_VERSION', $theme_version );

/**
 * Theme Zone Url Administrator
 */
define('THEME_ZONE_URI', THEME_DIR .'/themezone-options/');

/** 
 * Required Files Array Definition.
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
	//'/woocommerce.php',					// Uncomment this if the woocommerce installed it will initialize Custom functions/templates for WooCommerce
);

foreach ($requireFiles as $file) {
	require THEME_DIR . '/inc' . $file;
}

/** 
 * Initialize admininstrator options
*/
require THEME_ZONE_URI . '/class-themezone.php';

function run_theme_zone() {
	$theme = new Themezone();
	$theme->run();
}
run_theme_zone();