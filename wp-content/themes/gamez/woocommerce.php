<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */
$blog_sidebar_position = gamez_get_option('tx_shop_sidebar_position');


get_header();

?>

<!--show header background image-->
    <div class="product-featured-image" style="background:url('<?php gamez_woo_featured_image_url(); ?>') no-repeat center center;background-size:cover;">
        <div class="product-featured-image-wrapper">
            <?php if(is_shop()): ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="gamez-page-title"><?php woocommerce_page_title(); ?></h1>

                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
<!--end of header background image-->

    <div class="gamez-container-wrapper gamez-container-shop-page">
    <div class="container">
        <div class="row">
            <!--		sidebar left -->
            <?php if ($blog_sidebar_position == 'left'): ?>
                <?php if (!is_single()): ?>
                    <div class="col-md-3">
                        <?php get_sidebar('shop'); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <!--		end of left sidebar-->

            <!--		main content-->
            <?php if ($blog_sidebar_position == 'no' || is_single()): ?>
            <div class="col-md-12 gamez-shop-page <?php echo is_product()? 'product-page' :''; ?> ">
                <?php else: ?>
                <div class="col-md-9 gamez-shop-page gamez-shop-page-with-sidebar <?php echo is_product()? 'product-page' :''; ?> ">
                    <?php endif; ?>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" >
                            <?php if (is_shop()) { ?>
                                <div class="before-shop-loop-wrapper">
                                    <div class="before-shop-loop">
                                        <?php do_action('gamez_before_shop_loop'); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php woocommerce_content(); ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
                <!--				end of the main content-->


                <!--		sidebar right-->
                <?php if ($blog_sidebar_position == 'right'): ?>
                    <?php if (!is_single()): ?>
                        <div class="col-md-3">
                            <?php get_sidebar('shop'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <!--		end of sidebar right-->


            </div>
            <!--		end of /.row-->
        </div>
        <!--	end of /.container-->
    </div>
    <!-- end of /.container-wrapper-->

<?php

get_footer();
