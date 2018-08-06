<?php
/**
 * Peak Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Peak_Theme
 */

if ( ! function_exists( 'peak_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function peak_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Peak Theme, use a find and replace
		 * to change 'peak' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'peak', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Use this function to register multiple menus at once.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Header', 'peak' ),
                        'footer-menu' => esc_html__( 'Footer', 'peak' ),
                        'social-media' => esc_html__( 'Social Media', 'peak' ),
                        'legal' => esc_html__( 'Legal', 'peak' ),
                        'sitemap' => esc_html__( 'Sitemap', 'peak' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'peak_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 111,
			'width'       => 111,
			'flex-width'  => true,
                        'flex-height' => true
		) );
	}
endif;
add_action( 'after_setup_theme', 'peak_theme_setup' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function peak_theme_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'peak-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'peak_theme_resource_hints', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function peak_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'peak_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'peak_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function peak_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widgets', 'peak' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'peak' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'peak' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add footer widgets here.', 'peak' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
 		'name'          => esc_html__( 'Contact/Address', 'peak' ),
 		'id'            => 'address-1',
 		'description'   => esc_html__( 'Add a map and structured address in HTML.', 'peak' ),
 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
 		'after_widget'  => '</section>',
 		'before_title'  => '<h2 class="widget-title">',
 		'after_title'   => '</h2>',
 	) );

}
add_action( 'widgets_init', 'peak_theme_widgets_init' );

/**
 * Custom function to add async attribute to scripts
 * https://matthewhorne.me/defer-async-wordpress-scripts/
 */
function add_async_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_async = array( 'google-analytics-prescript', 'google-analytics', 'peak-fonts', 'font-awesome', 'jquery-migrate' );

   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace('type=\'text/javascript\'', 'type=\'text/javascript\' async="async"', $tag);
      }
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

/**
 * Enqueue scripts and styles.
 */
