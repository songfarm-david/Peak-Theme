<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Peak_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        <!-- show page title only on pages NOT front page -->
        <?php if ( !is_front_page() ) : ?>
        
            <header class="entry-header">
                <div>
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </div>
                    
                
            </header><!-- .entry-header -->
        
        <?php endif; ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'peak-theme' ),
				'after'  => '</div>',
			) );
		?>
            
            <!-- Portfolio Gallery Grid -->
            <div class="row" id="portfolio-section">
              <div class="column">
                <div class="content">
                    <?php echo wp_get_attachment_image( '2290', 'full', $icon = 'false', array( 'class' => 'img-responsive') ); ?>                  
                    <h3>Songfarm</h3>
                    <p>This is a custom website built with HTML5 and JavaScript in the front-end with PHP and MySQL in the back-end. It uses geolocational APIs to track user location, is time-zone aware, and features a custom registration and event system that automatically notifies users via email of news and upcoming events.</p>
                </div>
              </div>
              <div class="column">
                <div class="content">
                    <?php echo wp_get_attachment_image( '2286', 'full', $icon = 'false', array( 'class' => 'img-responsive') ); ?>                  
                    <h3>Luna's Canoa Massage</h3>
                    <p>This site was designed on WordPress and is a simple brochure style website for a Massage Studio in Ecuador. Future plans include integrating a booking system through the website that allows website visitors to book online and be notifid of their bookings.</p>
                </div>
              </div>
              <div class="column">
                <div class="content">
                    <?php echo wp_get_attachment_image( '2289', 'full', $icon = 'false', array( 'class' => 'img-responsive') ); ?> 
                    <h3>Financial Firm (demo)</h3>
                    <p>This site was designed and developed as a draft for a financial planning company. It is a simple website that incorporates all the necessary information. Future development plans include to integrate Social Media networks and launch a complete SEO strategy.</p>
                </div>
              </div>
              <div class="column">
                <div class="content">
                    <?php echo wp_get_attachment_image( '2287', 'full', $icon = 'false', array( 'class' => 'img-responsive') ); ?>
                  <h3>Canadian Infloor Radiant Solutions (demo)</h3>
                  <p>This project was a redesign of <a href="http://www.infloorheat.ca/" target="_blank"><abbr title="Canadian In-Floor Radiant Heating">CIRS</abbr> existing website</a>. It was built on top of <a href="http://getbootstrap.com/" target="_blank">BootStrap</a> and coded in HTML5 and CSS3. Special attention was dedicated to accessibility testing and ensuring compatibility with <a href="https://www.w3.org/TR/wai-aria-1.1/" target="_blank">WAI-ARIA</a> specifications. It also features custom JavaScript code for the navigation and mobile cost examples widget.</p>
                </div>
              </div>
            <!-- END GRID -->
            </div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'peak-theme' ),
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
                
            
                
                
</article><!-- #post-<?php the_ID(); ?> -->
