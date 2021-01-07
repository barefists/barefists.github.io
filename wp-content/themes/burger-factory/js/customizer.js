/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	wp.customize( 'accent_color_1', function( value ) {
		value.bind( function( to ) {
			$( 'p.site-description' ).css( 'color', to );
			$( '.intro' ).css( 'color', to );
			$( '.sticky' ).css( 'border-left-color', to );
		} );
	});

	wp.customize( 'color_scheme', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'color-scheme-light' );
			$( 'body' ).removeClass( 'color-scheme-dark' );
			$( 'body' ).addClass( to );
		} );
	});

	wp.customize( 'accent_color_2', function( value ) {
		value.bind( function( to ) {
			$( '.front-page-category' ).css( 'color', to );
			$( '.single .entry-meta' ).css( 'color', to );
			$( '.single .entry-meta a' ).css( 'color', to );
		} );
	});

	wp.customize( 'footer_copy', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info' ).html( to );
		} );
	});


} )( jQuery );
