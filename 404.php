<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package themezone
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'themezone_container_type' );
?>
<div class="wrapper" id="error-404-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main">
					<section class="error-404 not-found">
						<header class="page-header">
							<div class="text-center glitch-main">
								<a href="#" class="glitch" data-glitch="404">404</a>
							</div>
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'themezone' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'themezone' ); ?></p>
							<?php get_search_form(); ?>
							<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
								<div class="widget widget_categories">
									<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'themezone' ); ?></h2>
									<ul>
										<?php
										wp_list_categories(
											array(
												'orderby'  => 'count',
												'order'    => 'DESC',
												'show_count' => 1,
												'title_li' => '',
												'number'   => 10,
											)
										);
										?>
									</ul>
								</div><!-- .widget -->
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #error-404-wrapper -->
<?php
get_footer();