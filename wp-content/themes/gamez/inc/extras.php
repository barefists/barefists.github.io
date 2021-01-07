<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gamez
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gamez_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'gamez_body_classes' );

/**
 *
 * Custom Comment Form
 *
 */



add_filter( 'comment_form_default_fields', 'gamez_comment_form_fields' );

function gamez_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

	$fields   =  array(
		'author' => '<div class="row"><div class="col-md-4 form-group comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'gamez' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		'email'  => '<div class="col-md-4 form-group comment-form-email"><label for="email">' . esc_html__( 'Email', 'gamez' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		'url'    => '<div class="col-md-4 form-group comment-form-url"><label for="url">' . esc_html__( 'Website', 'gamez' ) . '</label> ' .
			'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div>'
	);

	return $fields;
}


add_filter( 'comment_form_defaults', 'gamez_comment_form' );

function gamez_comment_form( $args ) {
	$args['comment_field'] = '<div class="form-group comment-form-comment">

           <textarea class="form-control" id="comment" name="comment" placeholder="'._x( 'Comment', 'noun', 'gamez' ).'" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
	$args['class_submit'] = 'gamez-btn'; // since WP 4.1

	return $args;
}

/**
 *
 * Comment List Customization
 *
 */


function gamez_custom_comment(){
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$comment_args = array(

		'title_reply'=> esc_html__('Leave a Comment', 'gamez'),
		'fields' => apply_filters( 'comment_form_default_fields', array(

				'author' => '<div class="comment-form-author col-lg-6">' .
					'<p class="author_label"><label for="author">' . esc_html__( 'Name', 'gamez' ) . '</label> ' . ( $req ? '<span>*</span></p>' : '' ) .
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
			        		</div>',

				'email'  => '<div class="comment-form-email col-lg-6">' .
					'<p class="author_label"><label for="email">' . esc_html__( 'Email', 'gamez' ) . '</label>' .
					( $req ? '<span>*</span></p> ' : '' ) .
					'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.
					'</div>',

				'url'    => '',
			)
		// end of the fiels array
		),
		// end of the apply filter

		'comment_field' => '<p>' .
			'<label for="comment">' . esc_html__( 'Message', 'gamez' ) . '</label>' .
			'<textarea id="comment" name="comment" cols="45" rows="3" aria-required="true"></textarea>' .
			'</p>',

		'comment_notes_after' => '',
		'comment_notes_before' => ''

	);
// end of the $comment_args

	comment_form($comment_args);
}


function gamez_comment_list($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; ?>


	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="row">
				<div class="comment-author vcard col-sm-2 col-xs-12">
					<?php echo get_avatar($comment,$size='80' ); ?>
				</div>



				<div class="comment-meta comment-meta-data col-sm-10 col-xs-12">
					<div class="comment-wait">
						<?php if ($comment->comment_approved == '0') : ?>
							<em><?php esc_html_e('Your comment is awaiting moderation.', 'gamez') ?></em>
							<br />
						<?php endif; ?>
					</div>
					<div class="row">
						<div class="gamez-comment-author col-md-6">
							<?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>', 'gamez'), get_comment_author_link()) ?>
						</div>
						<div class="gamez-comment-date col-md-6 text-right">
							<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
								<?php printf(__('%1$s', 'gamez'), get_comment_date('M j, Y')) ?>

							</a>
						</div>
					</div>
					<div class="comment-edit"><?php edit_comment_link(__('', 'gamez'),'  ','') ?></div>
					<div class="comment-text"><?php comment_text() ?></div>
					<div class="comment-reply">
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>

				</div>
			</div>

		</div>
	</li>
	<?php

}



/**
 * Post view count
 */

function gamez_get_post_views($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return esc_html__('0 View', 'gamez');
	}
	return $count.esc_attr__(' Views', 'gamez');
}

// function to count views.
function gamez_set_post_views($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'gamez_posts_column_views');
add_action('manage_posts_custom_column', 'gamez_posts_custom_column_views',5,2);
function gamez_posts_column_views($defaults){
	$defaults['post_views'] = esc_html__('Views', 'gamez');
	return $defaults;
}
function gamez_posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
		echo gamez_get_post_views(get_the_ID());
	}
}


/**
 * Search Form
 */

add_filter( 'get_search_form', 'gamez_search_form' );

function gamez_search_form( $form ) {
	$form = '<form action="'. esc_url(home_url('/')) .'" method="get" class="form-search">
                <input name="s" maxlength="200" class="form-control search-query" type="search" size="20" placeholder="'. esc_attr__('Search ...', 'gamez') .'">
             </form>';

	return $form;

}


/**
 * Remove BBPress Breadcrumb
 */

add_filter( 'bbp_no_breadcrumb', '__return_true' );