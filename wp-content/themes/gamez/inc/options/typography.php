<?php

function typo_framework_options( $options ) {


    $options[]    = array(
        'name'      => 'tx_typo',
        'title'     => esc_html__('Typography', 'gamez'),
        'icon'      => 'fa fa-text-height',
        'fields'    => array(

            /**
             * Custom Typography
             */

            array(
                'id'           => 'tx_custom_typo',
                'type'         => 'switcher',
                'title'        => esc_html__('Custom Typography', 'gamez'),
                'desc'         => esc_html__('Enable custom typography.', 'gamez'),
            ),

            /**
             * Header Font Select
             */

            array(
                'id'        => 'tx_header_font',
                'type'      => 'typography',
                'title'     => esc_html__('Select Header font and style.', 'gamez'),
                'default'   => array(
                    'family'  => 'Montserrat',
                    'font'    => 'google', // this is helper for output ( google, websafe, custom )
                    'variant' => 'regular'
                ),
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Body Font Select
             */

            array(
                'id'        => 'tx_body_font',
                'type'      => 'typography',
                'title'     => esc_html__('Select Body font and style.', 'gamez'),
                'default'   => array(
                    'family'  => 'Montserrat',
                    'font'    => 'google', // this is helper for output ( google, websafe, custom )
                    'variant' => 'regular'
                ),
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Footer Font Select
             */

            array(
                'id'        => 'tx_footer_font',
                'type'      => 'typography',
                'title'     => esc_html__('Select Footer font and style.', 'gamez'),
                'default'   => array(
                    'family'  => 'Montserrat',
                    'font'    => 'google', // this is helper for output ( google, websafe, custom )
                    'variant' => 'regular'
                ),
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Header 1 Font Size
             */

            array(
                'id'      => 'tx_h1_font_size',
                'type'    => 'number',
                'title'   => esc_html__('H1 - Font Size', 'gamez'),
                'desc'    => esc_html__('Header 1 (h1) font size.', 'gamez'),
                'default' => '48',
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Header 2 Font Size
             */

            array(
                'id'      => 'tx_h2_font_size',
                'type'    => 'number',
                'title'   => esc_html__('H2 - Font Size', 'gamez'),
                'desc'    => esc_html__('Header 2 (h2) font size.', 'gamez'),
                'default' => '42',
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Header 3 Font Size
             */

            array(
                'id'      => 'tx_h3_font_size',
                'type'    => 'number',
                'title'   => esc_html__('H3 - Font Size', 'gamez'),
                'desc'    => esc_html__('Header 3 (h3) font size.', 'gamez'),
                'default' => '36',
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Header 4 Font Size
             */

            array(
                'id'      => 'tx_h4_font_size',
                'type'    => 'number',
                'title'   => esc_html__('H4 - Font Size', 'gamez'),
                'desc'    => esc_html__('Header 4 (h4) font size.', 'gamez'),
                'default' => '28',
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Header 5 Font Size
             */

            array(
                'id'      => 'tx_h5_font_size',
                'type'    => 'number',
                'title'   => esc_html__('H5 - Font Size', 'gamez'),
                'desc'    => esc_html__('Header 5 (h5) font size.', 'gamez'),
                'default' => '24',
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Header 6 Font Size
             */

            array(
                'id'      => 'tx_h6_font_size',
                'type'    => 'number',
                'title'   => esc_html__('H6 - Font Size', 'gamez'),
                'desc'    => esc_html__('Header 6 (h6) font size.', 'gamez'),
                'default' => '20',
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),

            /**
             * Paragraph Font Size
             */

            array(
                'id'      => 'tx_p_font_size',
                'type'    => 'number',
                'title'   => esc_html__('P - Font Size', 'gamez'),
                'desc'    => esc_html__('Paragraph (p) font size.', 'gamez'),
                'default' => '16',
                'dependency'   => array( 'tx_custom_typo', '==', 'true' ),
            ),


        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'typo_framework_options' );