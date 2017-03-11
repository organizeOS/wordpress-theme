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


<?php
// If a regular post or page, and not the front page, show the featured image.
if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! organizeOSWP_is_frontpage() ) ) ) : ?>
	<div class="post-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
		<?php
endif;
?>

<div id="main" class="main" role="main" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">


<div class="container">
	<div class="row">
		<div class="col">
			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );


					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'organizeOSWP' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'organizeOSWP' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . organizeOSWP_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'organizeOSWP' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'organizeOSWP' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . organizeOSWP_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					) );

				endwhile; // End of the loop.
			?>

		</div>
	</div><!-- .row -->
</div><!-- .container -->


	<?php get_sidebar(); ?>

<?php get_footer();
