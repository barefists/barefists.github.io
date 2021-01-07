<?php

function layout_framework_options( $options ) {


    $options[]    = array(
        'name'      => 'tx_layout',
        'title'     => esc_html__('Layout', 'gamez'),
        'icon'      => 'fa fa-tasks',
        'fields'    => array(


            /**
             * Blog Sidebar Position
             */

            array(
                'id'        => 'tx_shop_layout',
                'type'      => 'select',
                'title'     => esc_html__('Default Shop column', 'gamez'),
                'options'   => array(
                    '1'     => '1',
                    '2'     => '2',
                    '3'     => '3',
                    '4'     => '4',
                ),
                'default'   => '3',
                'desc'      => esc_html__('Select default shop layout.', 'gamez'),
            ),

            /**
             * 404 page Background
             */
            array(
                'id'    => 'tx_404_bg',
                'type'  => 'image',
                'title' => esc_html__('404 Page Background', 'gamez'),
                'desc'  => esc_html__('Background image for 404 page.', 'gamez'),
            ),


        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'layout_framework_options' );