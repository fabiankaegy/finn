<?php
/**
 * Enqueue assets
 *
 * @package finn
 */

namespace fabiankaegy\finn;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

add_action( 'init', __NAMESPACE__ . '\register_assets' );
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\register_assets' );

/**
 * register theme assets
 */
function register_assets() {

	wp_enqueue_style(
		'typekit-font',
		'https://use.typekit.net/dce7mhi.css',
		[],
		'1.0.0'
	);

	wp_enqueue_script(
		__NAMESPACE__ . '\main-script',
		get_stylesheet_directory_uri() . '/build/index.js',
		[],
		filemtime( _get_plugin_directory() . '/build/index.js' ),
		true
	);

	wp_enqueue_style(
		__NAMESPACE__ . '\styles',
		get_stylesheet_directory_uri() . '/build/index.css',
		[],
		filemtime( _get_plugin_directory() . '/build/index.css' )
	);

	add_editor_style( 'https://use.typekit.net/dce7mhi.css' );
	add_editor_style( '/build/index.css' );

}

add_action( 'wp_footer', __NAMESPACE__ . '\register_wp_footer' );

/**
 * register theme assets in footer
 */
function register_wp_footer() {
	global $wp_version;

	wp_enqueue_style(
		'dashicons',
		'/wp-includes/css/dashicons.min.css',
		[],
		$wp_version
	);
}
