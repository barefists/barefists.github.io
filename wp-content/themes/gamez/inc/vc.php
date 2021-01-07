<?php
/**
 *
 * Visual Composer actions & filters
 *
 */


add_action( 'vc_before_init', 'gamez_vc_set_theme' );

function gamez_vc_set_theme() {

    vc_set_as_theme();
    // Allow post by default
    $list = array(
        'page',
    );
    vc_set_default_editor_post_types( $list );

}