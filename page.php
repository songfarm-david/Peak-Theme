<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Peak_Theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                        comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

            <!-- If Web Development & Design -->
            <?php if( is_page( '1741' ) ) :

                // include portfolio grid
                include( get_template_directory() . '/inc/custom/portfolio-grid.php' );

            endif; ?>

            <!--If Website Maintenance Page-->
            <?php if( is_page( '2410' ) || is_page( '2541' ) ) :

                include( get_template_directory() . '/inc/custom/website-maintenance-panel.php' );

            endif; ?>

            <!-- If Content Creation Service page => Include Features section -->
            <?php if( is_page( '2314' ) || is_page( '2376' ) ) :

                // include content creation features
                include( get_template_directory() . '/inc/custom/features-content-creation.php' );

            endif; ?>

            <!--If SEO Services page => Include Features section -->
            <?php if( is_page( '1743' ) ) :

                // include content creation features
                include( get_template_directory() . '/inc/custom/features-SEO.php' );

            endif; ?>

            <!-- Page Banner - Show this on all pages EXCEPT Contact Page -->
            <?php if ( !is_page( '1722' ) ) :

                // include final call-to-actions
                include( get_template_directory() . '/inc/custom/page-banner.php' );

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
