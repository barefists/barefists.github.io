<?php
/**
 * Custom Meta Box Product header image
 */
add_filter( 'cs_metabox_options',  'gamez_product_metabox');

/**
 * Product per page in shop page
 */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );

/**
 * Replace the sale text with icon
 */
add_filter( 'woocommerce_sale_flash', 'gamez_replace_sale_text' );

/*
* change add to cart text
*/
add_filter( 'woocommerce_product_add_to_cart_text' , 'gamez_product_add_to_cart_text' );
