<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */

get_header();


$post_id = gamez_get_id();

$page_meta = get_post_meta( $post_id, '_tx_page_meta', true );

$page_single_bg = gamez_array_get( $page_meta, '_tx_page_header_image' );
$page_single_bg_url = wp_get_attachment_image_src( $page_single_bg, 'full' );

?>
<?php if(!is_front_page()): ?>
	<header class="gamez-page-header" style="background-image:url(<?php echo  esc_url($page_single_bg_url[0]); ?>); background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="gamez-page-title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</header>
<?php endif; ?>

<div class="gamez-container-wrapper">
	<div class="container">
		<div class="row">

<!--		main content-->

				<div class="col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
<!--				end of the main content-->
		</div>
<!--		end of /.row-->
	</div>
<!--	end of /.container-->
</div>
<!-- end of /.container-wrapper-->

<?php

get_footer();
