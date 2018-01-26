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

            <!--Insert select pages-->
            <?php if( is_front_page() ) :
                
                // id for web-design-panel
                $recent = new WP_Query( "page_id=2222" ); 

                while( $recent->have_posts()) : $recent->the_post(); ?>
                
                <article class="panel-container">
                    <div class="entry-content panel-content">

                    <?php the_content();

                        /* Edit link */
                        if ( get_edit_post_link() ) : ?>
                            <footer class="panel-footer">
                                <?php
                                    edit_post_link(
                                        sprintf(
                                            wp_kses(__( 'Edit <span class="screen-reader-text">%s</span>', 'peak-theme' ),
                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                        get_the_title()
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                    );
                                ?>
                            </footer><!-- .entry-footer -->
                        <?php endif; ?> 

                    </div>
                </article>
                        
                <?php endwhile;
                
                // id for SEO-panel
                $recent = new WP_Query( "page_id=2227" ); 

                while( $recent->have_posts()) : $recent->the_post(); ?>
                
                <article class="panel-container">
                    <div class="entry-content panel-content">

                    <?php the_content();

                        /* Edit link */
                        if ( get_edit_post_link() ) : ?>
                            <footer class="panel-footer">
                                <?php
                                    edit_post_link(
                                        sprintf(
                                            wp_kses(__( 'Edit <span class="screen-reader-text">%s</span>', 'peak-theme' ),
                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                        get_the_title()
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                    );
                                ?>
                            </footer><!-- .entry-footer -->
                        <?php endif; ?> 

                    </div>
                </article>
            
                <?php endwhile;
                
                // Content Creation page
                $recent = new WP_Query( "page_id=2321" ); 

                while( $recent->have_posts()) : $recent->the_post(); ?>
                
                <article class="panel-container">
                    <div class="entry-content panel-content">

                    <?php the_content();

                        /* Edit link */
                        if ( get_edit_post_link() ) : ?>
                            <footer class="panel-footer">
                                <?php
                                    edit_post_link(
                                        sprintf(
                                            wp_kses(__( 'Edit <span class="screen-reader-text">%s</span>', 'peak-theme' ),
                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                        get_the_title()
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                    );
                                ?>
                            </footer><!-- .entry-footer -->
                        <?php endif; ?> 

                    </div>
                </article>
            
                <?php endwhile;

            endif; // if is_front_page()
            ?>
            
            <!-- If Web Development & Design -->
            <?php if( is_page( '1741' ) ) :
                
                // include portfolio grid
                include( get_template_directory() . '/inc/custom/portfolio-grid.php' );
                
            endif; ?>
            
            <!--If Content Creation page-->
            <?php if( is_page( '2314' ) ) :
                
                // include portfolio grid
                include( get_template_directory() . '/inc/custom/features-content-creation.php' );
            
            endif;
            
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
