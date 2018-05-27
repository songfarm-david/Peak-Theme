<!--Portfolio image panels-->
<article id="portfolio-grid" class="panel-container panel-color">
    <div class="entry-content">
       <h3>Project Examples:</h3>
       <p>Below are some examples of the websites we've built. Click on an image to learn more about the details behind the project.</p>
        <ul>

            <?php

             $lighthouseWealth_production = '2743';
             $lighthouseWealth_localhost = '2501';

             $coastalChiro_production = '2340';
             $coastalChiro_localhost = '2304';

             $songfarm_production = '2333';
             $songfarm_localhost = '2292';

             $cirs_production = '2351';
             $cirs_localhost = '';

            ?>

            <?php if ( get_post( $lighthouseWealth_production ) ) {
              $postID = $lighthouseWealth_production; // NOTE: if production ?>
              <li class="item small">
                <a href="<?php echo get_permalink( $postID ); ?>" class="image-hover" id="project-1" aria-label="View project: <?php echo get_the_title( $postID )?>">
                  <img src="<?php echo get_the_post_thumbnail_url( $postID ); ?>" width="100%" aria-labelledby="project-1">
                </a>
              </li>
            <?php } elseif ( get_post( $lighthouseWealth_localhost )) { $postID = $lighthouseWealth_localhost; // if local version ?>
              <li class="item small">
                <a href="<?php echo get_permalink( $postID ); ?>" class="image-hover" id="project-1" aria-label="View project: <?php echo get_the_title( $postID )?>">
                  <img src="<?php echo get_the_post_thumbnail_url( $postID ); ?>" width="100%" aria-labelledby="project-1">
                </a>
              </li>
            <?php } ?>

            <?php if ( get_post( $coastalChiro_production ) ) { // NOTE: if production
              $postID = $coastalChiro_production; ?>
              <li class="item small">
                <a href="<?php echo get_permalink( $postID ); ?>" class="image-hover" id="project-2" aria-label="View project: <?php echo get_the_title( $postID )?>">
                  <img src="<?php echo get_the_post_thumbnail_url( $postID ); ?>" width="100%" aria-labelledby="project-2">
                </a>
              </li>
            <?php } elseif ( get_post( $coastalChiro_localhost ) ) { $postID = $coastalChiro_localhost; // if local version ?>
              <li class="item small">
                <a href="<?php echo get_permalink( $postID ); ?>" class="image-hover" id="project-2" aria-label="View project: <?php echo get_the_title( $postID )?>">
                  <img src="<?php echo get_the_post_thumbnail_url( $postID ); ?>" width="100%" aria-labelledby="project-2">
                </a>
              </li>
            <?php } ?>

            <?php if ( get_post( $songfarm_production ) ) { // NOTE: if production
              $postID = $songfarm_production; ?>
              <li class="item small">
                <a href="<?php echo get_permalink( $postID ); ?>" class="image-hover" id="project-3" aria-label="View project: <?php echo get_the_title( $postID )?>">
                  <img src="<?php echo get_the_post_thumbnail_url( $postID ); ?>" width="100%" aria-labelledby="project-3">
                </a>
              </li>
            <?php } elseif ( $postID = get_post( $songfarm_localhost ) ) { // if local version
              $postID = $songfarm_localhost; ?>
              <li class="item small">
                <a href="<?php echo get_permalink( $postID ); ?>" class="image-hover" id="project-3" aria-label="View project: <?php echo get_the_title( $postID )?>">
                  <img src="<?php echo get_the_post_thumbnail_url( $postID ); ?>" width="100%" aria-labelledby="project-3">
                </a>
              </li>
            <?php } ?>

            <?php if ( $postID = get_post( $cirs_production ) ) { // NOTE: if production ?>
              <li class="item small">
                <a href="<?php echo get_permalink( $postID ); ?>" class="image-hover" id="project-4" aria-label="View project: <?php echo get_the_title( $postID )?>">
                  <img src="<?php echo get_the_post_thumbnail_url( $postID ); ?>" width="100%" aria-labelledby="project-4">
                </a>
              </li>
            <?php } elseif ( $postID = get_post( $cirs_localhost ) && get_post_type() == 'Porfolio' ) { // if local version ?>
              <li class="item small">
                <a href="<?php echo get_permalink( $postID ); ?>" class="image-hover" id="project-4" aria-label="View project: <?php echo get_the_title( $postID )?>">
                  <img src="<?php echo get_the_post_thumbnail_url( $postID ); ?>" width="100%" aria-labelledby="project-4">
                </a>
              </li>
            <?php } ?>

        </ul>
    </div>

</article>
