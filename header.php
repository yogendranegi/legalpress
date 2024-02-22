<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package legalpress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="https://schema.org/WebSite">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
  <?php 
      if(function_exists('wp_body_open')) :
          wp_body_open();
      else :
          do_action('wp_body_open');
      endif;
      if(true === get_theme_mod( 'legalpress_enable_preloader',false )) :
          ?>
            <!-- Begin Preloader -->
                <div class="loader-wrapper lds-flickr">
                    <div id="pre-loader">
                        <div class="loader-pulse"></div>
                    </div>
                </div>
            <!-- End Preloader -->
          <?php
      endif;
      /**
      * Hook - legalpress_action_header.
      *
      * @hooked legalpress_header_menu_styles - 10
      */
      do_action( 'legalpress_action_header' );
  ?>