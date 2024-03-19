<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_forms_register' ) ) :
function legalblow_customizer_forms_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'legalblow_forms_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Forms Settings', 'legalblow' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_forms_button_styles', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_forms_button_styles', 
		array(
		    'label'       => esc_html__( 'Button Styles', 'legalblow' ),
		    'section'     => 'legalblow_forms_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_forms_button_styles',
		) 
	));

	//choose button type
	$wp_customize->add_setting( 
        'legalblow_choose_forms_button_styles', 
        array(
            'default'           => 'square',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'legalblow_sanitize_select',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Text_Radio_Control( $wp_customize, 'legalblow_choose_forms_button_styles', 
        array(
            'label'       => esc_html__( 'Choose Button Type', 'legalblow' ),
            'section'     => 'legalblow_forms_settings',
            'type'        => 'legalblow-text-radio',
            'settings'    => 'legalblow_choose_forms_button_styles',
            'choices' => array(
            	'square' => esc_html__( 'Square','legalblow' ),
                'round' => esc_html__( 'Rounded','legalblow' ),
            ),
        )
    ));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_forms_register' );