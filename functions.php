<?php
/**
 * capstone functions and definitions
 *
 * @package capstone
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'capstone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function capstone_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on capstone, use a find and replace
     * to change 'capstone' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'capstone', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'capstone' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link',
    ) );

    /**
     * Add custom image sizes for the theme.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_image_size
     */
    add_image_size('capstone_work_small', 120, 120, true);
    add_image_size('capstone_work_medium', 240, 240, true);
    add_image_size('capstone_work_large', 400, 400, true);
    add_image_size('capstone_work_xlarge', 520, 520, true);
}
endif; // capstone_setup
add_action( 'after_setup_theme', 'capstone_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function capstone_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'capstone'),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Area 1', 'capstone'),
        'id'            => 'footer-sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Area 2', 'capstone'),
        'id'            => 'footer-sidebar-2',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Area 3', 'capstone'),
        'id'            => 'footer-sidebar-3',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
}
add_action( 'widgets_init', 'capstone_widgets_init' );

/**
 * Return the stylesheet URL for theme's webfonts.
 *
 * @todo Make these controllable in the admin.
 *
 * @return string
 */
function capstone_font_url() {
    return 'http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic|Playfair+Display:700,700italic';
}

/**
 * Enqueue scripts and styles.
 */
function capstone_scripts() {
    /**
     * Remove JetPack stuff.
     */
    wp_deregister_style('grunion.css');
    wp_dequeue_script('devicepx');

    wp_enqueue_style(
        'capstone-webfonts',
        capstone_font_url(),
        array(),
        null
    );

    wp_enqueue_style(
        'capstone-styles',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        null
    );

    wp_enqueue_script(
        'capstone-scripts',
        get_template_directory_uri() . '/assets/js/main.min.js',
        array('jquery'),
        null,
        true
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'capstone_scripts' );

/**
 * Add custom widgets to the theme.
 *
 * @link http://codex.wordpress.org/Widgets_API
 *
 * @return void
 */
function capstone_register_widgets() {
    register_widget('Capstone_Widget_Page_Callout');
    register_widget('Capstone_Widget_Testimonial');
}
add_action('widgets_init', 'capstone_register_widgets');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Add custom navigation menu walker.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Add custom post types with theme.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Custom widgets
 */
require get_template_directory() . '/inc/widget-page-callout.php';
require get_template_directory() . '/inc/widget-testimonial.php';
