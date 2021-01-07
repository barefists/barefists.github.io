<?php

function header_framework_options( $options ) {

    $options[]    = array(
        'name'      => 'tx_header',
        'title'     => esc_html__('Header Settings', 'gamez'),
        'icon'      => 'fa fa-heart',
        'fields'    => array(

            /**
             * Header Variation Select
             */

            array(
                'id'           => 'tx_header_select',
                'type'         => 'image_select',
                'title'        => esc_html__('Select Header Variation', 'gamez'),
                'options'      => array(
                    'head-v1'    => get_template_directory_uri().'/inc/options/images/headv1.jpg',
                    'head-v2'    => get_template_directory_uri().'/inc/options/images/headv2.jpg',
                ),
                'default'      => 'header-1'
            ),




            /**
             * Sticky Menu
             */

            array(
                'id'           => 'tx_sticky_menu',
                'type'         => 'switcher',
                'title'        => esc_html__('Sticky Menu', 'gamez'),
                'desc'         => esc_html__('Enable Sticky Menu.', 'gamez'),
            ),

            /**
             * Review page Background
             */
            array(
                'id'    => 'tx_review_header_bg',
                'type'  => 'image',
                'title' => esc_html__('Review Header Background', 'gamez'),
                'desc'  => esc_html__('Header background image for review list page.', 'gamez'),
            ),

            /**
             * Video Gallery page Background
             */
            array(
                'id'    => 'tx_video_header_bg',
                'type'  => 'image',
                'title' => esc_html__('Video Gallery Header Background', 'gamez'),
                'desc'  => esc_html__('Header background image for video gallery list page.', 'gamez'),
            ),

            /**
             * Search page Background
             */
            array(
                'id'    => 'tx_search_header_bg',
                'type'  => 'image',
                'title' => esc_html__('Search Page Header Background', 'gamez'),
                'desc'  => esc_html__('Header background image for search page.', 'gamez'),
            ),

            /**
             * Buddypress Background
             */
            array(
                'id'    => 'tx_buddypress_header_bg',
                'type'  => 'image',
                'title' => esc_html__('Buddypress Header Background', 'gamez'),
                'desc'  => esc_html__('Header background image for buddypress activity page.', 'gamez'),
            ),

        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'header_framework_options' );