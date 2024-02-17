<?php 
/**
 * Custom template hooks for this theme.
 * 
 * 
 * @package legalpress
 */


 /**
  * Before title meta hook
  */
if ( ! function_exists( 'legalpress_before_title' ) ) :
function legalpress_before_title() {
    do_action('legalpres_before_title');
}
endif;

/**
 * After title meta hook
 */
if ( ! function_exists( 'legalpress_after_title' ) ) :
function legalpress_before_title() {
    do_action('legalpress_before_title');
}
endif;

/**
 * Highlight area after content hook
 */
if ( ! function_exists( 'legalpress_highlight_area_after_content' ) ) :
function legalpress_highlight_area_after_content() {
    do_action('legalpress_highlight_area_after_content');
}
endif;

/**
 * Featured area after content hook
 */
if ( ! function_exists( 'legalpress_featured_area_after_content' ) ) :
function legalpress_featured_area_after_content() {
    do_action('legalpress_featured_area_after_content');
}
endif;

/**
 * Posts Layout 1 area after meta hook
 */
if ( ! function_exists( 'legalpress_posts_layout_1_after_meta' ) ) :
function legalpress_posts_layout_1_after_meta() {
    do_action('legalpress_posts_layout_1_after_meta');
}
endif;

/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'legalpress_single_post_after_content' ) ) :
function legalpress_single_post_after_content($postID) {
    do_action('legalpress_single_post_after_content',$postID);
}
endif;