<?php
/**
 * Get the bootstrap!
 *--------------------------------------------------------
 */
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}


///////////////////// SERVICE ITEMS METABOX //////////////////////////////

function pi_theme_service_metabox(){
	$pitheme_service = new_cmb2_box(array(
		'title' 		    => 'Service Icon',
		'id' 			      => 'service_icon',
		'object_types' 	=> array('service_items'),
	));

	$pitheme_service->add_field(array(
		'name'    => 'Service Icon',
		'desc'    => 'Type only FontAwesome icon name i.e. facebook (avoid "fa fa-" prefix part) ',
		'id'      => '_pitheme_service_icon',
		'type'    => 'text'
	));

}
add_action( 'cmb2_admin_init', 'pi_theme_service_metabox' );



///////////////////// PROTFOLIO ITEMS METABOX //////////////////////////////

function pi_theme_portfolio_metabox(){
	$pitheme_portfolio = new_cmb2_box(array(
		'title' 		    => 'Portfolio URL',
		'id' 			      => 'Portfolio_URL',
		'object_types' 	=> array('portfolio-items'),
	));

	$pitheme_portfolio->add_field(array(
		'name'    => 'Website URL',
		'desc'    => 'Portfolio Live site URL',
		'id'      => '_pitheme_portfolio_url',
		'type'    => 'text_url'
	));
  $pitheme_portfolio->add_field( array(
		'name'         => __( 'Portfolio Gallery Image', 'pitheme' ),
		'desc'         => __( 'Upload or add multiple images/attachments.', 'pitheme' ),
		'id'           => '_pitheme_portfolio_file_list',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 )
	) );

}
add_action( 'cmb2_admin_init', 'pi_theme_portfolio_metabox' );




///////////////////// PRICING TABLE METABOX //////////////////////////////

function pitheme_pricing_table_metabox(){

	$pitheme = new_cmb2_box(array(
		'id'            => 'pricing_table',
		'title'         => 'Pricing Table',
		'object_types'  => array('pi_theme_pricing'),

	));

	$pitheme->add_field(array(
		'name'  => 'Price',
		'desc'  => 'Put the price for the package',
		'id'    => '_pitheme_price',
		'type'  => 'text',
	));
	$pitheme->add_field(array(
		'name'  => 'Free Trial',
		'desc'  => 'free Trial days for the plan',
		'id'    => '_pitheme_trial',
		'type'  => 'text',
	));
	$pitheme->add_field(array(
		'name'  => 'Hosting Amount',
		'desc'  => 'Hosting Amount for the plan',
		'id'    => '_pitheme_hosting',
		'type'  => 'text',
	));
	$pitheme->add_field(array(
		'name'  => 'Quality',
		'desc'  => 'Basic quality for the plan',
		'id'    => '_pitheme_quality',
		'type'  => 'text',
	));
	$pitheme->add_field(array(
		'name'  => 'Update Fee',
		'desc'  => 'Update Fee for the plan',
		'id'    => '_pitheme_update',
		'type'  => 'text',
	));
	$pitheme->add_field(array(
		'name'  => 'Support',
		'desc'  => 'Support hour for the plan',
		'id'    => '_pitheme_supports',
		'type'  => 'text',
	));

}
add_action('cmb2_admin_init', 'pitheme_pricing_table_metabox');




///////////////////// Page subtitle //////////////////////////////

function pitheme_page_subtitle_metabox(){

  $pitheme_page = new_cmb2_box( array(
    'id'            => 'pitheme_page_subtitle_metabox',
    'title'         => __( 'SUBTITLE', 'cmb2' ),
    'object_types'  => array( 'page', ),
  ) );

  $pitheme_page->add_field( array(
    'name' => __( 'Page Subtitle', 'cmb2' ),
    'id'   => '_pitheme_page_subtitle',
    'type' => 'textarea_small',
  ) );

}
add_action('cmb2_admin_init', 'pitheme_page_subtitle_metabox');
