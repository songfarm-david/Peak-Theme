<?php
/**
 * Insert Hero Section if IS Front Page
 */

// $page = new WP_Query( "page_id=1895" );

// NOTE: page_id reflects a LIVE and DEV environment
// $page = ( new WP_Query( "page_id=1895" ) ) ?
//   new WP_Query( "page_id=1895" ) :
//   new WP_Query( "page_id=2282" );

  // if production version exists
  if ( get_post( 1895 ) ) {
    $page = new WP_Query( "page_id=1895" );
  }
  // elseif local version exists
  elseif ( get_post( 2282 ) ) {
    $page = new WP_Query( "page_id=2282" );
  }

  // $page = new WP_Query( "page_id=2282" );

  while( $page->have_posts()) : $page->the_post(); ?>

  <section id="hero-banner" class="hero-banner">
      <div class="hero-headline-container">

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

  </section>

  <?php endwhile;
