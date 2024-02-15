<?php 
/**
 * Template part for displaying header menu
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogson
 */

 ?>
 
 <?php 
    $page_val = is_front_page() ? 'home' : 'page' ;
?>
<header id="<?php echo esc-attr($page_val); ?>-inner" class="elementor-menu-anchor theme-menu-wrapper full-width-menu style1 page" role="banner">
    <?php 
        if(true===get_theme_mod('legalpress_enable_highlight_area',true) && is_front_page()) {
            ?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'legalpress'); ?></a><?php 
        }
        else{
            ?><a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'legalpress'); ?></a><?php 
        }
    ?>
    <div id="header-main" class="header-wrapper">
        <div class="logo">
            <div class="container">
                <?php 
                    if(has_custom_logo()){
                        legalpress_custom_logo();
                    }
                ?>
                <?php 
                    $alt_logo=esc_url(get_theme_mod('legalpress_sticky_logo'));
                    if(!empty($alt_logo)) {
                        ?>
                            <a id="logo-alt" class="logo-alt" href="<?php echo esc_url(home_url( '/')); ?>"><img src="<?php echo esc_url( get_theme_mod( 'legalpress_sticky_logo' ) ); ?>" alt="logo"></a>
                        <?php 
                    }
                ?>
                <?php 
                    $show_title =   ( true === get_theme_mod('legalpress_display_site_title_tagline', true ) );
                    $header_class = $show_title ?