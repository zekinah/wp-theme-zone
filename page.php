<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
$thumb = '';
if(file_exists($thumb)){
	$image = get_field('banner_image');
	if ( $image ) : $thumb = $image; endif;	
}
$container = get_theme_mod( 'themezone_container_type' );
?>
<header class="entry-header innerpage-header" style="background-image: url('<?= $thumb ?>')" id="header">
	<?php the_title( '<h1 class="entry-title text-center innerpage-title">', '</h1>' ); ?>
</header><!-- .entry-header -->
<div class="wrapper" id="archive-wrapper">
	
	<?php get_template_part( 'template-parts/widgets/widget', 'topfull' ); ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-8 content-area" id="primary">
				<main id="primary" class="site-main">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/contents/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					wp_reset_query(); 
					echo '<div class="pagination">'.themezone_pagination().'</div>'; // Pagination
					?>

				</main><!-- #main -->
			</div>
			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #archive-wrapper -->
<?php
get_footer();

