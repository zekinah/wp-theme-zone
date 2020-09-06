<?php
/**
 * Template Name: Empty page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themezone
 */

get_header(); 
	while (have_posts()){ 
		the_post(); 
		the_content();
	} 				
get_footer(); ?>