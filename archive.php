<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themezone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'themezone_container_type' );
?>
<div class="wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-8 content-area" id="primary">
				<main id="primary" class="site-main">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/contents/content', get_post_type() );
						endwhile;
						wp_reset_query();
						echo '<div class="pagination">'.themezone_pagination().'</div>'; // Pagination
					else :
						get_template_part( 'template-parts/contents/content', 'none' );
					endif;
					?>
				</main><!-- #main -->
			</div>
			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #archive-wrapper -->

<?php
get_footer();
