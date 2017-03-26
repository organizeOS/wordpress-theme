<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


	<?php get_template_part( 'template-parts/hero' ); ?>




	<div class="section" id="issues">
		<div class="container">

			<div class="row section-title">
				<div class="col">
					<h2>Our Issues</h2>
				</div>
			</div><!-- .section-title -->

			<div class="row align-items-center section-content">
				<?php
					// embeds the top issues, with an option to show more dynamically or go to archive page to view all for a historical view
					get_template_part( 'template-parts/issues');
				?>
			</div><!-- .row .section-content -->

			<div class="row section-links">
				<div class="col">
					<a href="/issues" class="button major">Learn More</a>
				</div>
			</div><!-- .section-links -->

		</div><!-- .container -->
	</div><!-- .section -->



<?php	get_template_part( 'template-parts/events-upcoming' ); ?>




<div class="section" id="blog">
	<div class="container">

		<div class="row section-title">
			<div class="col">
				<h2>Updates from <?php bloginfo( 'name' ); ?></h2>
			</div>
		</div>

		<div class="row justify-content-center section-content">
			<?php
				// embeds the 3 most recent blog posts, with an option to show more dynamically or go to archive page to view all
				get_template_part( 'template-parts/blog-mostrecent');
			?>
		</div><!-- .section-content -->

		<div class="row section-links">
			<div class="col">
				<a href="/blog" class="button major">View All Posts</a>
			</div>
		</div><!-- .section-links -->

	</div><!-- .container -->
</div><!-- .section -->



<?php	get_template_part( 'template-parts/about');	?>



<?php get_footer();
