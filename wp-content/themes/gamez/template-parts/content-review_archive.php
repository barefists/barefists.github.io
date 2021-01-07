<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */


$post_id = get_the_ID();
$review_meta = get_post_meta( $post_id, '_tx_gamez_review', true );

$review_single_image = gamez_array_get( $review_meta, '_tx_review_header_cover' );
$review_single_image_url = esc_url( wp_get_attachment_image_src( $review_single_image, 'full' )[0] );
$review_video_link = esc_url( gamez_array_get( $review_meta, '_tx_review_header_video' ) );
$review_info_desc = gamez_array_get( $review_meta, '_tx_review_info_desc' );
$review_terms = get_the_terms( $post_id, 'game_genre' );
$review_verdict_rating = (float) gamez_array_get( $review_meta, '_tx_review_verdict_rating' );

?>

<div class="col-sm-12 col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="review-archive">
            <div class="review-archive-header" style="background-image: url(<?php echo $review_single_image_url; ?>);">
                <?php if(!empty($review_video_link)): ?>
                    <div class="gamez-video-link">
                        <a class="popup-video gamez-play" href="<?php echo $review_video_link; ?>">
                            <svg x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>
                                <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1"></polygon>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="review-archive-content">
                <?php if(has_post_thumbnail()): ?>
                <div class="review-archive-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                </div>
                <?php endif; ?>
                <div class="review-archive-details">
                    <h2 class="review-archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="review-rating" data-rate-value=<?php echo esc_attr($review_verdict_rating / 2); ?>></div>
                    <div class="review-archive-genre">
                        <?php $count = 1;
                        foreach ($review_terms as $term): ?>
                            <?php if($count > 1) {
                                echo ',';
                            }
                            $count++; ?>
                            <a href="<?php echo esc_url(get_term_link( $term )); ?>"><?php echo esc_html($term->name); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <p><?php echo wp_trim_words( $review_info_desc, 15, '...' ); ?></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </article><!-- #post-## -->
</div>
