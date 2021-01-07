<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gamez
 */



if ( ! function_exists( 'gamez_date_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function gamez_date_meta() {
		$time_string = '<span class="entry-date-day" >%1$s</span>';
		$time_string .= '<span class="entry-date-month" >%2$s %3$s</span>';


		$time_string = sprintf( $time_string,
			esc_html( get_the_date( 'd' ) ),
			esc_html( get_the_date( 'M' ) ),
			esc_html( get_the_date( 'y' ) )

		);


		echo $time_string; // WPCS: XSS OK.

	}
endif;



if ( ! function_exists( 'gamez_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function gamez_posted_on() {
		$time_string = '<span class="entry-date published updated" >%1$s</span>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<span class="entry-date published" >%1$s</span><span class="updated" >%2$s</span>';
		}

		$time_string = sprintf( $time_string,
			esc_html( get_the_date() ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( ' %s', 'post date', 'gamez' ),
			$time_string
		);

		$byline = sprintf(
			esc_html_x( ' %s', 'post author', 'gamez' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on" title="'.esc_attr__( 'Posted On', 'gamez' ).'">' . $posted_on . '</span><span class="byline" title="'.esc_attr__( 'Written By', 'gamez' ).'"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'gamez_tag_meta' ) ) :

	function gamez_tag_meta(){
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'gamez' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links" title="'.esc_attr__( 'Tagged', 'gamez' ).'"><i class="fa fa-tags"></i>' . esc_html__( ' %1$s', 'gamez' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
endif;

if ( ! function_exists( 'gamez_blog_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function gamez_blog_meta() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			//gamez_posted_on();
			/* translators: used between list items, there is a space after the comma */
			printf(
				esc_html_x( '%s ', 'post author ', 'gamez' ),
				'<span class="author vcard"><i class="fa fa-user"></i> <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
			$categories_list = get_the_category_list( esc_html__( ', ', 'gamez' ) );
			if ( $categories_list && gamez_categorized_blog() ) {
				printf( '<span class="cat-links" title="'.esc_attr__( 'Category', 'gamez' ).'"><i class="fa fa-folder-open"></i>' . esc_html__( ' %1$s', 'gamez' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			gamez_tag_meta();

		}


		if(is_user_logged_in()){
			echo ' | ';
		}

		edit_post_link(
			sprintf(
			/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'gamez' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="blog-edit-link edit-link" title="'.esc_attr__( 'Edit this post', 'gamez' ).'">',
			'</span>'
		);
	}
endif;

function gamez_get_comment() {
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link" title="'.esc_attr__( '0 Comment', 'gamez' ).'"><i class="fa fa-comment"></i> ';
		comments_popup_link( esc_html__( '0 Comment', 'gamez' ), esc_html__( '1 Comment', 'gamez' ), esc_html__( '% Comments', 'gamez' ) );
		echo '</span>';
	}
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function gamez_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'gamez_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'gamez_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so gamez_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so gamez_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in gamez_categorized_blog.
 */
function gamez_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'gamez_categories' );
}
add_action( 'edit_category', 'gamez_category_transient_flusher' );
add_action( 'save_post',     'gamez_category_transient_flusher' );
