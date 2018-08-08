<?php

 /*
  * Template Name: Description Page
  * Template Post Type: post
  *
  * @package Peak_Theme
  */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main description-page">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
if ( is_active_sidebar( 'definition-1' ) ) {
   dynamic_sidebar('definition-1');
}
get_footer();
