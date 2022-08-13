<?php

//* Output property_grid before
// add_action( 'before_loop_layout_property_grid', 'elodin_property_grid_before' );
function elodin_property_grid_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each property_grid
add_action( 'add_loop_layout_property_grid', 'elodin_property_grid_each' );
function elodin_property_grid_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();
	
	//* Vars
	$title = get_the_title();
	$permalink = get_the_permalink();
	$logo_color = wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'logo_color', true ) );
	$logo_white = wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'logo_white', true ) );
		
	// Get the image, bail if we don't have one
	$images = get_post_meta( $id, 'images', true );
	$image_id = $images[0];		
	$image = wp_get_attachment_image_src( $image_id, 'large', false );
	$image_url = $image[0];
	
	//* Markup
	if ( $permalink )
		printf( '<a class="overlay" href="%s"></a>', $permalink );

	//* output the background div whether we have an image or no
	echo '<div class="featured-image-wrap">';
	
		if ( $logo_white )
			printf( '<div class="logo_white" style="background-image:url( %s );"></div>', $logo_white[0] );
		
		if ( $logo_color )
			printf( '<div class="logo_color" style="background-image:url( %s );"></div>', $logo_color[0] );
	
		if ( $image_url );
			printf( '<div class="featured-image" style="background-image:url( %s );"></div>', $image_url );
			
	echo '</div>';

	echo '<div class="property-content">';
	
	// 	if ( $title )
	// 		printf( '<h3>%s</h3>', $title );
	
		printf( '<p><a class="btn" href="%s">View Community</a></p>', $permalink );
	
			
		edit_post_link();
		
	echo '</div>';
}