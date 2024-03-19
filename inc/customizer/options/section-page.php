<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_page_register' ) ) :
function legalblow_customizer_page_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'legalblow_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Pages Settings', 'legalblow' )
        )
    );

    // Info label
    $wp_customize->add_setting( 
        'legalblow_page_settings_show_info', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Info_Control( $wp_customize, 'legalblow_page_settings_show_info', 
        array(
            'label'       => esc_html__( 'Note: These setting apply for all the pages except the homepage.', 'legalblow' ),
            'section'     => 'legalblow_page_settings',
            'type'        => 'legalblow-info',
            'settings'    => 'legalblow_page_settings_show_info',
        ) 
    ));

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_page_settings_title', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_page_settings_title', 
		array(
		    'label'       => esc_html__( 'Page Title', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_page_settings_title',
		) 
	));

	// Add an option to enable the page title
	$wp_customize->add_setting( 
		'legalblow_enable_page_title', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_page_title', 
		array(
		    'label'       => esc_html__( 'Show Page Title', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_page_title',
		) 
	));
	


	// Add an option to enable the page title background
	$wp_customize->add_setting( 
		'legalblow_enable_page_title_bg', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_page_title_bg', 
		array(
		    'label'       => esc_html__( 'Show Page Title background', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_page_title_bg',
		    'active_callback' => 'legalblow_page_title_enable',
		) 
	));

	// Add an option to enable the page title in left
	$wp_customize->add_setting( 
		'legalblow_enable_page_title_left', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_page_title_left', 
		array(
		    'label'       => esc_html__( 'Align Page Title to left', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_page_title_left',
		    'active_callback' => 'legalblow_page_title_enable',
		) 
	));


	//spacing options from top
    $wp_customize->add_setting( 
        'legalblow_page_title_spacing_top', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_page_title_spacing_top', 
        array(
            'label' => esc_html__( 'Page Title Spacing Top (px)','legalblow' ),
            'description' => esc_html__( 'Default is 70','legalblow' ),
            'section' => 'legalblow_page_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 500,
                'step' => 1,
            ),
            'active_callback' => 'legalblow_page_title_enable',
        )
    ));


    //spacing options from bottom
    $wp_customize->add_setting( 
        'legalblow_page_title_spacing_bottom', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_page_title_spacing_bottom', 
        array(
            'label' => esc_html__( 'Page Title Spacing Bottom (px)','legalblow' ),
            'description' => esc_html__( 'Default is 70','legalblow' ),
            'section' => 'legalblow_page_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 500,
                'step' => 1,
            ),
            'active_callback' => 'legalblow_page_title_enable',
        )
    ));


    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_page_title_section_color', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_page_title_section_color', 
		array(
		    'label'       => esc_html__( 'Page Title Section Color', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_page_title_section_color',
		    'active_callback' => 'legalblow_page_title_enable',
		) 
	));

	// bg color
    $wp_customize->add_setting(
        'legalblow_page_title_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#8224e3',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_page_title_bg_color',
	        array(
	        	'label'      => esc_html__( 'Background Color', 'legalblow' ),
	        	'section'    => 'legalblow_page_settings',
	        	'settings'   => 'legalblow_page_title_bg_color',
	        	'active_callback' => 'legalblow_page_title_and_bg_enable',
	        )
	    )
    );

	// title color
    $wp_customize->add_setting(
        'legalblow_page_title_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_page_title_color',
	        array(
	        	'label'      => esc_html__( 'Title Color', 'legalblow' ),
	        	'section'    => 'legalblow_page_settings',
	        	'settings'   => 'legalblow_page_title_color',
	        	'active_callback' => 'legalblow_page_title_enable',
	        )
	    )
    );


    // breadcrumbs color
    $wp_customize->add_setting(
        'legalblow_page_title_breadcrumbs_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_page_title_breadcrumbs_color',
	        array(
	        	'label'      => esc_html__( 'Breadcrumbs Color', 'legalblow' ),
	        	'section'    => 'legalblow_page_settings',
	        	'settings'   => 'legalblow_page_title_breadcrumbs_color',
	        	'active_callback' => 'legalblow_page_title_enable',
	        )
	    )
    );

    // Add an option to enable the image overlay
	$wp_customize->add_setting( 
		'legalblow_enable_page_title_overlay', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_page_title_overlay', 
		array(
		    'label'       => esc_html__( 'Show Image Overlay', 'legalblow' ),
		    'description'       => esc_html__( 'Works only when the pages featured image is set', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_page_title_overlay',
		    'active_callback' => 'legalblow_page_title_enable',
		) 
	));


	// overlay color
    $wp_customize->add_setting(
        'legalblow_page_title_img_overlay_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#000',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_page_title_img_overlay_color',
	        array(
	        	'label'      => esc_html__( 'Overlay Color', 'legalblow' ),
	        	'section'    => 'legalblow_page_settings',
	        	'settings'   => 'legalblow_page_title_img_overlay_color',
	        	'active_callback' => 'legalblow_page_title_enable_overlay_enable',
	        )
	    )
    );


	// Title label
	$wp_customize->add_setting( 
		'legalblow_label_page_content_spacing_top_title', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_page_content_spacing_top_title', 
		array(
		    'label'       => esc_html__( 'Page Content Spacing', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_page_content_spacing_top_title',
		) 
	));

	//spacing options
    $wp_customize->add_setting( 
        'legalblow_page_content_spacing_top_title', 
        array(
            'default' => 70,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_page_content_spacing_top_title', 
        array(
            'label' => esc_html__( 'Content Spacing from Title (px)','legalblow' ),
            'description' => esc_html__( 'Default is 70','legalblow' ),
            'section' => 'legalblow_page_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 400,
                'step' => 1,
            ),
        )
    ));


	

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_page_breadcrumb_settings', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_page_breadcrumb_settings', 
		array(
		    'label'       => esc_html__( 'Breadcrumbs', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_page_breadcrumb_settings',
		    'active_callback' => 'legalblow_page_title_enable',
		) 
	));

	// Add an option to enable the breadcrumbs
	$wp_customize->add_setting( 
		'legalblow_enable_page_breadcrumbs', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_page_breadcrumbs', 
		array(
		    'label'       => esc_html__( 'Show Breadcrumbs', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_page_breadcrumbs',
		    'active_callback' => 'legalblow_page_title_enable',
		) 
	));


	// Choose the breadcrumb type
	$wp_customize->add_setting( 
		'legalblow_select_breadcrumb_settings', 
		array(
		    'default'           => 'default',
		    'type'              => 'theme_mod',
		    'capability'		=> 'edit_theme_options',
		    'sanitize_callback' => 'legalblow_sanitize_select',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Text_Radio_Control( $wp_customize, 'legalblow_select_breadcrumb_settings', 
		array(
		    'label'       => esc_html__( 'Choose Breadcrumb Type', 'legalblow' ),
		    'section'     => 'legalblow_page_settings',
		    'type'        => 'legalblow-text-radio',
		    'settings'    => 'legalblow_select_breadcrumb_settings',
		    'choices' => array(
				'yoast' => esc_html__( 'Yoast','legalblow' ), 
				'navxt' => esc_html__( 'NavXT','legalblow' ),
				'default' => esc_html__( 'Default','legalblow' ),
				),
		    'active_callback' => 'legalblow_page_title_breadcrumbs_enable',
		) 
	));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_page_register' );