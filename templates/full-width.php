<?php
/**
 * Template Name: Full-width No Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eXePress
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'exepress_container_type' );
?>
<div class="wrapper" id="full-width-wrapper" class="full-width site-content">
<?php if ( have_posts() ) : ?>
	<header class="page-header p-5">
		<h1 class="text-center page-title"><?php the_title(); ?></h1>
	</header>
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md content-area" id="primary">
				<main id="primary" class="site-main">
					<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( '../template-parts/content', get_post_type() );
						endwhile;
						the_posts_navigation();
					?>
				</main><!-- #main -->
			</div>
			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- #content -->
	<?php
	endif;
	?>
</div><!-- #archive-wrapper -->
<?php
get_footer();