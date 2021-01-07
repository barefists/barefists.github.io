<?php
/**
 * The template for displaying all single posts.
 *
 * @package Gridbox
 */

get_header(); ?>

	<section id="primary" class="content-single content-area">
		<main id="main" class="site-main" role="main">
				
		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			gridbox_related_posts();

			comments_template();

		endwhile; ?>
		
		</main><!-- #main -->
	</section><!-- #primary -->
	
	<?php get_sidebar(); ?>

<div class="back-link">
	<a href="https://xuanming.asuscomm.com/">« Return to Home</a>
</div>
	
<?php get_footer(); ?>
