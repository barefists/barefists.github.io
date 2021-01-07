<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gamez
 */

get_header();
$blog_sidebar_position = gamez_get_option('tx_blog_sidebar_position');

$page_single_bg = gamez_get_option('tx_video_header_bg');
$page_single_bg_url = wp_get_attachment_image_src( $page_single_bg, 'full' );

?>
	<header class="gamez-page-header" style="background-image:url(<?php echo  esc_url($page_single_bg_url[0]); ?>); background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="gamez-page-title"><?php esc_html_e('Video Galleries', 'gamez'); ?></h1>
				</div>
			</div>
		</div>
	</header>

	<div class="container">
	<div class="row">
		<!--		sidebar left -->
		<?php if($blog_sidebar_position == 'left'): ?>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		<!--		end of left sidebar-->

		<!--		main content-->
		<?php if($blog_sidebar_position == 'no'): ?>
		<div class="col-md-12">
			<?php else: ?>
			<div class="col-md-8">
				<?php endif; ?>
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
						<div class="row">
						<?php
						if ( have_posts() ) :
							$review_counter = 1;

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */



								get_template_part( 'template-parts/content', 'video_gallery_archive' );

								if($review_counter % 2 == 0) {
									echo '</div><div class="row">';
								}
								$review_counter++;

								?>

								<?php	// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) : ?>

									<div class="comment-form-area">
										<?php comments_template(); ?>
									</div>
								<?php  endif;

							endwhile; ?>

							<div class="clearfix"></div>

							<?php gamez_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
						</div>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<!--		end of main content-->

			<!--		sidebar right-->
			<?php if($blog_sidebar_position == 'right'): ?>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
			<!--		end of sidebar right-->

		</div> <!-- row -->
	</div><!-- #primary -->

<?php

get_footer();

