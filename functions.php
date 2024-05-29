<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

define( 'CHILD_THEME_VERSION', '1.4' );
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

// add_filter( 'generate_navigation_search_output', function() {
//     printf(  
//         '<form method="get" class="search-form navigation-search" action="%1$s">
//             <input type="search" class="search-field" value="%2$s" name="s" title="%3$s" />
//             <input type="hidden" name="post_type" value="page" />
//         </form>', 
//         esc_url( home_url( '/' ) ), 
//         esc_attr( get_search_query() ),   
//         esc_attr_x( 'Search', 'label', 'generatepress' ) 
//     ); 
// } );

function edi_search_only_pages($query) {
	if ($query->is_search && !is_admin()) {
		$query->set('post_type', 'page');
	}
	return $query;
}
add_action('pre_get_posts', 'edi_search_only_pages');
