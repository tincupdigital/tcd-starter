<?php
/**
 * Template Name: Full-Width Page
 *
 * @package _s
 */

get_header(); ?>

  <div id="content" class="site-content">

    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">

        <?php
        while ( have_posts() ) : the_post();

          get_template_part( 'templates/content', 'page' );

        endwhile; // End of the loop.
        ?>

      </main><!-- #main -->
    </div><!-- #primary -->

  </div><!-- #content -->

<?php
get_footer();
