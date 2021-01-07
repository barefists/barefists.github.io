<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gamez
 */

/**
 * Getting Option values for Footer
 */

$tx_credit = gamez_get_option('tx_themexpert_credit'); //returns boolean value (true)
$copyright_text = gamez_get_option('tx_footer_copy'); //returns text (string)
$breadcrumb = gamez_get_option('tx_breadcrumb');
$footer_logo = gamez_get_option('tx_footer_logo');

?>

</div><!-- #content -->

<?php if ($breadcrumb && !is_front_page()): ?>
    <div class="breadcrumb">
        <div class="container">
            <?php gamez_breadcrumbs(); ?>
        </div>
    </div>
<?php endif; ?>

<footer id="colophon" class="site-footer">

    <div class="footer-main">
        <div class="container">
            <?php if($footer_logo): ?>
                <div class="footer-logo">
                    <?php echo wp_get_attachment_image($footer_logo, 'full'); ?>
                </div>
            <?php endif; ?>

            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <?php if (is_active_sidebar('footer-1')) {
                        dynamic_sidebar('footer-1');
                    } ?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <?php if (is_active_sidebar('footer-2')) {
                        dynamic_sidebar('footer-2');
                    } ?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <?php if (is_active_sidebar('footer-3')) {
                        dynamic_sidebar('footer-3');
                    } ?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <?php if (is_active_sidebar('footer-4')) {
                        dynamic_sidebar('footer-4');
                    } ?>
                </div>


            </div>

            <div class="footer-bottom-widget"> <?php if (is_active_sidebar('footer-bottom')) {
                    dynamic_sidebar('footer-bottom');
                } ?> </div>

        </div>
    </div>

    <?php if ($tx_credit): ?>

        <div class="site-info">


            <div class="container">

                <div class="row">

                    <div class="col-sm-6 col-xs-12 copyright">
                        <?php

                        if (isset($copyright_text)) {
                            printf(esc_html($copyright_text));
                        } else {
                            printf(esc_html('All right reserved &copy; 2016'));
                        }

                        ?>
                    </div>

                    <div class="col-sm-6 col-xs-12 tx-credit text-right">

                        <?php echo esc_html__('Designed & Developed by ', 'gamez'); ?><a
                            href="<?php echo esc_url(__('https://themexpert.com/', 'gamez')); ?>"><?php printf(esc_html__('%s', 'gamez'), 'ThemeXpert'); ?></a>

                    </div>


                </div>
            </div>


        </div><!-- .site-info -->
    <?php else: ?>

        <div class="site-info">


            <div class="container copyright">

                <?php

                if (isset($copyright_text)) {
                    printf(esc_html($copyright_text));
                } else {
                    printf(esc_html('All right reserved &copy; 2016'));
                }

                ?>

            </div>


        </div><!-- .site-info -->
    <?php endif; ?>

</footer><!-- #colophon -->
</div><!-- #page -->

</div>  <!-- tx-site-content-inner -->
</div>  <!-- tx-site-content -->
</div>  <!-- tx-site-pusher -->
</div>  <!-- tx-site-container -->

<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs affix">
    <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
</div>

<?php wp_footer(); ?>

</body>
</html>
