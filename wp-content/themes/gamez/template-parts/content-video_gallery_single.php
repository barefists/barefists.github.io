<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */


$post_id = gamez_get_id();
$gallery_meta = get_post_meta($post_id, '_tx_video_gallery', true);
$gallery_videos = gamez_array_get($gallery_meta, '_tx_video_galleries');


?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="video-single">
        <h3 class="video-single-title"><?php the_title(); ?></h3>
        <div class="video-single-gallery">
            <?php foreach($gallery_videos as $video): ?>
                <div class="video-gallery-item">
                    <?php echo wp_get_attachment_image($video['_tx_video_gallery_cover'], 'large', false, array('class' => 'img-responsive')); ?>
                    <a href="<?php echo esc_url($video['_tx_video_gallery_link']); ?>" class="popup-video gamez-play">
                        <svg x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7"
                             xml:space="preserve">
                        <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10"
                                 points="73.5,62.5 148.5,105.8 73.5,149.1"></polygon>
                    </svg>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="video-single-content">
            <?php the_content(); ?>
        </div>
    </div>
</article><!-- #post-## -->

