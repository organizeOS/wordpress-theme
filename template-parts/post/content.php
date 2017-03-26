<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="section">

<div class="container">

	<header class="row entry-header">
		<div class="col">
			<?php if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! organizeOSWP_is_frontpage() ) ) ) {
				echo '<img src="' . get_the_post_thumbnail_url() . '">';
				} ?>

			<h2 class="entry-title"><?php the_title(); ?></h2>

			<?php	if ( 'post' === get_post_type() ) { ?>
				<div class="entry-meta">
					<p>by <?php the_author_posts_link(); ?><br>
					posted on <?php the_date(); ?></p>
					<hr class="shortnthick top">
				</div><!-- .entry-meta -->
			<?php } ?>

		</div>
	</header>


	<div class="row justify-content-center entry-content">
		<div class="col-lg-10">
			<?php	the_content(); ?>
		</div>
	</div><!-- .row -->


	<?php	if ( 'post' === get_post_type() ) { ?>
	<div class="row justify-content-center entry-footer">
		<div class="col-8 col-sm-6 entry-meta">
			<hr class="shortnthick bottom">
			<p>by <?php the_author_posts_link(); ?><br>
			posted on <?php echo get_the_date(); ?></p>
			<p><?php echo the_author_meta('user_description'); ?></p>
		</div><!-- .entry-meta -->

		<?php the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">Previous Post</span><span aria-hidden="true" class="nav-subtitle">Previous</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="screen-reader-text">Next Post</span><span aria-hidden="true" class="nav-subtitle">Next</span> <span class="nav-title">%title</span>',
		) );
		?>
	</div>

	<?php } ?>

</div><!-- .container -->
</article><!-- #post-## -->
