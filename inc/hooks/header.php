<?php

/**
* Header
*/

if ( ! function_exists( 'legalblow_header_menu_styles' ) ) :
function legalblow_header_menu_styles() {
    get_template_part( 'inc/header-menu/content',esc_html(get_theme_mod('legalblow_header_menu_style','style1')));
}
endif;
add_action( 'legalblow_action_header', 'legalblow_header_menu_styles' );