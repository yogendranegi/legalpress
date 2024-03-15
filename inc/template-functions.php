<?php
/**
 * @package legalblow
 */


/**
 * Header
 */

 if ( ! function_exists( 'legalblow_header_menu_styles' ) ) :
function legalblow_header_menu_styles() {
    get_template_part( 'inc/header-menu/content',esc_html(get_theme_mod('legalblow_header_menu_styles','style1')));
}
endif;
add_action( 'legalblow_action_header', 'legalblow_header_menu_styles' );


/**
 * Footer
 */

 if ( ! function_exists( 'legalblow_footer_copyrights' ) ) :
function legalblow_footer_copyrights() {
    ?>
        <div class="row">
            <div class="copyright">
                <p>
                    <?php 

                        if("" != esc_html(get_theme_mod( 'legalblow_footer_copyright_text'))) {
                            echo esc_html(get_theme_mod( 'legalblow_footer_copyright_text'));
                            if(get_theme_mod('legalblow_en_footer_credits',true)) {
                                ?><span><?php esc_html_e(' | Theme by ','legalblow') ?><a href="<?php echo esc_url(LEGALBLOW_THEME_AUTH); ?>" target="_blank"><?php esc_html_e('Spiracle Themes','legalblow') ?></a></span>
                                <?php 
                            }
                        }
                        else{
                            echo date_i18n(
                                /* translators: Copyright data format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'legalblow')
                                );
                                ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                <span><?php esc_html_e(' | Theme by ','legalblow') ?><a href="<?php echo esc_url(LEGALBLOW_THEME_AUTH); ?>" target="_blank"><?php esc_html_e('Spiracle Themes','legalblow') ?></a></span>

                                <?php 
                            }
                        ?>
                    </p>
                </div>
            </div>
        <?php 
    }
endif;
add_action( 'legalblow_action_footer', 'legalblow_footer_copyrights' );


/**
 * Custom excerpt length.
 */
if ( ! function_exists( 'legalblow_excerpt_length' ) ) :
function legalblow_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    return absint(get_theme_mod('legalblow_posts_excerpt_length',20));
}
endif;

add_filter('excerpt_length', 'legalblow_excerpt_length');



/**
 * Category list
 */

 if( !function_exists( 'legalblow_category_list' ) ):
    function legalblow_category_list() {
        $pm_args = array(
            'type'      => 'post',
            'taxonomy'  => 'category',
        );
        $pm_cat_lists = get_categories( $pm_args );
        $pm_cat_list = array('' => esc_html__('--Select--','legalblow'));
        foreach( $pm_cat_lists as $category ) {
            $pm_cat_lists[esc_html( $category->slug )] = esc_html( $category->name );
        }
        return  $pm_cat_list;
    }
endif;


/**
 * Get Page Title
 */

 if( !function_exists( 'legalblow_get_title' ) ):
    function legalblow_get_title() {
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
 * Adding single sidebar classes to body
 */
if ( ! function_exists( 'legalblow_add_blog_single_sidebar_classes_to_body' ) )  :
function legalblow_add_blog_single_sidebar_classes_to_body($classes = '') {
    if('right'===esc_html(get_theme_mod('legalblow_blog_single_sidebar_layout','no'))) {
        $classes[] = 'single-right-sidebar';
    }
    else if('left'===esc_html(get_theme_mod('legalblow_blog_single_sidebar_layout','no'))){
        $classes[] = 'single-left-sidebar';
    }
    else{
        $classes[] = 'single-no-sidebar';
    }
    return $classes;
}
endif;
add_filter('body_class', 'legalblow_add_blog_single_sidebar_classes_to_body');


/**
 * Adding blog sidebar classes to body
 */
if ( ! function_exists( 'legalblow_add_blog_sidebar_classes_to_body' ) )  :
function legalblow_add_blog_sidebar_classes_to_body($classes = '') {
    if('right'===esc_html(get_theme_mod('legalblow_blog_sidebar_layout','right'))) {
        $classes[] = 'blog-right-sidebar';
    }
    else if('left'===esc_html(get_theme_mod('legalblow_blog_sidebar_layout','right'))){
        $classes[] = 'blog-left-sidebar';
    }
    else{
        $classes[] = 'blog-no-sidebar';
    }
    return $classes;
}
endif;
add_filter('body_class', 'legalblow_add_blog_sidebar_classes_to_body');




/**
 * Preconnect Fonts
 */
function legalblow_preconnect_fonts() {
    ?>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <?php
}
add_action( 'wp_head', 'legalblow_preconnect_fonts' );


/**
 * Search Form
 */
if ( ! function_exists( 'legalblow_search_content' ) ) :
function legalblow_search_content() {
    ?>
        <div class="search-form-wrapper">
            <form method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="form-group-search">
                    <label class="screen-reader-text" for="searchsubmit"><?php esc_html_e('Search for:', 'legalblow'); ?></label>
                    <input type="search" id="pm-search-field" class="search-field" placeholder="<?php esc_attr_e('Search here','legalblow') ?>" value="<?php echo get_search_query(); ?>" name="s"/>
                    <button type="submit" value=""><?php esc_html_e('Search','legalblow') ?></button>
                </div>
            </form>
        </div>
    <?php 
}
endif;
add_action('legalblow_action_search_content', 'legalblow_search_content');


/**
 * Left Modal
 */
if ( ! function_exists( 'legalblow_left_modal_content' ) ) :
function legalblow_left_modal_content() {
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
add_action('legalblow_action_left_modal_content', 'legalblow_left_modal_content');


/**
 * Function for storing activation time
 */
function legalblow_activation_time() {
    if ( false === get_option( 'legalblow_activation_time' ) ) {
        add_option( 'legalblow_activation_time', strtotime('now') );
    }
}
add_action( 'after_switch_theme', 'legalblow_activation_time');
add_action('after_setup_theme', 'legalblow_activation_time');


/**
 * Function for Minimizing dynamic CSS
 */
function legalblow_minimize_css($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}


/**
 * Adding class to body
 */
if ( ! function_exists( 'legalblow_add_classes_to_body' ) ) :
function legalblow_add_classes_to_body($classes = '') {
    $classes[] = 'theme-legalblow';
    return $classes;
}
endif;
add_filter('body_class', 'legalblow_add_classes_to_body');


/**
 * Function for changing category archive title
 */
function legalblow_get_archive_title($title) {
    if ( is_category() ) {
        $title_text = esc_html(get_theme_mod( 'legalblow_cat_archive_title_text', esc_html__('Category:','legalblow'))). " ";
        $title = single_cat_title($title_text);
    }
    return $title;
}
if(true===get_theme_mod( 'legalblow_enable_cat_archive_settings',false)) :
    add_filter( 'get_the_archive_title', 'legalblow_get_archive_title');
endif;


/**
 * Disable Plugin Redirect
 */
function legalblow_prevent_plugins_redirect() {
    delete_transient( 'elementor_activation_redirect');
}
add_action('admin_init', 'legalblow_prevent_plugins_redirect');