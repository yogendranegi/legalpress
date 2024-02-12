<?php
/**
 * LegalPress functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package legalpress
 */

/**
 *  Defining Constants
 */

// Core Constants
define('LEGALPRESS_REQUIRED_PHP_VERSION', '5.6' );
define('LEGALPRESS_DIR_PATH', get_template_directory());
define('LEGALPRESS_THEME_AUTH','https://www.spiraclethemes.com/');
define('LEGALPRESS_DIR_URI', get_template_directory_uri());
define('LEGALPRESS_MINIFY', get_theme_mod('legalpress_enable_minify_styles_scripts',true));
define('LEGALPRESS_THEME_URL','https://www.spiraclethemes.com/legalpress-free-wordpress-theme/');
define('LEGALPRESS_THEME_PRO_URL','https://www.spiraclethemes.com/legalpress-pro-addons/');
define('LEGALPRESS_THEME_DOC_URL','https://www.spiraclethemes.com/LEGALPRESS-documentation/');
define('LEGALPRESS_THEME_VIDEOS_URL','https://www.spiraclethemes.com/legalpress-video-tutorials/');
define('LEGALPRESS_THEME_SUPPORT_URL','https://wordpress.org/support/theme/legalpress/');
define('LEGALPRESS_THEME_RATINGS_URL','https://wordpress.org/support/theme/legalpress/reviews/');
define('LEGALPRESS_THEME_CHANGELOGS_URL','https://themes.trac.wordpress.org/log/legalpress/');
define('LEGALPRESS_THEME_CONTACT_URL','https://www.spiraclethemes.com/contact/');

//Register Required plugin
require_once(get_template_directory() .'/inc/class-tgm-plugin-activation.php');

/**
* Check for minimum PHP version requirement 
*/
function legalpress_check_theme_setup( $oldtheme_name, $oldtheme ) {
	// Compare versions.
	if ( version_compare(phpversion(), LEGALPRESS_REQUIRED_PHP_VERSION, '<') ) :
	// Theme not activated info message.
	add_action( 'admin_notices', 'legalpress_php_admin_notice' );
	function legalpress_php_admin_notice() {
		?>
			<div class="update-nag">
		  		<?php esc_html_e( 'You need to update your PHP version to a minimum of 5.6 to run LegalPress Theme.', 'legalpress' ); ?> <br />
		  		<?php esc_html_e( 'Actual version is:', 'legalpress' ) ?> <strong><?php echo phpversion(); ?></strong>, <?php esc_html_e( 'required is', 'legalpress' ) ?> <strong><?php echo LEGALPRESS_REQUIRED_PHP_VERSION; ?></strong>
			</div>
		<?php
	}
	// Switch back to previous theme.
	switch_theme( $oldtheme->stylesheet );
		return false;
	endif;
}
add_action( 'after_switch_theme', 'legalpress_check_theme_setup', 10, 2  );


if ( ! function_exists( 'legalpress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function legalpress_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on LegalPress, use a find and replace
	 * to change 'legalpress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'legalpress', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary', 'legalpress' ),
		'footer'	=> esc_html__('Footer', 'legalpress'),
		'social'	=> esc_html__('Sidebar Social'),
		'foote-social'	=> esc_html__('Footer Social', 'legalpress'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(		
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Remove theme support for new widgets block editor
	remove_theme_support( 'widgets-block-editor' );

	if(get_theme_mod( 'legalpress_enable_block_styles',false)) :
		// Load default block styles.
		add_theme_support( 'wp-block-styles' );
	endif;
	
	if(get_theme_mod( 'legalpress_enable_block_wide_alignment',false)) :
		// Support for align full and align wide option.
		add_theme_support( 'align-wide' );
	endif;

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for automatic feed links.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * LegalPress custom posts image size
	 */
	add_image_size( 'legalpress-posts', 765, 500, true );

	/**
	 * LegalPress custom posts thumbs size
	 */
	add_image_size( 'legalpress-posts-thumb', 150, 100, true );

	/*
	* About page instance
	*/
	if(is_admin()) {
		require get_template_directory() . '/inc/theme-info.php';
		$config = array();
		LegalPress_About_Page::legalpress_init( $config );
	}

}
endif;
add_action( 'after_setup_theme', 'legalpress_setup' );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function legalpress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'legalpress' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'legalpress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if(true===get_theme_mod( 'legalpress_enable_menu_left_sidebar',false)) :
        register_sidebar( array(
            'name'          => esc_html__( 'Menu Left Sidebar', 'legalpress' ),
            'id'            => 'menuleftsidebar',
            'description'   => esc_html__( 'Add widgets here.', 'legalpress' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
        ) );
    endif;

	// New footer widget areas
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar( array(
            'name'          => esc_html__( 'Footer ' . $i, 'legalpress' ),
            'id'            => 'footer-' . $i,
            'description'   => esc_html__( 'Add widgets here to display in Footer ' . $i, 'legalpress' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    }
}

add_action( 'widgets_init', 'legalpress_widgets_init' );



/**
 * Display Dynamic CSS.
 */
function legalpress_dynamic_css_wrap() {
	// require_once( get_parent_theme_file_path( '/css/dynamic.css.php' ) );  
	?>
  		<style type="text/css" id="legalpress-dynamic-style">
    		<?php echo legalpress_dynamic_css_stylesheet(); ?>
  		</style>
	<?php 
}
add_action( 'wp_head', 'legalpress_dynamic_css_wrap' );



/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function legalpress_pingback_header() {
	if ( is_singular() && pings_open() ) {
	   printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	 }
}
add_action( 'wp_head', 'legalpress_pingback_header' );

