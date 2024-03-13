<?php
/**
 * Custom template hooks for this theme.
 *
 *
 * @package legalblow
 */


/**
 * Before title meta hook
 */
if ( ! function_exists( 'legalblow_before_title' ) ) :
function legalblow_before_title() {
	do_action('legalblow_before_title');
}
endif;

/**
 * After title meta hook
 */
if ( ! function_exists( 'legalblow_after_title' ) ) :
function legalblow_after_title() {
	do_action('legalblow_after_title');
}
endif;

/**
 * Before title content meta hook
 */
if ( ! function_exists( 'legalblow_before_title_content' ) ) :
function legalblow_before_title_content() {
	do_action('legalblow_before_title_content');
}
endif;

/**
 * After title content meta hook
 */
if ( ! function_exists( 'legalblow_after_title_content' ) ) :
function legalblow_after_title_content() {
	do_action('legalblow_after_title_content');
}
endif;

/**
 * Before menu cart meta hook
 */
if ( ! function_exists( 'legalblow_before_header_menu_cart' ) ) :
function legalblow_before_header_menu_cart() {
	do_action('legalblow_before_header_menu_cart');
}
endif;


/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'legalblow_single_post_after_content' ) ) :
function legalblow_single_post_after_content($postID) {
	do_action('legalblow_single_post_after_content',$postID);
}
endif;