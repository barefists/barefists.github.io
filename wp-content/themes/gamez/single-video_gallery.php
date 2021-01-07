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
$post_id = gamez_get_id();
$image_id = get_post_thumbnail_id($post_id);
$image_url = wp_get_attachment_image_src( $image_id, 'full' );

?>

	<div class="video-single-header" style="background-image:url(<?php echo  esc_url($image_url[0]); ?>); background-size: cover;">

	</div>

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
					<main id="main" class="site-main" >
						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */



								get_template_part( 'template-parts/content', 'video_gallery_single' ); ?>

								<div class="clearfix"></div>

								<?php	// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) : ?>

									<div class="comment-form-area">
										<?php comments_template(); ?>
									</div>
								<?php  endif;  ?>

							<?php endwhile; ?>

							<div class="clearfix"></div>

							<?php

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

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

