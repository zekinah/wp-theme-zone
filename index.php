<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
<header style="background-image: url('<?= $thumb ?>')" class="innerpage-header">
	<h1 class="text-center innerpage-title">Blogs</h1>
</header>
<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-8 content-area" id="primary">
				<main id="primary" class="site-main">
					<?php
					if ( have_posts() ) :
						if ( is_home() && ! is_front_page() ) :
							?>
							<h2 class="page-title screen-reader-text"><?php single_post_title(); ?></h2>
							<?php
						endif;
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/contents/content', get_post_type() );
						endwhile;
						the_posts_navigation();
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
