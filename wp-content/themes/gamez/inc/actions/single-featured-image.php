<?php
function get_single_product_featured_image(){
    if(is_product()){
        if(has_post_thumbnail()){
            $product_featured_imge =  the_post_thumbnail_url();
            return $product_featured_imge;
        }
    }
}
add_action('gamez_single_product_featured_image', 'get_single_product_featured_image');