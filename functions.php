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
		'primary'	=> esc_html__('Primary', 'legalpress'),
		'footer'	=> esc_html__('Footer', 'legalpress'),
		'social'	=> esc_html__('Sidebar Social', 'legalpress'),
		'footer-social'	=> esc_html__('Footer Social', 'legalpress'),
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
	 * LegalPress theme info
	 */
	require get_template_directory() . '/inc/theme-info.php';

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
	// if(is_admin()) {
	// 	require get_template_directory() . '/inc/theme-info.php';
	// 	$config = array();
	// 	LegalPress_About_Page::legalpress_init( $config );
	// }

}
endif;
add_action( 'after_setup_theme', 'legalpress_setup' );


/**
* Custom Logo 
*
*/
function legalpress_logo_setup() {
    add_theme_support( 'custom-logo', array(
	   'height'      => 65,
	   'width'       => 350,
	   'flex-height' => true,
	   'flex-width' => true,	   
	) );
}
add_action( 'after_setup_theme', 'legalpress_logo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function legalpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'legalpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'legalpress_content_width', 0 );

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
 * Enqueue Styles and Scripts
 */
function legalpress_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.7');
	wp_enqueue_style( 'legalpress-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

	
	wp_enqueue_style( 'legalpress-blocks-frontend', get_template_directory_uri() . '/css/blocks-frontend.css', array(), wp_get_theme()->get('Version'));

	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.css', array(), '5.10.1');
	wp_enqueue_style( 'm-customscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), '3.1.5');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '3.7.2');
	wp_enqueue_style( 'poppins-google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap', array(), '1.0');   
	wp_enqueue_style( 'spectral-google-font', 'https://fonts.googleapis.com/css?family=Spectral:400,700&display=swap', array(), '1.0');   

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.7', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', true );
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.js',array(),'1.0.0', true );	
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js',array(),'1.7.0', true );
	wp_enqueue_script( 'm-customscrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.js',array(),'3.1.5', true );
	wp_enqueue_script( 'legalpress-script', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->get('Version'), true );		
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'legalpress_scripts' );

/**
* Admin Scripts
*/
if ( ! function_exists( 'legalpress_admin_scripts' ) ) :
	function legalpress_admin_scripts($hook) {
		  wp_enqueue_style( 'legalpress-info-css', get_template_directory_uri() . '/css/legalpress-theme-info.css', false ); 
	}
	endif;
	add_action( 'admin_enqueue_scripts', 'legalpress_admin_scripts' );


/**
 * Display Dynamic CSS.
 */
function legalpress_dynamic_css_wrap() {
	require_once( get_parent_theme_file_path( '/css/dynamic.css.php' ) );  
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

// include template-functions.php
require_once(get_template_directory().'/inc/template-functions.php');

// include template-tags.php
require_once(get_template_directory().'/inc/template-tags.php');