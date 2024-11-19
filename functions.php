<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '1.0.3' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
	require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );


add_theme_support( 'block-editor-settings' );

add_filter( 'block_editor_settings_all', function( $editor_settings ) {
	$editor_settings['filters']['duotone'][] = [
		'slug'   => 'custom-duotone',
		'name'   => 'Custom Duotone',
		'colors' => [ '#FFA500', '#000000' ],
	];
	return $editor_settings;
});