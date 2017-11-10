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
}
add_action( 'widgets_init', 'peak_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function peak_theme_scripts() {
	wp_enqueue_style( 'peak-style', get_stylesheet_uri() );

	wp_enqueue_script( 'peak-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20151215', true );
        wp_localize_script('peak-navigation', 'peakScreenReaderText', array( 'expand' => __( 'Expand child menu', 'peak'), 
                    'collapse' => __('Collapse child menu', 'peak') 
            )
        );

	wp_enqueue_script( 'peak-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
        
        /* load custom javascript */
        wp_enqueue_script('user_functions', get_template_directory_uri() . '/js/user_functions.js', array( 'jquery' ), '', true );
        
	// load Google fonts
        wp_enqueue_style( 'peak-fonts', 'https://fonts.googleapis.com/css?family=Raleway:800,300,400|Titillium+Web');
        
        // load Font Awesome CDN
        wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/ff486a1dc9.js' );
        
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
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
    if ($args->theme_location == 'social-media' ) {
        $items .= '<li><a href="https://www.facebook.com/peakwebsiteservices/" target="_blank" title="Facebook: Peak Websites"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
        $items .= '<li><a href="https://twitter.com/peakwebsite" target="_blank" title="Twitter: Peak Websites"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>';
        $items .= '<li><a href="https://www.linkedin.com/in/david-gaskin-75339b134/" target="_blank" title="LinkedIn: Peak Websites"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'register_social_menu', 10, 2);

