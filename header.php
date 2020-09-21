<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'themezone_container_type' );
$navigation = zn_option_get('navigation-option');
$scrollbartop = zn_option_get('scroll-bar-top-options');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?=zn_option_get('favicon');?>" type="image/x-icon" />
	<?php wp_head(); ?>
	<?= zn_option_get('hook-top') ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<?php if ($scrollbartop) { echo '<div class="scrollbar" id="bar"></div>'; } ?>
<div class="site" id="page">
	<div id="wrapper-navbar">
		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'themezone' ); ?></a>
		
		<?php get_template_part( 'template-parts/navigations/navigation', $navigation ); ?>

	</div><!-- #wrapper-navbar end -->