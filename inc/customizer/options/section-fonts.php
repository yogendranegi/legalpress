<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_fonts_register' ) ) :
function legalblow_customizer_fonts_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'legalblow_fonts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Fonts Settings', 'legalblow' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_fonts_settings_title', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_fonts_settings_title', 
		array(
		    'label'       => esc_html__( 'Google Fonts', 'legalblow' ),
		    'section'     => 'legalblow_fonts_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_fonts_settings_title',
		) 
	));

	// Add an option to enable the Poppins font
	$wp_customize->add_setting( 
		'legalblow_enable_poppings_font', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_poppings_font', 
		array(
		    'label'       => esc_html__( 'Enable Poppins Font', 'legalblow' ),
		    'section'     => 'legalblow_fonts_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_poppings_font',
		) 
	));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_fonts_register' );