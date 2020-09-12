
<?php
/**
 * Navigation Center
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themezone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
	<div class="row align-items-center">
		<div class="col-md-12 text-center">
			<!-- Your site title as branding in the menu -->
			<?php if ( ! has_custom_logo() ) { ?>
				
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title navbar-brand mb-0><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<a class="site-title navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>

			<?php
			} else {
				the_custom_logo();
			}?>
		</div>
		<div class="col-md-12">
			<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-dark" aria-labelledby="main-nav-label">
				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e( 'Main Navigation', 'themezone' ); ?>
				</h2>
				<div class="container">
					<button class="navbar-toggler d-block m-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'themezone' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- The WordPress Menu goes here -->
					<?php echo do_shortcode('[themezone_navigation]'); ?>
				</div><!-- .container -->
			</nav><!-- .site-navigation -->
		</div>
	</div>
