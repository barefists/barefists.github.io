<?php

/**
 * Codestar Framework Settings
 */

function gamez_option_settings( $settings ){
    $settings = array();
    $settings           = array(
	  'menu_title'      => esc_html('Gamez'),
	  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
	  'menu_slug'       => 'gamez-options',
	  'ajax_save'       => true,
	  'show_reset_all'  => false,
	  'framework_title' => wp_kses('Gamez Options <small>by ThemeXpert</small>', array(
		  'small'	=> array()
	  )),
	);

    return $settings;
}

add_filter('cs_framework_settings', 'gamez_option_settings');

