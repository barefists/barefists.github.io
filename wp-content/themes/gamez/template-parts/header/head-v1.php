<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gamez
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<?php

/**
 * Getting Option values for Header
 */

$logo = gamez_get_option('tx_logo'); //returns wp image attachment id
$header_variation = gamez_get_option('tx_header_select'); //returns text (string)
$show_social = gamez_get_option('tx_social_icons'); //returns boolean value (true)
$social_links = gamez_get_option('tx_top_social'); //returns 2D Array
$social_fb = $social_links['tx_top_social_fb']; //returns Social Link (facebook)
$social_tw = $social_links['tx_top_social_tw']; //returns Social Link (twitter)
$social_yt = $social_links['tx_top_social_yt']; //returns Social Link (youtube)
$social_ln = $social_links['tx_top_social_ln']; //returns Social Link (linkedin)

?>

<body <?php body_class();?>  >

<div id="tx-site-container" class="tx-site-container">

    <!--   start mobile menu -->
    <nav class="tx-menu tx-effect-1" id="menu-1">
        <div class="mobile-search">
            <?php get_search_form(); ?>
        </div>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'mobile',
                'menu'			=> 'mobile',
            )
        );
        ?>
    </nav>
    <!--    end mobile menu -->

    <div class="tx-site-pusher">
        <div class="tx-site-content"><!-- this is the wrapper for the content -->
            <div class="tx-site-content-inner">


<!--    don't touch below line  -->
<div id="page" class="site">
    <!--    don't touch above line  -->


    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gamez' ); ?></a>
    <header id="gamez-header-variation-1" class="gamez-header-variation-1" >
        <div id="header-variation-1-wrapper" class="header-variation-1-wrapper">
            <div class="top-menu">
                <div class="container top-menu-container">
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-6 left-side">
                        <div class="gamez-main-logo" id="main-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php if($logo): ?>
                                    <?php echo wp_get_attachment_image($logo, 'full'); ?>
                                <?php else : ?>
                                    <?php esc_html_e('Logo', 'gamez'); ?>
                                <?php endif; ?>
                            </a>
                        </div>
                        <!--                        end of /.main-logo/#main-logo-->
                        <nav id="gamez-main-nav" class="navbar navbar-default gamez-main-nav" data-hover="dropdown" data-animations="pulse fadeInLeft fadeInUp fadeInRight">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'        => 'primary',
                                    'menu'                  => 'primary',
                                    'menu_class'            => 'nav navbar-nav head-variation-1',
                                    'depth'                 => 4,
                                    'container'             => 'div',
                                    'container_class'       => 'navbar-collapse collapse gamez-nav',
                                    'container_id'          => 'gamez-nav',
                                    'fallback_cb'           => 'wp_bootstrap_navwalker::fallback',
                                    'walker'                => new wp_bootstrap_navwalker()
                                )//array
                            );// wp_nav_menu
                            ?>
                        </nav>
                        <!--                        end of /.gamez-main-nav-->

                    </div>
                    <!--                    end of /.col-md-10/.left-side-->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 right-side">
                        <div  class="gamez-tab-indicator">
                            <div id="tx-trigger-effects" class="gamez-menu-indicator" >
                                <span data-effect="tx-effect-1" >
                                        <i class="fa fa-bars"></i>
                                </span>
                            </div>
                        </div>
                        <div class="gamez-search">
                            <div class="gamez-search-wrapper">
                                <span class="search-icon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                        <div class="gamez-login">
                            <div class="gamez-login-wrapper">
                            <?php
                            if(! is_user_logged_in()){?>
                                <span class="user-login">
                                       <span class="user-login">
                                           <i class="fa fa-user-plus"></i>
                                       </span>
                                </span>
                                <div id="header-login" class="header-login">

                                </div>


                            <?php }else{?>
                                <span class="user-logout">
                                    <i class="fa fa-user"></i>
                                </span>
                            <?php }
                            ?>
                            </div>
                        </div>

                        <?php if(class_exists('woocommerce')): ?>
                        <div class="gamez-cart">
                            <div class="gamez-cart-wrapper">
                                <div>
                                    <span>
                                        <i class="fa fa-shopping-cart"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="header-cart-count">
                                <?php do_action('gamez_header_cart'); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="header-overlay">
                            <?php get_template_part('/template-parts/header/header', 'overlay'); ?>
                        </div>

                    </div>
                    <!--                    end of /.col-md-2/.right-side-->
                </div>
            </div>
        </div>
        <?php

        /**
         * Output Site Logo
         */
        ?>
    </header><!-- #masthead -->




    <!--    don't touch below line-->
    <div id="content" class="site-content">
        <!--        don't touch above line-->