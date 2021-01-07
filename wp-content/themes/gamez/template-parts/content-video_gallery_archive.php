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

<div class="col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="video-archive">
            <div class="video-archive-header">
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large'); ?>
                        <span class="gamez-play">
                            <svg x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7"
                                 xml:space="preserve">
                                <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-miterlimit="10"
                                         points="73.5,62.5 148.5,105.8 73.5,149.1"></polygon>
                            </svg>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
            <div class="video-archive-content">
                <a href="<?php the_permalink(); ?>"><h3 class="video-archive-title"><?php the_title(); ?></h3></a>
                <p><?php echo wp_trim_words(get_the_content(), 17) ?></p>
            </div>
        </div>
    </article><!-- #post-## -->
</div>
