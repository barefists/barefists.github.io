<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */

$post_id = gamez_get_id();
$review_meta = get_post_meta( $post_id, '_tx_gamez_review', true );

$review_single_image = gamez_array_get( $review_meta, '_tx_review_header_cover' );
$review_single_image_url = esc_url( wp_get_attachment_image_src( $review_single_image, 'full' )[0] );
$review_video_link = esc_url( gamez_array_get( $review_meta, '_tx_review_header_video' ) );

$review_terms = get_the_terms( $post_id, 'game_genre' );
$review_info_platform = gamez_array_get( $review_meta, '_tx_review_info_platform' );
$review_platform_icons = gamez_platform_icon_parser( $review_info_platform );
$review_info_release = gamez_array_get( $review_meta, '_tx_review_info_release' );
$review_info_developer = gamez_array_get( $review_meta, '_tx_review_info_developer' );
$review_info_publisher = gamez_array_get( $review_meta, '_tx_review_info_publisher' );
$review_info_desc = gamez_array_get( $review_meta, '_tx_review_info_desc' );

$review_deals = gamez_array_get( $review_meta, '_tx_review_deals_store' );

$review_verdict_image = gamez_array_get( $review_meta, '_tx_review_verdict_cover' );
$review_verdict_image_url = esc_url( wp_get_attachment_image_src( $review_verdict_image, 'full' )[0] );
$review_verdict_rating = (float) gamez_array_get( $review_meta, '_tx_review_verdict_rating' );
$review_verdict_positive = gamez_array_get( $review_meta, '_tx_review_verdict_positive' );
$review_verdict_negative = gamez_array_get( $review_meta, '_tx_review_verdict_negative' );

