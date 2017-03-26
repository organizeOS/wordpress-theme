<?php
/**
 * Template part for displaying issues
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 * @version 1.0
 */

?>

<?php

$args['post_type'] = 'organizeos_issues';
$query = new WP_Query( $args );
while ($query->have_posts()) {
	$query->the_post();
	$metas = get_post_meta($query->get_the_id());
	$number = $query->found_posts;
	$is_odd = $number & 1;

	if ($is_odd) {
		$columns = 'col-md-4 col-lg-4';
	}
	else {
		$columns = 'col-md-6 col-lg-3';
	}

?>


<div class="<?php echo $columns; ?> issue">
	<h3><?php	the_title(); ?></h3>
	<p><?php the_excerpt(); ?></p>
</div>

<?php } ?>
