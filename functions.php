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
}
add_action( 'wp_enqueue_scripts', 'ss_theme_enqueue_assets' );
