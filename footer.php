<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themezone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'themezone_container_type' );
?>

	<?php get_template_part( 'template-parts/widget', 'footerfull' ); ?>

	<div class="wrapper" id="wrapper-footer">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-md-6">
					<?php echo do_shortcode('[copyright]'); ?>
				</div>
				<div class="col-md-6">
					<?php echo do_shortcode('[copyright-developer]'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<footer class="site-footer" id="colophon">
						<div class="site-info">
							<?php themezone_site_info(); ?>
						</div><!-- .site-info -->
					</footer><!-- #colophon -->
				</div><!--col end -->
			</div><!-- row end -->
		</div><!-- container end -->
	</div><!-- wrapper end -->
</div><!-- #page we need this extra closing tag here -->
<?php wp_footer(); ?>
</body>
</html>