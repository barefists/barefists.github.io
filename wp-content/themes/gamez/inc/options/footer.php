<?php

function footer_framework_options( $options ) {


    $options[]    = array(
        'name'      => 'tx_footer',
        'title'     => esc_html__('Footer Options', 'gamez'),
        'icon'      => 'fa fa-anchor',
        'fields'    => array(

            /**
             * Footer Column Select
             */

            array(
                'id'        => 'tx_footer_column',
                'type'      => 'image_select',
                'title'     => esc_html__('Footer Column', 'gamez'),
                'desc'      => esc_html__('Select footer column number.', 'gamez'),
                'options'   => array(
                    'col_1'   => get_template_directory_uri() . '/inc/options/images/1col.jpg',
                    'col_2_1' => get_template_directory_uri() . '/inc/options/images/2cols-3.jpg',
                    'col_2_2' => get_template_directory_uri() . '/inc/options/images/2cols.jpg',
                    'col_2_3' => get_template_directory_uri() . '/inc/options/images/2cols-2.jpg',
                    'col_3_1' => get_template_directory_uri() . '/inc/options/images/3cols.jpg',
                    'col_3_3' => get_template_directory_uri() . '/inc/options/images/3cols-3.jpg',
                    'col_3_2' => get_template_directory_uri() . '/inc/options/images/3cols-2.jpg',
                    'col_4'   => get_template_directory_uri() . '/inc/options/images/4cols.jpg',
                ),
                'default'   => 'col_3_2',

            ),

            /**
             * Footer Variation
             */

            array(
                'id'        => 'tx_footer_variation',
                'type'      => 'select',
                'title'     => esc_html__('Footer Variation', 'gamez'),
                'desc'      => esc_html__('Select footer variation.', 'gamez'),
                'options'   => array(
                    'v1'   => esc_html__('Variation 1', 'gamez'),
                    'v2' => esc_html__('Variation 2', 'gamez'),
                ),
                'default'   => 'v2',

            ),

            /**
             * Footer Logo
             */

            array(
                'id'    => 'tx_footer_logo',
                'type'  => 'image',
                'title' => esc_html__('Footer Logo', 'gamez'),
                'desc'  => esc_html__('Upload a logo for footer.', 'gamez'),
            ),

            /**
             * Custom Footer Background
             */

            array(
                'id'           => 'tx_custom_footer_bg',
                'type'         => 'switcher',
                'title'        => esc_html__('Custom Background', 'gamez'),
                'desc'         => esc_html__('Enable custom footer background.', 'gamez'),
            ),


            /**
             * Footer Background Color
             */

            array(
                'id'      => 'tx_custom_footer_bg_color',
                'type'    => 'color_picker',
                'title'   => esc_html__('Footer Background Color', 'gamez'),
                'rgba'    => true,
                'dependency'   => array( 'tx_custom_footer_bg', '==', 'true' ),
            ),

            array(
                'id'      => 'tx_custom_footer_bottom_bg_color',
                'type'    => 'color_picker',
                'title'   => esc_html__('Footer Bottom Background Color', 'gamez'),
                'rgba'    => true,
                'dependency'   => array( 'tx_custom_footer_bg', '==', 'true' ),
            ),

            /**
             * Background Image
             */

            array(
                'id'    => 'tx_custom_footer_bg_img',
                'type'  => 'image',
                'title' => esc_html__('Background Image', 'gamez'),
                'desc'  => esc_html__('Upload a background image for Footer.', 'gamez'),
                'dependency'   => array( 'tx_custom_footer_bg', '==', 'true' ),
            ),

            /**
             * Copyright Text
             */

            array(
                'id'    => 'tx_footer_copy',
                'type'  => 'textarea',
                'title' => esc_html__('Copyright Text', 'gamez'),
                'desc'  => esc_html__('Write footer copyright text here.', 'gamez'),

            ),


            /**
             * ThemeXpert Credit
             */

            array(
                'id'           => 'tx_themexpert_credit',
                'type'         => 'switcher',
                'title'        => esc_html__('ThemeXpert Credit', 'gamez'),
                'default'      => true
            ),

        )
    );

    // ------------------------------
    // Backup                       -
    // ------------------------------
    $options[]   = array(
        'name'     => 'backup_section',
        'title'    => esc_html__('Backup', 'gamez'),
        'icon'     => 'fa fa-shield',
        'fields'   => array(

            array(
                'type'    => 'notice',
                'class'   => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'gamez'),
            ),

            array(
                'type'    => 'backup',
            ),

        )
    );

    return $options;

}
add_filter( 'cs_framework_options', 'footer_framework_options' );