<?php
/**
 * Template Name: Empty page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eXePress
 */

get_header(); 
	while (have_posts()){ 
		the_post(); 
		the_content();
	} 				
get_footer(); ?>