<?php

function pitheme_setup() {

	load_theme_textdomain( 'pitheme', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'html5' );

	add_theme_support( 'post-thumbnails' );
	add_image_size('portfolio-thumb', 560, 320, array( 'center', 'top' ));

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pitheme' ),
		'social'  => __( 'Social Links Menu', 'pitheme' ),
	) );

}
add_action( 'after_setup_theme', 'pitheme_setup' );


/* ------------------------------------------------------------------------
** | Enqueue Scripts
** ----------------------------------------------------------------------*/

function pitheme_scripts() {
	wp_enqueue_style( 'pitheme-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Roboto:400,400i,500' );
	wp_enqueue_style( 'pitheme-fontawesome-style', get_template_directory_uri().'/css/font-awesome.min.css' );
	wp_enqueue_style( 'pitheme-slick-style', get_template_directory_uri().'/css/slick.css' );
	wp_enqueue_style( 'pitheme-slick-theme-style', get_template_directory_uri().'/css/slick-theme.css' );
	wp_enqueue_style( 'pitheme-bootstrap-style', get_template_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'pitheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pitheme-bootstrap-script', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '3.3.6', true);
	wp_enqueue_script( 'pitheme-mixitup-script', get_template_directory_uri().'/js/jquery.mixitup.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'pitheme-slick-script', get_template_directory_uri().'/js/slick.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'pitheme-script', get_template_directory_uri().'/js/scripts.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'pitheme_scripts' );

function pitheme_shortcodes_mce_css() {
	wp_enqueue_style('symple_shortcodes-tc', get_template_directory_uri().'/css/my-mce-style.css' );
}
add_action( 'admin_enqueue_scripts', 'pitheme_shortcodes_mce_css' );


/* ------------------------------------------------------------------------
** | Register widget area
** ----------------------------------------------------------------------*/

function pitheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pitheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pitheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'pitheme' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'pitheme' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pitheme_widgets_init' );


/* ------------------------------------------------------------------------
** | Include library files
** ----------------------------------------------------------------------*/

require get_template_directory() . '/libs/template-tags.php';
require get_template_directory() . '/libs/custom-post-subtitle.php';
require get_template_directory() . '/libs/pitheme-custom-post.php';
require get_template_directory() . '/libs/pitheme-shortcode.php';
require get_template_directory() . '/libs/pitheme-mce-button.php';


/* ------------------------------------------------------------------------
** | CMB2 and Redux-framework
** ----------------------------------------------------------------------*/

// Including CMB2
require_once('libs/cmb2-functions.php');

// Including Redux Framework
if(!class_exists("ReduxFrameworkPlugin")){
    require_once(get_template_directory()."/libs/redux-framework-master/redux-framework.php");
    require_once(get_template_directory()."/libs/redux-functions.php");
}
