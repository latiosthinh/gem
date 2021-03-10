<?php
/**
 * novus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package novus
 */

if ( ! defined( 'NOVUS_VERSION' ) ) {
	define( 'NOVUS_VERSION', '1.0.0' );
	define( 'NOVUS_IMG', get_template_directory_uri() . '/images' );
	define( 'NOVUS_JS', get_template_directory_uri() . '/js' );
}

if ( ! function_exists( 'novus_setup' ) ) :
	function novus_setup() {
		load_theme_textdomain( 'novus', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( 
			[
				'menu-1' => esc_html__( 'Primary', 'novus' ),
				'menu-2' => esc_html__( 'Footer', 'novus' )
			]
		);
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'novus_custom_background_args',
				[
					'default-color' => 'ffffff',
					'default-image' => '',
				]
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			[
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			]
		);

		add_image_size( 'thumb-700', 1000, 1000, true );
	}
endif;
add_action( 'after_setup_theme', 'novus_setup' );

function novus_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'novus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'novus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Footer Left', 'novus' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'novus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		],
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Footer Right', 'novus' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'novus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		],
	);
}
add_action( 'widgets_init', 'novus_widgets_init' );

function novus_scripts() {
	wp_enqueue_style( 'novus-style', get_stylesheet_uri(), [], NOVUS_VERSION );

	wp_enqueue_script( 'splide', NOVUS_JS . '/splide.min.js', [], NOVUS_VERSION, true );
	wp_enqueue_script( 'novus-script', NOVUS_JS . '/script.js', [], NOVUS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'novus_scripts' );

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function novus_cc_mime_types( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter('upload_mimes', 'novus_cc_mime_types');

function dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$scripts->registered['jquery']->deps = array_diff(
			$scripts->registered['jquery']->deps,
			[ 'jquery-migrate' ]
		);
	}
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );

add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );
function change_default_jquery() {
	if ( is_home() || is_front_page() ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' );
		wp_dequeue_script( 'jquery');
		wp_deregister_script( 'jquery');
	}
}

add_action( 'pre_get_posts', 'gem_post_type_archive' );
function gem_post_type_archive( $query ) {

	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( is_tax( 'event-category', 'news' ) ) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if ( $paged > 1 ) {
			$query->set( 'posts_per_page', 9 );
		} else {
			$query->set( 'posts_per_page', 7 );
		}
	}

	if ( is_post_type_archive( 'event' ) ) {
		// if ( $_GET[ 'order_by' ] === 'name' ) {
		// 	$query->set( 'orderby', 'post_title' );
		// }

		// if ( $_GET[ 'order_by' ] === 'date' ) {
		// 	$query->set( 'orderby', 'date' );
		// }

		$query->set( 'posts_per_page', 6 );
		$query->set( 'offset', 1 );
	}

	if ( get_queried_object()->name === 'case-study' ) {
		$query->set( 'posts_per_page', 6 );
	}

	if ( is_post_type_archive( 'post' ) ) {
		$query->set( 'posts_per_page', 6 );
	}
}

function __language_attributes($lang){
	$langs = array( 'en-US', 'JA' );
	$my_language = $langs[ 0 ];
	return 'lang="'.$my_language.'"';
}
add_filter('language_attributes', '__language_attributes');