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

$args['format_header'] = '';
$args['format_footer'] = '';

$args['tag'] = 'major';
$args['limit'] ='1';

$args['format'] = '

<h2>Next Major Event</h2>

<h3>#_EVENTNAME</h3>
<h4>#_{l, F j}<sup>#_{S}</sup> at #_12HSTARTTIME <br>
#_LOCATIONNAME</h4>

<p>#_EVENTEXCERPT</p>

<a class="button major" href="#_EVENTURL">Join In</a>

';

echo EM_Events::output( $args );
