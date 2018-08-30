////////////////////////////////////////
// File fureinouen.js.
jQuery(function() {

	jQuery( window ).load(function() {

		// home grid
		jQuery( "#blog ul li" ).tile( 3 );
		jQuery( ".tile .hentry" ).tile( 3 );

		// Browser supports matchMedia
		if ( window.matchMedia ) {
			// MediaQueryList
			var mq = window.matchMedia( "( min-width: 930px )" );

			// MediaQueryListListener
			var fureinouenHeightCheck = function ( mq ) {
				if ( mq.matches ) {
					// tile for home
					jQuery( "#blog ul li" ).tile( 3 );
					jQuery( ".tile .hentry" ).tile( 3 );
				}
				else {
					// cansel
					jQuery( '#blog ul li' ).css( 'height', 'auto' );
					jQuery( ".tile .hentry" ).css( 'height', 'auto' );
				}
			};

			// Add listener HeightChec
			mq.addListener( fureinouenHeightCheck );
			fureinouenHeightCheck( mq );
		}
		else {
			// Browser doesn't support matchMedia
			jQuery( "#blog ul li" ).tile( 3 );
			jQuery( ".tile .hentry" ).tile( 3 );
		}

		// Header Slider
		jQuery( '.slider[data-interval]' ).fureinouen_Slider();

		// gallery columns tile
		jQuery.each(  jQuery ( ' .gallery' ),  function(){
			gallery_class = jQuery( this ).attr( 'class' );
			gallery_columns = String(gallery_class.match( /gallery-columns-\d/ ));
			gallery_columns = gallery_columns.replace( 'gallery-columns-', '' );
				jQuery( this ).find( '.gallery-item').tile( parseInt( gallery_columns ));
			});
	});

	// Navigation for mobile
	jQuery( "#small-menu" ).click( function(){
		jQuery( "#menu-primary-items" ).slideToggle();
		jQuery( this ).toggleClass( "current" );
	});

	// Windows Scroll
	var totop = jQuery( '#back-top' );
	totop.hide();
	jQuery( window ).scroll(function () {
		// back to pagetop
		var scrollTop = parseInt( jQuery( this ).scrollTop() );
		if ( scrollTop > 800 ) totop.fadeIn(); else totop.fadeOut();

		// mini header with scroll
		var header_clip = jQuery( '#header' ).css( 'clip' );
		if( -1 == header_clip.indexOf( 'rect' ) ) {
			if ( scrollTop > 200 ) {
				jQuery('.wrapper #header').addClass('mini');
			}
			else {
				jQuery('.wrapper #header').removeClass('mini');
			}
		}
	});

	// back to pagetop
	totop.click( function () {
		jQuery( 'body, html' ).animate( { scrollTop: 0 }, 500 ); return false;
	});
});

////////////////////////////////////////
// Header Slider
jQuery.fn.fureinouen_Slider = function(){
	return this.each(function(i, elem) {
		// change slide
		var fureinouen_interval = jQuery( '.slider' ).attr( 'data-interval' );
		setInterval( function(){

			index = jQuery( '.slideitem.active' ).index( '.slideitem' );
			index++;
			if( index >= jQuery( '.slideitem' ).length ){
				index = 0;
			}

			// fade in
			jQuery( '.slideitem:eq(' + index + ')' ).fadeIn( 1000, function (){
				// fade out
				jQuery( '.slideitem.active' ).fadeOut( 1000 );
				jQuery( '.slideitem.start').removeClass( 'start' );
				jQuery( '.slideitem.active').removeClass( 'active' );
				jQuery( '.slideitem:eq(' + index + ')').addClass( 'active' );
			} );
		}, fureinouen_interval );
	});
};