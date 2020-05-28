<?php
/**
 * Template Name: Genres
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BestBooks
 */

get_header();
?>

	<main id="primary" class="site-main pure-u-1">
		<h2 class="page-heading">Browse By Genre</h2>
	
		<?php
			genres();
		?>
	</article>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
