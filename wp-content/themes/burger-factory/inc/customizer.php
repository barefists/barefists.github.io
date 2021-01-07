<?php
/**
 * Burger Factory Theme Customizer.
 *
 * @package Burger_Factory
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function burger_factory_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_setting( 'color_scheme', array(
		'default'   => 'light',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_key'
	));

	$wp_customize->add_setting( 'accent_color_1', array(
		'default'   => '#952637',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_setting( 'accent_color_2', array(
		'default'    => '#BB7243',
		'transport'  => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'color_scheme',
		array(
			'label'       => __( 'Color Scheme', 'burger-factory' ),
			'settings'    => 'color_scheme',
			'priority'    => 1,
			'section'     => 'colors',
			'type'        => 'select',
			'choices' => array(
				'color-scheme-light' => 'Light',
                'color-scheme-dark' => 'Dark'
			)
		)
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'accent_color_1',
			array(
				'label'      => __( 'First Accent Color (Tagline, Excerpt)', 'burger-factory' ),
				'section'    => 'colors',
				'settings'   => 'accent_color_1'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'accent_color_2',
			array(
				'label'      => __( 'Second Accent Color (Meta)', 'burger-factory' ),
				'section'    => 'colors',
				'settings'   => 'accent_color_2'
			)
		)
	);

	$wp_customize->add_section( 'burger_factory_copy' , array(
		'title'      => __( 'Copy', 'burger-factory' ),
		'priority'   => 30,
	) );

	$wp_customize->add_setting( 'footer_copy', array(
		'default'     => __( 'Made With Love Somewhere On Earth' , 'burger-factory'),
		'transport'   => 'postMessage',
		'sanitize_callback' => 'burger_factory_filter_most_tags'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_copy',
			array(
				'label'       => __( "Footer Copy", 'burger-factory' ),
				'description' => __( "Appears at the bottom of every page.", 'burger-factory' ),
				'section'     => 'burger_factory_copy',
				'settings'    => 'footer_copy'
			)
		)
	);
}
add_action( 'customize_register', 'burger_factory_customize_register' );

/**
 * Filter for text edits to filter out most html elements but leave a few like links and formatting
 *
 * Generally allows the same tags that WP does in comments by default
 *
 * @param  string $string
 * @return string
 */
function burger_factory_filter_most_tags($string) {
	$allowedtags = array(
		'a' => array(
			'href' => true,
			'title' => true,
		),
		'abbr' => array(
			'title' => true,
		),
		'acronym' => array(
			'title' => true,
		),
		'b' => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'cite' => array(),
		'code' => array(),
		'del' => array(
			'datetime' => true,
		),
		'em' => array(),
		'i' => array(),
		'q' => array(
			'cite' => true,
		),
		'strike' => array(),
		'strong' => array(),
	);
	return wp_kses( $string, $allowedtags );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function burger_factory_customize_preview_js() {
	wp_enqueue_script( 'burger_factory_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20170220', true );
}
add_action( 'customize_preview_init', 'burger_factory_customize_preview_js' );