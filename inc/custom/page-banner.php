<article id="page-banner" class="hero">
    <div>
        <?php
        /** if Web Dev page */
        if ( is_page( '1741' ) ) : ?>
        <h2 class="banner-heading banner-page-text">Ready for a website that works?</h2>
        <p class="banner-secondary-text banner-page-text">Let's build you a website that works for your business.</p>
        <?php
        /** if SEO page */
        elseif ( is_page( '1743' ) ) : ?>
        <h2 class="banner-heading banner-page-text">Ready to put your business on the map?</h2>
        <p class="banner-secondary-text banner-page-text">Let us help you to get the kinds of search results you're looking for.</p>
        <?php
        /** if Maintenance page */
        elseif ( is_page( '2541' ) ) : ?>
        <h2 class="banner-heading banner-page-text">Take the complication out of having a website.</h2>
        <p class="banner-secondary-text banner-page-text">Your website is in good hands when we've got your back.</p>
        <?php
        /** if Content Creation page */
        elseif ( is_page( '2376' ) ) : ?>
        <h2 class="banner-heading banner-page-text">Ready for targeted traffic to your site?</h2>
        <p class="banner-secondary-text banner-page-text">Let us help you to generate more of the traffic you actually want.</p>
        <?php
        /** if anything else */
        else : ?>
        <h2 class="banner-heading banner-page-text">Ready to take the high road?</h2>
        <p class="banner-secondary-text banner-page-text">Let us lead the way towards better website conversion and increased exposure in search.</p>
        <?php endif; ?>
        <a href="<?php echo get_permalink( '1722' ); ?>" class="peak-button peak-btn-highlight no-box-shadow">Contact Us</a>
    </div>
</article>