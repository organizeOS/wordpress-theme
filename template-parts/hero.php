<?php
/**
 * Template part for the hero unit
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

// get next major event
$nextevent['format_header'] = '';
$nextevent['format_footer'] = '';
$nextevent['tag'] = 'major';
$nextevent['limit'] ='1';
$nextevent['format'] = '
<h3>#_EVENTNAME</h3>
<p class="datetime">#_{l, F j}<sup>#_{S}</sup> at #_12HSTARTTIME <br>
#_LOCATIONNAME</p>
<p>#_EVENTEXCERPT</p>
<a class="button major" href="#_EVENTURL">Join In</a>
';


// get action item
$action['post_type'] = 'organizeos_actions';
$action['post_per_page'] = '1';
$query = new WP_Query( $action );
while ($query->have_posts()) {
	$query->the_post();
	$metas = get_post_meta(get_the_id());
?>


<div class="section" id="hero">
  <div class="container">
    <div class="row align-items-top">

      <div class="action col-md-7">
        <div class="row align-items-center icon-heading">
          <div class="col-md-auto icon"></div>
          <div class="col"><h2>Take Action</h2></div>
        </div><!-- .row .icon-heading -->
        <h3><?php	the_title(); ?></h3>
        <p><?php the_excerpt(); ?></p>
        <a class="button major" href="<?php the_permalink(); ?>"><?php echo $metas['button'][0]; ?></a>
      </div><!-- .action -->

      <div class="event col-md-5 col-lg-4 offset-lg-1">
        <div class="row align-items-center icon-heading">
          <div class="col-md-auto icon"></div>
          <div class="col"><h2>Next Major Event</h2></div>
        </div><!-- .row .icon-heading -->
        <?php echo EM_Events::output( $nextevent ); ?>
      </div><!-- .event -->

    </div><!-- .row -->
  </div><!-- .container -->
</div><!-- .section #hero -->

<?php
}
?>
