<?php
/**
 * themezone enqueue scripts
 *
 * @package themezone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'themezone_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function themezone_scripts() {

		$css_version = THEME_VERSION . '.' . filemtime( THEME_DIR . '/css/theme.min.css' );
		wp_enqueue_style( 'themezone-styles', THEME_URI . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = THEME_VERSION . '.' . filemtime( THEME_DIR . '/js/theme.min.js' );
		wp_enqueue_script( 'themezone-scripts', THEME_URI . '/js/theme.min.js', array(), $js_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'themezone_scripts' ).

add_action( 'wp_enqueue_scripts', 'themezone_scripts' );