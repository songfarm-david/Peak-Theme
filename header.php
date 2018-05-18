<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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

        <!-- Dynamically load meta descriptions (excerpt) for posts and pages,
        display siteinfo on home page.-->
        <?php if (is_single() || is_page() ) : if (have_posts() ) : while (have_posts() ) : the_post(); ?>
        <meta name="description" content="<?php echo get_the_excerpt();?>">
        <?php endwhile; endif; elseif (is_home() ): ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <?php endif; ?>

        <?php //if ( is_single() ) echo '<link rel="canonical" href="https://www.moreinmedia.com/single-post/2017/05/30/Why-Your-Business-Needs-A-Website" />'; ?>

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
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <?php //esc_html_e( 'Primary Menu', 'peak-theme' ); ?>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span class="screen-reader-text">Toggle mobile menu</span>
                        </button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

        <?php if ( is_front_page() ) :

						// NOTE: Include landing banner
						include( get_template_directory() . '/inc/custom/landing-banner.php' );


        endif; ?>

	<div id="content" class="site-content">
