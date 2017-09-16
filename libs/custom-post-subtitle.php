<?php

function pitheme_settings_init() {

   register_setting( 'pitheme', 'pitheme_options' );

   add_settings_section(
     'pitheme_section_developers',
     __( 'Subtitle for Service section', 'pitheme' ),
     'pitheme_section_developers_cb',
     'pitheme'
   );
   add_settings_field(
     'pitheme_field_service_title',
     __( 'Title:', 'pitheme' ),
     'pitheme_field_service_title_cb',
     'pitheme',
     'pitheme_section_developers'
   );
   add_settings_field(
     'pitheme_field_service_subtitle',
     __( 'Subtitle:', 'pitheme' ),
     'pitheme_field_service_subtitle_cb',
     'pitheme',
     'pitheme_section_developers'
   );

}
add_action( 'admin_init', 'pitheme_settings_init' );

function pitheme_section_developers_cb( $args ) {
  return;
}

function pitheme_field_service_title_cb( $args ) {

   $options = get_option( 'pitheme_options' );
   if (isset($options['pitheme_field_service_title'])) {
     $title = sanitize_text_field($options['pitheme_field_service_title']);
   }else{
     $title = "Our Srevices";
   }
   ?>
   <input type="text" name="pitheme_options[pitheme_field_service_title]" value="<?php echo $title; ?>" class="regular-text">
 <?php
}

function pitheme_field_service_subtitle_cb( $args ) {

   $options = get_option( 'pitheme_options' );
   if (isset($options['pitheme_field_service_subtitle'])) {
     $subtitle = sanitize_text_field($options['pitheme_field_service_subtitle']);
   }else{
     $subtitle = "";
   }
   ?>
   <textarea name="pitheme_options[pitheme_field_service_subtitle]" class="regular-text" rows="5"><?php echo $subtitle; ?></textarea>
   <p class="description">
     <?php esc_html_e( 'Subtitle for Service section which will display on below section Heading.', 'pitheme' ); ?>
   </p>
 <?php
}

function pitheme_options_page() {

  add_submenu_page(
   'edit.php?post_type=service_items',
   'Service subtitle',
   'Subtitle',
   'manage_options',
   'pitheme',
   'pitheme_options_page_html'
  );

}
add_action( 'admin_menu', 'pitheme_options_page' );

function pitheme_options_page_html() {

   if ( ! current_user_can( 'manage_options' ) ) {
     return;
   }
   if ( isset( $_GET['settings-updated'] ) ) {
     add_settings_error( 'pitheme_messages', 'pitheme_message', __( 'Settings Saved', 'pitheme' ), 'updated' );
   }
   settings_errors( 'pitheme_messages' );
   ?>

   <div class="wrap">
     <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
     <form action="options.php" method="post">
     <?php
       settings_fields( 'pitheme' );
       do_settings_sections( 'pitheme' );
       submit_button( 'Save Settings' );
     ?>
     </form>
   </div>
 <?php
}


// *****************************************************************************
// PRICING SUTITLE SECTION
// *****************************************************************************

function pitheme_settings_pricing_init() {

   register_setting( 'pitheme_pricing', 'pitheme_options_pricing' );

   add_settings_section(
     'pitheme_pricing_section_developers',
     __( 'Subtitle for Pricing section', 'pitheme' ),
     'pitheme_pricing_section_developers_cb',
     'pitheme_pricing'
   );
   add_settings_field(
     'pitheme_field_pricing_title',
     __( 'Title:', 'pitheme' ),
     'pitheme_field_pricing_title_cb',
     'pitheme_pricing',
     'pitheme_pricing_section_developers'
   );
   add_settings_field(
     'pitheme_field_pricing_subtitle',
     __( 'Subtitle:', 'pitheme' ),
     'pitheme_field_pricing_subtitle_cb',
     'pitheme_pricing',
     'pitheme_pricing_section_developers'
   );

}
add_action( 'admin_init', 'pitheme_settings_pricing_init' );

function pitheme_pricing_section_developers_cb( $args ) {
  return;
}

function pitheme_field_pricing_title_cb( $args ) {

   $options = get_option( 'pitheme_options_pricing' );
   if (isset($options['pitheme_field_pricing_title'])) {
     $title = sanitize_text_field($options['pitheme_field_pricing_title']);
   }else{
     $title = "Our Plans";
   }
   ?>
   <input type="text" name="pitheme_options_pricing[pitheme_field_pricing_title]" value="<?php echo $title; ?>" class="large-text">
   <p class="description">
     <?php esc_html_e( 'Subtitle for pricing section which will display on below section Heading.', 'pitheme' ); ?>
   </p>
 <?php
}

function pitheme_field_pricing_subtitle_cb( $args ) {

   $options = get_option( 'pitheme_options_pricing' );
   if (isset($options['pitheme_field_pricing_subtitle'])) {
     $subtitle = sanitize_text_field($options['pitheme_field_pricing_subtitle']);
   }else{
     $subtitle = "";
   }
   ?>
   <textarea name="pitheme_options_pricing[pitheme_field_pricing_subtitle]" class="large-text"><?php echo $subtitle; ?></textarea>
   <p class="description">
     <?php esc_html_e( 'Subtitle for pricing section which will display on below section Heading.', 'pitheme' ); ?>
   </p>
 <?php
}

function pitheme_pricing_options_page() {

  add_submenu_page(
   'edit.php?post_type=pi_theme_pricing',
   'Pricing subtitle',
   'Subtitle',
   'manage_options',
   'pitheme_pricing',
   'pitheme_pricing_options_page_html'
  );

}
add_action( 'admin_menu', 'pitheme_pricing_options_page' );

function pitheme_pricing_options_page_html() {

   if ( ! current_user_can( 'manage_options' ) ) {
     return;
   }
   if ( isset( $_GET['settings-updated'] ) ) {
     add_settings_error( 'pitheme_messages', 'pitheme_message', __( 'Settings Saved', 'pitheme' ), 'updated' );
   }
   settings_errors( 'pitheme_messages' );
   ?>

   <div class="wrap">
     <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
     <form action="options.php" method="post">
     <?php
       settings_fields( 'pitheme_pricing' );
       do_settings_sections( 'pitheme_pricing' );
       submit_button( 'Save Settings' );
     ?>
     </form>
   </div>
 <?php
}
