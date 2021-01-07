<?php


function gamez_custom_style() {


    if(gamez_get_option('tx_custom_style')):

        $header_color = gamez_get_option('tx_header_color');

        $header_link_colors = gamez_get_option('tx_header_link_color');
        $header_link_color_reg = $header_link_colors['tx_header_link_reg'];
        $header_link_color_hover = $header_link_colors['tx_header_link_hover'];
        $header_link_color_active = $header_link_colors['tx_header_link_active'];

        $main_menu_colors = gamez_get_option('tx_main_menu_color');
        $main_menu_color_reg = $main_menu_colors['tx_main_menu_reg'];
        $main_menu_color_hover = $main_menu_colors['tx_main_menu_hover'];
        $main_menu_color_active = $main_menu_colors['tx_main_menu_active'];

        $body_color = gamez_get_option('tx_body_color');
        $body_link_colors = gamez_get_option('tx_body_link_color');
        $body_link_color_reg = $body_link_colors['tx_body_link_reg'];
        $body_link_color_hover = $body_link_colors['tx_body_link_hover'];
        $body_link_color_active = $body_link_colors['tx_body_link_active'];

        $footer_color = gamez_get_option('tx_footer_color');
        $footer_link_colors = gamez_get_option('tx_footer_link_color');
        $footer_link_color_reg = $footer_link_colors['tx_footer_link_reg'];
        $footer_link_color_hover = $footer_link_colors['tx_footer_link_hover'];
        $footer_link_color_active = $footer_link_colors['tx_footer_link_active'];

        ?>

        <style>
            header#masthead {
                color: <?php echo esc_html($header_color); ?> !important;
            }
            header#masthead a{
                color: <?php echo esc_html($header_link_color_reg); ?> !important;
            }
            header#masthead a:hover{
                color: <?php echo esc_html($header_link_color_hover); ?> !important;
            }
            header#masthead a:active{
                color: <?php echo esc_html($header_link_color_active); ?> !important;
            }

            header #site-navigation li a {
                color: <?php echo esc_html($main_menu_color_reg); ?> !important;
            }
            header #site-navigation li a:hover {
                color: <?php echo esc_html($main_menu_color_hover); ?> !important;
            }
            header #site-navigation li a:active {
                color: <?php echo esc_html($main_menu_color_active); ?> !important;
            }


            .site-content {
                color: <?php echo esc_html($body_color); ?> !important;
            }
            .site-content a {
                color: <?php echo esc_html($body_link_color_reg); ?> !important;
            }
            .site-content a:hover {
                color: <?php echo esc_html($body_link_color_hover); ?> !important;
            }
            .site-content a:active {
                color: <?php echo esc_html($body_link_color_active); ?> !important;
            }



            .site-footer * {
                color: <?php echo esc_html($footer_color); ?> !important;
            }
            .site-footer a {
                color: <?php echo esc_html($footer_link_color_reg); ?> !important;
            }
            .site-footer a:hover {
                color: <?php echo esc_html($footer_link_color_hover); ?> !important;
            }

            .site-footer a:active {
                color: <?php echo esc_html($footer_link_color_active); ?> !important;
            }

        </style>

    <?php endif;

    if(gamez_get_option( 'tx_custom_typo' )):

        $header_typo = gamez_get_option('tx_header_font');
        $body_typo = gamez_get_option('tx_body_font');
        $footer_typo = gamez_get_option('tx_footer_font');

        $h1_font_size = gamez_get_option('tx_h1_font_size');
        $h2_font_size = gamez_get_option('tx_h2_font_size');
        $h3_font_size = gamez_get_option('tx_h3_font_size');
        $h4_font_size = gamez_get_option('tx_h4_font_size');
        $h5_font_size = gamez_get_option('tx_h5_font_size');
        $h6_font_size = gamez_get_option('tx_h6_font_size');
        $p_font_size = gamez_get_option('tx_p_font_size');

        ?>

        <style>

            header#masthead *:not(i), #menu-1 *:not(i) {
                font-family: '<?php echo esc_html($header_typo['family']); ?>' !important;
                font-weight: <?php echo esc_html($header_typo['variant']); ?> !important;
            }

            .site-content *:not(i){
                font-family: '<?php echo esc_html($body_typo['family']); ?>' !important;
                font-weight: <?php echo esc_html($body_typo['variant']); ?> !important;
            }

            footer.site-footer *:not(i), footer.site-footer .widget-title{
                font-family: '<?php echo esc_html($footer_typo['family']); ?>' !important;
                font-weight: <?php echo esc_html($footer_typo['variant']); ?> !important;
            }

            h1 {
                font-size: <?php echo esc_html($h1_font_size); ?>px;
            }
            h2 {
                font-size: <?php echo esc_html($h2_font_size); ?>px;
            }
            h3 {
                font-size: <?php echo esc_html($h3_font_size); ?>px;
            }
            h4 {
                font-size: <?php echo esc_html($h4_font_size); ?>px;
            }
            h5 {
                font-size: <?php echo esc_html($h5_font_size); ?>px;
            }
            h6 {
                font-size: <?php echo esc_html($h6_font_size); ?>px;
            }
            p {
                font-size: <?php echo esc_html($p_font_size); ?>px;
            }

        </style>

    <?php endif;

    if(gamez_get_option('tx_custom_footer_bg')):
        $footer_bg_color = gamez_get_option('tx_custom_footer_bg_color');
        $footer_bottom_bg = gamez_get_option('tx_custom_footer_bottom_bg_color');
        $footer_bg_img = gamez_get_option('tx_custom_footer_bg_img');
        $footer_bg_img_url = wp_get_attachment_image_url( $footer_bg_img, 'full' );
        ?>

        <style>
            footer.site-footer {
                background-image: url(<?php echo esc_url($footer_bg_img_url); ?>);
            }

            footer.site-footer .footer-main {
                background-color: <?php echo esc_html($footer_bg_color); ?>;
            }
            footer.site-footer .site-info {
                background-color: <?php echo esc_html($footer_bottom_bg); ?>;
            }

        </style>

        <?php
    endif;

    //$css_editor = gamez_get_option('tx_css_editor'); ?>

    <style>
        <?php //echo esc_html($css_editor); ?>
    </style>
    <?php
}

function gamez_custom_js() {
    //$js_editor = gamez_get_option('tx_js_editor');
    $nicescroll = gamez_get_option('tx_nicescroll');
    ?>

    <script>
        <?php //echo esc_html($js_editor); ?>
    </script>

    <?php if($nicescroll): ?>
        <script>
            jQuery().ready(function ($) {
                $("body").niceScroll({
                    cursorcolor: "#ff1744", // change cursor color in hex
                    cursoropacitymin: 0, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
                    cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
                    cursorwidth: "5px", // cursor width in pixel (you can also write "5px")
                    cursorborder: "1px solid #ff1744", // css definition for cursor border
                    cursorborderradius: "3px", // border radius in pixel for cursor
                    scrollspeed: 50, // scrolling speed
                    mousescrollstep: 50, // scrolling speed with mouse wheel (pixel)
                    touchbehavior: false, // enable cursor-drag scrolling like touch devices in desktop computer
                    hwacceleration: true // use hardware accelerated scroll when supported
                });
            });
        </script>
    <?php endif; ?>

<?php }

add_action( 'wp_head', 'gamez_custom_style' );
add_action( 'wp_footer', 'gamez_custom_js' );
