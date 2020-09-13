<?php
/**
 * Custom hooks
 *
 * @package themezone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'themezone_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function themezone_site_info() {
		do_action( 'themezone_site_info' );
	}
}

add_action( 'themezone_site_info', 'themezone_add_site_info' );
if ( ! function_exists( 'themezone_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function themezone_add_site_info() {

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'themezone' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'themezone' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'themezone' ),
				THEME_NAME,
				'<a href="' . esc_url( __( 'http://www.zekinahlecaros.com', 'themezone' ) ) . '" target="blank">zekinahlecaros.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'themezone' ),
				THEME_VERSION
			)
		);

		echo apply_filters( 'themezone_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
