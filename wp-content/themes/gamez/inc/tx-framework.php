<?php

define( 'CS_ACTIVE_FRAMEWORK',  true  );
define( 'CS_ACTIVE_METABOX',    true );
define( 'CS_ACTIVE_SHORTCODE',  false );
define( 'CS_ACTIVE_CUSTOMIZE',  false );

include get_template_directory() . '/inc/options/settings.php';
include get_template_directory() . '/inc/options/general.php';
include get_template_directory() . '/inc/options/header.php';
include get_template_directory() . '/inc/options/style.php';
include get_template_directory() . '/inc/options/typography.php';
include get_template_directory() . '/inc/options/layout.php';
include get_template_directory() . '/inc/options/sidebar.php';
include get_template_directory() . '/inc/options/footer.php';


