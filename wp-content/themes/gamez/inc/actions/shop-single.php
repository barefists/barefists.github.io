<?php

//single product sale
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'gamez_single_product_onsale', 'woocommerce_show_product_sale_flash', 10 );
add_action('gamez_custom_sale', 'gamez_custom_show_sale');
add_action( 'gamez_single_product_summery', 'woocommerce_template_single_title', 5 );
//single product rating
add_action( 'gamez_single_product_rating', 'woocommerce_template_single_rating', 10 );
// single product cart option
add_action( 'gamez_single_product_price', 'woocommerce_template_single_price', 10 );
// plus or minus section for price
add_action('woocommerce_before_add_to_cart_button', 'gamez_before_add_to_cart_button');
add_action( 'gamez_single_product_price', 'woocommerce_template_single_add_to_cart', 15 );
add_action('woocommerce_after_add_to_cart_button', 'gamez_after_add_to_cart_button');
// single product meta
add_action( 'gamez_single_product_meta', 'woocommerce_template_single_meta', 40 );
//single product excerpt
add_action( 'gamez_single_product_excerpt', 'woocommerce_template_single_excerpt', 20 );






//add_action( 'gamez_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
//add_action( 'gamez_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
//add_action( 'gamez_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
//add_action( 'gamez_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
//add_action( 'gamez_single_variation', 'woocommerce_single_variation', 10 );
//add_action( 'gamez_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );



if (!function_exists('gamez_before_add_to_cart_button')) {
    function gamez_before_add_to_cart_button() {
        echo '<div class="single-product-buttons">';
        echo '<div class="single_add_to_cart_button_wrap">';
    }
}

if (!function_exists('gamez_after_add_to_cart_button')) {
    function gamez_after_add_to_cart_button() {
        echo '</div>';
        echo '</div>';
    }
}

