<?php
/**
 * organizeOS WP: Customizer
 *
 * @package WordPress
 * @subpackage organizeOS_WP
 * @since 1.0
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function organizeOS_customize_register( $wp_customize ) {

	/**
	 * Theme options.
	 */
	$wp_customize->add_section( 'theme_settings', array(
		'title'    => __( 'Theme Settings', 'organizeOS' ),
		'priority' => 130, // Before Additional CSS.
	) );

	$wp_customize->add_setting( 'theme_set', array(
		'default'           => 'rally',
		'sanitize_callback' => 'organizeOS_sanitize_theme_set',
	) );

	$wp_customize->add_control( 'theme_set', array(
		'label'       => __( 'Theme Set', 'organizeOS' ),
		'section'     => 'theme_settings',
		'type'        => 'radio',
		'description' => __( 'Choose the theme set that best reflects your organization', 'organizeOS' ),
		'choices'     => array(
			'rally' => __( 'Rally', 'organizeOS' ),
			'maker' => __( 'Maker', 'organizeOS' ),
		)
	) );

}
add_action( 'customize_register', 'organizeOS_customize_register' );


/**
 * Sanitize
 */
function organizeOS_sanitize_theme_set( $input ) {
	$valid = array( 'rally', 'maker' );

	if ( in_array( $input, $valid ) ) {
		return $input;
	}

	return 'rally';
}
