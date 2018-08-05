<?php
/**
 * [Description]
 *
 * @package Peak_Theme
 */

if ( ! is_active_sidebar( 'address-1' ) ) {
	return;
}
?>

<aside id="address-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'address-1' ); ?>
</aside><!-- #secondary -->
