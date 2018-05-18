<?php
/**
 * Insert Hero Section if IS Front Page
 */

// $page = new WP_Query( "page_id=1895" );
//            $page = new WP_Query( "page_id=2282" );

// NOTE: page_id reflects a LIVE and DEV environment
$page = ( new WP_Query( "page_id=1895" ) ) ?
  new WP_Query( "page_id=1895" ) :
  new WP_Query( "page_id=2282" );

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

  // <!-- Landing Page -->
  //
  //   <!-- <section id="hero-banner" class="hero-banner">
  //
  //       <div class="hero-headline-container hero-banner-container fadeInUp">
  //
  //           <h1 class="hero-headline hero-text" itemprop="headline"><span>Elevate</span> Your Online Potential.</h1>
  //           <p class="hero-byline hero-text" itemprop="alternativeHeadline">Get a Website and Search Engine Optimization designed to produce more leads and generate more sales for your small to medium-size business.</p>
  //
  //           // NOTE: Link is a Page Anchor
  //           <a href="#main-content" data-name="learn-more" class="peak-button">Learn more</a>
  //
  //       </div>
  //
  //   </section><!-- #hero-banner --> -->
