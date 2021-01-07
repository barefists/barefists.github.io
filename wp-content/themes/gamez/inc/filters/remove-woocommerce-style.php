<?php
/**
 * Remove woocommerce default layout styling
 */

// Remove each style one by one

add_filter( 'woocommerce_enqueue_styles', 'gamez_dequeue_styles' );

function gamez_dequeue_styles( $enqueue_styles ) {
    if(is_shop() || is_archive()){
        unset( $enqueue_styles['woocommerce-layout'] );		// Remove the woocommerce layout
    }
    return $enqueue_styles;
}

