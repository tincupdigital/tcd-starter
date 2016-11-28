<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-footer__main center">
      <span>&copy; <?php echo date( 'Y' ); ?>, <?php bloginfo( 'name' ); ?></span>
    </div>
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
