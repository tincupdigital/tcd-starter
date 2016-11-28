<?php
/**
 * Template part for the mobile navigation area
 *
 * @package _s
 */
?>

<div class="mobile-nav-area visible-sm">
  <nav id="mobile-nav" class="main-navigation main-nav main-nav__mobile" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_class' => 'mobile-nav__menu' ) ); ?>
  </nav><!-- .mobile-nav-area -->
</div>
