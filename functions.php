<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.13' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
	require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );


function elodin_customize_services_args( $args, $post_type ) {
	// Let's make sure that we're customizing the post type we really need
	if ( $post_type !== 'services' ) {
		return $args;
	}
	
	$args['show_in_rest'] = false;
	$args['supports'] = [
		'title',
		'editor',
		'excerpt',
	];
	
	
	return $args;
}
add_filter( 'register_post_type_args', 'elodin_customize_services_args', 10, 2 );

// add an image size, 386 x 216
add_image_size( 'preview', 386, 216, true );