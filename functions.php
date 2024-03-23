<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


define( 'CHILD_THEME_VERSION', '0.8' );
define( 'CHILD_THEME_DIR', dirname( __FILE__ ) );

//* Include everything in /lib
foreach ( glob( CHILD_THEME_DIR . "/inc/*/*.php", GLOB_NOSORT ) as $filename ){
	require_once $filename;
}

add_filter( 'media_library_infinite_scrolling', '__return_true' );

// How to add the property title to each floorplan
function rf_add_property_title_to_floorplan_title( $title ) {
		
	$property_id = get_post_meta( get_the_ID(), 'property_id', true );
			
	// do a query for properties with this property_id
	$args = array(
		'post_type' => 'properties',
		'posts_per_page' => 1,
		'meta_query' => array(
			array(
				'key' => 'property_id',
				'value' => $property_id,
			)
		)
	);
	
	$propertylist = get_posts( $args );
	$property = $propertylist[0];
		
	if ( $property->post_title )
		$title = sprintf( '%s - %s', $property->post_title, $title );
		
	return $title;
}
add_filter( 'rentfetch_filter_floorplan_title', 'rf_add_property_title_to_floorplan_title', 10, 1 );

// How to change the label of a taxonomy
function ed_change_property_types_label() {
    global $wp_taxonomies;
    $labels = $wp_taxonomies['propertytypes']->labels;
    $labels->name = 'Thingies';
    $labels->singular_name = 'Thingie';
    $labels->add_new = 'Add Thingie';
    $labels->add_new_item = 'Add Thingie';
    $labels->edit_item = 'Edit Thingie';
    $labels->new_item = 'Thingie';
    $labels->view_item = 'View Thingie';
    $labels->search_items = 'Search Thingies';
    $labels->not_found = 'No Thingies found';
    $labels->not_found_in_trash = 'No Thingies found in Trash';
    $labels->all_items = 'All Thingies';
    $labels->menu_name = 'Thingie';
    $labels->name_admin_bar = 'Thingie';
}
// add_action( 'wp_loaded', 'ed_change_property_types_label' );

// sync a single property manually
function rfs_start_sync_single_property() {
	
	//! Yardi notes
	// any fake property id return a 1020 error
	// p0556894 returns a 1050 error
	
	//! RealPage notes
	// there's a SiteID and a PmcID. The SiteID is the property ID, and the PmcID is the rental company ID
	// RealPage doesn't have any property information or photos
	
	// define what to sync
	// rfs_sync_single_property( $property_id = '4818691', $integration = 'realpage' ); // Mason street flats
	// rfs_sync_single_property( $property_id = '4818692', $integration = 'realpage' ); // Max flats
	// rfs_sync_single_property( $property_id = '4818710', $integration = 'realpage' ); // Oldtown flats
	rfs_sync_single_property( $property_id = '5194154', $integration = 'realpage' ); // Alpine flats
	
}
// add_action( 'wp_footer', 'rfs_start_sync_single_property' );