
<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Peak_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

      <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <!-- NOTE: author intro-->
            <div class="entry-meta">
            <?php peak_theme_posted_on(); ?>
            </div><!-- .entry-meta -->
		<?php else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			// If custom field 'guest_post' exists, then it's a guest post
			if ( $value = get_post_meta($post->ID, 'guest_post', true) ) {
				$string = '<div class="post-details">' . get_the_date('l F j, Y') . ' - ' . $value . '</div>';
			} else {
				$string = '<div class="post-details">' . get_the_date('l F j, Y') . ' - ' . get_the_author() . '</div>';
			}
			echo $string;

		 endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'peak-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'peak-theme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php peak_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
