<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Peak_Theme
 */

if ( ! function_exists( 'peak_theme_posted_on' ) ) :

  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function peak_theme_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">  &mdash; Updated: %4$s</time>';
    }

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() ),
      esc_attr( get_the_modified_date( 'c' ) ),
      esc_html( get_the_modified_date() )
    );

    $posted_on = sprintf(
      /* translators: %s: post date. */
      esc_html_x( ' &ndash; %s', 'post date', 'peak-theme' ), $time_string
//      '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' .  . '</a>'
    );

//    $userdata = get_user_meta( get_the_author_meta( 'ID' ) );

    $social_links = '';

    $twitter = get_the_author_meta('twitter');
    $linkedIn = get_the_author_meta('linkedIn');
    $googlePlus = get_the_author_meta('googlePlus');
    $facebook = get_the_author_meta('facebook');

    if ( $twitter && $twitter != '') {
      $social_links .= '<span class="social-link"><a href="' . $twitter . '" title="Twitter" class="grow-animate"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></span>';
    }
    if ( $facebook && $facebook != '') {
      $social_links .= '<span class="social-link"><a href="' . $facebook . '" title="Facebook" class="grow-animate"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></span>';
    }
    if ( $linkedIn && $linkedIn != '') {
      $social_links .= '<span class="social-link"><a href="' . $linkedIn . '" title="Linked In" class="grow-animate"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></span>';
    }

    /* TODO: do this pattern for other social networks */

    $byline = sprintf(
      /* translators: %s: post author. */
      esc_html_x( '%s', 'post author', 'peak-theme' ),
      '<div class="author-vcard">' .
        '<div class="author-info">' .
          '<span class="author">' .
            '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' .
        '<span class="social-links" aria-label="Social Media Links">' . $social_links . '</span></div>' .
        '<div><span class="author-bio">' . esc_html( get_the_author_meta('description') ) . '</span></div>' .
        '<div class="times"><span class="read-time">' . get_post_meta( get_the_ID(), 'read_time', true ) . '</span><span class="posted-on">' . $posted_on . '</span></div>' .
      '</div>');

//    $author_bio = esc_html( get_the_author_meta('description') );

    /* add avatar image - NOTE: not currently dynamic */
    $avatar = '<figure class="author-avatar"><img src="https://peakwebsites.ca/wp-content/uploads/2017/11/david-gaskin-face-pic-circle.gif" height="65" width="65"></figure>';

    // NOTE: if Guest Post category
    if ( in_category(201) ) {
      echo '<p class="guest-post">The following is a guest post. Learn about <a href="' . get_permalink(2624) . '" title="contribute to the blog">contributing to the blog</a>.</p>';
    } else {
      echo $avatar .  $byline ; // WPCS: XSS OK.
    }

  }

endif;

if ( ! function_exists( 'peak_theme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function peak_theme_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'peak-theme' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'peak-theme' ) . '</span>&nbsp;', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'peak-theme' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'peak-theme' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( '|&nbsp;Leave a Comment<span class="screen-reader-text"> on %s</span>', 'peak-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( ' Edit <span class="screen-reader-text">%s</span>', 'peak-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<br><span class="edit-link">',
			'</span>'
		);
	}
endif;
