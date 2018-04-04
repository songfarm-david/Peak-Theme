<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Peak_Theme
 */

?>

	</div><!-- #content -->
        
        <?php 
        /**
         * Insert Company About
         */
            if ( is_single() || is_home() ) {
                include( get_template_directory() . '/inc/custom/blog-about-peak.php' );
            }
        ?>        
        
        <!-- Display Footer widgets-->
        <?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer">
            
            <div id="copyright">
                <span >&copy; <?php echo date('Y'); ?> Peak Websites</span>
            </div>
            
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'social-media',
                    'container'      => 'nav',
                    'container_id'   => 'social-media-menu',
                ) );
            ?>
            
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'legal',
                    'container'      => 'nav',
                    'container_id'   => 'legal-menu'
                ) );
            ?>
           
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
