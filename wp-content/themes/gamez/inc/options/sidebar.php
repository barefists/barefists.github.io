<?php

function sidebar_framework_options( $options ) {


    $options[]    = array(
        'name'      => 'tx_sidebar',
        'title'     => esc_html__('Sidebar', 'gamez'),
        'icon'      => 'fa fa-hand-scissors-o',
        'fields'    => array(

            /**
             * Blog Sidebar Position
             */

            array(
                'id'        => 'tx_blog_sidebar_position',
                'type'      => 'select',
                'title'     => esc_html__('Default Blog Sidebar Position', 'gamez'),
                'options'   => array(
                    'left'      => esc_html__('Left', 'gamez'),
                    'right'     => esc_html__('Right', 'gamez'),
                    'no'        => esc_html__('No', 'gamez'),
                ),
                'default'   => 'right',
                'desc'      => esc_html__('Select default Blog sidebar position.', 'gamez'),
            ),

            /**
             * Shop Sidebar Position
             */

            array(
                'id'        => 'tx_shop_sidebar_position',
                'type'      => 'select',
                'title'     => esc_html__('Default Shop Sidebar Position', 'gamez'),
                'options'   => array(
                    'left'      => esc_html__('Left', 'gamez'),
                    'right'     => esc_html__('Right', 'gamez'),
                    'no'        => esc_html__('No', 'gamez'),
                ),
                'default'   => 'left',
                'desc'      => esc_html__('Select default Shop sidebar position.', 'gamez'),
            ),


        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'sidebar_framework_options' );