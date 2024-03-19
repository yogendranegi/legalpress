<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_color_register' ) ) :
function legalblow_customizer_color_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'legalblow_color_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Color Settings', 'legalblow' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_color_settings_title', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_color_settings_title', 
		array(
		    'label'       => esc_html__( 'Colors', 'legalblow' ),
		    'section'     => 'legalblow_color_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_color_settings_title',
		) 
	));

	// Primary color
    $wp_customize->add_setting(
        'legalblow_site_primary_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#1e5154',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_site_primary_color',
	        array(
	        	'label'      => esc_html__( 'Primary Color', 'legalblow' ),
	        	'section'    => 'legalblow_color_settings',
	        	'settings'   => 'legalblow_site_primary_color',
	        )
	    )
    );

    // Secondary color
    $wp_customize->add_setting(
        'legalblow_site_secondary_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#397b7e',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_site_secondary_color',
	        array(
	        	'label'      => esc_html__( 'Secondary Color', 'legalblow' ),
	        	'section'    => 'legalblow_color_settings',
	        	'settings'   => 'legalblow_site_secondary_color',
	        )
	    )
    );

}
endif;

add_action( 'customize_register', 'legalblow_customizer_color_register' );