<?php
/**
 * Remove woocommerce default hooks
 */
add_action('init', 'gamez_remove_woocommerce_hooks', 10);
/**
 * woocommerce hooks
 * shop page result count and product ordering
 */
add_action( 'gamez_before_shop_loop', 'woocommerce_result_count', 20 ); // add cart count form shop page
add_action( 'gamez_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); // add ordering option from shop page
/**
 * Display Custom Fields in the product general tab in admin panel
 */
add_action( 'woocommerce_product_options_general_product_data', 'gamez_add_custom_general_fields' );
/**
 * Save Product Custom Fields data
 */
add_action( 'woocommerce_process_product_meta', 'gamez_add_custom_general_fields_save' );
/**
 * Show custom meta value for woocommerce product
 */
add_action ('gamez_woo_meta_value','gamez_woo_custom_meta_value');
/**
 * Single product navigation in the shop page
 */
add_action( 'gamez_single_product_navigation', 'gamez_next_prev_products_links', 60 );
/**
 * Shop page product hooks
 */
add_action( 'gamez_shop_loop_item_meta', 'woocommerce_template_loop_product_title', 5 );// product title hook
add_action( 'gamez_shop_loop_item_meta', 'woocommerce_template_loop_price', 10 ); // product price hook
// product cart button
add_action( 'gamez-cart', 'woocommerce_template_loop_add_to_cart', 5 );
// game sale button
add_action( 'gamez-product-sale', 'woocommerce_show_product_loop_sale_flash', 10 );
