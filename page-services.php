<?php
/**
 *
 * @package Peak_Theme
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
                //localhost
                // $recent = new WP_Query( "page_id=2349" );
                // $recent = new WP_Query( "page_id=2520" );

                // TODO: Write a way to accept both args
                $recent = ( new WP_Query( "page_id=2349" ) ) ?
                  new WP_Query( "page_id=2349" ) :
                  new WP_Query( "page_id=2520" );

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
                // $recent = new WP_Query( "page_id=2527" );

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
                // $recent = new WP_Query( "page_id=2529" );

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
            if ( !is_page( '1722' ) ) : ?>

                <article id="page-cta">
                    <div>
                        <?php if ( is_page( '1741' ) ) : ?>
                        <h2 class="cta-heading">Ready for a website that works?</h2>
                        <p class="cta-secondary-text">Let's build you a website that works for your business.</p>
                        <?php elseif ( is_page( '1743' ) ) : ?>
                        <h2 class="cta-heading">Ready to put your business on the map?</h2>
                        <p class="cta-secondary-text">Let us help you to get the kinds of search results you're looking for.</p>
                        <?php elseif ( is_page( '2376' ) ) : ?>
                        <h2 class="cta-heading">Ready for targeted traffic to your site?</h2>
                        <p class="cta-secondary-text">Let us help you to generate more of the traffic you actually want.</p>
                        <?php else : ?>
                        <h2 class="cta-heading">Ready to take the high road?</h2>
                        <p class="cta-secondary-text">Let us lead the way towards better website conversion and increased exposure in Search.</p>
                        <?php endif; ?>
                        <a href="<?php echo get_permalink( '1722' ); ?>" class="peak-button peak-btn-highlight">Contact Us</a>
                    </div>
                </article>

            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
