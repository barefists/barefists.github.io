<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gamez_widgets_init() {

    // default blog sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'gamez' ),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__('Default sidebar for Blog', 'gamez'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // default shop sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'gamez' ),
        'id'            => 'shop-sidebar',
        'description'   => esc_html__('Default sidebar for Shop', 'gamez'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'gamez' ),
        'id'            => 'footer-1',
        'description'   => esc_html__('First Footer Widget Area', 'gamez'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'gamez' ),
        'id'            => 'footer-2',
        'description'   => esc_html__('Second Footer Widget Area', 'gamez'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'gamez' ),
        'id'            => 'footer-3',
        'description'   => esc_html__('Third Footer Widget Area', 'gamez'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'gamez' ),
        'id'            => 'footer-4',
        'description'   => esc_html__('Fourth Footer Widget Area', 'gamez'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Bottom', 'gamez' ),
        'id'            => 'footer-bottom',
        'description'   => esc_html__('Footer Bottom Widget Area', 'gamez'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );


}
add_action( 'widgets_init', 'gamez_widgets_init' );