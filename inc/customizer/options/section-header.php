<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_header_register' ) ) :
function legalblow_customizer_header_register( $wp_customize ) {

	$wp_customize->add_panel(
        'legalblow_header_settings_panel',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'legalblow' ),
        )
    );

	// Section Top bar ===================================================
    $wp_customize->add_section(
        'legalblow_header_topbar_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Top Bar', 'legalblow' ),
            'panel'          => 'legalblow_header_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_topbar_show', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_topbar_show', 
		array(
		    'label'       => esc_html__( 'Top Bar', 'legalblow' ),
		    'section'     => 'legalblow_header_topbar_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_topbar_show',
		) 
	));

	// Add an option to enable the top bar
	$wp_customize->add_setting( 
		'legalblow_enable_header_topbar', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_header_topbar', 
		array(
		    'label'       => esc_html__( 'Show Topbar', 'legalblow' ),
		    'section'     => 'legalblow_header_topbar_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_header_topbar',
		) 
	));


	// Section Menu ===================================================
    $wp_customize->add_section(
        'legalblow_header_menu_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Menu', 'legalblow' ),
            'panel'          => 'legalblow_header_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_menu_show', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_menu_show', 
		array(
		    'label'       => esc_html__( 'Menu', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_menu_show',
		) 
	));

	// Add an option to align the menu
	$wp_customize->add_setting( 
		'legalblow_enable_header_menu_align', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_header_menu_align', 
		array(
		    'label'       => esc_html__( 'Align Menu to right', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_header_menu_align',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_menu_items_spacing_show', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_menu_items_spacing_show', 
		array(
		    'label'       => esc_html__( 'Menu Items Spacing', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_menu_items_spacing_show',
		) 
	));

    // menu items spacing
    $wp_customize->add_setting( 
        'legalblow_menu_items_spacing', 
        array(
            'default' => 16,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_menu_items_spacing', 
        array(
            'label' => esc_html__( 'Menu Items Spacing(px)','legalblow' ),
            'description' => esc_html__( 'Default is 16','legalblow' ),
            'section' => 'legalblow_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 100,
                'step' => 1,
            ),
        )
    ));


	// Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_menu_spacing_show', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_menu_spacing_show', 
		array(
		    'label'       => esc_html__( 'Menu Margins', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_menu_spacing_show',
		) 
	));

    // spacing from top
    $wp_customize->add_setting( 
        'legalblow_menu_spacing_from_top', 
        array(
            'default' => 0,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_menu_spacing_from_top', 
        array(
            'label' => esc_html__( 'Margin from Top (px)','legalblow' ),
            'description' => esc_html__( 'Default is 0','legalblow' ),
            'section' => 'legalblow_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 150,
                'step' => 1,
            ),
        )
    ));


    // spacing from bottom
    $wp_customize->add_setting( 
        'legalblow_menu_spacing_from_bottom', 
        array(
            'default' => 0,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_menu_spacing_from_bottom', 
        array(
            'label' => esc_html__( 'Margin from Bottom (px)','legalblow' ),
            'description' => esc_html__( 'Default is 0','legalblow' ),
            'section' => 'legalblow_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 150,
                'step' => 1,
            ),
        )
    ));

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_menu_last_button', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_menu_last_button', 
		array(
		    'label'       => esc_html__( 'Menu Button', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_menu_last_button',
		) 
	));

	// Add an option to make last menu as button
	$wp_customize->add_setting( 
		'legalblow_enable_header_menu_last_button', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_header_menu_last_button', 
		array(
		    'label'       => esc_html__( 'Show last menu item as button', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_header_menu_last_button',
		) 
	));

	//choose button type
	$wp_customize->add_setting( 
        'legalblow_choose_style_menu_last_button', 
        array(
            'default'           => 'square',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'legalblow_sanitize_select',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Text_Radio_Control( $wp_customize, 'legalblow_choose_style_menu_last_button', 
        array(
            'label'       => esc_html__( 'Choose Button Type', 'legalblow' ),
            'section'     => 'legalblow_header_menu_settings',
            'type'        => 'legalblow-text-radio',
            'settings'    => 'legalblow_choose_style_menu_last_button',
            'choices' => array(
            	'square' => esc_html__( 'Square','legalblow' ),
                'round' => esc_html__( 'Rounded','legalblow' ),
            ),
            'active_callback' => 'legalblow_header_menu_button_enable',
        )
    ));

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_menu_last_button_color', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_menu_last_button_color', 
		array(
		    'label'       => esc_html__( 'Menu Button Color', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_menu_last_button_color',
		    'active_callback' => 'legalblow_header_menu_button_enable',
		) 
	));

	// button bg color
    $wp_customize->add_setting(
        'legalblow_header_menu_last_button_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#c29852',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_header_menu_last_button_bg_color',
	        array(
	        	'label'      => esc_html__( 'Background Color', 'legalblow' ),
	        	'section'    => 'legalblow_header_menu_settings',
	        	'settings'   => 'legalblow_header_menu_last_button_bg_color',
	        	'active_callback' => 'legalblow_header_menu_button_enable',
	        )
	    )
    );


    // button text color
    $wp_customize->add_setting(
        'legalblow_header_menu_last_button_content_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_header_menu_last_button_content_color',
	        array(
	        	'label'      => esc_html__( 'Text Color', 'legalblow' ),
	        	'section'    => 'legalblow_header_menu_settings',
	        	'settings'   => 'legalblow_header_menu_last_button_content_color',
	        	'active_callback' => 'legalblow_header_menu_button_enable',
	        )
	    )
    );


    // Title label for Mobile 
	$wp_customize->add_setting( 
		'legalblow_label_header_menu_last_button_color_mobile', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_menu_last_button_color_mobile', 
		array(
		    'label'       => esc_html__( 'Menu Button Color Mobile', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_menu_last_button_color_mobile',
		    'active_callback' => 'legalblow_header_menu_button_enable',
		) 
	));

	// button bg color for Mobile 
    $wp_customize->add_setting(
        'legalblow_header_menu_last_button_bg_color_mobile',
        array(
            'type' => 'theme_mod',
            'default'           => '#c29852',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_header_menu_last_button_bg_color_mobile',
	        array(
	        	'label'      => esc_html__( 'Background Color', 'legalblow' ),
	        	'section'    => 'legalblow_header_menu_settings',
	        	'settings'   => 'legalblow_header_menu_last_button_bg_color_mobile',
	        	'active_callback' => 'legalblow_header_menu_button_enable',
	        )
	    )
    );


    // button text color for Mobile 
    $wp_customize->add_setting(
        'legalblow_header_menu_last_button_content_color_mobile',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_header_menu_last_button_content_color_mobile',
	        array(
	        	'label'      => esc_html__( 'Text Color', 'legalblow' ),
	        	'section'    => 'legalblow_header_menu_settings',
	        	'settings'   => 'legalblow_header_menu_last_button_content_color_mobile',
	        	'active_callback' => 'legalblow_header_menu_button_enable',
	        )
	    )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_toggle_menu', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_toggle_menu', 
		array(
		    'label'       => esc_html__( 'Toggle Menu', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_toggle_menu',
		) 
	));

	// vertical spacing
    $wp_customize->add_setting( 
        'legalblow_header_toggle_menu_spacing', 
        array(
            'default' => 0,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_header_toggle_menu_spacing', 
        array(
            'label' => esc_html__( 'Vertical Spacing(px)','legalblow' ),
            'description' => esc_html__( 'Default is 0','legalblow' ),
            'section' => 'legalblow_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 250,
                'step' => 1,
            ),
        )
    ));

    $wp_customize->add_setting(
        'legalblow_header_toggle_menu_text',
        array(            
            'default'           => esc_html__('MENU','legalblow'),
            'sanitize_callback' => 'legalblow_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'legalblow_header_toggle_menu_text',
        array(
            'settings'      => 'legalblow_header_toggle_menu_text',
            'section'       => 'legalblow_header_menu_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Toggle Menu Text', 'legalblow' ),
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_toggle_menu_btn_popup', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_toggle_menu_btn_popup', 
		array(
		    'label'       => esc_html__( 'Button Settings inside Toggle Popup', 'legalblow' ),
		    'section'     => 'legalblow_header_menu_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_toggle_menu_btn_popup',
		    'active_callback' => 'legalblow_header_menu_button_enable',
		) 
	));

	// button height
    $wp_customize->add_setting( 
        'legalblow_header_toggle_menu_btn_height', 
        array(
            'default' => 2,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_header_toggle_menu_btn_height', 
        array(
            'label' => esc_html__( 'Button Height(px)','legalblow' ),
            'description' => esc_html__( 'Default is 2','legalblow' ),
            'section' => 'legalblow_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 50,
                'step' => 1,
            ),
            'active_callback' => 'legalblow_header_menu_button_enable',
        )
    ));

    // button padding
    $wp_customize->add_setting( 
        'legalblow_header_toggle_menu_btn_padding', 
        array(
            'default' => 2,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new LegalBlow_Slider_Control( $wp_customize, 'legalblow_header_toggle_menu_btn_padding', 
        array(
            'label' => esc_html__( 'Button Padding(px)','legalblow' ),
            'description' => esc_html__( 'Default is 2','legalblow' ),
            'section' => 'legalblow_header_menu_settings',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 100,
                'step' => 1,
            ),
            'active_callback' => 'legalblow_header_menu_button_enable',
        )
    ));


    // // Info label
    // $wp_customize->add_setting( 
    //     'legalblow_header_toggle_menu_btn_info', 
    //     array(
    //         'sanitize_callback' => 'legalblow_sanitize_title',
    //     ) 
    // );

    // $wp_customize->add_control( 
    //     new LegalBlow_Info_Control( $wp_customize, 'legalblow_header_toggle_menu_btn_info', 
    //     array(
    //         // 'label'       => esc_html__( 'Note: This button settings only works if you have set the last menu as button', 'legalblow' ),
    //         'section'     => 'legalblow_header_menu_settings',
    //         'type'        => 'legalblow-info',
    //         'settings'    => 'legalblow_header_toggle_menu_btn_info',
    //         'active_callback' => 'legalblow_header_menu_button_enable',
    //     ) 
    // ));






    // Section Transparent Header ===================================================
    $wp_customize->add_section(
        'legalblow_header_transparent_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Transparent Header', 'legalblow' ),
            'panel'          => 'legalblow_header_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_header_transparent_show', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_header_transparent_show', 
		array(
		    'label'       => esc_html__( 'Transparent Header Settings', 'legalblow' ),
		    'section'     => 'legalblow_header_transparent_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_header_transparent_show',
		) 
	));

	// Add an option to enable transparency
	$wp_customize->add_setting( 
		'legalblow_enable_header_transparent', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_header_transparent', 
		array(
		    'label'       => esc_html__( 'Enable Transparency', 'legalblow' ),
		    'section'     => 'legalblow_header_transparent_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_header_transparent',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'legalblow_label_transparent_header_menu_color', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_transparent_header_menu_color', 
		array(
		    'label'       => esc_html__( 'Primary Menu Color', 'legalblow' ),
		    'section'     => 'legalblow_header_transparent_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_transparent_header_menu_color',
		    'active_callback' => 'legalblow_header_transparent_enable',
		) 
	));

	// Menu color
    $wp_customize->add_setting(
        'legalblow_transparent_header_menu_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_transparent_header_menu_color',
	        array(
	        	'label'      => esc_html__( 'Menu Color HomePage', 'legalblow' ),
	        	'section'    => 'legalblow_header_transparent_settings',
	        	'settings'   => 'legalblow_transparent_header_menu_color',
	        	'active_callback' => 'legalblow_header_transparent_enable',
	        )
	    )
    );


    // Menu color inner pages
    $wp_customize->add_setting(
        'legalblow_transparent_header_menu_color_ip',
        array(
            'type' => 'theme_mod',
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_transparent_header_menu_color_ip',
	        array(
	        	'label'      => esc_html__( 'Menu Color Inner Pages', 'legalblow' ),
	        	'section'    => 'legalblow_header_transparent_settings',
	        	'settings'   => 'legalblow_transparent_header_menu_color_ip',
	        	'active_callback' => 'legalblow_header_transparent_enable',
	        )
	    )
    );

}
endif;

add_action( 'customize_register', 'legalblow_customizer_header_register' );