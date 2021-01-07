<?php

function style_framework_options( $options ) {

    $options[]    = array(
        'name'      => 'tx_style',
        'title'     => esc_html__('Theme Style', 'gamez'),
        'icon'      => 'fa fa-paint-brush',
        'fields'    => array(

            /**
             * Custom Style
             */

            array(
                'id'           => 'tx_custom_style',
                'type'         => 'switcher',
                'title'        => esc_html__('Custom Style', 'gamez'),
                'desc'         => esc_html__('Enable custom style.', 'gamez'),
            ),





            /**
             * Header Primary Color
             */

            array(
                'id'      => 'tx_header_color',
                'type'    => 'color_picker',
                'title'   => esc_html__('Header Primary Color', 'gamez'),
                'default' => '#dd3333',
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),


            /**
             * Header Link Color
             */

            array(
                'id'        => 'tx_header_link_color',
                'type'      => 'fieldset',
                'title'     => esc_html__('Header Link Color', 'gamez'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_header_link_reg',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Regular', 'gamez'),
                        'default' => '#eee',
                    ),

                    array(
                        'id'    => 'tx_header_link_hover',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Hover', 'gamez'),
                        'default' => '#fff',
                    ),
                    array(
                        'id'    => 'tx_header_link_active',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Active', 'gamez'),
                        'default' => '#ddd',
                    ),

                ),
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            /**
             * Main Menu Regular, Hover and Active Color
             */

            array(
                'id'        => 'tx_main_menu_color',
                'type'      => 'fieldset',
                'title'     => esc_html__('Menu Color', 'gamez'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_main_menu_reg',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Regular', 'gamez'),
                        'default' => '#eee',
                    ),

                    array(
                        'id'    => 'tx_main_menu_hover',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Hover', 'gamez'),
                        'default' => '#fff',
                    ),
                    array(
                        'id'    => 'tx_main_menu_active',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Active', 'gamez'),
                        'default' => '#ddd',
                    ),

                ),
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            // ------------------------------------

            /**
             * Body Primary Color
             */

            array(
                'id'      => 'tx_body_color',
                'type'    => 'color_picker',
                'title'   => esc_html__('Body Primary Color', 'gamez'),
                'default' => '#dd3333',
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),



            /**
             * Body Link Color
             */

            array(
                'id'        => 'tx_body_link_color',
                'type'      => 'fieldset',
                'title'     => esc_html__('Body Link Color', 'gamez'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_body_link_reg',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Regular', 'gamez'),
                        'default' => '#eee',
                    ),

                    array(
                        'id'    => 'tx_body_link_hover',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Hover', 'gamez'),
                        'default' => '#fff',
                    ),
                    array(
                        'id'    => 'tx_body_link_active',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Active', 'gamez'),
                        'default' => '#ddd',
                    ),

                ),
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            /**
             * Footer Primary Color
             */

            array(
                'id'      => 'tx_footer_color',
                'type'    => 'color_picker',
                'title'   => esc_html__('Footer Primary Color', 'gamez'),
                'default' => '#dd3333',
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),



            /**
             * Footer Link Color
             */

            array(
                'id'        => 'tx_footer_link_color',
                'type'      => 'fieldset',
                'title'     => esc_html__('Footer Link Color', 'gamez'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_footer_link_reg',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Regular', 'gamez'),
                        'default' => '#eee',
                    ),

                    array(
                        'id'    => 'tx_footer_link_hover',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Hover', 'gamez'),
                        'default' => '#fff',
                    ),
                    array(
                        'id'    => 'tx_footer_link_active',
                        'type'  => 'color_picker',
                        'title' => esc_html__('Active', 'gamez'),
                        'default' => '#ddd',
                    ),

                ),
                'dependency'   => array( 'tx_custom_style', '==', 'true' ),
            ),

            /**
             * CSS Editor
             */

//            array(
//                'id'           => 'tx_css_editor',
//                'type'         => 'css_editor',
//                'title'        => esc_html__('Custom CSS', 'gamez')
//            ),

            /**
             * JS Editor
             */

//            array(
//                'id'           => 'tx_js_editor',
//                'type'         => 'js_editor',
//                'title'        => esc_html__('Custom JS', 'gamez')
//            ),

        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'style_framework_options' );