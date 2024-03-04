<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_preloader_register' ) ) :
function legalblow_customizer_preloader_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'legalblow_preloader_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Preloader Settings', 'legalblow' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_preloader_settings_title', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new legalblow_Title_Info_Control( $wp_customize, 'legalblow_label_preloader_settings_title', 
		array(
		    'label'       => esc_html__( 'Preloader', 'legalblow' ),
		    'section'     => 'legalblow_preloader_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_preloader_settings_title',
		) 
	));

	// Add an option to enable the preloader
	$wp_customize->add_setting( 
		'legalblow_enable_preloader', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new legalblow_Toggle_Control( $wp_customize, 'legalblow_enable_preloader', 
		array(
		    'label'       => esc_html__( 'Show Preloader', 'legalblow' ),
		    'section'     => 'legalblow_preloader_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_preloader',
		) 
	));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_preloader_register' );