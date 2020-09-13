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
?>
<form class="search-form mb-2" action="<?php echo get_site_url(); ?>" method="get">
	<div class="input-group">
		<input class="form-control" placeholder="Search for..." name="s" id="search" value="<?php the_search_query(); ?>" required="required" /> 
		<span class="input-group-append">
			<button class="btn btn-dark" type="submit">Search</button>
		</span>
	</div>
</form><!-- #form -->
