
<?php
/**
 * Content empty partial template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themezone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12">
			<div class="base-1 align-left">
			<?php dynamic_sidebar('site-logo'); ?>
			</div>
		</div>
		<div class="col-md-12">
			<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-dark" aria-labelledby="main-nav-label">
				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e( 'Main Navigation', 'themezone' ); ?>
				</h2>
				<?php echo do_shortcode('[themezone_navigation]'); ?>
			</nav>
		</div>
	</div>
</div>
