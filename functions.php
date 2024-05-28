<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

define( 'CHILD_THEME_VERSION', '1.1' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

/**
 * Include all files in the inc directory
 */
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
	require_once $filename;
}

/**
 * Add infinite scrolling to the media library
 */
add_filter( 'media_library_infinite_scrolling', '__return_true' );

/**
 * Add excerpt support to pages
 *
 * @return void.
 */
function edi_enable_excerpts_for_page_cpt() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'edi_enable_excerpts_for_page_cpt' );