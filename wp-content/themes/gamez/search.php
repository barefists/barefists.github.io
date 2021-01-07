<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gamez
 */
$blog_sidebar_position = gamez_get_option('tx_blog_sidebar_position');

get_header();

$page_single_bg = gamez_get_option('tx_search_header_bg');
$page_single_bg_url = wp_get_attachment_image_src( $page_single_bg, 'full' );

?>
<?php if(!is_front_page()): ?>
	<header class="gamez-page-header" style="background-image:url(<?php echo  esc_url($page_single_bg_url[0]); ?>); background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="gamez-page-title"><?php printf( esc_html__( 'Search Results for: %s', 'gamez' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
			</div>
		</div>
	</header>
<?php endif; ?>
<div class="gamez-container-wrapper">
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
				<section id="primary" class="content-area">
					<main id="main" class="site-main" >

						<?php
						if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							gamez_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</main><!-- #main -->
				</section><!-- #primary -->
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
</div>
<!--end of /.gamez-container-wrapper-->

<?php

get_footer();
