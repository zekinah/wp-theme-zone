
<?php
/**
 * Navigation Left
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themezone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-dark" aria-labelledby="main-nav-label">
	<h2 id="main-nav-label" class="sr-only">
		<?php esc_html_e( 'Main Navigation', 'themezone' ); ?>
	</h2>
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'themezone' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- The WordPress Menu goes here -->
		<?php echo do_shortcode('[themezone_navigation]'); ?>

		<!-- Your site title as branding in the menu -->
		<?php if ( ! has_custom_logo() ) { ?>
				
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="navbar-brand mb-0 mr-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<a class="navbar-brand mr-0" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>

		<?php
		} else {
			the_custom_logo();
	}?>
	</div><!-- .container -->
</nav><!-- .site-navigation -->

