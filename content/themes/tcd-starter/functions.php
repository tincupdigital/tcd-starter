<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

/**
 * Core setup
 */
require get_template_directory() . '/inc/core-setup.php';

/**
 * Core functions
 */
require get_template_directory() . '/inc/core-functions.php';

/**
 * Custom template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extra functions
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions and fields
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Soil setup
 */
require get_template_directory() . '/inc/plugins/soil-setup.php';

/**
 * TGM setup
 */
require get_template_directory() . '/inc/plugins/tgm-setup.php';

/**
 * Advanced Custom Fields
 */
require get_template_directory() . '/inc/plugins/acf-setup.php';

/**
 * WP CPT setup
 */
// require get_template_directory() . '/inc/plugins/cpt-setup.php';

/*
Custom Widgets
 */
// require get_template_directory() . '/inc/widgets/custom-widget.php';
