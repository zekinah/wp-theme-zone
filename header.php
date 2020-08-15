<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eXePress
 */
$container = get_theme_mod( 'exepress_container_type' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site" id="page">
<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">
		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'exepress' ); ?></a>
		<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-primary" aria-labelledby="main-nav-label">
		<?php if ( 'container' === $container ) : ?>
			<div class="container">
		<?php endif; ?>
					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
						<?php
					} else {
						the_custom_logo();
					}
					?>
					<!-- end custom logo -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'exepress' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'depth'           => 2,
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>
		</nav><!-- .site-navigation -->
	</div><!-- #wrapper-navbar end -->