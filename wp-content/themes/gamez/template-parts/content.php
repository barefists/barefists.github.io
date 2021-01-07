<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */

?>

<article id="post-<?php the_ID(); ?>" class="col-xs-12">
	<div <?php post_class(); ?>>


		<header class="entry-header">
			<div class="entry-date-meta pull-left">
				<?php if(is_sticky()): ?>
					<div class="half-circle">
						<svg width="122" height="61" viewBox="0 0 100 100">
							<defs>
								<path id="top" class="svg-circle" d="M0,50C0,22.4,22.4,0,50,0s50,22.4,50,50"> </path>
							</defs>
							<path class="svg-circle" d="M0,50C0,22.4,22.4,0,50,0s50,22.4,50,50" > </path>
							<text class="circle-text" x="0" y="0" text-anchor="middle" >
								<textPath xlink:href="#top" startOffset="50%" alignment-baseline="text-before-edge" dominant-baseline="text-before-edge"> <?php esc_html_e('STICKY', 'gamez') ?> </textPath>
							</text>
						</svg>
					</div>
				<?php endif; ?>
				<?php gamez_date_meta(); ?>
			</div>
			<div class="pull-left">
				<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php gamez_blog_meta(); ?>
					</div><!-- .entry-meta -->
					<?php
				endif; ?>
			</div>
		</header><!-- .entry-header -->

		<div class="clearfix"></div>
		<?php if(has_post_thumbnail()): ?>
			<figure class="entry-image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full' , array( 'class' => 'img-responsive' )); ?></a>
			</figure>
		<?php endif; ?>

		<div class="entry-content">
			<?php
			echo wp_trim_words( get_the_content(), 30, '...' );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gamez' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<div class="row">
			<div class="entry-readmore col-sm-6">
				<a href="<?php the_permalink(); ?>" class="btn-border"> <?php esc_html_e('Read More', 'gamez'); ?> </a>
			</div>
			<div class="entry-comment col-sm-6">
				<span><i class="fa fa-eye"></i> <?php echo gamez_get_post_views(get_the_ID()); ?></span> <span><?php gamez_get_comment(); ?></span>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
