<?php
/**
 * NOTE: This block actually is a sidebar but is used visually as a footer
 */
if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<footer id="footer-widgets-area" class="widget-area footer-widgets">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</footer><!-- #secondary -->
