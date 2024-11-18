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
// add_filter( 'rentfetch_filter_floorplan_title', 'rf_add_property_title_to_floorplan_title', 10, 1 );

// How to change the label of a taxonomy
function ed_change_property_types_label() {
    global $wp_taxonomies;
    $labels = $wp_taxonomies['floorplancategory']->labels;
    $labels->name = 'Communities';
    $labels->singular_name = 'Communitie';
    $labels->add_new = 'Add Communitie';
    $labels->add_new_item = 'Add Communitie';
    $labels->edit_item = 'Edit Communitie';
    $labels->new_item = 'Communitie';
    $labels->view_item = 'View Communitie';
    $labels->search_items = 'Search Communities';
    $labels->not_found = 'No Communities found';
    $labels->not_found_in_trash = 'No Communities found in Trash';
    $labels->all_items = 'All Communities';
    $labels->menu_name = 'Communitie';
    $labels->name_admin_bar = 'Communitie';
}
// add_action( 'wp_loaded', 'ed_change_property_types_label' );

function test_phone_number_formatting() {
	$unformatted_numbers = [
		'2124567890',
		'212-456-7890',
		'212.456.7890',
		'212 456 7890',
		'(212)456-7890',
		'(212)-456-7890',
		'(970) 736-3239',
		'(970) 736 3239',
		'(970) 736.3239',
		'+12124567890',
		'+212-456-7890',
		'+212 456 7890',
		'+212.456.7890',
		'+1-212-456-7890',
		'+1 212.456.7890',
		'+1 (212) 456.7890',
		'+1 (212) 456-7890',
		'+1 (212)-456-7890',
		'1-212-456-7890',
		'1 (212) 456-7890',
		'1-(212)-456-7890',
		'1 (212) 456.7890',
		'(112) 456.7890',
		'+1124567890',
	];
	
	echo '<table>';
	echo '<tr>';
		echo '<th>Unformatted</th>';
		echo '<th>Formatted</th>';
		echo '<th>Link</th>';
	echo '</tr>';
	
	foreach( $unformatted_numbers as $unformatted_number ) {
		$display_phone_formatted = rentfetch_format_phone_number( $unformatted_number );
		$tel_link_phone_formatted = rentfetch_format_phone_number_link( $unformatted_number, 'tel' );
		$tel_link_phone_formatted = 'tel:' . $tel_link_phone_formatted;
		echo '<tr>';
			printf( '<td>%s</td>', $unformatted_number );
			printf( '<td>%s</td>', $display_phone_formatted );
			printf( '<td>%s</td>', $tel_link_phone_formatted );
		echo '</tr>';
		
	}
	
	echo '</table>';
}
// add_action( 'wp_footer', 'test_phone_number_formatting' );


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
	// rfs_sync_single_property( $property_id = 'RIVER', $integration = 'rentmanager' ); // Rent manager test
	rfs_sync_single_property( $property_id = 'p1797602', $integration = 'yardi' ); // Rent manager test
	
}
// add_action( 'wp_footer', 'rfs_start_sync_single_property' );