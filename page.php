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
                $recent = new WP_Query( "page_id=2286" ); 

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
                $recent = new WP_Query( "page_id=2284" ); 

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
            
            <!-- if is web development page 
                insert portfolio page 
            -->
            <?php if( is_page( '1741' ) ) :
                
                // ID for Portfolio
                $recent = new WP_Query( "page_id=2308" ); 

                while( $recent->have_posts()) : $recent->the_post(); ?>
                
<!--                <article class="panel-container portfolio">
                    <div class="entry-content panel-content">

                    <?php //the_content();

                        /* Edit link */
                        //if ( get_edit_post_link() ) : ?>
                            <footer class="panel-footer">
                                <?php
//                                    edit_post_link(
//                                        sprintf(
//                                            wp_kses(__( 'Edit <span class="screen-reader-text">%s</span>', 'peak-theme' ),
//                                                array(
//                                                    'span' => array(
//                                                        'class' => array(),
//                                                    ),
//                                                )
//                                            ),
//                                        get_the_title()
//                                    ),
//                                    '<span class="edit-link">',
//                                    '</span>'
//                                    );
                                ?>
                            </footer> .entry-footer 
                        <?php //endif; ?> 

                    </div>
                </article>-->
            
                <!--Portfolio image panels-->
                <article id="portfolio-grid">
                    <h2>Portfolio projects</h2>
                    <ul>
                        <li id="songfarm" class="item small">
                            <a href="<?php echo get_permalink( '2333' ); ?>" class="image-hover"></a>
                            <a href="<?php echo get_permalink( '2333' ); ?>" class="hover-button">View Project</a>
                        </li>
                        <li id="cirs" class="item small">
                            <a href="<?php echo get_permalink( '2351' ); ?>" class="image-hover"></a>
                            <a href="<?php echo get_permalink( '2351' ); ?>" class="hover-button">View Project</a>
                        </li>
                        <li id="hollis" class="item small">
                            <a href="<?php echo get_permalink( '2344' ); ?>" class="image-hover"></a>
                            <a href="<?php echo get_permalink( '2344' ); ?>" class="hover-button">View Project</a>
                        </li>
                        <li id="coastal" class="item small">
                            <a href="<?php echo get_permalink( '2340' ); ?>" class="image-hover"></a>
                            <a href="<?php echo get_permalink( '2340' ); ?>" class="hover-button">View Project</a>
                        </li>
                        <li id="canoa" class="item large">
                            <a href="<?php echo get_permalink( '2356' ); ?>" class="image-hover"></a>
                            <a href="<?php echo get_permalink( '2356' ); ?>" class="hover-button">View Project</a>
                        </li>
                        <li id="your-website" class="item large">
                            <a href="<?php echo get_permalink( '1722' ); ?>" class="image-hover"></a>
                            <a href="<?php echo get_permalink( '1722' ); ?>" class="hover-button">Your Website Here</a>
                        </li>
                    </ul>
                </article>
                        
                <?php endwhile;
                
            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
