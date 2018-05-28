<?php
/*
 * Template Name: Services Home
 * Template Post Type: page
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'services' );

            endwhile; // End of the loop.
            ?>

            <?php
            /**
             * Call Services sections
             */

              // if production version exists
              if ( get_post( 2520 ) ) {
                $recent = new WP_Query( "page_id=2520" );
              }
              // elseif local version exists
              elseif ( get_post( 2349 ) ) {
                $recent = new WP_Query( "page_id=2349" );
              }

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

              /* If Production version exists */
              if ( get_post( 2527 ) ) {
                $recent = new WP_Query( "page_id=2527" );
              }
              /* elseif Local version exists */
              elseif ( get_post( 2351 ) ) {
                $recent = new WP_Query( "page_id=2351" );
              }

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

              /* If Production version exists */
              if ( get_post( 2529 ) ) {
                $recent = new WP_Query( "page_id=2529" );
              }
              /* elseif Local version exists */
              elseif ( get_post( 2353 ) ) {
                $recent = new WP_Query( "page_id=2353" );
              }

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

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
