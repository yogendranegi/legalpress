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
 * Highlight area after content hook
 */
if ( ! function_exists( 'legalblow_highlight_area_after_content' ) ) :
function legalblow_highlight_area_after_content() {
    do_action('legalblow_highlight_area_after_content');
}
endif;

/**
 * Featured area after content hook
 */
if ( ! function_exists( 'legalblow_featured_area_after_content' ) ) :
function legalblow_featured_area_after_content() {
    do_action('legalblow_featured_area_after_content');
}
endif;

/**
 * Posts Layout 1 area after meta hook
 */
if ( ! function_exists( 'legalblow_posts_layout_1_after_meta' ) ) :
function legalblow_posts_layout_1_after_meta() {
    do_action('legalblow_posts_layout_1_after_meta');
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

/**
 * WooCommerce show cart
 */
if ( ! function_exists( 'legalblow_woocommerce_show_cart' ) ) :
	function legalblow_woocommerce_show_cart() {
		do_action('legalblow_woocommerce_show_cart');
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