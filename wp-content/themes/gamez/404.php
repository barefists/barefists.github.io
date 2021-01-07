<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gamez
 */

get_header();

$bg_404 = gamez_get_option('tx_404_bg');
$bg_image_url = wp_get_attachment_image_src( $bg_404, 'full' );
?>

<div class="gamez-container-wrapper gamez-404-page" style="background-image:url(<?php echo  esc_url($bg_image_url[0]); ?>); background-size: cover;">
	<div class="container">
		<div class="row">

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<section class="error-404 not-found">
							<img src="<?php echo get_template_directory_uri() . '/dist/images/404.png' ?>" alt="404">
						</section><!-- .error-404 -->

					</main><!-- #main -->
				</div><!-- #primary -->

		</div>
<!--		end of the /.row-->
	</div>
<!--	end of /.container-->
</div>
<!--end of /.gamez-container-wrapper-->

<?php

get_footer();




