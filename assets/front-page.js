(function () {
	function init() {
		var filters = document.querySelectorAll( '.ss-home__filter' );
		var cards = document.querySelectorAll( '.ss-home__card' );

		filters.forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				filters.forEach( function ( b ) { b.classList.remove( 'is-active' ); } );
				btn.classList.add( 'is-active' );
				var filter = btn.getAttribute( 'data-filter' );
				cards.forEach( function ( card ) {
					var cats = ( card.getAttribute( 'data-categories' ) || '' ).split( ' ' );
					var show = filter === 'all' || cats.indexOf( filter ) !== -1;
					card.classList.toggle( 'is-hidden', ! show );
				} );
			} );
		} );

		function closeModal( modal ) {
			modal.setAttribute( 'hidden', '' );
			var frame = modal.querySelector( '.ss-home__video-frame' );
			if ( frame ) {
				frame.innerHTML = '';
			}
		}

		cards.forEach( function ( card ) {
			card.addEventListener( 'click', function () {
				var modal = document.getElementById( card.getAttribute( 'data-modal' ) );
				if ( modal ) {
					modal.removeAttribute( 'hidden' );
				}
			} );
		} );

		document.querySelectorAll( '[data-video-modal]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var modal = document.getElementById( btn.getAttribute( 'data-video-modal' ) );
				if ( ! modal ) {
					return;
				}
				var frame = modal.querySelector( '.ss-home__video-frame' );
				var src = frame.getAttribute( 'data-embed-src' );
				var iframe = document.createElement( 'iframe' );
				iframe.src = src + ( src.indexOf( '?' ) === -1 ? '?' : '&' ) + 'autoplay=1';
				iframe.setAttribute( 'allow', 'autoplay; fullscreen; picture-in-picture' );
				iframe.setAttribute( 'allowfullscreen', '' );
				frame.appendChild( iframe );
				modal.removeAttribute( 'hidden' );
			} );
		} );

		document.querySelectorAll( '.ss-home__modal' ).forEach( function ( modal ) {
			modal.querySelector( '.ss-home__modal-close' ).addEventListener( 'click', function () {
				closeModal( modal );
			} );
			modal.addEventListener( 'click', function ( e ) {
				if ( e.target === modal ) {
					closeModal( modal );
				}
			} );
		} );

		document.addEventListener( 'keydown', function ( e ) {
			if ( e.key === 'Escape' ) {
				document.querySelectorAll( '.ss-home__modal:not([hidden])' ).forEach( closeModal );
			}
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();
