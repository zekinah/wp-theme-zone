<?php
/**
 * Sidebar setup for footer full
 *
 * @package eXePress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'exepress_container_type' );
?>
<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>
	<div class="wrapper" id="wrapper-footer-full">
		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">
			<div class="row">
				<?php dynamic_sidebar( 'footerfull' ); ?>
			</div>
		</div>
	</div><!-- #wrapper-footer-full -->
	<?php
endif;