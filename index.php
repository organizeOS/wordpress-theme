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


<div id="main" class="main-index">


	<?php if ( !is_front_page() ) : ?>
		<header class="page-header">
			<h2 class="page-title"><?php single_post_title(); ?></h2>
		</header>

	<?php else : ?>
		<header class="page-header container-fluid" id="hero">
			<div class="row">
				<?php get_template_part( 'template-parts/action-item' ); ?>

				<?php get_template_part( 'template-parts/events-next' ); ?>
			</div>
		</header><!-- .page-header .grid #hero -->

	<?php endif; ?>





	<div class="section" id="issues">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h2>Our Issues</h2>
				</div>
			</div>
			<div class="row section-content">
				<?php
					// embeds the top issues, with an option to show more dynamically or go to archive page to view all for a historical view
					get_template_part( 'template-parts/issues');
				?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .section -->








	<div class="section" id="events">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h2>Upcoming Events</h2>
				</div>
			</div>

			<div class="row section-content">
				<?php
					// embeds the next 2 weeks of events in a weekday display, with an option to show more dynamically or go to archive page to view all
					get_template_part( 'template-parts/events-upcoming');
				?>
			</div><!-- .section-content -->
		</div><!-- .container -->
	</div><!-- .section -->




<div class="section" id="blog">
	<div class="container">
		<div class="row section-title">
			<div class="col">
				<h2>Updates from <?php bloginfo( 'name' ); ?></h2>
			</div>
		</div>

		<div class="row section-content">
			<?php
				// embeds the 3 most recent blog posts, with an option to show more dynamically or go to archive page to view all
				get_template_part( 'template-parts/blog-mostrecent');
			?>
		</div><!-- .section-content -->
	</div><!-- .container -->
</div><!-- .section -->



<div class="section" id="about">
	<div class="container">
		<div class="section-title">
			<h2>Who We Are</h2>
		</div>

		<div class="section-content">

			<?php
				// embeds the 3 most recent blog posts, with an option to show more dynamically or go to archive page to view all
				get_template_part( 'template-parts/about');
			?>
		</div><!-- .section-content -->
	</div><!-- .container -->
</div><!-- .section -->



	<?php get_sidebar(); ?>

<?php get_footer();
