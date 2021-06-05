<?php
/**
 * divisima Theme Customizer
 *
 * @package divisima
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function divisima_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'divisima_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'divisima_customize_partial_blogdescription',
			)
		);
	}
	$wp_customize->add_section( 'footer' , array(
		'title' => __('Логотип в подвале', 'divisima'),
		'priority' => 1
	));
	$wp_customize->add_setting('footer_logo', array(
		'default' => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
		'footer_link', array(
			'label' => __('Логотип в подвале', 'divisima'),
			'section' =>  'title_tagline',
			'settings' => 'footer_logo'
		)
	));
}
add_action( 'customize_register', 'divisima_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function divisima_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function divisima_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function divisima_customize_preview_js() {
	wp_enqueue_script( 'divisima-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'divisima_customize_preview_js' );