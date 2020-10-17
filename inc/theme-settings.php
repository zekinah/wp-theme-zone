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
if( ! function_exists( 'zn_option_get' ) ) {
	function zn_option_get( $option_id, $default = null ){
		$settings_value = get_option('themezone');
		if(is_array($settings_value)) {
			if (array_key_exists($option_id,$settings_value)) {
				return $settings_value[$option_id];
			}
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

// themezone 
add_action('wp_footer', 'themezone_enable_addons');
if( ! function_exists( 'themezone_enable_addons' ) ) {
	function themezone_enable_addons() {

		// Enable Scroll Reveal
		if(zn_option_get('scrollreveal-options')) { 
			wp_enqueue_script( 'scroll-reveal',  THEME_URI .'/src/js/themezone/scrollreveal/scrollreveal.min.js',array('jquery'), THEME_VERSION);
		}
		// Enable JS Parallax
		if(zn_option_get('jsparallax-options')) { 
			wp_enqueue_script( 'parallax', THEME_URI . '/src/js/themezone/parallax/parallax.min.js',array(), THEME_VERSION);
		}
		// Enable Dark Mode
		if(zn_option_get('darkmode-options')) {
			wp_enqueue_script( 'dark-mode', THEME_URI . '/src/js/themezone/darkmode/darkmode-js.min.js',array(), THEME_VERSION);

			$darkmode_js = '';
			if($darkmode_js = zn_option_get('darkmode-custom-options')) {
				$darkmode_js .= 'const darkmode = new Darkmode('.$darkmode_js.');darkmode.showWidget();'; // Custom Dark Mode
			} else {
				$darkmode_js .= 'const darkmode = new Darkmode();darkmode.showWidget();'; // Default
			}
			
			echo '<!-- script | darkmode js -->'."\n";
			echo '<script defer id="zn-darkmode-js">'."\n";
				echo $darkmode_js ."\n";
			echo '</script>'."\n";
		}

	}
}

// themezone custom style
add_action('wp_head', 'themezone_styles_custom');
if( ! function_exists( 'themezone_styles_custom' ) ) {
	function themezone_styles_custom() {
		// Theme Options > Custom CSS
		if( $custom_css = zn_option_get( 'custom-css' ) ) {
			echo '<!-- style | custom css | theme options -->'."\n";
			echo '<style id="zn-theme-css">'."\n";
				echo $custom_css ."\n";
			echo '</style>'."\n";
		}

		// Theme Options > Colors > General
		$color_styles = '';
		if( $bg_scroll = zn_option_get( 'background-scroll' ) ){
			$color_styles .= '::-webkit-scrollbar-thumb {background: '. $bg_scroll .' !important;} ';
			$color_styles .= '.scrollbar {background: '. $bg_scroll .' !important;} ';
		}

		if( $bg_header = zn_option_get( 'background-header' ) ){
			$color_styles .= 'nav#main-nav {background-color: '. $bg_header .' !important;} ';
		}
		if( $bg_page = zn_option_get( 'background-page' ) ){
			$color_styles .= 'div#index-wrapper {background-color: '. $bg_page .';} ';
		}
		if( $bg_footer = zn_option_get( 'background-footer' ) ){
			$color_styles .= 'footer {background-color: '. $bg_footer .';} ';
		}
		if( $bg_scroll_top = zn_option_get( 'background-scroll-top' ) ){
			$color_styles .= '#zn-scroll-to-top {background-color: '. $bg_scroll_top .';} ';
		}

		if( $color_styles ){
			echo '<!-- style | custom color -->'."\n";
			echo '<style id="zn-color-css">'."\n";
				echo $color_styles."\n";
			echo '</style>'."\n";
		}

	}
}

// themezone custom script
add_action('wp_footer', 'themezone_scripts_custom', 100);
if( ! function_exists( 'themezone_scripts_custom' ) ) {
	function themezone_scripts_custom() {
		// Theme Options > Custom JS
		if( $custom_js = zn_option_get( 'custom-js' ) ){
			echo '<!-- script | custom js -->'."\n";
			echo '<script id="zn-custom-js">'."\n";
				echo $custom_js ."\n";
			echo '</script>'."\n";
		}
	}
}

// themezone scroll to top
add_action('wp_footer', 'themezone_scroll_top');
if ( ! function_exists( 'themezone_scroll_top' ) ) {
	function themezone_scroll_top(){
		// Theme Options > Global > General > Scroll to top
		$settings_value = get_option('themezone');
		if(is_array($settings_value)) {
			if(array_key_exists('scroll-to-top-options',$settings_value)) {
				if($settings_value['scroll-to-top-options']) {
					echo '<div id="zn-scroll-to-top" title="Scroll to top"><i class="fa fa-arrow-up"></i></div>';
				}
			}
		}
	};
}
