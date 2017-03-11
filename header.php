<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'organizeOSWP' ); ?></a>


	<header id="topbar" role="banner">


		<img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" class="logo">



		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Main Menu', 'organizeOSWP' ); ?>">

			<ul>
				<li><a href="#issues">Issues</a></li>
				<li><a href="#events">Events</a></li>
				<li><a href="#blog">Updates</a></li>
				<li><a href="#about">About</a></li>
			</ul>

		</nav><!-- #site-navigation -->

	</header>
