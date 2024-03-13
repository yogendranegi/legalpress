<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_site_title_logo_register' ) ) :
function legalblow_customizer_site_title_logo_register( $wp_customize ) {

    if ( isset( $wp_customize->selective_refresh ) ) :
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'legalblow_site_title_callback',
            'fallback_refresh'    => false,
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'legalblow_site_description_callback',
            'fallback_refresh'    => false, 
        ) );
    endif;
 
 	// Display Site Title and Tagline
    $wp_customize->add_setting( 
        'legalblow_display_site_title_tagline', 
        array(
            'default'           => true,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'legalblow_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Toggle_Control( $wp_customize, 'legalblow_display_site_title_tagline', 
        array(
            'label'       => esc_html__( 'Display Site Title and Tagline', 'legalblow' ),
            'section'     => 'title_tagline',
            'type'        => 'legalblow-toggle',
            'settings'    => 'legalblow_display_site_title_tagline',
        ) 
    ));

    // Title label
    $wp_customize->add_setting( 
        'legalblow_label_logo_width_settings', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Title_Info_Control( $wp_customize, 'legalblow_label_logo_width_settings', 
        array(
            'label'       => esc_html__( 'Logo Width', 'legalblow' ),
            'section'     => 'title_tagline',
            'type'        => 'legalblow-title',
            'settings'    => 'legalblow_label_logo_width_settings',
        ) 
    ));


    //Logo Width
    $wp_customize->add_setting( 
        'legalblow_logo_width_settings', 
        array(
            'default' => 200,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Slider_Control( $wp_customize, 'legalblow_logo_width_settings', 
        array(
            'label' => esc_html__( 'Logo Width(px)','legalblow' ),
            'description' => esc_html__( 'Default is 200','legalblow' ),
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 50, 
                'max' => 500,
                'step' => 1,
            ),
        )
    ));

    //Logo Width Mobile
    $wp_customize->add_setting( 
        'legalblow_logo_width_mobile_settings', 
        array(
            'default' => 180,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Slider_Control( $wp_customize, 'legalblow_logo_width_mobile_settings', 
        array(
            'label' => esc_html__( 'Logo Width Mobile(px)','legalblow' ),
            'description' => esc_html__( 'Default is 180','legalblow' ),
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 50, 
                'max' => 500,
                'step' => 1,
            ),
        )
    ));


    //Logo Column Width Mobile
    $wp_customize->add_setting( 
        'legalblow_logo_column_width_mobile_settings', 
        array(
            'default' => 65,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Slider_Control( $wp_customize, 'legalblow_logo_column_width_mobile_settings', 
        array(
            'label' => esc_html__( 'Logo Column Width Mobile(%)','legalblow' ),
            'description' => esc_html__( 'Default is 65','legalblow' ),
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 1, 
                'max' => 100,
                'step' => 1,
            ),
        )
    ));


    // Title label
    $wp_customize->add_setting( 
        'legalblow_label_logo_padding_settings', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Title_Info_Control( $wp_customize, 'legalblow_label_logo_padding_settings', 
        array(
            'label'       => esc_html__( 'Logo Spacing', 'legalblow' ),
            'section'     => 'title_tagline',
            'type'        => 'legalblow-title',
            'settings'    => 'legalblow_label_logo_padding_settings',
        ) 
    ));

    //Logo spacing desktop
    $wp_customize->add_setting( 
        'legalblow_logo_spacing_settings', 
        array(
            'default' => 12,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Slider_Control( $wp_customize, 'legalblow_logo_spacing_settings', 
        array(
            'label' => esc_html__( 'Logo Spacing(px)','legalblow' ),
            'description' => esc_html__( 'Default is 12','legalblow' ),
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 100,
                'step' => 1,
            ),
        )
    ));

    //Logo spacing mobile
    $wp_customize->add_setting( 
        'legalblow_logo_spacing_mobile_settings', 
        array(
            'default' => 12,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Slider_Control( $wp_customize, 'legalblow_logo_spacing_mobile_settings', 
        array(
            'label' => esc_html__( 'Logo Spacing Mobile(px)','legalblow' ),
            'description' => esc_html__( 'Default is 12','legalblow' ),
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 0, 
                'max' => 100,
                'step' => 1,
            ),
        )
    ));

    // Title label
    $wp_customize->add_setting( 
        'legalblow_label_site_favicon_settings', 
        array(
            'sanitize_callback' => 'legalblow_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new legalblow_Title_Info_Control( $wp_customize, 'legalblow_label_site_favicon_settings', 
        array(
            'label'       => esc_html__( 'Site Favicon', 'legalblow' ),
            'section'     => 'title_tagline',
            'type'        => 'legalblow-title',
            'settings'    => 'legalblow_label_site_favicon_settings',
        ) 
    ));

}
endif;

add_action( 'customize_register', 'legalblow_customizer_site_title_logo_register' );