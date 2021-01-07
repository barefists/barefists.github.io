<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gamez
 */

gamez_set_post_views(get_the_ID());

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


		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gamez' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		
		<div class="entry-social-share">
			<div class="row">
				<div class="col-sm-2"><?php previous_post_link( '<div class="entry-navigation-left">%link</div>', '<i class="fa fa-chevron-left fa-fw"></i>', false ); ?></div>
				<div class="col-sm-8"><?php echo do_shortcode('[gamez-share]'); ?></div>
				<div class="col-sm-2"><?php next_post_link( '<div class="entry-navigation-right">%link</div>', '<i class="fa fa-chevron-right fa-fw"></i>', false ); ?></div>
			</div>
		</div>
		<div class="entry-author row">
			<h3><?php esc_html_e('Author : ', 'gamez');?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></h3>
			<div class="author-profile-img col-md-2">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
			</div>
			<div class="author-profile-info col-md-10">
				<p><?php the_author_meta('description'); ?></p>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
