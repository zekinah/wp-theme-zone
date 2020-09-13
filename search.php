<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'themezone' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/contents/content', 'search' );
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
