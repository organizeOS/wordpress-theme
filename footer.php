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

<?php	if ( !is_front_page() ) {	?>
	<?php get_template_part( 'template-parts/hero' ); ?>
	<?php get_template_part( 'template-parts/events-upcoming' ); ?>

<?php	}	?>




<footer id="colophon" class="site-footer section" role="contentinfo">


		<?php

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

	<div class="container" id="site-info">
		<div class="row">
			<div class="col-md-6">
				<h2>The <?php bloginfo( 'name' ); ?> Newsletter</h2>
				<p>A carefully crafted email featuring thoughts, opinions, and tools for building a better world.</p>
				<div id="newsletter-form">
					<div id="newsletter-form-inputs">
						<input type="text" class="button major" placeholder="Email" id="newsletter-email"></input>
						<input type="text" class="button major" placeholder="First Name" id="newsletter-firstname"></input>
						<input type="text" class="button major" placeholder="Last Name" id="newsletter-lastname"></input>
						<button class="button major" data-action="newsletter-signup">Sign Up</button>
					</div><!-- #newsletter-form-inputs -->
					<div id="newsletter-form-response" style="display:none;"></div>
				</div><!-- #newsletter-form -->
			<a class="button minor" href="/newsletter">Read Past Issues</a>
		</div>
		<div class="col-md-6">
			<h2><?php bloginfo( 'name' ); ?></h2>
			<?php get_template_part( 'template-parts/contact'); ?>
		</div>
	</div><!-- .site-info -->

		<div class="row">
			<div class="col">
				<a href="https://organizeos.org">Powered by organizeOS</a>
			</div>
		</div><!-- .row -->
	</div><!-- .container #site-info -->

</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
