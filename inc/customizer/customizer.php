<?php
/**
 * LegalBlow Theme Customizer
 *
 * @package legalblow
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'legalblow_customize_register' ) ) :
function legalblow_customize_register( $wp_customize ) {

    // Add custom controls.
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-title-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/toggle-button/class-login-designer-toggle-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/radio-images/class-radio-image-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/slider/class-slider-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/checkbox/class-checkbox-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/text-radio/class-text-radio-control.php' );


    // Register the custom control type.
    $wp_customize->register_control_type( 'LegalBlow_Toggle_Control' );

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}
endif;
add_action( 'customize_register', 'legalblow_customize_register' );

//logo settings
get_template_part( 'inc/customizer/options/section-site-title-logo' );

//header settings
get_template_part( 'inc/customizer/options/section-header' );

//color settings
get_template_part( 'inc/customizer/options/section-color' );

//page settings
get_template_part( 'inc/customizer/options/section-page' );

//sticky header settings
get_template_part( 'inc/customizer/options/section-stickyheader' );

//blog settings
get_template_part( 'inc/customizer/options/section-blog' );

//footer settings
get_template_part( 'inc/customizer/options/section-footer' );

//forms settings
get_template_part( 'inc/customizer/options/section-forms' );

//fonts settings
get_template_part( 'inc/customizer/options/section-fonts' );

//preloader settings
get_template_part( 'inc/customizer/options/section-preloader' );

//misc settings
get_template_part( 'inc/customizer/options/section-misc' );

//customizer helper
get_template_part( 'inc/customizer/customizer-helpers' );

//data sanitization
get_template_part( 'inc/customizer/data-sanitization' );


/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'legalblow_enqueue_customizer_stylesheets' ) ) :
function legalblow_enqueue_customizer_stylesheets() {
    wp_register_style( 'legalblow-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'legalblow-customizer-css' );

    wp_enqueue_script( 'legalblow-customizer-js', get_template_directory_uri(). '/inc/customizer/assets/js/customizer.js' , array('jquery'), false );
}
endif;
add_action( 'customize_controls_print_styles', 'legalblow_enqueue_customizer_stylesheets' );