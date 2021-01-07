<?php
/**
 * check if user not logged in
 */

?>
<div class="header-overlay-wrapper">

    <div class="overlay-cross-wrapper">
        <span class="overlay-cross">
            <i class="fa fa-angle-left fa-2x"></i>
        </span>
    </div>
    <div class="container">
        <ul class="header-overlay-tab">
            <li  class="header-overlay-tab-item gamez-search">
                <a href="#overlay-search"><?php esc_html_e('Search', 'gamez') ?></a>
            </li>
            <li  class="header-overlay-tab-item gamez-login">
                <a href="#overlay-login"><?php esc_html_e('User', 'gamez') ?></a>
            </li>
            <?php if(class_exists('woocommerce')): ?>
                <li  class="header-overlay-tab-item gamez-cart">
                    <a href="#overlay-cart"><?php esc_html_e('Cart', 'gamez') ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="tab-content-wrapper">
        <div class="tab-content">
            <div id="overlay-search" class="header-overlay-tab-content">
                <?php echo get_search_form(); ?>
            </div>
            <div id="overlay-login" class="header-overlay-tab-content">
                <?php
                if(! is_user_logged_in()):
                    $args = array(
                        'redirect' => admin_url(),
                        'label_username' => esc_html__( 'Email address', 'gamez'),
                        'label_password' => esc_html__( 'Password', 'gamez'),
                        'label_remember' => esc_html__( 'Remember Me', 'gamez'),
                        'label_log_in' => esc_html__( 'Login', 'gamez'),
                        'remember' => true
                    );?>
                    <div class="login-form-wrapper">
                    <div class="row">
                        <div class="col-md-6 header-login-form">
                            <h3 class="login-title"><?php esc_html_e('Login', 'gamez'); ?></h3>
                            <?php wp_login_form($args); ?>
                        </div>
                        <div class="col-md-6 header-registration-form">
                            <h3 class="reg-title"><?php esc_html_e('Register', 'gamez'); ?></h3>
                            <?php echo do_shortcode('[gamez_custom_registration]'); ?>
                        </div>
                    </div>

                    </div><?php
                else:
                    ?>
                    <div class="logout-wrapper">
                        <p class="logout-text">
                            <?php esc_html_e('Are you sure to logout ??? ', 'gamez'); ?>
                        </p>
                        <a href="<?php echo esc_url(wp_logout_url('/')); ?>" title="<?php esc_attr_e("Logout", "gamez"); ?>">
                            <?php esc_html_e('Logout', 'gamez'); ?>
                        </a>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <?php if(class_exists('woocommerce')): ?>
            <div id="overlay-cart" class="header-overlay-tab-content">
                <div class="cart-header">
                    <h4 class="cart-total">

                        <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'gamez' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'gamez' ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>

                        <span><?php esc_html_e('in cart', 'gamez') ?></span>
                    </h4>

                </div>
                <div class="cart-content">
                    <div class="container">
                        <?php the_widget('WC_Widget_Cart') ?>
                    </div>

                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>


</div>