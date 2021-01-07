<?php

function general_framework_options( $options ) {

    $options      = array(); // remove old options

    $options[]    = array(
        'name'      => 'tx_general',
        'title'     => esc_html__('General Settings', 'gamez'),
        'icon'      => 'fa fa-cogs',
        'fields'    => array(

            /**
             * Default Color
             */

            array(
                'id'           => 'tx_theme_style',
                'type'         => 'select',
                'title'        => esc_html__('Default Theme Style', 'gamez'),
                'options'   => array(
                    'blue'     => esc_html__('Blue', 'gamez'),
                    'red'   => esc_html__('Red', 'gamez'),
                    'green'   => esc_html__('Green', 'gamez'),
                    'orange'   => esc_html__('Orange', 'gamez'),
                    'lilac'   => esc_html__('Lilac', 'gamez'),

                ),
                'default'      => 'blue'
            ),

            /**
             * Logo Upload
             */

            array(
                'id'    => 'tx_logo',
                'type'  => 'image',
                'title' => esc_html__('Logo', 'gamez'),
                'desc'  => esc_html__('Upload a site logo for your branding.', 'gamez'),
            ),


            /**
             * Enable Nicescroll
             */

            array(
                'id'           => 'tx_nicescroll',
                'type'         => 'switcher',
                'title'        => esc_html__('Enable Nicescroll?', 'gamez'),
                'default'      => true
            ),
            

            /**
             * Enable Breadcrumb
             */

            array(
                'id'           => 'tx_breadcrumb',
                'type'         => 'switcher',
                'title'        => esc_html__('Enable Breadcrumb?', 'gamez'),
                'default'      => true
            ),


            /**
             * Social Icon Link
             */

            array(
                'id'           => 'tx_social_icons',
                'type'         => 'switcher',
                'title'        => esc_html__('Social Icons', 'gamez'),
                'desc'         => esc_html__('Enable social icons.', 'gamez'),
            ),

            array(
                'id'        => 'tx_top_social',
                'type'      => 'fieldset',
                'title'     => esc_html__('Social Link', 'gamez'),
                'fields'    => array(

                    array(
                        'id'    => 'tx_top_social_fb',
                        'type'  => 'text',
                        'title' => esc_html__('Facebook', 'gamez'),
                        'desc'  => esc_html__('Enter your facebook link.', 'gamez'),
                    ),

                    array(
                        'id'    => 'tx_top_social_tw',
                        'type'  => 'text',
                        'title' => esc_html__('Twitter', 'gamez'),
                        'desc'  => esc_html__('Enter your twitter link.', 'gamez')
                    ),
                    array(
                        'id'    => 'tx_top_social_yt',
                        'type'  => 'text',
                        'title' => esc_html__('Youtube', 'gamez'),
                        'desc'  => esc_html__('Enter your youtube link.', 'gamez')
                    ),
                    array(
                        'id'    => 'tx_top_social_ln',
                        'type'  => 'text',
                        'title' => esc_html__('LinkedIn', 'gamez'),
                        'desc'  => esc_html__('Enter your linkedin link.', 'gamez')
                    ),

                    array(
                        'id'    => 'tx_top_social_gp',
                        'type'  => 'text',
                        'title' => esc_html__('Google Plus', 'gamez'),
                        'desc'  => esc_html__('Enter your google plus link.', 'gamez')
                    ),

                    array(
                        'id'    => 'tx_top_social_vm',
                        'type'  => 'text',
                        'title' => esc_html__('Vimeo', 'gamez'),
                        'desc'  => esc_html__('Enter your vimeo link.', 'gamez')
                    ),

                    array(
                        'id'    => 'tx_top_social_tch',
                        'type'  => 'text',
                        'title' => esc_html__('Twitch', 'gamez'),
                        'desc'  => esc_html__('Enter your twitch link.', 'gamez')
                    ),


                ),
                'dependency'   => array( 'tx_social_icons', '==', 'true' ),
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

    return $options;

}
add_filter( 'cs_framework_options', 'general_framework_options' );