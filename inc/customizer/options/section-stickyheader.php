<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_stickyheader_register' ) ) :
function legalblow_customizer_stickyheader_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'legalblow_stickyheader_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Sticky Header Settings', 'legalblow' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_stickyheader_settings_title', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new legalblow_Title_Info_Control( $wp_customize, 'legalblow_label_stickyheader_settings_title', 
		array(
		    'label'       => esc_html__( 'Sticky Header', 'legalblow' ),
		    'section'     => 'legalblow_stickyheader_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_stickyheader_settings_title',
		) 
	));

	// Add an option to enable the sticky header
	$wp_customize->add_setting( 
		'legalblow_enable_stickyheader', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new legalblow_Toggle_Control( $wp_customize, 'legalblow_enable_stickyheader', 
		array(
		    'label'       => esc_html__( 'Show Sticky Header', 'legalblow' ),
		    'section'     => 'legalblow_stickyheader_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_stickyheader',
		) 
	));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_stickyheader_register' );