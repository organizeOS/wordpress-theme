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


<?php /* Start the Loop */ while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/post/content', get_post_format() );

 endwhile; // End of the loop.	?>


<?php get_sidebar(); ?>
<?php get_footer();
