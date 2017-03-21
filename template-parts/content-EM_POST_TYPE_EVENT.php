<?php
/**
 * Template part for displaying issue cards on its 'archive' page
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
$args['full'] = 1;
$args['long_events'] = get_option('dbem_full_calendar_long_events');
echo EM_Calendar::output( apply_filters('em_content_calendar_args', $args) );
?>

  <div class="card col-sm-4 col-md-3">
    <div class="card-inner">

      <div class="card-block">
        <h3><?php	the_title(); ?></h3>
        <p><?php the_excerpt(); ?></p>
      </div>
      <div class="card-footer">
        <a class="button small" href="<?php the_permalink(); ?>">Read More</a>
      </div><!-- .card-footer -->
    </div><!-- .card-inner -->
  </div>
