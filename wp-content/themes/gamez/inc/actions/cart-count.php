<?php
/*
* ajax cart option in the header section
*/

/**
 * Add Cart icon and count to header if WooCommerce is active
 */

function gamez_cart_count() {

    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        $count = WC()->cart->cart_contents_count;
        ?>


        <div class="cart-contents">
            <div class="cart-contents-wrapper">
                <span class="product-count"> <i> <?php echo $count > 0 ? $count : 0; ?> </i>  </span>
            </div>
        </div>
        <?php
    }

}
add_action( 'gamez_header_cart', 'gamez_cart_count' );



/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function gamez_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?>

    <div class="cart-contents">
        <div class="cart-contents-wrapper">
            <span class="product-count"><i><?php echo $count > 0 ? $count : 0;  ?></i></span>
        </div>

    </div>

    <?php

    $fragments['div.cart-contents'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'gamez_header_add_to_cart_fragment' );

