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

?>

<div class="col-md-3 col-lg-4 issue">
	<h3><?php	the_title(); ?></h3>
	<p><?php the_excerpt(); ?></p>
</div>

<?php } ?>
