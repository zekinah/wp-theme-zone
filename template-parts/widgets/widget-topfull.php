<?php
/**
 * TopFull sidebar setup
 *
 * @package themezone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'themezone_container_type' );
?>
<?php if ( is_active_sidebar( 'topfull' ) ) : ?>
	<div class="wrapper" id="wrapper-top-full">
        <div class="<?php echo esc_attr( $container ); ?>" id="wrapper-static-content" tabindex="-1">
            <div class="row">
                <?php dynamic_sidebar( 'topfull' ); ?>
            </div>
        </div>
	</div><!-- #wrapper-static-hero -->
	<?php
endif;
