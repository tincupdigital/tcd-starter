<?php
/**
 * theme-functions.php
 *
 * @package _s
 */

/**
 * Flush rewrite rules on theme activation
 */
function _s_flush_rewrite_rules() {
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', '_s_flush_rewrite_rules' );

/**
 * Yoast SEO meta box priority
 */
function _s_move_yoast_seo_meta() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', '_s_move_yoast_seo_meta' );

/**
 * Add and update image sizes
 */
function _s_custom_image_sizes() {
  update_option( 'large_size_w', 800 );
  update_option( 'large_size_h', 600 );
  update_option( 'large_crop', 1 );

  update_option( 'medium_size_w', 600 );
  update_option( 'medium_size_h', 475 );
  update_option( 'medium_crop', 1 );

  update_option( 'thumbnail_size_w', 200 );
  update_option( 'thumbnail_size_h', 200 );
  update_option( 'thumbnail_crop', 1 );

  // hero size
  add_image_size( 'hero', 1600, 640, true );
}
add_action( 'init', '_s_custom_image_sizes' );

/**
 * Remove dashboard widgets
 */
function _s_remove_dash_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
}
add_action( 'wp_dashboard_setup', '_s_remove_dash_widgets' );

/**
 * Custom welcome panel
 */
function _s_custom_welcome_panel() {
  $html =  '<div class="welcome-panel-content" style="padding-bottom: 23px;">';
  $html .= '<h2 style="margin-bottom: 5px;">Welcome to your site!</h2>';
  $html .= '<p style="font-size: 16px; margin: 0;">Click anywhere on the left-hand side to get started. Just for reference, your IP address is <code>' . $_SERVER['SERVER_ADDR'] . '</code>. Good luck!</p>';
  $html .= '</div>';
  echo $html;
}
remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_action( 'welcome_panel', '_s_custom_welcome_panel' );

/**
 * Featured image column for posts
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_posts_columns
 */
function _s_add_feat_img_column( $columns ) {
  return array_merge( $columns,
    array( 'feat_img' => __( 'Featured Image' ) )
  );
}
add_filter( 'manage_posts_columns', '_s_add_feat_img_column' );

function _s_feat_img_column( $column, $post_id ) {
  if ( ( $column === 'feat_img' ) && has_post_thumbnail( $post_id ) ) {
    the_post_thumbnail( array( 64, 64 ) );
  }
}
add_action( 'manage_posts_custom_column', '_s_feat_img_column', 10, 2 );

/**
 * Strip &nbsp; from end of posts
 */
function _s_trim_trailing_whitespace( $content ) {
  $content = preg_replace( "/&nbsp;/", "☺", $content );
  $content = rtrim( $content, "☺" . " \t\n\r\0\x0B" );
  $content = preg_replace( "/☺/", "&nbsp;", $content );
  return $content;
}
add_filter( 'the_content', '_s_trim_trailing_whitespace', 0 );

/**
 * Allow SVG upload through media library
 */
function _s_allow_svg_upload( $mimes = array() ) {
  $mimes['svg'] = 'mime/type';
  return $mimes;
}
add_filter( 'upload_mimes', '_s_allow_svg_upload' );

/**
 * Get featured image URL
 */
function _s_get_feat_img_url( $size ) {
  // hat tip: http://goo.gl/fzHOaB
  $img_id = get_post_thumbnail_id();
  $img_array = wp_get_attachment_image_src( $img_id, $size );
  $img_url = $img_array[0];
  return $img_url;
}
