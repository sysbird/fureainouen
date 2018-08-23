jQuery(function() {

	jQuery( window ).load(function() {
		jQuery( ".tile .hentry" ).tile();
		jQuery( '#widget-area .container' ).masonry( 'destroy' );
	} );

});
