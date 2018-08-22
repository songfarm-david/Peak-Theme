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
<html class="fadeIn" <?php language_attributes(); ?>>
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

	<!-- Favicon meta -->
	<?php // TODO: make sure this is standard ?>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<!-- <link rel="manifest" href="/site.webmanifest"> -->
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#603cba">
	<meta name="theme-color" content="#ffffff">

	<link rel="manifest" href="/manifest.json">

	<!-- Structure Data -- hard-coded until WP releases something better ! -->

	<!-- localBusiness -->
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "localBusiness",
		"currenciesAccepted": "CAD,USD,GBP",
		"openingHours": "Mo-Fr 10:00-18:00",
		"paymentAccepted": "Cash, Credit Card, eTransfer",
		"priceRange": "$300-25k+",
		"address": {
			"@type": "PostalAddress",
			"addressCountry": "Canada",
			"addressLocality": "Victoria",
			"addressRegion": "BC",
			"postalCode": "V8V 5A1",
			"streetAddress": "1061 Fort St, Unit 204"
		},
		"aggregateRating": {
			"@type": "AggregateRating",
			"itemReviewed": "Peak Websites",
			"reviewCount": "19",
			"ratingValue": "4.6"
		},
		"contactPoint" : {
			"@type" : "ContactPoint",
			"availableLanguage": "English, Spanish",
			"contactType" : "Sales",
			"email": "david@peakwebsites.ca",
			"hoursAvailable": "10:00-18:00",
			"telephone" : "+778-587-9220"
		},
		"email": "david@peakwebsites.ca",
		"founder": {
			"@type": "Person",
			"name": "Dave Gaskin",
			"email": "david@peakwebsites.ca",
			"knowsLanguage": "English, Spanish",
			"nationality": "Canada",
			"telephone" : "+778-587-9220",
			"worksFor": "Peak Websites"
		},
		"foundingDate": "2016-10-21",
		"foundingLocation": "Victoria, British Columbia",
		"knowsAbout": "Web Development, Web Design, Search Engine Optimization, Programming, Progressive Web Apps, Google, SEO, Local SEO",
		"knowsLanguage": "HTML5, CSS3, JavaScript ES6, PHP, XML, JSON",
		"legalName": "Peak Website Services",
		"location": {
			"@type": "Place",
			"name": "Victoria, British Columbia"
		},
		"logo": "https://peakwebsites.ca/wp-content/uploads/2017/09/peak_logo.png",
		"telephone": "7785879220",
		"geo": {
			"@type": "GeoCoordinates",
			"latitude": "48.423379",
			"longitude": "-123.35534",
			"PostalCode": "V8V 5A1"
		},
		"description": "Peak Websites works closely with businesses of all sizes to help distinguish them from their online competition. We are specialists in Web Development & Design, Search Engine Optimization, and developing Progressive Web Apps. We are excited to work with businesses who want reliable results and personal service.",
		"image": "https://peakwebsites.ca/wp-content/uploads/2017/10/air-triangulated.jpg",
		"url": "https://peakwebsites.ca",
		"name": "Peak Websites",
		"hasMap": {
			"@type": "Map",
			"url": "https://www.google.ca/maps/place/Peak+Websites/@48.423379,-123.3575287,17z/data=!3m1!4b1!4m5!3m4!1s0x548f0d5fc97ca0cf:0xe2e36cceda92621c!8m2!3d48.423379!4d-123.35534"
		},
		"sameAs": ["https://twitter.com/peakwebsite","https://plus.google.com/+PeakWebsitesVictoria","https://www.facebook.com/peakwebsiteservices/"]
	}
	</script>

	<!-- Website -->
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "WebSite",
		"about": "Website for Peak Websites, a Victoria, BC based Web Design and SEO agency.",
		"alternativeHeadline": "The pursuit of peak performance of your online business",
		"author": {
			"@type": "Organization",
			"name": "Peak Websites"
		},
		"creator": {
			"@type": "Organization",
			"name": "Peak Websites"
		},
		"headline": "Peak Websites - Experienced Web Design, Development, and SEO",
		"inLanguage": "English",
		"keywords": "Web Design, Web Development, SEO, Search Engine Optimization, Internet Marketing, Websites, Website Maintenance, Web Services, Programming, Progressive Web Apps, PWAs, SEO Company, SEO Agency",
		"sourceOrganization": {
			"@type": "Organization",
			"name": "Peak Websites"
		},
		"thumbnailUrl": "https://peakwebsites.ca/wp-content/uploads/2017/10/air-triangulated.jpg",
		"alternateName": "Peak Website Services",
		"description": "Peak Websites works closely with businesses of all sizes to help distinguish them from their online competition. We are specialists in Web Development & Design, Search Engine Optimization, and developing Progressive Web Apps. We are excited to work with businesses who want reliable results and personal service.",
		"image": "https://peakwebsites.ca/wp-content/uploads/2017/09/peak_logo.png",
		"name": "Peak Websites",
		"sameAs": ["https://twitter.com/peakwebsite","https://plus.google.com/+PeakWebsitesVictoria","https://www.facebook.com/peakwebsiteservices/"],
		"url": "https://peakwebsites.ca"
	}
	</script>

	<!-- Homepage Review -->
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "Review",
		"itemReviewed": {
			"@type": "LocalBusiness",
			"name": "Peak Websites",
			"image": "https://peakwebsites.ca/wp-content/uploads/2017/10/air-triangulated.jpg",
			"logo": "https://peakwebsites.ca/wp-content/uploads/2017/09/peak_logo.png",
			"telephone": "7785879220",
			"email": "david@peakwebsites.ca",
			"priceRange": "$300-25k+",
			"address": {
				"@type": "PostalAddress",
				"addressCountry": "Canada",
				"addressLocality": "Victoria",
				"addressRegion": "BC",
				"postalCode": "V8V 5A1",
				"streetAddress": "1061 Fort St, Unit 204"
			},
			"aggregateRating": {
				"@type": "AggregateRating",
				"itemReviewed": "Peak Websites",
				"reviewCount": "19",
				"ratingValue": "4.6"
			}
		},
		"reviewBody": "Dave at Peak Websites was a breath of fresh air in working with our team to build and design our new website. He brought a proactive approach to the work that ensured that our project continued to move forward, even when we dropped the ball. He was not afraid to get his hands dirty and work outside the box to get the results we needed. Dave offered many great design suggestions and has an eye for detail and layout that allowed us to translate our vision of our business into an effective and visually appealing website. We have already got lots of positive feedback about the site. Thanks Dave!",
		"author": {
			"@type": "Person",
			"name": "Steve Gaskin",
			"url": "https://www.lighthousewealthvictoria.com/"
		}
	}
	</script>

	<?php
	/**
	 * If About Page
	 */
	if ( is_page( '1718' ) ) : ?>
	<!-- AboutPage -->
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "AboutPage",
		"breadcrumb": {
			"@type": "BreadcrumbList",
			"itemListElement":
			[
				{
					"@type": "ListItem",
					"position": 2,
					"name": "About",
					"url": "https://peakwebsites.ca/about/"
				},
				{
					"@type": "ListItem",
					"position": 1,
					"name": "Home",
					"url": "https://peakwebsites.ca/"
				}
			],
			"itemListOrder": "Ascending"
		},
		"mainContentOfPage": {
			"@type": "WebPageElement",
			"cssSelector": "#primary"
		},
		"significantLink": [
			"https://peakwebsites.ca/services/website-development-design/",
			"https://peakwebsites.ca/services/search-engine-optimization/",
			"https://peakwebsites.ca/services/",
			"https://peakwebsites.ca/contact-us/"
		],
		// NOTE: make significantLink array with other services
		"speakable": ["#primary", "#footer-widgets-area"],
		"about": "About Peak Websites",
		"keywords": "victoria bc web design, web development victoria bc, seo victoria bc, progressive web app victoria bc, programmer victoria bc, canada, seo agency, seo company",
		"review": {
			"@type": "Review",
			"itemReviewed": {
				"@type": "LocalBusiness",
				"name": "Peak Websites",
				"image": "https://peakwebsites.ca/wp-content/uploads/2017/10/air-triangulated.jpg",
				"logo": "https://peakwebsites.ca/wp-content/uploads/2017/09/peak_logo.png",
				"telephone": "7785879220",
				"email": "david@peakwebsites.ca",
				"priceRange": "$300-25k+",
				"address": {
					"@type": "PostalAddress",
					"addressCountry": "Canada",
					"addressLocality": "Victoria",
					"addressRegion": "BC",
					"postalCode": "V8V 5A1",
					"streetAddress": "1061 Fort St, Unit 204"
				},
				"aggregateRating": {
					"@type": "AggregateRating",
					"itemReviewed": "Peak Websites",
					"reviewCount": "19",
					"ratingValue": "4.6"
				}
			},
			"reviewBody": "David did an excellent job ~ he was able, quick, dedicated and paid attention to detail. I now have a beautiful professional website that I am very proud of.",
			"author": {
				"@type": "Person",
				"name": "Nancy Crites",
				"url": "https://nancycrites.com/"
			}
		},
		"name": "About Peak Websites",
		"url": "https://peakwebsites.ca/about/"
	}
	</script>
	<?php endif; ?>

	<?php
	/**
	 * If Contact Page
	 */
	if ( is_page( '1722' ) ) : ?>
	<!-- ContactPage -->
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "ContactPage",
		"breadcrumb": {
			"@type": "BreadcrumbList",
			"itemListElement":
			[
				{
					"@type": "ListItem",
					"position": 2,
					"name": "Contact Peak Websites",
					"url": "https://peakwebsites.ca/contact-us/"
				},
				{
					"@type": "ListItem",
					"position": 1,
					"name": "Home",
					"url": "https://peakwebsites.ca/"
				}
			]
		},
		"mainContentOfPage": {
			"@type": "WebPageElement",
			"cssSelector": "#primary"
		},
		"speakable": ["#primary", "#footer-widgets-area"],
		"about": "Contact Peak Websites",
		"keywords": "victoria bc web design, web development victoria bc, seo victoria bc, progressive web app victoria bc, programmer victoria bc, canada, seo agency, seo company",
		"name": "Contact Peak Websites",
		"url": "https://peakwebsites.ca/contact-us/"
	}
	</script>

	<?php endif; ?>


</head>

<body <?php body_class( 'fadeIn' ); ?>>
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
