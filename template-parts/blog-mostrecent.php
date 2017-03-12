<?php
$args['post_type'] = 'post';
$args['post_per_page'] = '4';

$query = new WP_Query( $args );

while ($query->have_posts()) {
  $query->the_post(); ?>

  <div class="card col-md-6 col-lg-4">
    <div class="card-inner">
      <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>">

      <div class="card-block">
        <h3><?php	the_title(); ?></h3>
        <p><?php the_excerpt(); ?></p>
      </div>
      <div class="card-footer">
        <h4><span>by <?php the_author(); ?></span><br>
        on <?php the_date(); ?></h4>
        <a class="button small" href="<?php the_permalink(); ?>">Read More</a>
      </div><!-- .card-footer -->
    </div><!-- .card-inner -->
  </div>

<?php }
?>
