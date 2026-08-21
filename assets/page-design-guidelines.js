/* assets/page-design-guidelines.js
 * Reads real computed colours off every .color-card and writes hex + WCAG
 * contrast (vs this page's own background) into the row. Nothing here is
 * typed in — if a token drifts in colors_and_type.css, this page drifts
 * with it automatically.
 */
(function () {
	function toRGBArray( str ) {
		var m = str.match( /rgba?\(([^)]+)\)/ );
		if ( ! m ) return [ 0, 0, 0 ];
		return m[1].split( ',' ).slice( 0, 3 ).map( function ( n ) { return parseFloat( n ); } );
	}
	function toHex( rgb ) {
		return '#' + rgb.map( function ( v ) {
			return Math.round( v ).toString( 16 ).padStart( 2, '0' );
		} ).join( '' ).toUpperCase();
	}
	function channelLum( v ) {
		v /= 255;
		return v <= 0.03928 ? v / 12.92 : Math.pow( ( v + 0.055 ) / 1.055, 2.4 );
	}
	function relLuminance( rgb ) {
		return 0.2126 * channelLum( rgb[0] ) + 0.7152 * channelLum( rgb[1] ) + 0.0722 * channelLum( rgb[2] );
	}
	function contrastRatio( a, b ) {
		var lA = relLuminance( a ) + 0.05;
		var lB = relLuminance( b ) + 0.05;
		return lA > lB ? lA / lB : lB / lA;
	}

	function computeSwatches() {
		var pageBg = toRGBArray( getComputedStyle( document.body ).backgroundColor );

		document.querySelectorAll( '.color-card' ).forEach( function ( card ) {
			var swatch = card.querySelector( '.color-card__swatch' );
			var hexEl = card.querySelector( '.color-card__hex' );
			var ratioEl = card.querySelector( '.color-card__ratio' );
			if ( ! swatch ) return;

			var rgb = toRGBArray( getComputedStyle( swatch ).backgroundColor );
			var hex = toHex( rgb );
			var ratio = contrastRatio( rgb, pageBg );
			var pass = ratio >= 4.5 ? 'AA' : ( ratio >= 3 ? 'AA, large text only' : 'fails AA' );

			if ( hexEl ) hexEl.textContent = hex;
			if ( ratioEl ) ratioEl.textContent = ratio.toFixed( 2 ) + ':1 vs page · ' + pass;
		} );
	}

	// This script is enqueued in the footer, so the DOM is already parsed
	// by the time it runs — DOMContentLoaded has already fired and a
	// listener for it here would never call back. Run directly instead.
	computeSwatches();
})();
