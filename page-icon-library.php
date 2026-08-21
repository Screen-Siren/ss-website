<?php
/**
 * page-icon-library.php — Screen Siren Custom Theme
 *
 * The full static icon library, searchable. Linked from the Design
 * Guidelines page's Icons section rather than folded into it.
 *
 * The icon list is not hardcoded — built with glob() against the real
 * deployed folder at render time, same pattern as LKI's/FS's version.
 */

get_header();

$icon_dir   = get_stylesheet_directory() . '/assets-icons/System Icons/';
$icon_base  = get_stylesheet_directory_uri() . '/assets-icons/System Icons/';
$icon_files = glob( $icon_dir . '*-light.svg' );
$icon_names = array_map( function ( $path ) {
	return basename( $path, '-light.svg' );
}, $icon_files );
sort( $icon_names );
?>

<main class="ss-icon-library">
	<div class="ss-icon-library__intro">
		<p class="eyebrow">Icon library</p>
		<h1 class="type-h1">Every icon, searchable.</h1>
		<p class="type-lead">Phosphor, Light weight, <?php echo esc_html( count( $icon_names ) ); ?> icons. Click one to copy its filename.</p>
	</div>

	<div class="ss-icon-library__searchbar">
		<input id="il-search" type="text" placeholder="Search icons&hellip; (e.g. film, camera, star)" autofocus>
		<span class="type-micro ss-icon-library__count" id="il-count"><?php echo esc_html( count( $icon_names ) ); ?> icons</span>
	</div>

	<div class="ss-icon-library__grid" id="il-grid"></div>
	<p class="type-small ss-icon-library__empty" id="il-empty">No icons match that search.</p>
</main>

<div class="ss-icon-library__toast" id="il-toast">Copied</div>

<script>
(function() {
	var ICON_BASE = <?php echo wp_json_encode( $icon_base ); ?>;
	var names = <?php echo wp_json_encode( array_values( $icon_names ) ); ?>;

	var grid    = document.getElementById( 'il-grid' );
	var search  = document.getElementById( 'il-search' );
	var countEl = document.getElementById( 'il-count' );
	var emptyEl = document.getElementById( 'il-empty' );
	var toast   = document.getElementById( 'il-toast' );
	var toastTimer;

	function render( list ) {
		grid.innerHTML = '';
		list.forEach( function ( name ) {
			var cell = document.createElement( 'div' );
			cell.className = 'ss-icon-library__cell';
			cell.innerHTML = '<img src="' + ICON_BASE + name + '-light.svg" alt="' + name + '" loading="lazy">' +
				'<span class="n">' + name + '</span>';
			cell.addEventListener( 'click', function () {
				var filename = name + '-light.svg';
				if ( navigator.clipboard ) { navigator.clipboard.writeText( filename ).catch( function () {} ); }
				cell.classList.add( 'copied' );
				setTimeout( function () { cell.classList.remove( 'copied' ); }, 900 );
				toast.textContent = 'Copied "' + filename + '"';
				toast.classList.add( 'show' );
				clearTimeout( toastTimer );
				toastTimer = setTimeout( function () { toast.classList.remove( 'show' ); }, 1400 );
			} );
			grid.appendChild( cell );
		} );
		emptyEl.style.display = list.length ? 'none' : 'block';
	}

	function filter() {
		var q = search.value.trim().toLowerCase();
		var list = q ? names.filter( function ( n ) { return n.indexOf( q ) !== -1; } ) : names;
		countEl.textContent = list.length + ( q ? ( ' match' + ( list.length === 1 ? '' : 'es' ) ) : ' icons' );
		render( list );
	}

	search.addEventListener( 'input', filter );
	render( names );
})();
</script>

<?php get_footer(); ?>
