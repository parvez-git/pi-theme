<?php

/* ------------------------------------------------------------------------
** | Register Service custom post
** ----------------------------------------------------------------------*/

function pitheme_register_services() {

	$labels = array(
		'name'                => __( 'Service Items', 'text-domain' ),
		'singular_name'       => __( 'Service Item', 'text-domain' ),
		'add_new'             => _x( 'Add New Service', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Service Item', 'text-domain' ),
		'edit_item'           => __( 'Edit Singular Name', 'text-domain' ),
		'new_item'            => __( 'New Service Item', 'text-domain' ),
		'view_item'           => __( 'View Service Item', 'text-domain' ),
		'search_items'        => __( 'Search Service Item', 'text-domain' ),
		'not_found'           => __( 'No Service Items found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Service Items found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Service Item:', 'text-domain' ),
		'menu_name'           => __( 'Service Items', 'text-domain' ),
	);

	$args = array(
		'labels'      		=> $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-admin-generic',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'custom-fields'
			)
	);

	register_post_type( 'service_items', $args );
}

add_action( 'init', 'pitheme_register_services' );


/* ------------------------------------------------------------------------
** | Register Portfolio custom post
** ----------------------------------------------------------------------*/

function pitheme_register_works() {

	register_post_type('portfolio-items',array(
		'labels' 		=> array(
			'name' 					=> _x('Latest Works', 'textdomain'),
			'singular_name' => _x('Latest Work', 'textdomain')
		),
		'public' 		=> true,
		'menu_icon' => 'dashicons-images-alt',
		'supports' 	=> array('title', 'editor', 'thumbnail', 'comments'),
	));

	register_taxonomy('category-portfolio', array('portfolio-items'), array(
		'label' 					=> 'Categories',
		'singular_label' 	=> 'Category',
		'hierarchical' 		=> true,
		'rewrite' 				=> true
	));

}
add_action( 'init', 'pitheme_register_works' );


/* ------------------------------------------------------------------------
** | Register Pricing Table custom post
** ----------------------------------------------------------------------*/

function register_pricing_table(){

	register_post_type('pi_theme_pricing', array(
		'labels' 		=> array(
			'name' 					=> 'Pricing Table',
			'singular_name' => 'Pricing'
		),
		'menu_icon' => 'dashicons-editor-justify',
		'supports' 	=> array('title','custom-fields'),
		'public' 		=> true
	));
}
add_action('init','register_pricing_table');
