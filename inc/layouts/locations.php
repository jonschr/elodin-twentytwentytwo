<?php

//* Output location before
// add_action( 'before_loop_layout_location', 'elodin_location_before' );
function elodin_location_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each location
add_action( 'add_loop_layout_location', 'elodin_location_each' );
function elodin_location_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	
	$address = get_post_meta( $id, 'address', true );
	$phone = get_post_meta( $id, 'phone', true );
	$fax = get_post_meta( $id, 'fax', true );
	$url = get_post_meta( $id, 'url', true );
	$google_maps_embed = get_post_meta( $id, 'google_maps_embed', true );
	$business_hours = get_post_meta( $id, 'business_hours', true );
	// $background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	// $thing = get_post_meta( $id, 'thing', true );
	
	// if ( !$content )
	// 	$permalink = null;
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	// if ( $background )
	// 	printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );

	if ( $title ) {
		printf( '<h3>%s</h3>', esc_html( $title ) );
	}
	
	if ( $address ) {
		printf( '<p>%s</p>', esc_html( $address ) );
	}	
}