<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Peak_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'peak-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
                    <?php the_custom_logo(); ?>
                    <div class="site-branding-text-container">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
                    </div><!--# site-branding-text-container-->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'peak-theme' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

        <?php if ( is_front_page() ) : ?>
        <!-- Landing Page -->
            <section id="hero-banner">
                <!-- TEST: img commented out to reduce requests -->
                <!--<img class="at-only" src="/" alt="The peak of a large, snow-covered mountain on a crisp and cloudy day" />-->
                <div class="hero-headline-container">
                    <h1 class="" itemprop="headline">Elevate Your Online Potential.</h1>
                    <p itemprop="alternativeHeadline">Web Design and SEO to generate leads and drive more sales for your business</p>
                    <a href="#">Get Started</a>
                </div>
                <!-- <a href="#complicated-web" id="down-arrow" class="scroll-link"></a> -->
            </section><!-- #hero-banner -->
        <?php endif; ?>
        
	<div id="content" class="site-content">
