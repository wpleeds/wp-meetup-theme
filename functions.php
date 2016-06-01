<?php
/**
 * wpmeetup-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpmeetup-theme
 */

namespace WPMeetup;

require_once( __DIR__ . '/inc/events/events.php' );
require_once( __DIR__ . '/inc/customizer/customizer.php' );

add_action( 'after_setup_theme',  __NAMESPACE__ . '\\setup' );
add_action( 'after_setup_theme',  __NAMESPACE__ . '\\content_width', 0 );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );
add_action( 'widgets_init',       __NAMESPACE__ . '\\widgets_init' );
add_filter( 'body_class',         __NAMESPACE__ . '\\filter_body_class' );
add_filter( 'script_loader_tag',  __NAMESPACE__ . '\\filter_script_loader_tag', 10, 3 );
add_action( 'admin_menu',         __NAMESPACE__ . '\\modify_admin_menu' );

/**
 * Set up the theme.
 */
function setup() {

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

	/**
	 * Register nav menus.
	 */
	register_nav_menu( 'primary', esc_html__( 'Main menu', 'wpmeetup-theme' ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ]	);

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', [ 'aside', 'image', 'video', 'quote', 'link' ] );

}

/**
 * Enqueue all theme scripts.
 */
function enqueue_scripts() {

	// Currently empty. Not loaded.
	// wp_enqueue_script( 'wpmeetup', get_stylesheet_directory_uri() . '/assets/dist/scripts/theme.js', [ 'jquery' ], '1.0', true );

	wp_enqueue_style( 'wpmeetup', get_stylesheet_directory_uri() . '/assets/dist/styles/theme.css', [], '1.0' );

}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function content_width() {
	$GLOBALS['content_width'] = 640;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widgets_init() {

	require_once( __DIR__ . '/inc/widgets/class-social.php' );

	register_widget( __NAMESPACE__ . '\\Widgets\Social' );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', '_s' ),
		'id'            => 'sidebar-footer',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}

/**
 * Move position of media in admin menu.
 */
function modify_admin_menu() {

	global $menu;

	$position = array_search( 'upload.php', array_column( $menu, 2 ) );
	$key      = array_keys( $menu )[ $position ];

	$menu[24] = $menu[ $key ];
	unset( $menu[ $key ] );

}

/**
 * Make some scripts async.
 */
function filter_script_loader_tag( $tag, $handle, $src ) {

	$async_scripts = [
		'wpmeetup'
	];

	if ( in_array( $handle, $async_scripts, true ) ) {
		return str_replace( ' src', ' async="async" src', $tag );
	}

	return $tag;

}


function filter_body_class( $classes ) {

	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'has-primary-nav';
	}

	return $classes;

}
