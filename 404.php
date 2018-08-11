<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Peak_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! Looks like the page you\'re looking for isn\'t here!', 'peak-theme' ); ?></h1>
					<p class="page-byline">Sorry about that! Try checking out <a href="<?php echo get_permalink( '703' ) ?>">the blog</a> visiting our <a href="<?php echo get_permalink( '1735' ) ?>">homepage</a>, or <a href="<?php echo get_permalink( '1722' ) ?>">get in touch with us</a>!</p>
				</header><!-- .page-header -->

				<div class="page-content">

					<div class="help-widgets-container">
						<div class="help-widget widget">
							<h2>Quick Links</h2>
							<?php wp_nav_menu( 'Footer' ) ?>
						</div>
						<div class="help-widget">
							<?php
							$title = 'Top Posts';
							the_widget( 'WP_Widget_Recent_Posts', "title=$title&number=5" ); ?>
						</div>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
