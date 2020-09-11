<?php 

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// themezone Pagination
if ( ! function_exists( 'themezone_pagination' ) ) {
	function themezone_pagination() {
		global $wp_query;
		$big = 999999999; // need an unlikely integer
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'prev_text'          => __('«'),
			'next_text'          => __('»'),
			'total' => $wp_query->max_num_pages
		) );
	}
}

// themezone Excerpt
if ( ! function_exists( 'themezone_excerpt' ) ) {
	function themezone_excerpt($length) {
		if(strlen(get_the_excerpt()) >= $length){
			$excerpt =  substr(get_the_excerpt(),0,$length).'...';
		}else{
			$excerpt = get_the_excerpt();
		}
		return $excerpt;
	}
}

// themezone settings
add_action( 'init', 'themezone_settings' );
if ( ! function_exists( 'themezone_settings' ) ) {
	function themezone_settings() {
		if(is_array(get_option('themezone'))) {
			$settings_value = get_option('themezone');
			foreach ($settings_value as $z => $set) {
				add_shortcode( $z,function() use($set) {
					return do_shortcode($set);
				});
			}
		}
	}
}
