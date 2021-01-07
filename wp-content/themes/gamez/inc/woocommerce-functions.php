<?php
/**
 * woocommerce default hook remove
 */
if(! function_exists('gamez_remove_woocommerce_hooks')){
    function gamez_remove_woocommerce_hooks(){
        // remove cart count form shop page
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
        // remove ordering option from shop pag
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
        // remove shop page product default title
        remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
        // remove default price hook in shop page
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        // remove default cart hook
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        // remove sale flash
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

    }
}

/**
 * Display Custom Fields in the product general tab in admin panel
 */
if(! function_exists('gamez_add_custom_general_fields')){
    function gamez_add_custom_general_fields(){
        global $woocommerce, $post;

        echo '<div class="options_group">';

        // Text Field
        woocommerce_wp_text_input(
            array(
                'id'          => '_text_field',
                'label'       => esc_html__( 'Games Name', 'gamez' ),
                'placeholder' => esc_attr__( 'Character\'s Games Name', 'gamez' ),
                'desc_tip'    => 'true',
                'description' => esc_html__( 'Where this product user', 'gamez' )
            )
        );
        ?>
        <p class="form-field custom_field_type">
            <label for="custom_field_type"><?php echo esc_html__( 'Custom Field Type', 'gamez' ); ?></label>
            <span class="wrap">
                <?php $custom_field_type = get_post_meta( $post->ID, '_custom_field_type', true ); ?>
                <input placeholder="<?php esc_attr_e( 'Field One', 'gamez' ); ?>" type="number" name="_field_one" value="<?php echo esc_attr($custom_field_type[0]); ?>" step="any" min="0" style="width: 80px;" />
                <input placeholder="<?php esc_attr_e( 'Field Two', 'gamez' ); ?>" type="number" name="_field_two" value="<?php echo esc_attr($custom_field_type[1]); ?>" step="any" min="0" style="width: 80px;" />
            </span>
            <span class="description"><?php esc_html_e( 'Place your own description here!', 'gamez' ); ?></span>
        </p>
        <?php

        echo '</div>';


    }
}

/**
 * Save Product Custom Fields data
 * form gamez_add_custom_general_fields() function
 */
if(! function_exists('gamez_add_custom_general_fields_save')){
    function gamez_add_custom_general_fields_save($post_id){
        global $woocommerce, $post;
        // Text Field
        $woocommerce_text_field = $_POST['_text_field'];
        if( !empty( $woocommerce_text_field ) ){
            update_post_meta( $post_id, '_text_field', esc_attr( $woocommerce_text_field ) );
        }

        $custom_field_type =  array( esc_attr( $_POST['_field_one'] ), esc_attr( $_POST['_field_two'] ) );
        update_post_meta( $post_id, '_custom_field_type', $custom_field_type );

    }
}

/**
 * Product header image custom meta box
 */
if(! function_exists('gamez_product_metabox')){
    function gamez_product_metabox( $options ){
        $options[]    = array(
            'id'        => '_tx_product_meta',
            'title'     => esc_html__('Product Meta', 'gamez'),
            'post_type' => 'product',
            'context'   => 'side',
            'priority'  => 'default',
            'sections'  => array(

                array(
                    'name'   => '_tx_product_header',
                    'title' => esc_html__('Product Header', 'gamez'),
                    'icon'  => 'fa fa-icon-bookmark-empty',
                    'fields' => array(

                        array(
                            'id'            => '_tx_product_header_image',
                            'type'          => 'image',
                            'title'         => esc_html__('Header Image', 'gamez'),
                            'desc'       => esc_html__( 'Add Header Background Image', 'gamez' ),
                        )

                    ),
                ),

            ),
        );

        return $options;

    }
}

/**
 * show product and single product header image
 */
