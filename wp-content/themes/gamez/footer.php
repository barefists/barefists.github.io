<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gamez
 */

/**
 * Getting Option values for Footer
 */

?>

<?php

$footer_option = gamez_get_option( 'tx_footer_column' );
$footer_variation = gamez_get_option( 'tx_footer_variation' );
$footer_tamplate = 'template-parts/footer/footer-'.$footer_variation;

switch ( $footer_option ) {
    case 'col_1':
        get_template_part( $footer_tamplate, 'col_1' );
        break;

    case 'col_2_1':
        get_template_part( $footer_tamplate, 'cols_2_1' );
        break;

    case 'col_2_2':
        get_template_part( $footer_tamplate, 'cols_2_2' );
        break;

    case 'col_2_3':
        get_template_part( $footer_tamplate, 'cols_2_3' );
        break;

    case 'col_3_1':
        get_template_part( $footer_tamplate, 'cols_3_1' );
        break;

    case 'col_3_3':
        get_template_part( $footer_tamplate, 'cols_3_3' );
        break;

    case 'col_3_2':
        get_template_part( $footer_tamplate, 'cols_3_2' );
        break;

    case 'col_4':
        get_template_part( $footer_tamplate, 'cols_4' );
        break;

    default:
        get_template_part( $footer_tamplate, 'cols_3_2' );
}
