<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '1.5' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
	require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );


function ko_exclude_categories_from_blog( $query ) {
	if ( $query->is_home && is_main_query()) {
		
		// exclude the upside category from the blog
		$query->set( 'cat', '-31' );
	}
	return $query;
}
  
add_filter( 'pre_get_posts', 'ko_exclude_categories_from_blog' );