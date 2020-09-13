<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themezone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php themezone_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			themezone_posted_on();
			themezone_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<div class="entry-footer">
		<?php themezone_entry_footer(); ?>
	</div><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
