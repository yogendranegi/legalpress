<?php
/**
 * Theme Customizer Controls
 *
 * @package legalblow
 */


if ( ! function_exists( 'legalblow_customizer_blog_register' ) ) :
function legalblow_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'legalblow_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'legalblow' ),
        )
    );

	// Section Posts ===================================================
    $wp_customize->add_section(
        'legalblow_posts_settings',
        array (
        	'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'legalblow' ),
            'panel'          => 'legalblow_blog_settings_panel',
        )
    ); 


    // Blog page bg Title label
	$wp_customize->add_setting( 
		'legalblow_label_blog_bg_settings', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_blog_bg_settings', 
		array(
		    'label'       => esc_html__( 'Blog Background', 'legalblow' ),
		    'section'     => 'legalblow_posts_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_blog_bg_settings',
		    'active_callback' => 'legalblow_header_transparent_enable_page_title_disable',
		) 
	));

	// Blog bg color
    $wp_customize->add_setting(
        'legalblow_blog_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ca2e49',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'legalblow_blog_bg_color',
	        array(
	        	'label'      => esc_html__( 'Background Color', 'legalblow' ),
	        	'section'    => 'legalblow_posts_settings',
	        	'settings'   => 'legalblow_blog_bg_color',
	        	'active_callback' => 'legalblow_header_transparent_enable_page_title_disable',
	        )
	    )
    );


    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_post_meta_settings', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_post_meta_settings', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'legalblow' ),
		    'section'     => 'legalblow_posts_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_post_meta_settings',
		) 
	));

    // Post meta
	$wp_customize->add_setting( 
		'legalblow_blog_post_meta_pill_checkbox',
		array(
			'default' => 'author,date,comments,readmore,image',
			'transport' => 'refresh',
			'sanitize_callback' => 'legalblow_sanitize_text_field'
		)
	);

	$wp_customize->add_control( 
		new LegalBlow_Checkbox_Control( $wp_customize, 'legalblow_blog_post_meta_pill_checkbox',
		array(
			'label' => esc_html__( 'Post Meta Settings', 'legalblow' ),
			'description' => esc_html__( 'Hide/Show the post meta for blog page', 'legalblow' ),
			'section' => 'legalblow_posts_settings',
			'input_attrs' => array(
				'sortable' => false,
				'fullwidth' => true,
			),
			'choices' => array(
				'author' => esc_html__( 'Author', 'legalblow' ),
				'date' => esc_html__( 'Date', 'legalblow' ),
				'comments' => esc_html__( 'Comments', 'legalblow'  ),
				'readmore' => esc_html__( 'Read More', 'legalblow'  ),
				'image' => esc_html__( 'Featured Image', 'legalblow'  ),
			)
		)
	) );

	// Title label
	$wp_customize->add_setting( 
		'legalblow_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'legalblow' ),
		    'section'     => 'legalblow_posts_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'legalblow_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'legalblow_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new LegalBlow_Radio_Image_Control( $wp_customize,'legalblow_blog_sidebar_layout',
            array(
                'settings'		=> 'legalblow_blog_sidebar_layout',
                'section'		=> 'legalblow_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'legalblow' ),
                'choices'		=> array(
                    'right'	        => LEGALBLOW_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => LEGALBLOW_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => LEGALBLOW_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );


	// Section Single Post ===================================================
    $wp_customize->add_section(
        'legalblow_single_post_settings',
        array (
        	'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'legalblow' ),
            'panel'          => 'legalblow_blog_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'legalblow_label_single_page_title_section_show', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_single_page_title_section_show', 
		array(
		    'label'       => esc_html__( 'Page Title Section', 'legalblow' ),
		    'section'     => 'legalblow_single_post_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_single_page_title_section_show',
		) 
	));
	

	// Add an option to enable the page title section
	$wp_customize->add_setting( 
		'legalblow_enable_single_page_title_section', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_single_page_title_section', 
		array(
		    'label'       => esc_html__( 'Show Page Title Section', 'legalblow' ),
		    'section'     => 'legalblow_single_post_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_single_page_title_section',
		) 
	));


	// Add an option to enable the page title
	$wp_customize->add_setting( 
		'legalblow_enable_single_page_title', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_single_page_title', 
		array(
		    'label'       => esc_html__( 'Show Page Title', 'legalblow' ),
		    'section'     => 'legalblow_single_post_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_single_page_title',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'legalblow_label_single_post_title_show', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_single_post_title_show', 
		array(
		    'label'       => esc_html__( 'Post Heading', 'legalblow' ),
		    'section'     => 'legalblow_single_post_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_single_post_title_show',
		) 
	));


	// Add an option to enable the post heading
	$wp_customize->add_setting( 
		'legalblow_enable_single_page_heading', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'legalblow_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Toggle_Control( $wp_customize, 'legalblow_enable_single_page_heading', 
		array(
		    'label'       => esc_html__( 'Show Post Heading', 'legalblow' ),
		    'section'     => 'legalblow_single_post_settings',
		    'type'        => 'legalblow-toggle',
		    'settings'    => 'legalblow_enable_single_page_heading',
		) 
	));



	// Title label
	$wp_customize->add_setting( 
		'legalblow_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'legalblow' ),
		    'section'     => 'legalblow_single_post_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_single_pos_meta_show',
		) 
	));


	// Post meta
	$wp_customize->add_setting( 
		'legalblow_single_post_meta_pill_checkbox',
		array(
			'default' => 'date,author,categories,tags,comments,image,links',
			'transport' => 'refresh',
			'sanitize_callback' => 'legalblow_sanitize_text_field'
		)
	);

	$wp_customize->add_control( 
		new LegalBlow_Checkbox_Control( $wp_customize, 'legalblow_single_post_meta_pill_checkbox',
		array(
			'label' => esc_html__( 'Post Meta Settings', 'legalblow' ),
			'description' => esc_html__( 'Hide/Show the post meta for single post', 'legalblow' ),
			'section' => 'legalblow_single_post_settings',
			'input_attrs' => array(
				'sortable' => false,
				'fullwidth' => true,
			),
			'choices' => array(
				'date' => esc_html__( 'Date', 'legalblow' ),
				'author' => esc_html__( 'Author', 'legalblow' ),
				'categories' => esc_html__( 'Categories', 'legalblow'  ),
				'tags' => esc_html__( 'Tags', 'legalblow'  ),
				'comments' => esc_html__( 'Comments', 'legalblow'  ),
				'image' => esc_html__( 'Featured Image', 'legalblow'  ),
				'links' => esc_html__( 'Previous/Next Links', 'legalblow'  ),
			)
		)
	) );

	// Title label
	$wp_customize->add_setting( 
		'legalblow_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'legalblow_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new LegalBlow_Title_Info_Control( $wp_customize, 'legalblow_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'legalblow' ),
		    'section'     => 'legalblow_single_post_settings',
		    'type'        => 'legalblow-title',
		    'settings'    => 'legalblow_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'legalblow_blog_single_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'legalblow_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new LegalBlow_Radio_Image_Control( $wp_customize,'legalblow_blog_single_sidebar_layout',
            array(
                'settings'		=> 'legalblow_blog_single_sidebar_layout',
                'section'		=> 'legalblow_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'legalblow' ),
                'choices'		=> array(
                    'right'	        => LEGALBLOW_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => LEGALBLOW_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => LEGALBLOW_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

}
endif;

add_action( 'customize_register', 'legalblow_customizer_blog_register' );