<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_layout_register' ) ) :
function legalblow_customizer_layout_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'legalblow_layout_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Layout Settings', 'legalblow' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_layout_settings_title', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_layout_settings_title', 
		array(
		    'label'       => esc_html__( 'Layout Content Width', 'legalblow' ),
		    'section'     => 'legalblow_layout_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_layout_settings_title',
		) 
	));

	//Layout options
    $wp_customize->add_setting( 
        'legalblow_layout_content_width_settings', 
        array(
            'default' => 1170,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_layout_content_width_settings', 
        array(
            'label' => esc_html__( 'Layout Content Width(px)','legalblow' ),
            'description' => esc_html__( 'Default is 1170','legalblow' ),
            'section' => 'legalblow_layout_settings',
            'input_attrs' => array(
                'min' => 650, 
                'max' => 1400,
                'step' => 1,
            ),
        )
    ));

    // Info label
    $wp_customize->add_setting( 
        'legalblow_layout_width_ratio_label', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Info_Control( $wp_customize, 'legalblow_layout_width_ratio_label', 
        array(
            'label'       => esc_html__( 'You might need to refresh the page to see the changes. Default is 1170', 'legalblow' ),
            'section'     => 'legalblow_layout_settings',
            'type'        => 'legalblow-info',
            'settings'    => 'legalblow_layout_width_ratio_label',
        ) 
    ));

    // Title label
    $wp_customize->add_setting( 
        'legalblow_label_page_full_width_settings_title', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_page_full_width_settings_title', 
        array(
            'label'       => esc_html__( 'Page Content Width', 'legalblow' ),
            'section'     => 'legalblow_layout_settings',
            'type'        => 'legalblow-title',
            'settings'    => 'legalblow_label_page_full_width_settings_title',
        ) 
    ));

    // set full width page content
    $wp_customize->add_setting( 
        'legalblow_enable_full_width_page_content', 
        array(
            'default'           => false,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'legalblow_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_full_width_page_content', 
        array(
            'label'       => esc_html__( 'Set Page Content to full width', 'legalblow' ),
            'section'     => 'legalblow_layout_settings',
            'type'        => 'legalblow-toggle',
            'settings'    => 'legalblow_enable_full_width_page_content',
        ) 
    ));

    // Info label
    $wp_customize->add_setting( 
        'legalblow_layout_full_width_page_info', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Info_Control( $wp_customize, 'legalblow_layout_full_width_page_info', 
        array(
            'label'       => esc_html__( 'This will make the content width to full width instead of default layout width. The header and footer width will not be affected. Use this for Gutenberg full width page', 'legalblow' ),
            'section'     => 'legalblow_layout_settings',
            'type'        => 'legalblow-info',
            'settings'    => 'legalblow_layout_full_width_page_info',
            'active_callback' => '',
        ) 
    ));

    // Title label
    $wp_customize->add_setting( 
        'legalblow_label_responsive_breakpoint_settings_title', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_responsive_breakpoint_settings_title', 
        array(
            'label'       => esc_html__( 'Responsive Devices Breakpoint', 'legalblow' ),
            'section'     => 'legalblow_layout_settings',
            'type'        => 'legalblow-title',
            'settings'    => 'legalblow_label_responsive_breakpoint_settings_title',
        ) 
    ));


    // Choose the tablet breakpoint type
    $wp_customize->add_setting( 
        'legalblow_select_tab_breakpoint_settings', 
        array(
            'default'           => 1024,
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'legalblow_sanitize_select',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Text_Radio_Control( $wp_customize, 'legalblow_select_tab_breakpoint_settings', 
        array(
            'label'       => esc_html__( 'Tablet Breakpoint', 'legalblow' ),
            'section'     => 'legalblow_layout_settings',
            'type'        => 'legalblow-text-radio',
            'settings'    => 'legalblow_select_tab_breakpoint_settings',
            'choices' => array( 
                '767' => esc_html__( '767 px','legalblow' ),
                '1024' => esc_html__( '1024 px','legalblow' ),
                ),
        ) 
    ));

    // Choose the mobile breakpoint type
    $wp_customize->add_setting( 
        'legalblow_select_mobile_breakpoint_settings', 
        array(
            'default'           => 767,
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'legalblow_sanitize_select',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Text_Radio_Control( $wp_customize, 'legalblow_select_mobile_breakpoint_settings', 
        array(
            'label'       => esc_html__( 'Mobile Breakpoint', 'legalblow' ),
            'section'     => 'legalblow_layout_settings',
            'type'        => 'legalblow-text-radio',
            'settings'    => 'legalblow_select_mobile_breakpoint_settings',
            'choices' => array( 
                '420' => esc_html__( '420 px','legalblow' ),
                '767' => esc_html__( '767 px','legalblow' ),
                ),
        ) 
    ));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_layout_register' );