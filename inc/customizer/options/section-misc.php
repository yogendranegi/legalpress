<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_misc_register' ) ) :
function legalblow_customizer_misc_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'legalblow_misc_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Misc Settings', 'legalblow' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_misc_minify_styles_scripts_settings', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_misc_minify_styles_scripts_settings', 
		array(
		    'label'       => esc_html__( 'Minify Styles and Scripts', 'legalblow' ),
		    'section'     => 'legalblow_misc_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_misc_minify_styles_scripts_settings',
		) 
	));

	// Add an option to enable the minification of styles & scripts
	$wp_customize->add_setting( 
		'legalblow_enable_minify_styles_scripts', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_minify_styles_scripts', 
		array(
		    'label'       => esc_html__( 'Minify Styles and Scripts', 'legalblow' ),
		    'section'     => 'legalblow_misc_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_minify_styles_scripts',
		) 
	));

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_misc_ts_settings', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_misc_ts_settings', 
		array(
		    'label'       => esc_html__( 'Theme Support', 'legalblow' ),
		    'section'     => 'legalblow_misc_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_misc_ts_settings',
		) 
	));

	// Add an option to enable the block styles
	$wp_customize->add_setting( 
		'legalblow_enable_block_styles', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_block_styles', 
		array(
		    'label'       => esc_html__( 'Enable Block Styles', 'legalblow' ),
		    'section'     => 'legalblow_misc_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_block_styles',
		) 
	));

	// Add an option to enable the wide alignment
	$wp_customize->add_setting( 
		'legalblow_enable_block_wide_alignment', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_block_wide_alignment', 
		array(
		    'label'       => esc_html__( 'Enable Block Wide alignment', 'legalblow' ),
		    'section'     => 'legalblow_misc_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_block_wide_alignment',
		) 
	));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_misc_register' );