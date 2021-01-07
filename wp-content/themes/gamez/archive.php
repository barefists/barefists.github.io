<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */
//get blog sidebar position
$blog_sidebar_position = gamez_get_option('tx_blog_sidebar_position');
get_header();

$page_single_bg = gamez_get_option('tx_blog_header_bg');
$page_single_bg_url = wp_get_attachment_image_src( $page_single_bg, 'full' );

?>
<?php if(!is_front_page()): ?>
	<header class="gamez-page-header" style="background-image:url(<?php echo  esc_url($page_single_bg_url[0]); ?>); background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="gamez-page-title"><?php the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?></h1>
				</div>
			</div>
		</div>
	</header>
<?php endif; ?>

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
						<?php
						if ( have_posts() ) : ?>
							<?php

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */



								get_template_part( 'template-parts/content', get_post_format() );

							endwhile; ?>

							<div class="clearfix"></div>

							<?php gamez_pagination();

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



		</div>
		<!--		end of /.row-->
	</div>
	<!--	end of /.container-->


<?php
get_footer();
