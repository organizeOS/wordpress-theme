<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) : the_post(); ?>

	<div class="section page-content">
		<div class="container">
			<div class="row justify-content-center">
				<article class="col-lg-10" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="page-header">
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					</header><!-- .page-header -->


					<?php	the_content(); ?>
				</article><!-- #post-## -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .section -->

<?php
	endwhile; // End of the loop.
	?>


<?php get_footer();
