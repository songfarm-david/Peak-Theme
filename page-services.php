<?php
/**
 * @package Peak_Theme
 * 
 * This custom page is for the 'Services Home' a.k.a the Services Landing Page
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'services' );

                // If comments are open or we have at least one comment, load up the comment template.
//                if ( comments_open() || get_comments_number() ) :
//                        comments_template();
//                endif;

            endwhile; // End of the loop.
            ?>

            <?php 
                /**
                 * Call Services sections
                 */
                $recent = new WP_Query( "page_id=2349" );
                //$recent = new WP_Query( "page_id=2520" );
                
                while( $recent->have_posts() ) : $recent->the_post(); ?>
                
                <article id="content-section" class="panel-container">
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
                
                $recent = new WP_Query( "page_id=2351" );
                //$recent = new WP_Query( "page_id=2527" );

                while( $recent->have_posts() ) : $recent->the_post(); ?>
                
                <article class="panel-container orange">
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
                
                $recent = new WP_Query( "page_id=2353" );
                //$recent = new WP_Query( "page_id=2529" );

                while( $recent->have_posts() ) : $recent->the_post(); ?>
                
                <article class="panel-container purple">
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
                        
                <?php endwhile; ?>
                        
            <!-- Call-to-Action Banner - Show this on all pages EXCEPT Contact Page -->
            <?php 
            /**
             * Include Call-to-Action banner
             */
            
            /** if NOT Contact Page */
            if ( !is_page( '1722' ) ) : 
                
                include( get_template_directory() . '/inc/custom/service-call-to-actions.php' );
            
            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
