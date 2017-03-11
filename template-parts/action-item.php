<?php
/**
 * Template part for displaying action items
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 * @version 1.0

 * @todo Should there be a slider for multiple action items? Or a randomized display of one out of all posts with the tag?
 */

?>



<?php
	$args['post_type'] = 'organizeos_actions';
	$args['post_per_page'] = '1';

	$query = new WP_Query( $args );

	while ($query->have_posts()) {
		$query->the_post();
		$metas = get_post_meta($query->get_the_id());
		?>

		<div class="action col-md-8">
			<div class="row align-items-center">
				<div class="col-4">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>">
				</div>
				<div class="col-8">
					<h2>Take Action</h2>

					<h3><?php	the_title(); ?></h3>

					<p><?php the_excerpt(); ?></p>

					<a class="button major" href="<?php the_permalink(); ?>"><?php echo $metas['button'][0]; ?></a>
				</div>
			</div><!-- .row -->
		</div>

		<?php
	}
	?>
