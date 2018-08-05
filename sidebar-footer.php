<?php
/**
 * The footer "sidebar"
 *
 * @package Peak_Theme
 */
if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<footer id="footer-widgets-area" class="widget-area footer-widgets">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</footer><!-- #secondary -->
