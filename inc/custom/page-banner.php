<article id="page-banner" class="hero">
    <div>
        <?php
        /** if Web Dev page */
        if ( is_page( '1741' ) ) : ?>
        <h2 class="banner-heading banner-page-text">Ready for a website that just <em>works</em>?</h2>
        <p class="banner-secondary-text banner-page-text">Let's get started.</p>
        <?php
        /** if SEO page */
        elseif ( is_page( '1743' ) ) : ?>
        <h2 class="banner-heading banner-page-text">Put your business on the map</h2>
        <p class="banner-secondary-text banner-page-text">Let Peak help to turn your website into a conversion magnet.</p>
        <?php
        /** if Maintenance page */
        elseif ( is_page( '2541' ) ) : ?>
        <h2 class="banner-heading banner-page-text">Take the stress out of having an online presence</h2>
        <p class="banner-secondary-text banner-page-text">With Peak, you're in good hands.</p>
        <?php
        /** if Content Creation page */
        elseif ( is_page( '2376' ) ) : ?>
        <h2 class="banner-heading banner-page-text">Ready for targeted traffic to your site?</h2>
        <p class="banner-secondary-text banner-page-text">Let Peak put you on track towards a website that improves your business.</p>
        <?php
        /** if anything else */
        else : ?>
        <h2 class="banner-heading banner-page-text">Things are about to get a lot easier</h2>
        <p class="banner-secondary-text banner-page-text">Let Peak lead the way towards a website that actually works for your business.</p>
        <?php endif; ?>
        <a href="<?php echo get_permalink( '1722' ); ?>" class="peak-button peak-btn-highlight no-box-shadow">Contact Us</a>
    </div>
</article>
