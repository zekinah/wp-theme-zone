<?php
/**
 * eXePress Dynamic Sidebar definition.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eXePress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function exepress_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'exepress' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'exepress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'exepress_widgets_init' );