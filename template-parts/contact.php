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

$args['post_type'] = 'page';
$args['title'] = 'Contact';

$query = new WP_Query( $args );

while ($query->have_posts()) {
	$query->the_post();
	echo the_content();
}
?>
