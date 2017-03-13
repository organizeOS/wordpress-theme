<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<div id="main" class="main" role="main">


	<header class="entry-header" style="background-image: url('<?php
			if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! organizeOSWP_is_frontpage() ) ) ) {
				echo get_the_post_thumbnail_url();
			}
			else {
				echo get_template_directory_uri() . '/assets/images/default-bg.png';

			} ?>')">
			<h2 class="entry-title"><?php the_title(); ?></h2>

	</header>

<div class="section">
	<div class="container">
		<div class="row justify-content-center">
			<article class="col-lg-10">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/post/content', get_post_format() );

					endwhile; // End of the loop.
				?>

			</article>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .section -->

	<?php get_sidebar(); ?>

<?php get_footer();
