<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_footer_register' ) ) :
function legalblow_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'legalblow_footer_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'legalblow' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Copyrights', 'legalblow' ),
		    'section'     => 'legalblow_footer_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'legalblow_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'legalblow_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'legalblow_footer_copyright_text',
        array(
            'settings'      => 'legalblow_footer_copyright_text',
            'section'       => 'legalblow_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'legalblow' ),
            'description'   => esc_html__( 'Copyright text to be displayed in the footer. No HTML allowed.', 'legalblow' )
        )
    ); 

    // Add an option to center the text
    $wp_customize->add_setting( 
        'legalblow_enable_center_copyrights_text', 
        array(
            'default'           => true,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'legalblow_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_center_copyrights_text', 
        array(
            'label'       => esc_html__( 'Center Align Copyright Text', 'legalblow' ),
            'section'     => 'legalblow_footer_settings',
            'type'        => 'legalblow-toggle',
            'settings'    => 'legalblow_enable_center_copyrights_text',
        ) 
    ));


    // Title label
    $wp_customize->add_setting( 
        'legalblow_label_footer_columns_title', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_footer_columns_title', 
        array(
            'label'       => esc_html__( 'Footer Columns', 'legalblow' ),
            'section'     => 'legalblow_footer_settings',
            'type'        => 'legalblow-title',
            'settings'    => 'legalblow_label_footer_columns_title',
        ) 
    ));

    // select footer columns
    $wp_customize->add_setting( 
        'legalblow_footer_widgets', 
        array(
            'default'           => '4',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'legalblow_sanitize_select',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Text_Radio_Control( $wp_customize, 'legalblow_footer_widgets', 
        array(
            'label'       => esc_html__( 'Choose Footer Columns', 'legalblow' ),
            'section'     => 'legalblow_footer_settings',
            'type'        => 'legalblow-text-radio',
            'settings'    => 'legalblow_footer_widgets',
            'choices' => array(
                '1' => esc_html__( '1 Column','legalblow' ), 
                '2' => esc_html__( '2 Columns','legalblow' ),
                '3' => esc_html__( '3 Columns','legalblow' ),
                '4' => esc_html__( '4 Columns','legalblow' ),
            ),
        )
    ));

    // Title label
    $wp_customize->add_setting( 
        'legalblow_label_footer_color_settings', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_footer_color_settings', 
        array(
            'label'       => esc_html__( 'Footer Color Settings', 'legalblow' ),
            'section'     => 'legalblow_footer_settings',
            'type'        => 'legalblow-title',
            'settings'    => 'legalblow_label_footer_color_settings',
        ) 
    ));      

    // Footer background color
    $wp_customize->add_setting(
        'legalblow_footer_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'legalblow_footer_bg_color',
        array(
        'label'      => esc_html__( 'Footer Background Color', 'legalblow' ),
        'section'    => 'legalblow_footer_settings',
        'settings'   => 'legalblow_footer_bg_color',
        ) )
    );    
   

    // Footer Content Color
    $wp_customize->add_setting(
        'legalblow_footer_content_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'legalblow_footer_content_color',
        array(
        'label'      => esc_html__( 'Footer Content Color', 'legalblow' ),
        'section'    => 'legalblow_footer_settings',
        'settings'   => 'legalblow_footer_content_color',
        ) )
    );  

    // Footer links Color
    $wp_customize->add_setting(
        'legalblow_footer_links_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#b3b3b3',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'legalblow_footer_links_color',
        array(
        'label'      => esc_html__( 'Footer Links Color', 'legalblow' ),
        'section'    => 'legalblow_footer_settings',
        'settings'   => 'legalblow_footer_links_color',
        ) )
    );


     // Footer Headings Color
    $wp_customize->add_setting(
        'legalblow_footer_headings_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#b3b3b3',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'legalblow_footer_headings_color',
        array(
        'label'      => esc_html__( 'Footer Headings Color', 'legalblow' ),
        'section'    => 'legalblow_footer_settings',
        'settings'   => 'legalblow_footer_headings_color',
        ) )
    );

    // Title label
    $wp_customize->add_setting( 
        'legalblow_label_footer_spacing_settings', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_footer_spacing_settings', 
        array(
            'label'       => esc_html__( 'Footer Spacing', 'legalblow' ),
            'section'     => 'legalblow_footer_settings',
            'type'        => 'legalblow-title',
            'settings'    => 'legalblow_label_footer_spacing_settings',
        ) 
    ));

    //Content spacing
    $wp_customize->add_setting( 
        'legalblow_footer_content_spacing', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_footer_content_spacing', 
        array(
            'label' => esc_html__( 'Content Spacing from top(px)','legalblow' ),
            'description' => esc_html__( 'Default is 70','legalblow' ),
            'section' => 'legalblow_footer_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 200,
                'step' => 1,
            ),
        )
    ));

    //Footer spacing
    $wp_customize->add_setting( 
        'legalblow_footer_spacing', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_footer_spacing', 
        array(
            'label' => esc_html__( 'Section Spacing from top(px)','legalblow' ),
            'description' => esc_html__( 'Default is 70','legalblow' ),
            'section' => 'legalblow_footer_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 200,
                'step' => 1,
            ),
        )
    ));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_footer_register' );