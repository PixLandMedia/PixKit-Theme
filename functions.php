<?php
/**
 * PixKit functions and definitions
 *
 * @package PixKit
 * @since PixKit 0.1.0
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since PixKit 0.1.0
 */
if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */


if ( ! function_exists( 'pixkit_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since PixKit 0.1.0
 */
function pixkit_setup() {
 

    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );

    /**
     * Template filters
     */
    require( get_template_directory() . '/inc/filters.php' );
 
    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );
 

    /**
     * Theme settings
     */
    if(is_admin()){ 
        require_once(get_template_directory() .'/lib/theme-settings-basic.php');
    }




    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on pixkit, use a find and replace
     * to change 'pixkit' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'pixkit', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'aside' ) );
 
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'pixkit' ),
    ) );
}
endif; // pixkit_setup
add_action( 'after_setup_theme', 'pixkit_setup' );





/**
 * Enqueue scripts and styles
 * @since PixKit 0.1.0
 */
function pixkit_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    wp_enqueue_script( 'main-app', get_template_directory_uri() . '/js/app.min.js', array('jquery'), '20150125', true );

    /*
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20150124', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( ), '20150124' ); // 'jquery'
    }
    */
}
add_action( 'wp_enqueue_scripts', 'pixkit_scripts' );




/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since PixKit 0.1.0
 */
function pixkit_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'pixkit' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'pixkit' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Widget Area Left', 'pixkit' ),
        'id' => 'footer-left',
        'before_widget' => '<aside id="%1$s" class="widget widget-inverse %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Widget Area Center', 'pixkit' ),
        'id' => 'footer-center',
        'before_widget' => '<aside id="%1$s" class="widget widget-inverse %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Widget Area Right', 'pixkit' ),
        'id' => 'footer-right',
        'before_widget' => '<aside id="%1$s" class="widget widget-inverse %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

}
add_action( 'widgets_init', 'pixkit_widgets_init' );





/**
 * Collects our theme options
 *
 * @since PixKit 0.1.0
 *
 * @return array
 */
function pixkit_get_global_options(){
     
    $pixkit_option = array();
 
    $pixkit_option  = get_option('pixkit_options');
     
return $pixkit_option;
}
 
 /**
 * Call the function and collect in variable
 *
 * Should be used in template files like this:
 * <?php echo $pixkit_option['pixkit_txt_input']; ?>
 *
 * Note: Should you notice that the variable ($pixkit_option) is empty when used in certain templates such as header.php, sidebar.php and footer.php
 * you will need to call the function (copy the line below and paste it) at the top of those documents (within php tags)!
 */
$pixkit_option = pixkit_get_global_options();
