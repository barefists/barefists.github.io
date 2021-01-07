<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>
<div class="row">
	<div class="container">
		<div class="row">
			<div class="col-md-12 product-information">
				<div class="product-title col-md-4">
					<?php do_action('gamez_single_product_summery'); ?>
					<p class="product-rating">
						<?php do_action('gamez_single_product_rating'); ?>
					</p>
					<div class="product-onsale">
						<?php //do_action('gamez_custom_sale') ?>
						<?php gamez_single_page_show_sale(); ?>
					</div>

				</div>
				<div class="product-price col-md-4 text-center">
					<?php do_action('gamez_single_product_price'); ?>
				</div>
				<div class="product-category col-md-4">
					<?php do_action('gamez_single_product_navigation'); ?>
					<?php do_action('gamez_single_product_meta'); ?>
				</div>

			</div>
	<!--		end of /.col-md-3-->
			<div class="col-md-12 product-slider">

				<!--	materialilze carousel markup-->
				<div class="carousel">
					<?php
					$attachment_ids = $product->get_gallery_attachment_ids();
					if($attachment_ids){
						foreach ( $attachment_ids as $attachment_id ) {
							$image_link = wp_get_attachment_url( $attachment_id );
							?>
							<div class="carousel-item">
								<img src="<?php echo $image_link; ?>" alt="">
							</div>
							<?php
						}
					}
					?>
				</div>
				<!--	end of the materaialize carousel markup -->
			</div>
	<!--		end of /.col-md-9 -->
		</div>
	<!--	product excerpt-->
		<div class="row product-short-info">
			<div class="col-md-12">
				<div class="product-short-info-wrapper">
					<?php do_action('gamez_single_product_excerpt'); ?>
				</div>

			</div>
		</div>
	</div>
</div>

