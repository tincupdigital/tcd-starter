<?php
/**
 * _s Theme Customizer.
 *
 * @package _s
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _s_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', '_s_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _s_customize_preview_js() {
	wp_enqueue_script( '_s_customizer', get_template_directory_uri() . '/assets/js/vendor/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', '_s_customize_preview_js' );

/**
 * Register Customizer panels
 */
function _s_customizer_add_panels( $wp_customize ) {
  /* Client Setup */
  $wp_customize->add_panel( 'client_setup', array(
    'capability' => 'edit_theme_options',
    'title' => __( 'Client Setup', '_s' ),
  ) );
}
add_action( 'customize_register', '_s_customizer_add_panels' );

/**
 * Register Customizer sections
 */
function _s_customizer_add_sections( $wp_customize ) {
  /* Appearance */
  $wp_customize->add_section( 'appearance', array(
    'title' => __( 'Appearance', '_s' ),
    'description' => __( 'Customize the appearance of the site here.', '_s' ),
    'panel' => 'client_setup',
    'priority' => 1
  ) );

  /* Contact Info */
  $wp_customize->add_section( 'contact_info', array(
    'title' => __( 'Contact Info', '_s' ),
    'description' => __( 'Contact information can be added here.', '_s' ),
    'panel' => 'client_setup',
    'priority' => 2
  ) );

  /* Social Media */
  $wp_customize->add_section( 'social_media', array(
    'title' => __( 'Social Media', '_s' ),
    'description' => __( 'Social media links can be added here.', '_s' ),
    'panel' => 'client_setup',
    'priority' => 3
  ) );
}
add_action( 'customize_register', '_s_customizer_add_sections' );

/**
 * Register Customizer fields
 */
function _s_customizer_add_fields( $wp_customize ) {
  /* Appearance */
  $wp_customize->add_setting( 'brand_logo' );
  $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize, 'brand_logo', array(
      'label' => __( 'Brand Logo', '_s' ),
      'description' => __( 'Upload your brand\'s logo here.', '_s' ),
      'section' => 'appearance',
      'settings' => 'brand_logo'
    ) )
  );

  /* Contact Info */
  $wp_customize->add_setting( 'email_address' );
  $wp_customize->add_control( 'email_address', array(
    'label' => __( 'Email Address', '_s' ),
    'description' => __( 'Add the email address of the business.', '_s' ),
    'section' => 'contact_info',
    'type' => 'text'
  ) );
  $wp_customize->add_setting( 'phone_number' );
  $wp_customize->add_control( 'phone_number', array(
    'label' => __( 'Phone Number', '_s' ),
    'description' => __( 'Add the phone number of the business.', '_s' ),
    'section' => 'contact_info',
    'type' => 'text'
  ) );

  /* Social Media */
  $wp_customize->add_setting( 'facebook_url' );
  $wp_customize->add_control( 'facebook_url', array(
    'label' => __( 'Facebook URL', '_s' ),
    'description' => __( 'Add a link to your Facebook page.', '_s' ),
    'section' => 'social_media',
    'type' => 'url'
  ) );
  $wp_customize->add_setting( 'twitter_url' );
  $wp_customize->add_control( 'twitter_url', array(
    'label' => __( 'Twitter URL', '_s' ),
    'description' => __( 'Add a link to your Twitter page.', '_s' ),
    'section' => 'social_media',
    'type' => 'url'
  ) );
}
add_action( 'customize_register', '_s_customizer_add_fields' );