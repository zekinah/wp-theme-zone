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

// themezone settings adding to a shortcode and call by option id - Example - do_shortcode('option-id');
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

// return a value from themezone settings by option id - Example - zn_option_get('option-id');
if( ! function_exists( 'zn_option_get' ) ){
	function zn_option_get( $option_id, $default = null ){
		$settings_value = get_option('themezone');
		if( is_array($settings_value) || array_key_exists($option_id,$settings_value)) {
			return $settings_value[$option_id];
		}
		return $default;
	}
}

// themezone navigation
add_shortcode( 'themezone_navigation', 'themezone_navigation' );
if ( ! function_exists( 'themezone_navigation' ) ) {
	function themezone_navigation(){
		$nav = wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav ml-auto',
					'depth'           => 2,
					'menu_id'        => 'primary-menu',
					'walker'          => new WP_Bootstrap_Navwalker(),
				)
			);
		return $nav;
	}
}

// themezone scroll to top
add_action('wp_footer', 'themezone_scroll_top');
if ( ! function_exists( 'themezone_scroll_top' ) ) {
	function themezone_scroll_top(){
		$settings_value = get_option('themezone');
		if(array_key_exists('scroll-to-top-options',$settings_value)) {
			if($settings_value['scroll-to-top-options']) {
				echo '<div id="zn-scroll-to-top" title="Scroll to top"><i class="fa fa-arrow-up"></i></div>';
			}
		}
	};
}
