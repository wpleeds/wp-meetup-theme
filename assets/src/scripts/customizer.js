var $ = require( 'jquery' );

wp.customize( 'color_primary', function( value ) {
	value.bind( function( newval ) {
		$( '.site-header' ).css( 'background-color', newval );
	} );
} );
