<?php


/**
 * Getting Option values for Header
 */

$header_variation = gamez_get_option('tx_header_select'); //returns text (string)


switch ( $header_variation ) {
	case 'head-v1':
		get_template_part( 'template-parts/header/head', 'v1' );
		break;

	case 'head-v2':
		get_template_part( 'template-parts/header/head', 'v2' );
		break;

	default:
		get_template_part( 'template-parts/header/head', 'v1' );
}