function peak_theme_scripts() {
	// wp_register_script('jquery', includes_url() . 'js/jquery/jquery.js', array(), true, true );

	wp_enqueue_style( 'peak-style', get_stylesheet_uri() );

        $custom_css = ".post-template-single-portfolio-item .nc_socialPanel.swp_flatFresh.swp_d_fullColor.swp_i_fullColor.swp_o_fullColor.scale-100.scale-fullWidth.swp_one, .post-template-single-portfolio-item .nc_socialPanel.swp_flatFresh.swp_d_fullColor.swp_i_fullColor.swp_o_fullColor.scale-100.scale-fullWidth.swp_three, body > div.nc_wrapper.floatBottom { display: none !important; }";
        wp_add_inline_style( 'peak-style', $custom_css);

        //test loader script
        wp_enqueue_script('loader-script-custom', get_template_directory_uri() . '/js/loader-script.js', '', '', true);

        // google analytics
        wp_enqueue_script('google-analytics-prescript', 'https://www.googletagmanager.com/gtag/js?id=UA-86141289-1' );
        wp_enqueue_script( 'google-analytics', get_template_directory_uri() . '/js/google-analytics.js' );

	wp_enqueue_script( 'peak-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20151215', true );
        wp_localize_script('peak-navigation', 'peakScreenReaderText', array( 'expand' => __( 'Expand child menu', 'peak'),
                    'collapse' => __('Collapse child menu', 'peak')
            )
        );

	wp_enqueue_script( 'peak-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// load Google fonts
	// wp_enqueue_style( 'peak-fonts', 'https://fonts.googleapis.com/css?family=Raleway:800,300,400|Titillium+Web');

	wp_enqueue_style( 'peak-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,900,900i|Titillium+Web:300,400,500,600,700,800,900');


	// load Font Awesome CDN
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/ff486a1dc9.js' );

	// load custom javascript
	wp_enqueue_script('custom-functions', get_template_directory_uri() . '/js/custom-functions.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// load Faebook pixel
	//wp_enqueue_script( 'facebook-pixel', get_template_directory_uri() . '/js/facebook-pixel.js', array(), false, true );

	/**
	* Load tracking data on select pages
	*/
	// if ( is_page( 'search-engine-optimization' ) || is_page( 'website-development-design') ) {
	//     wp_add_inline_script('facebook-pixel', "fbq('track', 'ViewContent');" );
	// }

	/**
	* Track leads on contact page
	*/
	// if ( is_page( 'contact-us' ) ) {
	//     wp_add_inline_script('facebook-pixel', "fbq('track', 'Lead');" );
	// }



}
add_action( 'wp_enqueue_scripts', 'peak_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Filter Nav Menu: Social Media Menu
 */
function register_social_menu( $items, $args ) {
    /**
     * if the menu requested is 'social-media', customize the nav items
     * NOTE: it may be wise to insert the standard wordpress li classes into the tags below
     */
    if ( $args->theme_location == 'social-media' ) {
        $items .= '<li><a href="https://www.facebook.com/peakwebsiteservices/" target="_blank" title="Facebook: Peak Websites" class="grow-animate"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
        $items .= '<li><a href="https://twitter.com/peakwebsite" target="_blank" title="Twitter: Peak Websites" class="grow-animate"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>';
        // $items .= '<li><a href="https://www.linkedin.com/in/david-gaskin-75339b134/" target="_blank" title="LinkedIn: Peak Websites" class="grow-animate"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>';
        $items .= '<li><a href="https://plus.google.com/+PeakWebsitesVictoria" target="_blank" title="Google+: Peak Websites" class="grow-animate"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'register_social_menu', 10, 2);

/**
 * @summary        filters an enqueued script tag and adds a noscript element after it
 *
 * @description    filters an enqueued script tag (identified by the $handle variable) and
 *                 adds a noscript element after it. If there is also an inline script enqueued
 *                 after $handled, adds the noscript element after it.
 *
 * @access    public
 * @param     string    $tag       The tag string sent by `script_loader_tag` filter on WP_Scripts::do_item
 * @param     string    $handle    The script handle as sent by `script_loader_tag` filter on WP_Scripts::do_item
 * @param     string    $src       The script src as sent by `script_loader_tag` filter on WP_Scripts::do_item
 * @return    string    $tag       The filter $tag variable with the noscript element
 */
function append_noscript( $tag, $handle, $src ){
    // as this filter will run for every enqueued script
    // we need to check if the handle is equals the script
    // we want to filter. If yes, than adds the noscript element
    if ( 'facebook-pixel' === $handle ){
        $noscript = '<noscript>';
        // you could get the inner content from other function
        $noscript .= '<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=186154185273672&ev=PageView&noscript=1" />';
        $noscript .= '</noscript>';
        $tag = $tag . $noscript;
    }

    return $tag;
}
// adds the append_noscript function to the script_loader_tag filters
// it must use 3 as the last parameter to make $tag, $handle, $src available
// to the filter function
add_filter('script_loader_tag', 'append_noscript', 10, 3);

/**
 * Add meta property og:image to head (for single posts)
 */
function add_meta_prop_og_image() {
    if( !is_single() ) {
        return;
    }
    global $post;
    $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'large');
    $output = '<meta property="og:image" content="' .  $post_thumbnail[0] . '" />';
    echo $output;
}
add_action('wp_head', 'add_meta_prop_og_image');

/**
 * Remove featured image default width & height, now to be styled externally via CSS stylesheet
 */
function modify_post_thumbnail_html( $html ) {

    return preg_replace( '/(width|height)="\d*"/', '', $html );
}
add_filter( 'post_thumbnail_html', 'modify_post_thumbnail_html' );

/**
 * Add support for 'excerpt' on Pages
 */
add_post_type_support( 'page', 'excerpt' );

/**
 * Deregister stylesheet
 */
function my_deregister_styles() {
  wp_deregister_style('social_warfare');
}
add_action('wp_print_styles', 'my_deregister_styles', 100);

add_action( 'wp_footer', function () { ?>

    <noscript id="deferred-styles">
    <link rel="stylesheet" type="text/css" href="<?php echo plugins_url() . '/social-warfare/css/style.min.css'; ?>"/>
    </noscript>
    <script>
      var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
      };
      var raf = requestAnimationFrame || mozRequestAnimationFrame ||
          webkitRequestAnimationFrame || msRequestAnimationFrame;
      if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
      else window.addEventListener('load', loadDeferredStyles);
    </script>

<?php } );

/**
 * Exclude category (or multiple) from Blog posts page
 *
 * To exclude more than 1 category, separate category IDs with commas
 */
function exclude_category_from_blogroll( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '-199' );
    }
}
add_action( 'pre_get_posts', 'exclude_category_from_blogroll' );

/**
 * Exclude category from RSS feed
 */
function exclude_category_from_RSS($query) {
    if ( $query->is_feed ) {
        $query->set('cat', '-199');
    }
return $query;
}
add_filter('pre_get_posts', 'exclude_category_from_RSS');

/**
 * Prevents specified categories from displaying in the Recent Posts Widget.
 * Also sets posts number to show
*/
function exclude_posts_from_recentPostWidget_by_cat() {
    $exclude = array(
        'cat' => '-199',
        'posts_per_page' => 5
    );
    return $exclude;
}
add_filter('widget_posts_args','exclude_posts_from_recentPostWidget_by_cat');

/**
 * Manually override Canonical URL for specific Posts
 * NOTE: could create an array here and a function to loop
 */
function override_canonical( $canonical_url, $post ) {
    if ($post->ID == 197) {
        $canonical_url = 'https://www.moreinmedia.com/single-post/2017/05/30/Why-Your-Business-Needs-A-Website';
    }
    return $canonical_url;
}
add_filter( 'get_canonical_url', 'override_canonical', 10, 2 );

/**
 * Add Social Media contacts to an Author
 */
function add_to_author_profile( $contactMethods ) {
  $contactMethods['twitter'] = 'Twitter Profile';
  $contactMethods['linkedIn'] = 'LinkedIn Profile';
  $contactMethods['googlePlus'] = 'Google+ Profile';
  $contactMethods['facebook'] = 'Facebook Profile';

  return $contactMethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);

function remove_RSS_by_id() {
  global $post;

  /* NOTE: ID 2659 is for Blog post: New Generation of Mobile Apps, PWA */
  if ($post->ID == 2659) {
    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'rsd_link' );
  }
}
add_action('wp_head', 'remove_RSS_by_id', 0, 1);

/**
* Remove hentry from post_class
*/
function remove_hentry_class( $classes ) {
    $classes = array_diff( $classes, array( 'hentry' ) );
    return $classes;
}
add_filter( 'post_class', 'remove_hentry_class' );

/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);
