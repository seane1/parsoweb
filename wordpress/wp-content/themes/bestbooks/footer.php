<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BestBooks
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info pure-g">
			<?php
				wp_nav_menu( array( 
				    'theme_location' => 'footer-menu', 
				    'container_class' => 'footer-menu pure-u-1 pure-u-md-1-3' ) ); 
			?>
			<a id="initials" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="pure-u-1 pure-u-md-1-3">BB</a>
			<div class="social pure-u-1 pure-u-md-1-3">
				<span><img src="<?php echo get_template_directory_uri().'/img/social.png';?>"></span>
			</div>
		
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
