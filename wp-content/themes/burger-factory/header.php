<?php
/**
 * The header.
 *
 * @package Burger_Factory
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class( get_theme_mod( 'color_scheme', 'color-scheme-light' )); ?>>
	<div id="site-wrapper">
	<div id="page" class="site container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'burger-factory' ); ?></a>

		<header id="masthead" class="row site-header" role="banner">
			<div class="col-12">
				<?php
				if ( is_front_page() && is_home() ) : ?>
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
		</header><!-- #masthead -->

		<div id="content" class="site-content">
            <?php if ( is_active_sidebar( 'before-content' ) ) :
                ?><div class="row"><div class="col-12 before-content-widgets">

                <?php
                dynamic_sidebar( 'before-content' );
                ?></div></div><?php
            endif; ?>