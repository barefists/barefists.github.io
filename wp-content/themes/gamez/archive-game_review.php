<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */

get_header();

$page_single_bg = gamez_get_option('tx_review_header_bg');
$page_single_bg_url = wp_get_attachment_image_src( $page_single_bg, 'full' );

?>
	<header class="gamez-page-header" style="background-image:url(<?php echo  esc_url($page_single_bg_url[0]); ?>); background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="gamez-page-title"><?php esc_html_e('Game Reviews', 'gamez'); ?></h1>
				</div>
			</div>
		</div>
	</header>

	<div id="primary" class="content-area">
		<main id="main" class="site-main gamez-review-archive">

		<?php
		if ( have_posts() ) : ?>

			<div class="container">
				<div class="row">
					<?php $review_counter = 1; ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
						get_template_part( 'template-parts/content', 'review_archive' );

					if($review_counter % 2 == 0) {
						echo '</div><div class="row">';
					}
					$review_counter++;

					endwhile; ?>

					<div class="clearfix"></div>

				<?php	gamez_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
