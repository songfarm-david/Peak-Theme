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
                include( get_template_directory() . '/inc/hero/blog-about-peak.php' );
            }
        ?>
        
        
        <!-- Display Footer widgets-->
        <?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer">
            
            <div>
                <span id="copyright">&copy; <?php echo date('Y'); ?> Peak Websites</span>
            </div>
            
            <nav>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'social-media',
                        'menu_id'        => 'social-media-menu',
                    ) );
                ?>
            </nav>
            
            <nav>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'legal',
                        'menu_id'        => 'legal-menu',
                    ) );
                ?>
            </nav>
           
            
<!--            <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'peak-theme' ) ); ?>"><?php
                            /* translators: %s: CMS name, i.e. WordPress. */
                            printf( esc_html__( 'Proudly powered by %s', 'peak-theme' ), 'WordPress' );
                    ?></a>
                    <span class="sep"> | </span>
                    <?php
                            /* translators: 1: Theme name, 2: Theme author. */
                            printf( esc_html__( 'Theme: %1$s by %2$s.', 'peak-theme' ), 'peak-theme', '<a href="https://peakwebsites.ca">David Gaskin</a>' );
                    ?>
            </div> .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
