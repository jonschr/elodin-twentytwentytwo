<?php

//* Output locations before
// add_action( 'before_loop_layout_locations', 'elodin_locations_before' );
function elodin_locations_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each locations
add_action( 'add_loop_layout_locations', 'elodin_locations_each' );
function elodin_locations_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$content = get_the_content();
	$excerpt = apply_filters( 'the_content', apply_filters( 'the_content', get_the_excerpt() ) );
	$background = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	
	$address = get_post_meta( $id, 'address', true );
	$phone = get_post_meta( $id, 'phone', true );
	
	if ( !$content )
		$permalink = null;
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );
			
	if ( $background )
		printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
	
	echo '<div class="content">';

		if ( $title )
			printf( '<h3>%s</h3>', $title );
		
		if ( $phone )
			printf( '<p class="phone"><a class="phone-link" target="_blank" href="tel:%s">%s</a></p>', $phone, $phone );
		
		if ( $address )
			printf( '<p class="address">%s</p>', $address );
	
	echo '</div>';
	
}