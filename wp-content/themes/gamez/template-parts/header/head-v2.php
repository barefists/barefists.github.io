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
    <div class="header-offcanvas-2">
    <!--   start mobile menu -->
    <nav class="tx-menu tx-effect-1" id="menu-1">
        <div class="user-information">
            <?php if(! is_user_logged_in()): ?>
                <div class="logout-user">
                    <div class="logout-user-wrapper">
                        <span class="fa fa-user-secret fa-3x"></span>
                    </div>
                    <div class="login-register">
                        <a class="user-login" href="#"><?php esc_html_e('Login', 'gamez') ?></a>
                        <span> / </span>
                        <a href="#"><?php esc_html_e('Register', 'gamez') ?></a>
                    </div>
                </div>
            <?php else: ?>
                <div class="logged-in-user">
                    <div class="user-gravater">
                        <?php
                        $current_user = wp_get_current_user();
                        echo get_avatar($current_user->ID);
                        ?>
                    </div>

                    <div class="user-name">
                        <?php echo ucfirst($current_user->display_name);?>
                    </div>
                    <div class="user-logout">
                        <a href="<?php echo esc_url(wp_logout_url('/')); ?>" title="<?php esc_attr_e("Logout", "gamez"); ?>">
                            <?php esc_html_e('Logout', 'gamez'); ?>
                        </a>
                    </div>

                </div>
            <?php endif; ?>
        </div>
        <div class="header2-search visisble-991">
            <?php echo get_search_form(); ?>
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
    </div>
    <div class="tx-site-pusher">
        <div class="tx-site-content"><!-- this is the wrapper for the content -->
            <div class="tx-site-content-inner">


<!--    don't touch below line  -->
<div id="page" class="site">
    <!--    don't touch above line  -->


    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gamez' ); ?></a>
    <header id="gamez-header-variation-2" class="gamez-header-variation-2" >
        <div id="header-variation-2-wrapper" class="header-variation-2-wrapper">
            <div class="top-menu">
                <div class="container top-menu-container">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 left-side">
                        <div id="tx-trigger-effects" class="menu-indicator-2">
                            <span class="menu-indicator-wrapper-2" data-effect="tx-effect-1">
                                    <i class="fa fa-bars"></i>
                            </span>
                        </div>
                    </div>
                    <!--                    end of /.col-md-10/.left-side-->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center-side">
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
                    </div>
<!--                    end of the /.center-side-->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-side">
                        <div class="header-search-2">
                            <div class="header-search-wrapper-2">
                                <?php echo get_search_form(); ?>
                            </div>
                        </div>
<!--                        cart content indicatore-->
                        <?php if(class_exists( 'woocommerce' )): ?>
                        <div class="header-cart-2">
                            <div class="header-cart-wrapper-2">
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

                        <!--                        cart side contnet for woocommerce product-->
                        <?php if(class_exists( 'woocommerce' )): ?>
                        <div class="header-cart-content-2">
                            <div class="header-cart-content-wrapper-2">
                                <div class="cart-cross-btn">
                                    <span class="fa fa-close"></span>
                                </div>
                                <?php the_widget('WC_Widget_Cart') ?>
                            </div>
                        </div>
                        <?php endif; ?>
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