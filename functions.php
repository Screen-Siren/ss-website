<?php

function ss_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'ss_theme_setup' );

// Version every enqueue by the file's own mtime, not a hand-maintained number — a static
// version string never changes across deploys, so Kinsta's cache (and browsers) keep serving
// the old file under the same URL forever. filemtime() changes the querystring automatically
// whenever the file's content changes, which busts both caches without relying on remembering
// to bump a number by hand.
function ss_theme_asset_version( $relative_path ) {
	$path = get_stylesheet_directory() . $relative_path;
	return file_exists( $path ) ? filemtime( $path ) : '0.1.0';
}

function ss_theme_enqueue_assets() {
	wp_enqueue_style( 'ss-colors-and-type', get_stylesheet_directory_uri() . '/colors_and_type.css', array(), ss_theme_asset_version( '/colors_and_type.css' ) );
	wp_enqueue_style( 'ss-style', get_stylesheet_uri(), array( 'ss-colors-and-type' ), ss_theme_asset_version( '/style.css' ) );

	// page-{slug}.php routes by slug, not Template Name, so these check is_page() directly.
	if ( is_page( 'design-guidelines' ) ) {
		wp_enqueue_style( 'ss-page-design-guidelines', get_stylesheet_directory_uri() . '/assets/page-design-guidelines.css', array( 'ss-style' ), ss_theme_asset_version( '/assets/page-design-guidelines.css' ) );
		// Enqueued in the footer, so DOMContentLoaded has already fired by the time this
		// script attaches — it must call its function directly, not wait on that event.
		wp_enqueue_script( 'ss-page-design-guidelines', get_stylesheet_directory_uri() . '/assets/page-design-guidelines.js', array(), ss_theme_asset_version( '/assets/page-design-guidelines.js' ), true );
	}

	if ( is_page( 'icon-library' ) ) {
		wp_enqueue_style( 'ss-page-icon-library', get_stylesheet_directory_uri() . '/assets/page-icon-library.css', array( 'ss-style' ), ss_theme_asset_version( '/assets/page-icon-library.css' ) );
	}

	if ( is_front_page() ) {
		wp_enqueue_style( 'ss-front-page', get_stylesheet_directory_uri() . '/assets/front-page.css', array( 'ss-style' ), ss_theme_asset_version( '/assets/front-page.css' ) );
		wp_enqueue_script( 'ss-front-page', get_stylesheet_directory_uri() . '/assets/front-page.js', array(), ss_theme_asset_version( '/assets/front-page.js' ), true );
	}
}
add_action( 'wp_enqueue_scripts', 'ss_theme_enqueue_assets' );

// No SEO plugin is active on this site (confirmed Aug 2026 — ACF Pro, Akismet, WPBakery,
// no Yoast/RankMath), so noindex needs a direct wp_head hook rather than a plugin meta key.
function ss_theme_noindex_design_guidelines() {
	if ( is_page( 'design-guidelines' ) || is_page( 'icon-library' ) ) {
		echo '<meta name="robots" content="noindex,follow">' . "\n";
	}
}
add_action( 'wp_head', 'ss_theme_noindex_design_guidelines' );
