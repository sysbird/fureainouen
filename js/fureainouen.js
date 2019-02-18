////////////////////////////////////////
// File fureinouen.js.
jQuery(function() {

	jQuery( window ).load(function() {
		// home grid
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
					jQuery( ".tile .hentry" ).tile( 2 );
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

		jQuery( '.related-item' ).fureinouen_Related_Item();

	});

	// Navigation for mobile
	jQuery( "#small-menu" ).click( function(){
		jQuery( "#menu-primary-items" ).slideToggle();
		jQuery( this ).toggleClass( "current" );
	});

	// My mapp scroll enable
	var map = jQuery('#gmap iframe');
	map.css('pointer-events', 'none');
	jQuery('#gmap').click(function() {
		map.css('pointer-events', 'auto');
	});
	map.mouseout(function() {
		map.css('pointer-events', 'none');
	})

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

////////////////////////////////////////
// Related vegetables
jQuery.fn.fureinouen_Related_Item = function(){
	return this.each(function(i, elem) {
		var pagetitle  = jQuery(this).find('h2 span').text();
		var url = '/wp-json/get_page/' + encodeURIComponent( pagetitle ) + '?_jsonp=?';
console.log( url );
		jQuery.ajax({
			type: 'GET',
			url: url,
			dataType: 'jsonp'
			}).done(function(data, status, xhr) {

console.log( data );
				// popup
				jQuery.magnificPopup.open({
					items: {
						src: '<div  id="content"><div class="entry-title">' + data.title + '</div> ' + data.content +'</div>',
						type: 'inline'
					}
				});

			}).fail(function(xhr, status, error) {
				console.log( "error!" );
			});
	});
};

