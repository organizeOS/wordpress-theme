<?php
$args['post_type'] = 'page';
$args['title'] = 'About';

$query = new WP_Query( $args );

while ($query->have_posts()) {
  $query->the_post(); ?>




  <div class="section" id="about">
  	<div class="container">

  		<div class="row section-title">
  			<div class="col">
  				<h2>About <?php bloginfo( 'name' ); ?></h2>
  			</div>
  		</div><!-- .row -->

  		<div class="row section-content">
  			<p><?php the_excerpt(); ?></p>
  		</div><!-- .section-content -->

  		<div class="row section-links">
  			<div class="col">
  				<a href="<?php the_permalink(); ?>" class="button major">Read Our Story</a>
  			</div>
  		</div><!-- .section-links -->

  	</div><!-- .container -->
  </div><!-- .section -->


<?php }
?>
