<?php

/**
 * BreadCrumb Settings
 */
if (!function_exists('legalblow_select_breadcrumbs')):
    function legalblow_select_breadcrumbs() {
        $breadcrumb_from = esc_html(get_theme_mod( 'legalblow_select_breadcrumb_settings','default'));
        if (function_exists('yoast_breadcrumb') && $breadcrumb_from == 'yoast') :
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        elseif (function_exists('bcn_display') && $breadcrumb_from == 'navxt'): 
            bcn_display();
        else:
            require get_template_directory() . '/inc/breadcrumbs.php';
            $breadcrumb_args = array(
                'container' => 'div',
                'show_browse' => false
            );        
            breadcrumb_trail($breadcrumb_args);
        endif;
    }
endif;
add_action('legalblow_breadcrumbs_hook', 'legalblow_select_breadcrumbs');