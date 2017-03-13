<?php
$args['post_type'] = 'page';
$args['title'] = 'About';

$query = new WP_Query( $args );

while ($query->have_posts()) {
  $query->the_post(); ?>

  <p><?php the_excerpt(); ?></p>
  <a class="button major" href="<?php the_permalink(); ?>">Read More</a>

<?php }
?>
