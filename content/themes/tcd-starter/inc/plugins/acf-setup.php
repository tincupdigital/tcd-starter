<?php
/**
 * acf-setup.php
 *
 * @package _s
 */

if ( WP_LOCAL_DEV ) {
  return;
}

// hide field group menu from users
if ( wp_get_current_user()->user_login !== 'sean' ) {
  define( 'ACF_LITE' , true );
}

/*
ACF field groups
 */
// export field export code here:
