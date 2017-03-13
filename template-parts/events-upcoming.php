<?php
/**
 * Template part for displaying upcoming events
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
// set up Events Manager event query

$events['format_header'] = '';
$events['format_footer'] = '';
$events['limit'] ='6';
$events['format'] = '
<div class="col-sm-6 col-md-4 col-lg-3 event card">
	<h3>#_{l, F j}</h3>
	<div class="card-inner">
		<div class="card-block">

			<h4>#_EVENTNAME</h4>
			<p>#_12HSTARTTIME <br>
			#_LOCATIONNAME</p>

		</div>
	</div><!-- .card-inner -->
	<a class="button card-link" href="#_EVENTURL">Event details</a>
</div><!-- .event -->
';
?>


<div class="section" id="events-upcoming">
	<div class="container">

		<div class="row section-title">
			<div class="col">
				<h2>Upcoming Events</h2>
			</div><!-- .row .section-title -->
		</div>

		<div class="row justify-content-center section-content">
			<?php echo EM_Events::output( $events ); ?>
		</div><!-- .row .section-content -->

		<div class="row section-links">
			<div class="col">
				<a href="/events" class="button minor">View All Events</a>
			</div>
		</div><!-- .row .section-links -->

	</div><!-- .container -->
</div><!-- .section #events-upcoming -->
