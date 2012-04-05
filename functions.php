<?php
/**
 * Motil_II functions and definitions
 *
 * @package Motil_II
 * @since Motil_II 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Motil_II 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'Motil_II_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Motil_II 1.0
 */
function Motil_II_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Motil_II, use a find and replace
	 * to change 'Motil_II' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'Motil_II', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'Motil_II' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // Motil_II_setup
add_action( 'after_setup_theme', 'Motil_II_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Motil_II 1.0
 */
function Motil_II_widgets_init() {
	registerMotil_IIidebar( array(
		'name' => __( 'Sidebar', 'Motil_II' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'Motil_II_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function Motil_IIMotil_IIcripts() {
	global $post;

	wp_enqueueMotil_IItyle( 'style', getMotil_IItylesheet_uri() );

	wp_enqueueMotil_IIcript( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( isMotil_IIingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueueMotil_IIcript( 'comment-reply' );
	}

	if ( isMotil_IIingular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueueMotil_IIcript( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueueMotil_IIcripts', 'Motil_IIMotil_IIcripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
