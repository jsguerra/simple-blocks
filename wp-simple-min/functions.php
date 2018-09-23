<?php
/**
 * @package Atomic Blocks Child Theme
 */

/**
 * Load the parent and child theme styles
 */
function atomic_blocks_parent_theme_style() {

	// Parent theme styles
	wp_enqueue_style( 'atomic-blocks-style', get_template_directory_uri(). '/style.css' );

	// Child theme styles
	wp_enqueue_style( 'atomic-blocks-child-style', get_stylesheet_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'atomic_blocks_parent_theme_style' );