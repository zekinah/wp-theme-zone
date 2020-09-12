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
	'/libs/class-wp-bootstrap-navwalker.php'    // Load custom WordPress nav walker
);

foreach ($requireFiles as $file) {
	require_once THEME_DIR . '/inc' . $file;
}

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			require_once THEME_DIR . '/inc/woocommerce.php'; // Initialize Custom functions/templates for WooCommerce
		 } 
	}
}

/** 
 * Dashboard
*/
if( is_admin() ){
	/** 
	 * Initialize admininstrator options
	*/
	function run_theme_zone() {
		$adminrequireFiles = array(
			'/class-themezone.php',				// Initialize theme dashboard.
			'/class-themezone-options.php',		// Collection of Menus and Section
			'/class-themezone-tgmpa.php',       // Loads Recommended Plugins.
			'/class-themezone-support.php',     // Manual and Support.
		);
		
		foreach ($adminrequireFiles as $adminfile) {
			require_once THEME_ZONE_URI . $adminfile;
		}
		
		$themezone_options = new Themezone_Options(); // Execute Themezone_Options
		$theme = new Themezone($themezone_options);
		$theme->run();
	}

	run_theme_zone();
}