<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BestBooks
 */

?>
<div class="books pure-u-1-2 pure-u-md-1-4">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			bestbooks_posted_on();
			bestbooks_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php bestbooks_post_thumbnail(); ?>
		<?php echo "<p id='books'>"; the_title(); echo "</p>";?>


</article><!-- #post-<?php the_ID(); ?> -->
	</div><!-- .entry-summary -->