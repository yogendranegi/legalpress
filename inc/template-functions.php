<?php
/**
 * @package legalpress
 */


/**
 * Header
 */

 if ( ! function_exists( 'legalpress_header_menu_styles' ) ) :
function legalpress_header_menu_styles() {
    get_template_part( 'inc/header-menu/content',esc_html(get_theme_mod('legalpress_header_menu_styles','style1')));
}
endif;
add_action( 'legalpress_action_header', 'legalpress_header_menu_styles' );


/**
 * Footer
 */

 if ( ! function_exists( 'legalpress_footer_copyrights' ) ) :
function legalpress_footer_copyrights() {
    ?>
        <div class="row">
            <div class="copyright">
                <p?>
                    <?php 

                        if("" != esc_html(get_theme_mod( 'legalpress_foote_copyright_text'))) {
                            echo esc_html(get_theme_mod( 'legalpress_footer_copyright_text'));
                            if(get_theme_mod('legalpress_en_footer_credits',true)) {
                                ?><span><?php esc_html_e(' | Theme by ','legalpress') ?><a href="<?php echo esc_url(LEGALPRESS_THEME_AUTH); ?>" target="_blank"><?php esc_html_e('Spiracle Themes','legalpress') ?></a></span>
                                <?php 
                            }
                        }
                        else{
                            echo date_i18n(
                                /* translators: Copyright data format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'legalpress')
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                    <span><?php esc_html_e(' | Theme by ','legalpress') ?><a href="<?php echoesc_url(LEGALPRESS_THEME_AUTH); ?>" target="_blank"><?php esc_html_e('Spiracle Themes','legalpress') ?></a></span>
                                <?php 
                            }
                        ?>
                    </p>
                </div>
            </div>
        <?php 
    }
endif;
add_action( 'legalpress_action_footer', 'legalpress_footer_copyrights' );


/**
 * Custom excerpt length.
 */
if ( ! function_exists( 'legalpress_excerpt_length' ) ) :
function legalpress_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    return absint(get_theme_mod('legalpress_posts_excerpt_length',70));
}
endif;

add_filter('excerpt_length', 'legalpress_excerpt_length');



/**
 * Category list
 */

 if( !function_exists( 'legalpress_category_list' ) ):
    function legalpress_category_list() {
        $pm_args = array(
            'type'      => 'post',
            'taxonomy'  => 'category',
        );
        $pm_cat_lists = get_categories( $pm_args );
        $pm_cat_list = array('' => esc_html__('--Select--','legalpress'));
        foreach( $pm_cat_lists as $category ) {
            $pm_cat_lists[esc_html( $category->slug )] = esc_html( $category->name );
        }
        return  $pm_cat_list;
    }
endif;


/**
 * Get Page Title
 */

 if( !function_exists( 'legalpress_get_title' ) ):
    function legalpress_get_title() {
        if(!is_front_page()) :
            ?>
                <div class="page-title">
                    <h1 class="main-title"><?php the_title(); ?></h1>
                </div>
            <?php 
        endif;
    }
endif;


/**
 * Adding blog sidebar classes to body
 */
if ( ! function_exists( 'legalpress_add_blog_sidebar_classes_to_body' ) )  :
function legalpress_add_blog_sidebar_classes_to_body($classes = '') {
    if('right'===esc_html(get_theme_mod('legalpress_blog_single_sidebar_layout','no'))) {
        $classes[] = 'single-right-sidebar';
    }
    else if('left'===esc_html(get_theme_mod('legalpress_blog_single_sidebar_layout','no'))){
        $classes[] = 'single-left-sidebar';
    }
    else{
        $classes[] = 'single-no-sidebar';
    }
    return $classes;
}
endif;
add_filter('body_class', 'legalpress_add_blog_sidebar_classes_to_body');


/**
 * Menu Search
 */
if ( ! function_exists( 'legalpress_menu_search' ) ):
function legalpress_menu_search($items, $args) {
    if( $args->theme_location == 'primary' )
        return $items.'<li class="menu-header-search">
                            <button class="search-btn"><i class="fas fa-search"></i></button>
                        </li>
                        <!-- Popup Search -->
                        <div id="searchOverlay" class="overlay">
                            <div class="overlay-content">
                                <form method="get" class="searchformmenu" action="'. esc_url(home_url( '/' )) . '">
                                    <div class="search">
                                        <input type="text" value="" class="blog-search" name="s" placeholder="'. esc_attr__( 'Search here','legalpress' ) .'">
                                        <label for="searchsubmit" class="search-icon"><i class="fas fa-search"></i></label>
                                        <input type="submit" class="searchsubmitmenu" value"'. esc_attr__( 'Search','legalpress' ) .'">
                                    </div>
                                </form>
                            </div>
                            <button class="search-closebtn" title="'. esc_attr__('Close','legalpress') .'" > <i class="fas fa-times"></i></button>
                        </div>
                        ';
        return $items;
    }
endif;

if ( ! function_exists( 'legalpress_filter_menu_search_hook' ) ) :
function legalpress_filter_menu_search_hook() {
    add_filter('wp_nav_menu_items','legalpress_menu_search', 10, 2);
}
endif;
add_action( 'wp', 'legalpress_filter_menu_search_hook' );


/**
 * Preconnect Fonts
 */
function legalpress_preconnect_fonts() {
    ?>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <?php
}
add_action( 'wp_head', 'legalpress_preconnect_fonts' );


/**
 * Search Form
 */
if ( ! function_exists( 'legalpress_search_content' ) ) :
function legalpress_search_content() {
    ?>
        <div class="search-form-wrapper">
            <form method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="form-group-search">
                    <label class="screen-reader-text" for="searchsubmit"><?php esc_html_e('Search for:', 'legalpress'); ?></label>
                    <input type="search" id="pm-search-field" class="search-field" placeholder="<?php esc_attr_e('Search here','legalpress') ?>" value="<?php echo get_search_query(); ?>" name="s"/>
                    <button type="submit" value=""><?php esc_html_e('Search','legalpress') ?></button>
                </div>
            </form>
        </div>
    <?php 
}
endif;
add_action('legalpress_action_search_content', 'legalpress_search_content');


/**
 * Left Modal
 */
if ( ! function_exists( 'legalpress_left_modal_content' ) ) :
function legalpress_left_modal_content() {
    ?>
        <div class="modal left fade" id="pmModal" tabindex="-1" role="dialog" aria-labelledby="pmModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
                    </div>  
                    <div class="modal-body">
                        <aside id="menuleftsidebar" class="widget-area" role="complementary">
                            <?php 
                                if ( is_active_sidebar('menuleftsidebar')) {
                                    dynamic_sidebar('menuleftsidebar');
                                }
                            ?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    <?php 
}
endif;
add_action('legalpress_action_left_modal_content', 'legalpress_left_modal_content');


/**
 * Function for storing activation time
 */
function legalpress_activation_time() {
    if ( false === get_option( 'legalpress_activation_time' ) ) {
        add_option( 'legalpress_activation_time', strtotime('now') );
    }
}
add_action( 'after_switch_theme', 'legalpress_activation_time');
add_action('after_setup_theme', 'legalpress_activation_time');


/**
 * Function for Minimizing dynamic CSS
 */
function legalpress_minimize_css($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}


/**
 * Adding class to body
 */
if ( ! function_exists( 'legalpress_add_classes_to_body' ) ) :
function legalpress_add_classes_to_body($classes = '') {
    $classes[] = 'theme-legalpress';
    return $classes;
}
endif;
add_filter('body_class', 'legalpress_add_classes_to_body');


/**
 * Function for changing category archive title
 */
function legalpress_get_archive_title($title) {
    if ( is_category() ) {
        $title_text = esc_html(get_theme_mod( 'legalpress_cat_archive_title_text', esc_html__('Category:','legalpress'))). " ";
        $title = single_cat_title($title_text);
    }
    return $title;
}
if(true===get_theme_mod( 'legalpress_enable_cat_archive_settings',false)) :
    add_filter( 'get_the_archive_title', 'legalpress_get_archive_title');
endif;


/**
 * Disable Plugin Redirect
 */
function legalpress_prevent_plugins_redirect() {
    delete_transient( 'elementor_activation_redirect');
}
add_action('admin_init', 'legalpress_prevent_plugins_redirect');