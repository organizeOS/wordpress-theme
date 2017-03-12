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

$events['format_header'] = '';
$events['format_footer'] = '';

$events['limit'] ='6';

$events['format'] = '

<div class="col-sm-6 col-md-4 col-lg-3 event card">
	<h3>#_{l, F j}</h3>
	<div class="card-inner">
		<div class="card-block">

			<h4>#_EVENTNAME</h4>
			<h5>#_12HSTARTTIME <br>
			#_LOCATIONNAME</h5>

		</div>
	</div><!-- .card-inner -->
	<a class="card-link" href="#_EVENTURL">Event details</a>
</div><!-- .event -->
';

echo EM_Events::output( $events );

?>
