<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Glendale
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">

<?php wp_head(); ?>

<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-93493538-1', 'auto');
 ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'glendale' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="masthead-wrapper">
			<div class="site-branding">

				<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="/wp-content/themes/glendale/imgs/logo-300.png"></a><!-- #logo -->

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
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation" role="navigation">

			    <?php $phone = get_field( 'phone', 'option' ); ?>
			    <?php if ( $phone ) : ?>

			    <div class="masthead-phone">
			        <span>Call now to schedule a personal tour: </span><a href="tel:<?php echo $leasing ?>"><?php echo $phone; ?></a>
			    </div>

			    <?php endif; ?>

				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">

				<?php esc_html_e( 'Menu +', 'glendale' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

		</div><!-- masthead-wrapper -->
		<div class="mobile-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'mobile-menu' ) ); ?>
		</div>
	</header><!-- #masthead -->



	<div id="content" class="site-content">

		<!-- Displays the Featured Image if it exists -->
		<?php if ( function_exists( 'glendale_featured_image' ) ) {
		    glendale_featured_image();
		}

		if( is_page_template( 'page-lanham.php' ) && function_exists('mm4_area_map') ) {
			mm4_area_map();
		}

		if( is_page_template( 'page-photo-gallery.php' ) && function_exists('glendale_photo_gallery') ) {
			glendale_photo_gallery();
		}

		?>

		<div class="content-wrapper">