$review_images = gamez_array_get( $review_meta, '_tx_review_image_gallery' );
$review_single_images = explode(',', $review_images);
$review_videos = gamez_array_get( $review_meta, '_tx_review_video_gallery' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header" style="background-image: url(<?php echo $review_single_image_url; ?>);">
        <?php if(!empty($review_video_link)): ?>
            <div class="gamez-video-link">
                <a class="popup-video gamez-play" href="<?php echo $review_video_link; ?>">
<!--                    <i class="fa fa-play"></i>-->
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                        <svg x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                            <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>
                            <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1"></polygon>
                        </svg>

                </a>
                <h3><?php esc_html_e('Watch the trailer', 'gamez'); ?></h3>
            </div>
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="review-main-content">
        <div class="entry-content container">

            <div class="row">
                <div class="col-md-3">
                    <?php
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('full' , array( 'class' => 'img-responsive' ));
                    }
                    ?>
                </div>
                <div class="col-md-9">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <div class="row review-info">
                        <div class="col-md-6">
                            <div class="review-info-platform">
                                <h5><?php esc_html_e('Available Platforms', 'gamez'); ?></h5>
                                <?php foreach ($review_platform_icons as $ico): ?>
                                    <i class="<?php echo esc_attr($ico); ?>"></i>
                                <?php endforeach; ?>
                            </div>
                            <div class="review-info-genre">
                                <h5><?php esc_html_e('Genre', 'gamez'); ?></h5>
                                <h4>
                                    <?php $count = 1;
                                    foreach ($review_terms as $term): ?>
                                        <?php if($count > 1) {
                                            echo ',';
                                        }
                                        $count++; ?>
                                        <a href="<?php echo esc_url(get_term_link( $term )); ?>"><?php echo esc_html($term->name); ?></a>
                                    <?php endforeach; ?>
                                </h4>
                            </div>
                            <div class="review-info-release">
                                <h5><?php esc_html_e('Release Date', 'gamez'); ?></h5>
                                <h4><?php echo esc_html($review_info_release); ?></h4>
                            </div>
                            <div class="review-info-developer">
                                <h5><?php esc_html_e('Developer', 'gamez'); ?></h5>
                                <h4><?php echo esc_html($review_info_developer); ?></h4>
                            </div>
                            <div class="review-info-publisher">
                                <h5><?php esc_html_e('Publisher', 'gamez'); ?></h5>
                                <h4><?php echo esc_html($review_info_publisher); ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="review-info-deals">
                                <h5><?php esc_html_e('Deals', 'gamez'); ?></h5>
                                <?php foreach ($review_deals as $deal): ?>
                                    <div class="review-deals-container">
                                        <span class="review-deals-logo"><img src="<?php echo esc_url(get_template_directory_uri().'/dist/images/deal-logo/'. $deal['_tx_review_deals_site'] . '-logo.png'); ?>" alt="<?php echo esc_attr($deal['_tx_review_deals_site']) . esc_attr__(' logo', 'gamez'); ?>"></span>
                                        <span class="review-deals-price"><?php echo array_key_exists('_tx_review_deals_price_currency', $deal) ? esc_html($deal['_tx_review_deals_price_currency']) : esc_html('$'); echo esc_html($deal['_tx_review_deals_price']); ?></span>
                                        <span class="review-deals-link"><a href="<?php echo esc_url($deal['_tx_review_deals_link']); ?>" target="_blank"><i class="fa fa-shopping-cart"></i></a></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="review-info-desc">
                        <?php echo wp_kses($review_info_desc, wp_kses_allowed_html('post')); ?>
                    </div>


                </div>
            </div>

            <div class="review-content-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#reviews" data-toggle="tab"><?php esc_html_e('Reviews', 'gamez'); ?></a></li>
                    <li><a href="#review-news" data-toggle="tab"><?php esc_html_e('News', 'gamez'); ?></a></li>
                    <li><a href="#review-user" data-toggle="tab"><?php esc_html_e('User Review', 'gamez'); ?></a></li>
                    <li><a href="#review-images" data-toggle="tab"><?php esc_html_e('Images', 'gamez'); ?></a></li>
                    <li><a href="#review-videos" data-toggle="tab"><?php esc_html_e('Videos', 'gamez'); ?></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="reviews">
                        <?php the_content(); ?>
                    </div>
                    <div class="tab-pane fade" id="review-news">
                        <?php $cat_count = 1;
                        $review_cat = '';
                        foreach ($review_terms as $term): ?>
                            <?php if($cat_count > 1) {
                                $review_cat .= ',';
                            }
                            $cat_count++; ?>
                           <?php $review_cat.= esc_html($term->slug); ?>
                        <?php endforeach; ?>
                        <?php echo do_shortcode('[gamez-recent-post category='.$review_cat.']'); ?>
                    </div>
                    <div class="tab-pane fade" id="review-user">
                        <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                    <div class="tab-pane fade" id="review-images">
                        <div class="gamez-image-gallery">
                            <div class="row">
                                <?php foreach ($review_single_images as $image_id): ?>
                                    <div class="col-md-4 col-sm-6">
                                        <a href="<?php echo wp_get_attachment_image_url($image_id, 'full', array('class' => 'img-responsive')); ?>">
                                            <?php echo wp_get_attachment_image($image_id, 'large', false, array('class' => 'img-responsive')); ?>
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="review-videos">
                        <div class="gamez-video-gallery">
                            <div class="row">
                                <?php foreach ($review_videos as $video): ?>
                                    <div class="col-md-4 col-sm-6">
                                        <a class="popup-video" href="<?php echo esc_url($video['_tx_review_video_gallery_link']); ?>">
                                            <?php echo wp_get_attachment_image($video['_tx_review_video_gallery_cover'], 'large', false, array('class' => 'img-responsive')); ?>
                                            <i class="fa fa-play-circle-o"></i>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gamez' ),
                'after'  => '</div>',
            ) );
            ?>

            <div class="review-verdict" style="background: url(<?php echo $review_verdict_image_url; ?>)">
                <div class="review-verdict-rating">
                    <div class="shape">
                        <div class="outer-border">
                            <div class="inner-border">
                                <div class="rating-text">
                                    <h2><?php echo esc_html($review_verdict_rating); ?></h2>
                                    <h3><?php echo esc_html(apply_filters('gamez-rating-verdict', $review_verdict_rating)); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-verdict-text">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><?php esc_html_e('Pros', 'gamez'); ?></h4>
                            <ul class="review-verdict-positive">
                                <?php foreach ($review_verdict_positive as $positive): ?>
                                    <li><?php echo esc_html($positive['_tx_review_verdict_positive_verdict']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4><?php esc_html_e('Cons', 'gamez'); ?></h4>
                            <ul class="review-verdict-negative">
                                <?php foreach ($review_verdict_negative as $negative): ?>
                                    <li><?php echo esc_html($negative['_tx_review_verdict_negative_verdict']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="entry-social-share">
                <div class="row">
                    <div class="col-sm-2"><?php previous_post_link( '<div class="entry-navigation-left">%link</div>', '<i class="fa fa-chevron-left fa-fw"></i>', false ); ?></div>
                    <div class="col-sm-8"><?php echo do_shortcode('[gamez-share]'); ?></div>
                    <div class="col-sm-2"><?php next_post_link( '<div class="entry-navigation-right">%link</div>', '<i class="fa fa-chevron-right fa-fw"></i>', false ); ?></div>
                </div>
            </div>

            <footer class="entry-footer">
                <?php
                edit_post_link(
                    sprintf(
                    /* translators: %s: Name of current post */
                        esc_html__( 'Edit %s', 'gamez' ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->

        </div><!-- .entry-content -->
    </div>

</article><!-- #post-## -->
