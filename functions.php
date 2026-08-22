<?php

function ss_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'ss_theme_setup' );

function ss_theme_enqueue_assets() {
	wp_enqueue_style( 'ss-colors-and-type', get_stylesheet_directory_uri() . '/colors_and_type.css', array(), '0.1.0' );
	wp_enqueue_style( 'ss-style', get_stylesheet_uri(), array( 'ss-colors-and-type' ), '0.1.0' );

	// page-{slug}.php routes by slug, not Template Name, so these check is_page() directly.
	if ( is_page( 'design-guidelines' ) ) {
		wp_enqueue_style( 'ss-page-design-guidelines', get_stylesheet_directory_uri() . '/assets/page-design-guidelines.css', array( 'ss-style' ), '0.1.0' );
		// Enqueued in the footer, so DOMContentLoaded has already fired by the time this
		// script attaches — it must call its function directly, not wait on that event.
		wp_enqueue_script( 'ss-page-design-guidelines', get_stylesheet_directory_uri() . '/assets/page-design-guidelines.js', array(), '0.1.0', true );
	}

	if ( is_page( 'icon-library' ) ) {
		wp_enqueue_style( 'ss-page-icon-library', get_stylesheet_directory_uri() . '/assets/page-icon-library.css', array( 'ss-style' ), '0.1.0' );
	}

	if ( is_front_page() ) {
		wp_enqueue_style( 'ss-front-page', get_stylesheet_directory_uri() . '/assets/front-page.css', array( 'ss-style' ), '0.1.0' );
		wp_enqueue_script( 'ss-front-page', get_stylesheet_directory_uri() . '/assets/front-page.js', array(), '0.1.0', true );
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
