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


<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>



<div id="main" class="main" role="main">


	<header class="entry-header" style="background-image: url('<?php
		if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! organizeOSWP_is_frontpage() ) ) ) {
			echo get_the_post_thumbnail_url();
		}
		else {
			echo get_template_directory_uri() . '/assets/images/default-bg.png';
		} ?>')">

		<div class="container">
			<div class="row align-items-center">
				<div class="col">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</header>

<div class="section entry-content">
	<div class="container">

			<?php	if ( 'post' === get_post_type() ) { ?>
			<div class="row justify-content-center">
				<div class="col-8 col-sm-6 entry-meta">
					<p>by <?php the_author_posts_link(); ?><br>
					posted on <?php the_date(); ?></p>
					<hr class="shortnthick top">
				</div><!-- .entry-meta -->
			</div><!-- .row -->
			<?php } ?>

		<div class="row justify-content-center">
			<article class="col-lg-10">
				<?php	the_content(); ?>
			</article>
		</div><!-- .row -->

		<?php	if ( 'post' === get_post_type() ) { ?>
		<div class="row justify-content-center">
			<div class="col-8 col-sm-6 entry-meta">
				<hr class="shortnthick bottom">
				<p>by <?php the_author_posts_link(); ?><br>
				posted on <?php echo get_the_date(); ?></p>
				<p><?php echo the_author_meta('user_description'); ?></p>

			</div><!-- .entry-meta -->
		</div><!-- .row -->
		<?php } ?>


	</div><!-- .container -->
</div><!-- .section -->





<?php endwhile; // End of the loop.	?>



<?php get_sidebar(); ?>
<?php get_footer();
