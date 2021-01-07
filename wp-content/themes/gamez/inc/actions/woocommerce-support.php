<?php

add_action( 'after_setup_theme', 'mebel_woocommerce_support' );
function mebel_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