if(! function_exists('gamez_woo_featured_image_url')){
    function gamez_woo_featured_image_url(){

        // shop page featured image
        // return image all info within array
        // =====================================
        $shop_featured_image_src = wp_get_attachment_image_src( get_post_thumbnail_id(get_option( 'woocommerce_shop_page_id' )), 'thumbnail_size' );
        $shop_featured_image_url = $shop_featured_image_src[0];
        // shop page local image
        // if no image provided in the featured image
        // ==========================================
        $shop_local_image = get_stylesheet_directory_uri() . '/dist/images/shop-featured.jpg'; // local image link

        // Product header image
        //======================
        $img_id = gamez_get_post_id(); // get the post id from the function
        $product_header_image = get_post_meta($img_id,'_tx_product_meta', true);
        $product_header_image = gamez_array_get($product_header_image,'_tx_product_header_image');
        $product_header_image = wp_get_attachment_image_src($product_header_image, 'full');
        $product_header_image = $product_header_image[0];

        //$post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full' ); // get thumbnail featured image

        if(is_shop()){
            if(!empty($shop_featured_image_url)){
                echo $shop_featured_image_url;
            }else{
                echo $shop_local_image;
            }
        }elseif(is_product()){
            if(!empty($product_header_image)){
                echo $product_header_image;
            }else{
                echo $shop_local_image;
            }
        }else{
            echo $shop_local_image;
        }
    }
}

/**
 * show woocommerce custom meta box value
 */
 if(! function_exists('gamez_woo_custom_meta_value')){
     function gamez_woo_custom_meta_value(){
         echo get_post_meta( get_the_ID(), '_text_field', true );
     }
 }

/**
 * Single product navigation action in the shop page
 */
if(! function_exists('gamez_next_prev_products_links')){
    function gamez_next_prev_products_links() { ?>
        <div class="single-product-navigation">
            <?php previous_post_link( '%link', '<span class="fa fa-angle-left product-previous"></span>' ); ?>
            <?php next_post_link( '%link', '<span class="fa fa-angle-right product-next"></span>' ); ?>
        </div>
    <?php }
}

/**
 * Replace the sale text with icon
 */
if(! function_exists('gamez_replace_sale_text')){
    function gamez_replace_sale_text( $html ) {
        return str_replace( esc_html__( 'Sale!', 'gamez' ), '<i class="fa fa-star"></i>', $html );
    }
}


/**
 * custom_woocommerce_template_loop_add_to_cart
 */
if(! function_exists('gamez_product_add_to_cart_text')){
    function gamez_product_add_to_cart_text() {
        global $product;
        $product_type = $product->product_type;
        $addToCartIcon ="<i class='fa fa-shopping-cart fa-fw'></i> <span>|</span><span class='atc-text'>".esc_html__('Add to cart', 'gamez')."</span>";

        switch ( $product_type ) {
            case 'external':
                return esc_html__( 'Buy product', 'gamez' );
                break;
            case 'grouped':
                return esc_html__( 'View products', 'gamez' );
                break;
            case 'simple':
                return $addToCartIcon;
                break;
            case 'variable':
                return esc_html__( 'Select options', 'gamez' );
                break;
            default:
                return esc_html__( 'Read more', 'gamez' );
        }
    }
}


/**
 * Add custom class on sale text
 */
if( ! function_exists('gamez_custom_show_sale')){
    function gamez_custom_show_sale(){
        global $post, $product;
        if ( $product->is_on_sale() ) {
            echo apply_filters('woocommerce_sale_flash', '<span class="gamez-onsale">' . esc_html__('Sale!', 'gamez') . '</span>', $post, $product);
        }
    }
}

/**
 * Show sale text on single product page
 */
if( ! function_exists('gamez_single_page_show_sale')){
    function gamez_single_page_show_sale(){
        global $product;
        if ( $product->is_on_sale() ) {
            echo '<span class="gamez-onsale-text">'.esc_html__('On Sale', 'gamez').'</span>';
        }
    }
}

/*
* goes in theme functions.php or a custom plugin. Replace the image filename/path with your own :)
*
**/
add_action( 'init', 'custom_woocommerce_placeholder_image' );

function custom_woocommerce_placeholder_image() {
    add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
    function custom_woocommerce_placeholder_img_src( ) {
        $upload_dir = get_stylesheet_directory_uri();
        $src = $upload_dir . '/dist/images/placeholder_image.jpg';
        return $src;
    }
}


