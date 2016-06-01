<?php

namespace WPMeetup\Customizer;

use WP_Customize_Color_Control;

add_action( 'customize_register' , __NAMESPACE__ . '\\register' );
add_action( 'wp_head' , __NAMESPACE__ . '\\header_output' );
add_action( 'customize_preview_init' , __NAMESPACE__ . '\\live_preview' );

function register( $wp_customize ) {


	//1. Define a new section (if desired) to the Theme Customizer
	$wp_customize->add_section( 'theme_colors',
		array(
			'title'       => __( 'Theme Colors', 'wpmeetup' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to customize some theme colors.', 'wpmeetup' ),
		)
	);

	$wp_customize->add_setting( 'color_primary', [
		'default'    => '#21759B',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport'  => 'postMessage',
	] );

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'wpmeetup_color_primary',
		[
			'label'      => __( 'Primary Color', 'wpmeetup' ),
			'section'    => 'theme_colors',
			'settings'   => 'color_primary',
			'priority'   => 10,
			'select'     => 'select',
			'choices'    => [
				'value1' => 'Choice 1',
				'value2' => 'Choice 2',
				'value3' => 'Choice 3',
			],
		]
	) );

}

/**
* This will output the custom WordPress settings to the live theme's WP head.
*
* Used by hook: 'wp_head'
*
* @see add_action('wp_head',$func)
* @since Theme 1.0
*/
function header_output() {

	$pattern = '%s { %s: %s; }';

	?>
	<!--Customizer CSS-->
	<style type="text/css">
		<?php printf( $pattern, '.site-header', 'background-color', esc_html( get_theme_mod( 'color_primary' ) ) ); ?>
	</style>
	<!--/Customizer CSS-->
	<?php
}

function live_preview() {
	wp_enqueue_script(
		'wpmeetup-customizer', // Give the script a unique ID
		get_template_directory_uri() . '/assets/dist/scripts/customizer.js', // Define the path to the JS file
		array(  'jquery', 'customize-preview' ), // Define dependencies
		'', // Define a version (optional)
		true // Specify whether to put in footer (leave this true)
	);
}
