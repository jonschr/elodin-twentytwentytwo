<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.4' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
	require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );

add_filter( 'facetwp_facet_dropdown_show_counts', '__return_false' );

/**
 * Update the Texas method ID for Certifications
 */
add_filter( 'certification_state_of_texas_method_id', 'biochem_filter_tx_method' );
function biochem_filter_tx_method( $state_of_texas_method_id ) {
	$state_of_texas_method_id = get_post_meta( get_the_ID(), 'state_of_texas_method_id', true );   
	$method_id = 'State of Texas Method ID: ' . $state_of_texas_method_id;
	return $method_id;
}

/**
 * Update the EPA method ID for Certifications
 */
add_filter( 'certification_title', 'biochem_filter_epa_method' );
function biochem_filter_epa_method( $title ) {
	$title = get_the_title();    
	$method_id = 'Method EPA ' . $title;
	return $method_id;
}

// Change the text in the fSelect dropdown for facetwp
// https://facetwp.com/help-center/facets/facet-types/fselect/ 
// search for "Customize the fSelect options’ HTML"
