<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 * @version 1.0
 */

?>

<?php
	if ( !is_front_page() ) {
	?>
		<div class="section events">
			<div class="container">
	<?php
		get_template_part( 'template-parts/events-upcoming' );
		?>
				</div><!-- .container -->
			</div><!-- .section -->
	<?php

	}
	?>




<footer id="colophon" class="site-footer" role="contentinfo">

		<?php
		get_template_part( 'template-parts/footer/footer', 'widgets' );

		if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'organizeOSWP' ); ?>">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'social',
						'menu_class'     => 'social-links-menu',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>' . organizeOSWP_get_svg( array( 'icon' => 'chain' ) ),
					) );
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>

		<div class="container">
			<div class="row site-info">
				<div class="col-md-6">
					<h2>The <?php bloginfo( 'name' ); ?> Newsletter</h2>
					<p>A carefully crafted email featuring thoughts, opinions, and tools for building a better world.</p>
					<div class="button-group">
						<input type="text" class="button major" placeholder="Enter Your Email" id="newsletter-signup"></input>
						<a class="button major">Read Past Issues</a>
					</div>
				</div>
				<div class="col-md-6">
					<h2><?php bloginfo( 'name' ); ?></h2>
					<?php get_template_part( 'template-parts/contact'); ?>
				</div>
			</div><!-- .site-info -->

			<div class="row">
				<div class="col">
					<a href="<?php echo esc_url( __( 'https://organizeos.org/', 'organizeOSWP' ) ); ?>">Powered by organizeOS</a>
				</div>
			</div><!-- .row -->
		</div>

</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
